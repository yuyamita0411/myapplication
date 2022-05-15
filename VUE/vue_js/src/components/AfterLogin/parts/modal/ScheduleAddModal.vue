<template>
    <div id="ScheduleAddModalcover" class="position-fixed cursor ScheduleAddModalcoverclose" @click="ModalMotion"></div>
    <div id="ScheduleAddModal" class="position-fixed pr-0 mb-0 bg-white ScheduleAddModalclose">
		<div class="modalinnerwrapper overflow-hidden">
			<div class="modalinnercover d-flex position-relative" id="EditMd">
				<div class="Modal1 col-12 p-3 bg-white" id="ScheduleAddModal1">
					<div class="w-100 d-inline-block pt-3 pb-3 pl-0 pr-0 bg-white pb-3">
						<div class="col-12 pr-0 pl-0 bg-white" id="">
							<div class="">
								<div class="w-100 d-inline-block text-center">
									<!--変わるところ-->
									<h3 class="notificationtitle font-weight-bold pt-4 pb-2 mb-0 m-auto" id="FirstTitle">スケジュールを追加する</h3>
								</div>
							</div>
							<div class="m-auto" id="FirstHTML">
								<input name="mainid" type="hidden" :value="AddScheduleData.userid"> <input name="starttime" type="hidden" :value="AddScheduleData.startdate">
								<p class="col-12">{{AddScheduleData.startdate}}</p>
								<div class="col-12 d-flex">
									<img class="searchicon cursor p-1 mr-3 tooltip-top" data-tooltip="時刻を設定する" src="@/assets/timeicon.png">
									<div class="w-100 text-center pr-2 position-relative">
										<div class="starthour buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor" id="starthour">
											09
										</div>
										<div class="position-absolute bg-white menuhide gridinside" id="starthourmenu"></div>
									</div>
									<div class="buttonicon text-center pr-2">
										:
									</div>
									<div class="w-100 text-center pr-2 position-relative">
										<div class="startminute buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor" id="startminute">
											00
										</div>
										<div class="position-absolute bg-white menuhide gridinside" id="startminutemenu"></div>
									</div>
									<div class="buttonicon text-center">
										~
									</div>
									<div class="w-100 text-center pl-2 position-relative">
										<div class="endhour buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor" id="endhour">
											10
										</div>
										<div class="position-absolute bg-white menuhide gridinside" id="endhourmenu"></div>
									</div>
									<div class="buttonicon text-center pl-2">
										:
									</div>
									<div class="w-100 text-center pl-2 position-relative">
										<div class="endminute buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor" id="endminute">
											00
										</div>
										<div class="position-absolute bg-white menuhide gridinside" id="endminutemenu"></div>
									</div><input id="Sstarttime" name="Sstarttime" type="hidden" value="09:00"> <input id="Sendtime" name="Sendtime" type="hidden" value="10:00">
								</div><span class="d-inline-block w-100 text-center red mt-3" id="timealert"></span>
								<div class="schedulemodal position-relative d-inline-block col-12">
									<div class="d-inline-block mt-5 w-100">
										<small class="red" id="schedulenameAlert"></small>
									</div><input class="w-100 searchbar bg-brightgray mb-3 border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2" name="schedulename" placeholder="タイトルを入力してください" type="text">
									<div class="d-inline-block w-100">
										<small class="red" id="schedulediscAlert"></small>
									</div>
									<textarea class="w-100 searchbar bg-brightgray mb-3 border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2" name="scheduledisc" placeholder="概要を入力してください"></textarea> <input name="userid" type="hidden" value="6"><input name="startdate" type="hidden" value="2022/5/15">
								</div>
								<h5 class="mainfontcolor col-12 pt-4 pb-1 mb-2">メンバーを追加する <small class="red" id="AddedMemberAlert"></small></h5>
								<div class="col-12 mb-0 d-inline-block" id="AddedMember"></div>
								<div class=" col-md-12 m-auto pb-3 pl-0 pr-0 bg-white d-flex">
									<div class="col-12 pb-1 m-auto" id="">
										<div class=" w-100 d-inline-block pb-3 pl-0 pr-0 bg-white">
											<div class="w-100 pb-1 m-auto">
												<div class="d-inline-block w-100 mb-3 pl-0 pr-0">
													<div class="searchbarwrapper d-inline-block w-100 mt-0">
														<input class="w-100 searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2" data-userid="6" id="addgroupmember" name="addgroupmember" placeholder="ユーザー名を入力してください。" type="text">
													</div>
												</div>
											</div>
											<div id="SearchResultArea"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="Modal2 col-12 pl-0 pr-0 position-relative bg-white" id="ScheduleAddModal2">
					<div class="m-auto h-100 bg-white">
						<div class="">
							<div class="w-100 d-inline-block text-center">
								<h3 class="notificationtitle font-weight-bold pt-4 pb-2 mb-0 m-auto" id="SecondTitle">完了</h3>
							</div>
						</div>
						<div class=" col-md-12 m-auto pt-3 pb-3 pl-0 pr-0 bg-white">
							<h5 class="mainfontcolor shadowtext col-12 pt-1 pb-1 mb-0" id="SecondMsgTitle">スケジュールを追加しました。</h5>
							<div class="col-12 pt-1 pb-1 mb-0" id="SecondMsg">
								完了
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!--モーダルのメニューは固定する-->
        <div id="modalmenuwapper" class="modalinnerwrapper overflow-hidden">
            <div id="EditMdMn" class="modalinnercover d-flex position-relative">
                <div class=" modalfinishbuttonwrapper col-12 mb-0 pt-0 pb-0 pl-0 pr-0 bg-white">
                    <div class="bgstripe45deg  col-12 m-auto pt-0 pb-0 pt-md-3 pb-md-3 pl-0 pr-0">
                        <div class="buttonarea d-flex m-auto">
                            <div id="ScheduleAddModalclosebutton" class="buttonicon margin-right-two p-2">
                                <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                    <img src="" class="d-inline-block w-100 p-2">
                                </div>
                            </div>
                            <div id="EditMdTo2" class="buttonicon p-2">
                                <div class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold cursor br-50 line-3rem">
                                    <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                        <div id="SubmitButton" class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold cursor br-50 line-3rem">確認<!--変わるところ--></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" modalfinishbuttonwrapper col-12 mb-0 pt-0 pb-0 pl-0 pr-0 bg-white">
                    <div class="bgstripe45deg  col-12 m-auto pt-0 pb-0 pt-md-3 pb-md-3 pl-0 pr-0">
                        <div class="">
                            <div id="modalfinishbutton" class="buttonicon p-2 m-auto">
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
    name: 'ScheduleAddModal',
	props:{
		AddScheduleData:Object
	},
	methods:{
        addfriends_modal_close(){
            this.$emit('close-addfriends-modal-class', "ScheduleAddModalclose");
		},
		ModalMotion(){
            document.getElementById('ScheduleAddModalcover')!.classList.toggle('ScheduleAddModalcoverclose');
            document.getElementById('ScheduleAddModalcover')!.classList.toggle('ScheduleAddModalcoveropen');
            document.getElementById('ScheduleAddModal')!.classList.toggle('ScheduleAddModalclose');
            document.getElementById('ScheduleAddModal')!.classList.toggle('ScheduleAddModalopen');
		}
	}
});
</script>

<style lang="scss">
#ScheduleAddModal{
    height:calc(100vh - 4rem);
}
.ScheduleAddModalcoveropen,
.ScheduleAddModalcoverclose{
    height: 100%;
}
.ScheduleAddModalcoveropen,
.ScheduleAddModalcoverclose{
	width:100%;
}
.ScheduleAddModalcoveropen,
.ScheduleAddModalcoverclose{
    background:rgb(0, 0, 0, 0.5);
}
.ScheduleAddModalclose,
.ScheduleAddModalcoverclose{
    opacity: 0;
}
.ScheduleAddModalclose,
.ScheduleAddModalcoverclose{
    top: 100%;
}
.ScheduleAddModalclose,
.ScheduleAddModalcoveropen,
.ScheduleAddModalcoverclose{
    left: 0;
}
#ScheduleAddModal::-webkit-scrollbar-thumb{
    box-shadow: none;
}
#ScheduleAddModal::-webkit-scrollbar-track{
    border: none;
}
#ScheduleAddModal::-webkit-scrollbar-thumb{
    background: #aaa;
}
#ScheduleAddModal::-webkit-scrollbar-thumb,
#ScheduleAddModal::-webkit-scrollbar-track{
    border-radius: 5px;
}
.ScheduleAddModalclose{
    height: 100vh;
}
#ScheduleAddModal::-webkit-scrollbar{
    width: 12px;
}
.ScheduleAddModalcoveropen{
    opacity: 1;
}
.ScheduleAddModalclose,
.ScheduleAddModalcoverclose{
    z-index: 0;
}
.ScheduleAddModalcoveropen{
    z-index: 6;
}
.ScheduleAddModalopen{
    z-index: 7;
}
#ScheduleAddModal{
    overflow: scroll;
}
.ScheduleAddModalcoveropen{
    top:0;
}
.ScheduleAddModalcoveropen,
.ScheduleAddModalcoverclose{
    position: fixed;
}
.ScheduleAddModalopen,
.ScheduleAddModalclose,
.ScheduleAddModalcoveropen,
.ScheduleAddModalcoverclose{
    transition: all 0.25s;
}
#modalmenuwapper{
    position: fixed;
    left: 0;
    bottom: 2rem;
    left: calc((100% - 45rem) / 2);
    width: 45rem;
}

@media (min-width: 768px){
    .ScheduleAddModalopen,
    .ScheduleAddModalclose{
        left: calc((100% - 45rem) / 2);
        width: 45rem;
    }
    .ScheduleAddModalopen{
        top: 2rem;
    }
}
@media (max-width: 768px){
    .ScheduleAddModalopen{
        top: 2rem;
    }
    .ScheduleAddModalopen,
    .ScheduleAddModalclose{
        width: 90%;
        left: 5%;
    }
}
</style>