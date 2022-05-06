export const ReturnExcelJson = (setObj) => {
    window.ExcelJs = {};
    ExcelJs.File = function(_file, _workbook) {
        var workbook = _workbook;
        return {
            toJson: function() {
                var result = {};
                var appendresult = {};
                workbook.SheetNames.forEach(function(sheetName) {
                    var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                    if (roa.length > 0) {
                        result = roa;
                        //エクセルの何番目のシートかを指定する処理。複数必要になる場合は何らかの工夫をする。
                        var count = 0;
                        result.forEach((Obj) => {
                            //ここはコールバック
                            var inner = setObj(Obj);
                            count += 1;
                            appendresult[count] = inner;
                        });
                    }
                });
                return appendresult;
            }
        };
    };
    ExcelJs.Reader = function(_file, onload) {
        var file = _file;
        var reader = new FileReader();

        reader.onload = function(e) {

            var CHUNK_SIZE = 0x8000;
            var index = 0;

            var result = '';
            var slice;

            var data = e.target.result;
            var uint8Array = new Uint8Array(data);
            var length = uint8Array.length;

            while (index < length) {
                slice = uint8Array.slice(index, Math.min(index + CHUNK_SIZE, length));
                result += String.fromCharCode.apply(null, slice);
                index += CHUNK_SIZE;
            }
            var arr = result;

            if (typeof onload == 'function') {
                onload(e, new ExcelJs.File(file, XLSX.read(btoa(arr), {
                    type: 'base64'
                })));
            }
        };
        reader.readAsArrayBuffer(file);
    };
    return ExcelJs;
}

//エクセルのファイルの行を分割するメソッド 第一引数はエクセルのオブジェクト
//第二引数は何行単位で分割するか　＊ファイルの量が大きすぎる場合もあるので小分けにするために定義しておいた。
export const DevideExcelRow = (obj, divnum) => {
    var divcount = 0;
    var divgroup = 0;
    var jsonsendarr = {};
    var jsonsend = {};
    Object.keys(obj).forEach((key) => {
        divcount += 1;
        if(divcount % divnum == 0){
            divgroup += 1;
            jsonsend = {};
        }
        jsonsend[divcount] = obj[key];
        jsonsendarr[divgroup] = jsonsend;
    });
    return jsonsendarr;
}

export class ExcelFunc{

    /**csv関連**/
    // エスケープ処理
    escapeForCSV = (s) => {
        return `"${s.replace(/\"/g, '\"\"')}"`
    }
    //二次元配列 -> CSV形式の文字列に変換
     arrToString = (arr, colDelimeter=',', rowDelimeter = '\n') => {
         if(!arr){
             return;
         }
        return arr.map((row) => row.map((cell) => this.escapeForCSV(cell)).join(colDelimeter)).join(rowDelimeter);
    }

    exportCSV(records) {
        console.log(records);
        if(!records.map){
            return;
        }

        let csv_string  = records.map((row) => row.map((cell) => cell).join(',')).join('\n');

        let bom  = new Uint8Array([0xEF, 0xBB, 0xBF]);

        let blob = new Blob([bom, csv_string], {type: 'text/csv'});
        let url = (window.URL || window.webkitURL).createObjectURL(blob);
        let link = document.createElement('a');
        link.download = 'result.csv';
        link.href = url;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
    /**csv関連**/
}