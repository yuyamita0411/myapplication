<template>
<div>
    <div id="csvmodalcover" class="position-fixed cursor csvmodalcoverclose"
	ref="modalcover"
	@click="
        this.$refs.modalcover.classList.remove('csvmodalcoveropen'),
        this.$refs.modalcover.classList.add('csvmodalcoverclose'),
        this.$refs.modal.classList.remove('csvmodalopen'),
        this.$refs.modal.classList.add('csvmodalclose')
    "
	>
    </div>
    <div
	id="csvmodal"
	:class="`position-fixed pr-0 mb-0 bg-white csvmodalclose`"
	ref="modal"
	>
		<div class="modalinnerwrapper overflow-hidden">
			<div class="modalinnercover d-flex position-relative" id="">
				<div class="Modal1 col-12 p-3 bg-white" id="">
                    <div id="" class="m-auto">
                        <div id="csvmodal1" class="modal1 col-12 pr-0 pl-0 bg-white">
                            <div class="m-auto">
                                <h5 class="mainfontcolor col-12 pt-4 pb-1 mb-0 pl-4 pr-4">アップロードするファイルを選択してください<br>※出力ボタン押下後数十秒かかります</h5>
                                <div class="bgstripe45deg shadowgrid w-100 d-inline-block pt-5 pb-5">
                                    <div class="w-100 d-inline-block text-center">
                                        <h3 class="notificationtitle font-weight-bold pt-4 pb-2 mb-0 m-auto">
                                            <img src="@/assets/FileStatus.png" class="iconimg d-inline-block">
                                        </h3>
                                    </div>
                                    <div class="w-100 d-inline-block text-center">
                                        <p id="FilestatusTextcsv" class="font-weight-bold pt-2 pb-2 mb-0 m-auto">
                                            {{filetxt}}
                                        </p>
                                    </div>
                                </div>
                                <div class="rmarea menuarea col-md-12 m-auto pt-3 pb-3 pl-0 pr-0 bg-white d-flex">
                                    <div class="col-12 pb-1 m-auto">
                                        <div class="w-100 d-inline-block">
                                            <div class="tabledivwrapper w-100 d-inline-block mb-1">
                                                <div class="tablediv tabledivleft col-12 col-md-6 float-md-left d-inline-block pl-2">
                                                    <img src="@/assets/FileIcon.png" class="w-auto h-100 p-2 iconimg d-inline-block">
                                                </div>
                                                <div class="tablediv bg-white  col-12 col-md-6 float-md-right d-inline-block pl-2 pr-2 pr-2">
                                                    <label id="UploadCsvLabelcsv" for="UploadCsvcaluclate" class="cursor w-100">ファイルを選択</label>
                                                    <input
                                                    @change="Changecsv($event)"
                                                    ref="UploadCsvcaluclate"
                                                    type="file"
                                                    accept=".xlsx,.docx,.png"
                                                    id="UploadCsvcaluclate"
                                                    class="d-none"
                                                    value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="loadingstatus" class="col-md-12 red">{{loadingtxt}}</div>
                            </div>
                        </div>
                    </div>
                    <LoginIconview v-if="loadingstatus == true" class="" />
				</div>
			</div>
		</div>
        <!--モーダルのメニューは固定する-->
        <div id="modalmenuwapper" class="modalinnerwrapper overflow-hidden">
            <div id="" class="modalinnercover d-flex position-relative">
                <div class=" modalfinishbuttonwrapper col-12 mb-0 pt-0 pb-0 pl-0 pr-0 bg-white">
                    <div class="bgstripe45deg  col-12 m-auto pt-0 pb-0 pt-md-3 pb-md-3 pl-0 pr-0">
                        <div class="buttonarea d-flex m-auto">
                            <div id="csvmodalclosebutton" class="buttonicon margin-right-two p-2">
                                <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                    <img
									@click="
                                    modalMotion,
                                    this.$refs.modalcover.classList.remove('csvmodalcoveropen'),
                                    this.$refs.modalcover.classList.add('csvmodalcoverclose'),
                                    this.$refs.modal.classList.remove('csvmodalopen'),
                                    this.$refs.modal.classList.add('csvmodalclose')
                                    "
									id=""
									src="@/assets/modalclosebutton.png" class="d-inline-block w-100 p-2">
                                </div>
                            </div>
                            <div id="" class="buttonicon p-2">
                                <div class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold cursor br-50 line-3rem">
                                    <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                        <div
										@click="Addcsv($event)"
										id=""
										class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold cursor br-50 line-3rem">
										確認
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modalfinishbuttonwrapper col-12 mb-0 pt-0 pb-0 pl-0 pr-0 bg-white">
                    <div class="bgstripe45deg  col-12 m-auto pt-0 pb-0 pt-md-3 pb-md-3 pl-0 pr-0">
                        <div class="">
                            <div id="" class="buttonicon p-2 m-auto">
                                <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                    <img src="@/assets/modalclosebutton.png" class="d-inline-block w-100 p-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import {GetData} from "@/http";
import * as XLSX from 'ts-xlsx';
import LoginIconview from '@/components/common/LoadingIcon.vue';

export default defineComponent({
    name: 'ManageUsermodal',
	components:{
		LoginIconview
	},
    data() {
        return {
            message: "",
            workers: [],
            showTable: false,
            showModal: false,
            loadingstatus: false,
            zoomPic: '',
            searchWord: '',
            dict: 'photo',
            filetxt: 'ファイルが選択されていません',
            TSheet: '新規ユーザー追加',
            loadingtxt: '',
            items: [''],
            http:new GetData(),

            uploadFile: {}
        };
    },
    methods:{
        Changecsv(e:Event){
            const target = e.target as HTMLInputElement;
            if(!target.files){
                return;
            }
            this.uploadFile = target.files;
            this.filetxt = target.files[0].name;
        },
        Addcsv(e:Event) {
            const target = e.target as HTMLInputElement;
            const http = new GetData();
            this.loadingstatus = true;
            this.loadingtxt = '';

            this.parseSheet(this.uploadFile, this.TSheet, (result:any) => {
                for(var er in result){
                    http.Postcommon(
                        '/api/manageuser/import',
                        {
                            "name":result[er][0],
                            "mail_address":result[er][1],
                        },
                        (res:any) => {
                            console.log(res);
                            this.loadingstatus = false;
                            this.loadingtxt = '取り込みが完了しました。';
                        },
                        (res:any) => {
                            this.loadingstatus = false;
                            this.loadingtxt = '取り込みに失敗しました。';
                        }
                    );
                }
            });
        },

        //[[名前,メアド], [名前,メアド], ...] 形式の配列を作る
        parseSheet(file:any, sheetname:string, callback:any) {
            var reader = new FileReader(),
            blob = new Blob(file);
            reader.onload = (e) => {
                const target:any = e.target;
                var unit8 = new Uint8Array(target.result),
                workbook = XLSX.read(unit8, {type: "array"}),
                sheet:any = XLSX.utils.sheet_to_json(workbook.Sheets[sheetname], {header: 1}),
                result = [];

                for (var i = 0; i < sheet.length; i++) {
                    var row:any = sheet[i];

                    if(i != 0){
                        result.push(row);
                    }
                }
                callback(result);
            };
            reader.readAsArrayBuffer(blob);
        }
    }
});
</script>

<style lang="scss">
#csvmodal{
    height:calc(100vh - 4rem);
}
.csvmodalcoveropen,
.csvmodalcoverclose{
    height: 100%;
}
.csvmodalcoveropen,
.csvmodalcoverclose{
	width:100%;
}
.csvmodalcoveropen,
.csvmodalcoverclose{
    background:rgb(0, 0, 0, 0.5);
}
.csvmodalclose,
.csvmodalcoverclose{
    opacity: 0;
}
.csvmodalclose,
.csvmodalcoverclose{
    top: 100%;
}
.csvmodalclose,
.csvmodalcoveropen,
.csvmodalcoverclose{
    left: 0;
}
#csvmodal::-webkit-scrollbar-thumb{
    box-shadow: none;
}
#csvmodal::-webkit-scrollbar-track{
    border: none;
}
#csvmodal::-webkit-scrollbar-thumb{
    background: #aaa;
}
#csvmodal::-webkit-scrollbar-thumb,
#csvmodal::-webkit-scrollbar-track{
    border-radius: 5px;
}
.csvmodalclose{
    height: 100vh;
}
#csvmodal::-webkit-scrollbar{
    width: 12px;
}
.csvmodalcoveropen{
    opacity: 1;
}
.csvmodalclose,
.csvmodalcoverclose{
    z-index: 0;
}
.csvmodalcoveropen{
    z-index: 6;
}
.csvmodalopen{
    z-index: 7;
}
#csvmodal{
    overflow-y: scroll;
}
.csvmodalcoveropen{
    top:0;
}
.csvmodalcoveropen,
.csvmodalcoverclose{
    position: fixed;
}
.csvmodalopen,
.csvmodalclose,
.csvmodalcoveropen,
.csvmodalcoverclose{
    transition: all 0.25s;
}
#modalmenuwapper{
    position: fixed;
    left: 0;
    bottom: 2rem;
    left: calc((100% - 45rem) / 2);
    width: 45rem;
}
.csvloading{
    transform:scale(0.7);
}
#starthourmenu, #startminutemenu, #endhourmenu, #endminutemenu {
	left: 0;
	overflow: scroll;
	height: 8rem;
	z-index: 1;
}
.menuhide {
	opacity: 0;
}
.menushow {
	opacity: 1;
}
.menuhide, .menushow {
	transition: opacity 0.5s;
}
.modal2 > div > div:nth-child(1){
	position: sticky;
	top: 0;
}
.modal2 > div > div:nth-child(2){
	position: sticky;
	top: 7rem;
}
@media (min-width: 768px){
    .csvmodalopen,
    .csvmodalclose{
        left: calc((100% - 45rem) / 2);
        width: 45rem;
    }
    .csvmodalopen{
        top: 2rem;
    }
	.searchresultarea{
		height:10rem;
	}
	.setSareaheight{
		min-height:20rem;
	}
}
@media (max-width: 768px){
    .csvmodalopen{
        top: 2rem;
    }
	#modalmenuwapper,
    .csvmodalopen,
    .csvmodalclose{
        width: 90%;
        left: 5%;
    }
}
</style>