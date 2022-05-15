<template>
    <div id="ScheduleRebaseModalcover" class="position-fixed cursor ScheduleRebaseModalcoverclose"
	@click="ModalMotion"></div>
    <div id="ScheduleRebaseModal" class="position-fixed pr-0 mb-0 bg-white ScheduleRebaseModalclose">
		<div class="modalinnerwrapper overflow-hidden">
			<div class="modalinnercover d-flex position-relative" id="">

                <div class="Modal1 col-12 p-3 bg-white" id="">
                    <div class="w-100 d-inline-block pt-3 pb-3 pl-0 pr-0 bg-white pb-3">
                        <div class="col-12 pr-0 pl-0 bg-white" id="">
                            <div class="">
                                <div class="w-100 d-inline-block text-center">
                                    <!--変わるところ-->
                                    <h3 class="notificationtitle font-weight-bold pt-4 pb-2 mb-0 m-auto" id="">スケジュールを編集する</h3>
                                </div>
                            </div>
                            <div class="m-auto" id="">
                                <input
                                name="mainid"
                                type="hidden"
                                value="52">
                                <input name="starttime"
                                type="hidden"
                                value="2022-03-24">
                                <div class="col-12 d-flex">
                                    <img class="searchicon cursor p-1 mr-3 tooltip-top"
                                    data-tooltip="時刻を設定する"
                                    src="@/assets/timeicon.png">
                                    <div class="w-100 text-center pr-2 position-relative">
                                        <div class="starthour buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor"
                                        id="">
                                            00
                                        </div>
                                        <div class="position-absolute bg-white menuhide gridinside" id=""></div>
                                    </div>
                                    <div class="buttonicon text-center pr-2">
                                        :
                                    </div>
                                    <div class="w-100 text-center pr-2 position-relative">
                                        <div class="startminute buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor" id="">
                                            00
                                        </div>
                                        <div class="position-absolute bg-white menuhide gridinside" id=""></div>
                                    </div>
                                    <div class="buttonicon text-center">
                                        ~
                                    </div>
                                    <div class="w-100 text-center pl-2 position-relative">
                                        <div class="endhour buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor" id="">
                                            00
                                        </div>
                                        <div class="position-absolute bg-white menuhide gridinside" id=""></div>
                                    </div>
                                    <div class="buttonicon text-center pl-2">
                                        :
                                    </div>
                                    <div class="w-100 text-center pl-2 position-relative">
                                        <div class="endminute buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor" id="">
                                            00
                                        </div>
                                        <div class="position-absolute bg-white menuhide gridinside" id=""></div>
                                    </div>
                                    <input
                                    id=""
                                    name="Sstarttime"
                                    type="hidden"
                                    value="00:00">
                                    <input
                                    id=""
                                    name="Sendtime"
                                    type="hidden"
                                    value="">
                                </div>
                                <span
                                class="d-inline-block w-100 text-center red mt-3"
                                id=""></span>
                                <div class="schedulemodal position-relative d-inline-block col-12">
                                    <div class="d-inline-block mt-5 w-100">
                                        <small class="red" id=""></small>
                                    </div><input class="w-100 searchbar bg-brightgray mb-3 border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2"
                                    name="schedulename"
                                    placeholder="タイトルを入力してください"
                                    type="text"
                                    value="タイトル52">
                                    <div class="d-inline-block w-100">
                                        <small class="red" id=""></small>
                                    </div>
                                    <textarea class="w-100 searchbar bg-brightgray mb-3 border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2"
                                    name="scheduledisc"
                                    placeholder="概要を入力してください">概要概要概要概要概要概要概要概要概要概要概要概要概要概要52</textarea>
                                    <input
                                    name="userid"
                                    type="hidden"
                                    value="2">
                                    <input
                                    name="startdate"
                                    type="hidden"
                                    value="2022/3/22"
                                    >
                                </div>
                                <h5 class="mainfontcolor col-12 pt-4 pb-1 mb-2">メンバーを追加する
                                <small class="red" id=""></small>
                                </h5>
                                <div class="col-12 mb-0 d-inline-block" id=""></div>
                                <div class=" col-md-12 m-auto pb-3 pl-0 pr-0 bg-white d-flex">
                                    <div class="col-12 pb-1 m-auto" id="">
                                        <div class=" w-100 d-inline-block pb-3 pl-0 pr-0 bg-white">
                                            <div class="w-100 pb-1 m-auto">
                                                <div class="d-inline-block w-100 mb-3 pl-0 pr-0">
                                                    <div class="searchbarwrapper d-inline-block w-100 mt-0">
                                                        <input class="w-100 searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2"
                                                        data-userid="2"
                                                        id=""
                                                        name="addgroupmember"
                                                        placeholder="ユーザー名を入力してください。"
                                                        type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="SearchResultArea"></div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="mainfontcolor col-12 pt-4 pb-1 mb-2">既に追加されたメンバー</h5>
                                <div class="col-12 mb-0 d-inline-block" id="">
                                    <div class="alreadyadded addeduserbuton d-inline-block float-left pt-1 pb-1 pr-2 pl-2 text-white mb-2 mr-2 cursor br5px"
                                    data-addeduserid="6">
                                        名前5
                                        <input
                                        name="UserToAdd[]"
                                        type="hidden"
                                        value="10">
                                    </div>
                                    <div class="alreadyadded addeduserbuton d-inline-block float-left pt-1 pb-1 pr-2 pl-2 text-white mb-2 mr-2 cursor br5px"
                                    data-addeduserid="6">
                                        名前2
                                        <input name="UserToAdd[]"
                                        type="hidden"
                                        value="2">
                                    </div>
                                    <div class="alreadyadded addeduserbuton d-inline-block float-left pt-1 pb-1 pr-2 pl-2 text-white mb-2 mr-2 cursor br5px"
                                    data-addeduserid="6">
                                        名前4
                                        <input
                                        name="UserToAdd[]"
                                        type="hidden"
                                        value="4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Modal2 col-12 pl-0 pr-0 position-relative bg-white" id="">
                    <div class="m-auto h-100 bg-white">
                        <div class="">
                            <div class="w-100 d-inline-block text-center">
                                <h3 class="notificationtitle font-weight-bold pt-4 pb-2 mb-0 m-auto" id="">完了</h3>
                            </div>
                        </div>
                        <div class="col-md-12 m-auto pt-3 pb-3 pl-0 pr-0 bg-white">
                            <h5 class="mainfontcolor shadowtext col-12 pt-1 pb-1 mb-0" id="">スケジュールを編集しました。</h5>
                            <div class="col-12 pt-1 pb-1 mb-0" id="">
                                完了
                            </div>
                        </div>
                    </div>
                </div>

			</div>
		</div>
        <!--モーダルのメニューは固定する-->
        <div id="rebasemodalmenuwapper" class="modalinnerwrapper overflow-hidden">
            <div id="" class="modalinnercover d-flex position-relative">
                <div class=" modalfinishbuttonwrapper col-12 mb-0 pt-0 pb-0 pl-0 pr-0 bg-white">
                    <div class="bgstripe45deg  col-12 m-auto pt-0 pb-0 pt-md-3 pb-md-3 pl-0 pr-0">
                        <div class="buttonarea d-flex m-auto">
                            <div id="" class="buttonicon margin-right-two p-2">
                                <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                    <img
									@click="ModalMotion"
									id=""
									src="@/assets/modalclosebutton.png" class="d-inline-block w-100 p-2">
                                </div>
                            </div>
                            <div id="" class="buttonicon p-2">
                                <div class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold cursor br-50 line-3rem">
                                    <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                        <div id="" class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold cursor br-50 line-3rem">確認<!--変わるところ--></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" modalfinishbuttonwrapper col-12 mb-0 pt-0 pb-0 pl-0 pr-0 bg-white">
                    <div class="bgstripe45deg  col-12 m-auto pt-0 pb-0 pt-md-3 pb-md-3 pl-0 pr-0">
                        <div class="">
                            <div id="" class="buttonicon p-2 m-auto">
                                <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                    <img src="" class="d-inline-block w-100 p-2">
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
import { Component, Prop, Vue } from 'vue-property-decorator';
import router from '../../../../router'
import http from "@/views/ts/http";

export default defineComponent({
    name: 'ScheduleRebaseModal',
	props:{
		RebaseScheduleData:Object
	},
	methods:{
		ModalMotion(){
            document.getElementById('ScheduleRebaseModalcover')!.classList.toggle('ScheduleRebaseModalcoverclose');
            document.getElementById('ScheduleRebaseModalcover')!.classList.toggle('ScheduleRebaseModalcoveropen');
            document.getElementById('ScheduleRebaseModal')!.classList.toggle('ScheduleRebaseModalclose');
            document.getElementById('ScheduleRebaseModal')!.classList.toggle('ScheduleRebaseModalopen');
		}
	}
});
</script>

<style lang="scss">
#ScheduleRebaseModal{
    height:calc(100vh - 4rem);
}
.ScheduleRebaseModalcoveropen,
.ScheduleRebaseModalcoverclose{
    height: 100%;
}
.ScheduleRebaseModalcoveropen,
.ScheduleRebaseModalcoverclose{
	width:100%;
}
.ScheduleRebaseModalcoveropen,
.ScheduleRebaseModalcoverclose{
    background:rgb(0, 0, 0, 0.5);
}
.ScheduleRebaseModalclose,
.ScheduleRebaseModalcoverclose{
    opacity: 0;
}
.ScheduleRebaseModalclose,
.ScheduleRebaseModalcoverclose{
    top: 100%;
}
.ScheduleRebaseModalclose,
.ScheduleRebaseModalcoveropen,
.ScheduleRebaseModalcoverclose{
    left: 0;
}
#ScheduleRebaseModal::-webkit-scrollbar-thumb{
    box-shadow: none;
}
#ScheduleRebaseModal::-webkit-scrollbar-track{
    border: none;
}
#ScheduleRebaseModal::-webkit-scrollbar-thumb{
    background: #aaa;
}
#ScheduleRebaseModal::-webkit-scrollbar-thumb,
#ScheduleRebaseModal::-webkit-scrollbar-track{
    border-radius: 5px;
}
.ScheduleRebaseModalclose{
    height: 100vh;
}
#ScheduleRebaseModal::-webkit-scrollbar{
    width: 12px;
}
.ScheduleRebaseModalcoveropen{
    opacity: 1;
}
.ScheduleRebaseModalclose,
.ScheduleRebaseModalcoverclose{
    z-index: 0;
}
.ScheduleRebaseModalcoveropen{
    z-index: 6;
}
.ScheduleRebaseModalopen{
    z-index: 7;
}
#ScheduleRebaseModal{
    overflow-y: scroll;
}
.ScheduleRebaseModalcoveropen{
    top:0;
}
.ScheduleRebaseModalcoveropen,
.ScheduleRebaseModalcoverclose{
    position: fixed;
}
.ScheduleRebaseModalopen,
.ScheduleRebaseModalclose,
.ScheduleRebaseModalcoveropen,
.ScheduleRebaseModalcoverclose{
    transition: all 0.25s;
}
#rebasemodalmenuwapper{
    position: fixed;
    left: 0;
    bottom: 2rem;
    left: calc((100% - 45rem) / 2);
    width: 45rem;
}

@media (min-width: 768px){
    .ScheduleRebaseModalopen,
    .ScheduleRebaseModalclose{
        left: calc((100% - 45rem) / 2);
        width: 45rem;
    }
    .ScheduleRebaseModalopen{
        top: 2rem;
    }
}
@media (max-width: 768px){
    .ScheduleRebaseModalopen{
        top: 2rem;
    }
	#rebasemodalmenuwapper,
    .ScheduleRebaseModalopen,
    .ScheduleRebaseModalclose{
        width: 90%;
        left: 5%;
    }
}
</style>