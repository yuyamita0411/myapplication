import XLSX from 'xlsx';

import * as TSXLSX from 'ts-xlsx';

export const ReturnExcelJson = (setObj:any) => {
    const returnval:any = [];
    (window as any).ExcelJs = {};
    (window as any).ExcelJs.File = (_file:any, _workbook:any) => {
        const workbook = _workbook;
        return {
            toJson: () => {
                let result:any = {};
                const appendresult:any = {};
                workbook.SheetNames.forEach((sheetName:any) => {
                    const roa = XLSX.utils.sheet_to_json(workbook.Sheets[sheetName]);
                    if (roa.length > 0) {
                        result = roa;
                        //エクセルの何番目のシートかを指定する処理。複数必要になる場合は何らかの工夫をする。
                        let count = 0;

                        for (const key in result) {
                            const inner = setObj(result[key]);
                            count += 1;
                            appendresult[count] = inner;
                        }

                    }
                });
                return appendresult;
            }
        };
    };
    (window as any).ExcelJs.Reader = (_file:any, onload:any) => {
        const file = _file;
        let arrayBuffer:any;
        const blob = new Blob(file);

        const fileReader = new FileReader();
        fileReader.onload = (e) => {
            arrayBuffer = fileReader.result;
            const data = new Uint8Array(arrayBuffer);
            const arr = [];
            for(let i = 0; i != data.length; ++i) arr[i] = String.fromCharCode(data[i]);
            const bstr = arr.join("");
            const workbook = TSXLSX.read(bstr, {type:"binary"});
            const first_sheet_name = workbook.SheetNames[0];//1番目のシートだけを取る
            const worksheet = workbook.Sheets[first_sheet_name];//シートを指定して値を取得
            //const result = [];

            for(const each in worksheet){
                const row = worksheet[each];
                returnval.push(row);
            }

        }
        fileReader.readAsArrayBuffer(blob);
    };
    return (window as any).ExcelJs;
}

export const DevideExcelRow = (obj:any, divnum:number) => {
    let divcount = 0;
    let divgroup = 0;
    const jsonsendarr:any = {};
    let jsonsend:any = {};
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