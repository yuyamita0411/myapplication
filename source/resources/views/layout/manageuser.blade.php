@extends('layouts.app')
@section('content')
<h5 class="mainfontcolor mb-3 w-100 d-inline-block">フォーマット用csvをダウンロードする</h5>
<div class="bg-check pt-3 pb-3 pr-2 pl-2 mb-5">
    <div class="d-inline-block w-100 mb-3">
        <div class="d-inline-block w-100 position-relative">
            <div class="col-12 float-left pl-0 pr-0">
                <div class="bgstripe45deg d-inline-block w-100">
                    <div class="p2px">
                        <p class="mb-0 p-2 bg-white d-inline-block w-100">＊メンバーを一括でインポートするためのフォーマットのダウンロードをお願いします。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="dlformat" class="formatdl BgAccentColor text-white cursor p-2 p-lg-1 text-center m-auto">csvフォーマットをダウンロードする</div>
</div>
<h5 class="mainfontcolor mb-3 w-100 d-inline-block">アカウントをインポートする</h5>
<div class="bg-check pt-3 pb-3 pr-2 pl-2 mb-5">
    <div class="d-inline-block w-100 mb-3">
        <div class="d-inline-block w-100 position-relative">
            <div class="col-12 float-left pl-0 pr-0">
                <div class="bgstripe45deg d-inline-block w-100">
                    <div class="p2px">
                        <p class="mb-0 p-2 bg-white d-inline-block w-100">＊↑で指定されたフォーマットに従いcsvをアップロードすると、メンバーを一括でインポートできます。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="importformat" class="formatdl BgAccentColor text-white cursor p-2 p-lg-1 text-center m-auto">アカウントをインポートする</div>
</div>


            <div id="csvmodalcover" class="position-fixed cursor csvmodalcoverclose"></div>
            <div id="csvmodal" class="position-fixed csvmodalclose pr-0 mb-0 bg-white">
                <div class="modalinnerwrapper">
                    <div id="CsvMd" class="modalinnercover d-flex position-relative">
                        <div id="csvmodal1" class="Modal1 col-12 p-3 bg-white">
                            <div class=" w-100 d-inline-block pt-3 pb-3 pl-0 pr-0 bg-white pb-3">
                                <div id="" class="col-12 pr-0 pl-0 bg-white">
                                    <div class="">
                                        <div class="w-100 d-inline-block text-center">
                                            <!--変わるところ-->
                                            <h3 id="" class="notificationtitle font-weight-bold pt-4 pb-2 mb-0 m-auto"></h3>
                                        </div>
                                    </div>
                                    <div id="" class="m-auto">
                                        <div id="csvModal1" class="Modal1 col-12 pr-0 pl-0 bg-white">
                                            <div class="m-auto">
                                                <h5 class="mainfontcolor col-12 pt-4 pb-1 mb-0 pl-4 pr-4">アップロードするファイルを選択してください<br>※出力ボタン押下後数十秒かかります</h5>
                                                <div class="bg-check shadowgrid w-100 d-inline-block pt-5 pb-5">
                                                    <div class="w-100 d-inline-block text-center">
                                                        <h3 class="notificationtitle font-weight-bold pt-4 pb-2 mb-0 m-auto">
                                                            <img src="{{ asset('asset/FileStatus.png') }}" class="iconimg d-inline-block">
                                                        </h3>
                                                    </div>
                                                    <div class="w-100 d-inline-block text-center">
                                                        <p id="FilestatusTextcsv" class="font-weight-bold pt-2 pb-2 mb-0 m-auto">
                                                            ファイルが選択されていません
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="rmarea menuarea col-md-12 m-auto pt-3 pb-3 pl-0 pr-0 bg-white d-flex">
                                                    <div class="col-12 pb-1 m-auto">
                                                        <div class="w-100 d-inline-block">
                                                            <div class="tabledivwrapper w-100 d-inline-block mb-1">
                                                                <div class="tablediv tabledivleft col-12 col-md-6 float-md-left d-inline-block pl-2">
                                                                    <img src="{{ asset('asset/FileIcon.png') }}" class="w-auto h-100 p-2 iconimg d-inline-block">
                                                                </div>
                                                                <div class="tablediv bg-white  col-12 col-md-6 float-md-right d-inline-block pl-2 pr-2 pr-2">
                                                                    <label id="UploadCsvLabelcsv" for="UploadCsvcaluclate" class="cursor w-100">ファイルを選択</label>
                                                                    <input type="file" accept=".xlsx,.docx,.png" id="UploadCsvcaluclate" class="d-none">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="loadingstatus" class="col-md-12"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--モーダルのメニューは固定する-->
            <div id="csvmodalMenuBar" class="modalinnerwrapper overflow-hidden csvmodalbarclose">
                <div id="CsvMdMn" class="modalinnercover d-flex position-relative">
                    <div class=" modalfinishbuttonwrapper col-12 mb-0 pt-0 pb-0 pl-0 pr-0 bg-white">
                        <div class="bgstripe45deg  col-12 m-auto pt-0 pb-0 pt-md-3 pb-md-3 pl-0 pr-0">
                            <div class="buttonarea d-flex m-auto">
                                <div class="buttonicon margin-right-two p-2">
                                    <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                        <img src="{{ asset('asset/modalclosebutton.png') }}" id="csvmodalclosebutton" class="d-inline-block w-100 p-2">
                                    </div>
                                </div>
                                <div id="CsvMdTo2" class="buttonicon p-2">
                                    <div class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold cursor br-50 line-3rem">
                                        <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                            <div id="" class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold cursor br-50 line-3rem">確認<!--変わるところ--></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--モーダルのメニューは固定する-->
@endsection
<script type="module">
    import {ModalCommonMotion} from '../../js/modal.js'
    import {ReturnExcelJson, DevideExcelRow, ExcelFunc} from '../../js/Excel.js'
    import {Ajax} from '../js/Ajax.js'
    import {commonloadMotion} from '../js/modal.js'
    const ajax = new Ajax();
    var array1 =
      [
        ["名前", "メールアドレス"]
      ];

    window.addEventListener('click', (e) => {
        if (e.target.id.match(/dlformat/)) {
            var write_opts = {
            type: 'binary'
            };
            var wb = aoa_to_workbook(array1);
            if(!XLSX){
                return;
            }
            var wb_out = XLSX.write(wb, write_opts);
            var blob = new Blob([s2ab(wb_out)], { type: 'application/octet-stream' });
            saveAs(blob, 'myExcelFile.xlsx');
        }
        if (e.target.id.match(/importformat/)) {
            ExcelModalMotion();
            csvmotion();
        }

    });

    document.getElementById('CsvMdTo2').addEventListener('click', () => {
        commonloadMotion('loadingstatus', "{{ asset('asset/loadingicon.png') }}");
        ReturnExcelJson((Obj) => {
            var date = '';
            var tell = '';
            return {
                'name':Obj['名前'],
                'mail':Obj['メールアドレス']
            }
        });
        var files = document.getElementById('UploadCsvcaluclate').files;
        var i, f;
        var jsonsendarr = {};
        var appendhtml = '';

        for (i = 0, f = files[i]; i != files.length; ++i) {
            var er = new ExcelJs.Reader(f, function (e, xlsx) {
                jsonsendarr = DevideExcelRow(xlsx.toJson(), 20);
                
                for(var key in jsonsendarr){
                    for(var key2 in jsonsendarr[key]){
                        ajax.method1(
                            "{{route('manageuser.post')}}",
                            'POST',
                            {
                                "name":jsonsendarr[key][key2].name,
                                "mail_address":jsonsendarr[key][key2].mail,
                            },
                            (Res) => {
                                console.log(Res);
                            },
                            (r1, r2) => {
                                console.log("fail!!");
                                document.getElementById('loadingstatus').innerText = '取り込みが完了しました';
                            }
                        );
                    }

                }
            });
        }
    });

    ['load', 'resize'].forEach((ev) => {
        window.addEventListener(ev, () => {
            var hprop = '';
            if(768 < window.innerWidth){
                hprop = `height:calc(${window.innerHeight}px - 10rem);`
            }
            if(window.innerWidth <= 768){
                hprop = `height:calc(${window.innerHeight}px - 8rem);`
            }
            document.getElementById('csvmodal').setAttribute(
                'style',
                hprop
            );
        });
    });
    [`csvmodalcover`, `csvmodalclosebutton`].forEach((Idname) => {
        if(!document.getElementById(Idname)){
            return
        }
        document.getElementById(Idname).addEventListener('click', () => {
            ExcelModalMotion();
        });
    });
    const csvmotion = () => {
        document.getElementById("CsvMd").removeAttribute("style");
        document.getElementById("CsvMdMn").removeAttribute("style");
    }
    const commonmotion = () => {
        document.getElementById("EditMd").removeAttribute("style");
        document.getElementById("EditMdMn").removeAttribute("style");
    }

    const s2ab = (s) => {
        var buf = new ArrayBuffer(s.length);
        var view = new Uint8Array(buf);
        for (var i = 0; i != s.length; ++i) view[i] = s.charCodeAt(i) & 0xFF;
        return buf;
    }

    const aoa_to_workbook = (data, opts) => {
        return sheet_to_workbook(XLSX.utils.aoa_to_sheet(data, opts), opts);
    }

    const sheet_to_workbook = (sheet, opts) => {
        var n = opts && opts.sheet ? opts.sheet : "Sheet1";
        var sheets = {}; sheets[n] = sheet;
        return { SheetNames: [n], Sheets: sheets };
    }

    const ExcelModalMotion = () => {
        document.querySelectorAll('body')[0].classList.toggle(`csvmodalisopen`);
        document.getElementById(`csvmodal`).classList.toggle(`csvmodalopen`);
        document.getElementById(`csvmodalcover`).classList.toggle(`csvmodalcoverclose`);
        document.getElementById(`csvmodal`).classList.toggle(`csvmodalclose`);
        document.getElementById(`csvmodalcover`).classList.toggle(`csvmodalcoveropen`);
        document.getElementById(`csvmodalMenuBar`).classList.toggle(`csvmodalbaropen`);
        document.getElementById(`csvmodalMenuBar`).classList.toggle(`csvmodalbarclose`);
    }
</script>

<style>
    .p2px {
        padding: 2px;
    }
    .formatdl{
        max-width:20rem;
    }
    #csvmodalMenuBar{
        position: fixed;
    }
    .csvmodalbarclose{
        opacity:0;
        bottom: -15rem;
        z-index:-1;
    }
    .csvmodalbaropen{
        opacity:1;
        bottom: 2rem;
        z-index: 9999;
    }
    .csvmodalbarclose,
    .csvmodalbaropen{
        transition:all 0.25s;
    }
    @media (min-width: 768px){
        #csvmodalMenuBar{
            left: calc((100% - 45rem) / 2);
            width: 45rem;
        }
    }
    @media (max-width: 768px){
        #csvmodalMenuBar{
            width: 90%;
            left: 5%;
        }
    }
</style>