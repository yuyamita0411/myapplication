<template>
    <div id="ScheduleModalcover" class="position-fixed cursor ScheduleModalcoverclose"
	ref="modalcover"
	@click="
    this.$refs.modalcover.classList.add('ScheduleModalcoverclose'),
    this.$refs.modalcover.classList.remove('ScheduleModalcoveropen'),
    this.$refs.modal.classList.add('ScheduleModalclose'),
    this.$refs.modal.classList.remove('ScheduleModalopen')
    "
	>
    </div>
    <div
	id="ScheduleModal"
	:class="`position-fixed pr-0 mb-0 bg-white ScheduleModalclose`"
	ref="modal"
	>
		<div class="modalinnerwrapper overflow-hidden">
			<div class="modalinnercover d-flex position-relative" id="">
				<div class="Modal1 col-12 p-3 bg-white" id="" :style="mfstyle">


                    <div class=" w-100 d-inline-block pt-3 pb-3 pl-0 pr-0 bg-white pb-3">
                        <div id="" class="col-12 pr-0 pl-0 bg-white">
                            <div class="">
                                <div class="w-100 d-inline-block text-center">
                                    <h3 id="FirstTitle" class="notificationtitle font-weight-bold pt-4 pb-2 mb-0 m-auto">コメントを追加する</h3>
                                </div>
                            </div>
                            <div id="FirstHTML" class="m-auto">
                                <div class=" col-md-12 m-auto pl-0 pr-0">
                                    <div class="col-12 pt-1 pb-1 m-auto">
                                        <div class="w-100 d-inline-block mb-2">タイトル 
                                            <small id="sendCommentTitleAlert" class="red">{{commentalert}}</small>
                                        </div>
                                        <input
                                        ref="sendCommentTitle"
                                        name="sendCommentTitle" type="text" class="w-100 d-inline-block mb-4">
                                        <div class="w-100 d-inline-block mb-2">メッセージ 
                                            <small id="sendCommentMsgAlert" class="red"></small>
                                        </div>
                                        <textarea
                                        ref="sendCommentMsg"
                                        name="sendCommentMsg" class="w-100 d-inline-block mb-4">{{descalert}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


				</div>
				<div class="Modal2 col-12 pl-0 pr-0 position-relative bg-white" id="" :style="mfstyle">
					<div class="m-auto h-100 bg-white">
						<div class="">
							<div class="w-100 d-inline-block text-center">
								<h3 class="notificationtitle font-weight-bold pt-4 pb-2 mb-0 m-auto" id="">完了</h3>
							</div>
						</div>
						<div class=" col-md-12 m-auto pt-3 pb-3 pl-0 pr-0 bg-white">
							<h5 class="mainfontcolor shadowtext col-12 pt-1 pb-1 mb-0" id="">スケジュールを追加しました。</h5>
							<div class="col-12 pt-1 pb-1 mb-0" id="">
								完了
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!--モーダルのメニューは固定する-->
        <div id="modalmenuwapper" class="modalinnerwrapper overflow-hidden">
            <div id="" class="modalinnercover d-flex position-relative">
                <div class=" modalfinishbuttonwrapper col-12 mb-0 pt-0 pb-0 pl-0 pr-0 bg-white" :style="mfstyle">
                    <div class="bgstripe45deg  col-12 m-auto pt-0 pb-0 pt-md-3 pb-md-3 pl-0 pr-0">
                        <div class="buttonarea d-flex m-auto">
                            <div id="ScheduleModalclosebutton" class="buttonicon margin-right-two p-2">
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
                                        <div
										@click="AddSchedule"
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
                <div class="modalfinishbuttonwrapper col-12 mb-0 pt-0 pb-0 pl-0 pr-0 bg-white" :style="mfstyle">
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
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import {GetData} from "@/http";

export default defineComponent({
    name: 'TaskDetailModal',
    props:{
        cMclass:String,
        cMCoverclass:String
    },
    data() {
        return {
            http:new GetData(),
            mfstyle:"left: 0%; transition:all 0.25s;",
            commentalert:"",
            descalert:""
        }
    },
    methods:{
        AddSchedule(){
            var paramval = Number(location.pathname.split('/')[2]);
            const sendCommentTitle = this.$refs.sendCommentTitle as HTMLInputElement;
            const sendCommentMsg = this.$refs.sendCommentMsg as HTMLInputElement;

            var flag = true;
            if(sendCommentTitle.value == undefined || sendCommentTitle.value == null || sendCommentTitle.value == ''){
                this.commentalert = '必須項目です。';
                flag = false;
            }
            if(sendCommentMsg.value == undefined || sendCommentMsg.value == null || sendCommentMsg.value == ''){
                this.descalert = '必須項目です。';
                flag = false;
            }
            if(flag == false){
                return;
            }

            this.http.Postcommon(
                `/api/taskdetail/addcomments/${paramval}`,
                {
                    'sendCommentTitle':sendCommentTitle.value,
                    'sendCommentMsg':sendCommentMsg.value,
                    'TaskObjId':paramval
                },
                (res:any) => {
                    this.mfstyle = 'left: -100%; transition:all 0.25s;';
                    setTimeout(() => {
                        this.$refs.modalcover.classList.add('ScheduleModalcoverclose');
                        this.$refs.modalcover.classList.remove('ScheduleModalcoveropen');
                        this.$refs.modal.classList.add('ScheduleModalclose');
                        this.$refs.modal.classList.remove('ScheduleModalopen');

                        this.mfstyle = 'left: 0%; transition:all 0.25s;';
                    }, 1000);
                }
            );
        }
    }
});
</script>

<style lang="scss" scoped>
#ScheduleModal{
    height:calc(100vh - 4rem);
}
.ScheduleModalcoveropen,
.ScheduleModalcoverclose{
    height: 100%;
}
.ScheduleModalcoveropen,
.ScheduleModalcoverclose{
	width:100%;
}
.ScheduleModalcoveropen,
.ScheduleModalcoverclose{
    background:rgb(0, 0, 0, 0.5);
}
.ScheduleModalclose,
.ScheduleModalcoverclose{
    opacity: 0;
}
.ScheduleModalclose,
.ScheduleModalcoverclose{
    top: 100%;
}
.ScheduleModalclose,
.ScheduleModalcoveropen,
.ScheduleModalcoverclose{
    left: 0;
}
#ScheduleModal::-webkit-scrollbar-thumb{
    box-shadow: none;
}
#ScheduleModal::-webkit-scrollbar-track{
    border: none;
}
#ScheduleModal::-webkit-scrollbar-thumb{
    background: #aaa;
}
#ScheduleModal::-webkit-scrollbar-thumb,
#ScheduleModal::-webkit-scrollbar-track{
    border-radius: 5px;
}
.ScheduleModalclose{
    height: 100vh;
}
#ScheduleModal::-webkit-scrollbar{
    width: 12px;
}
.ScheduleModalcoveropen{
    opacity: 1;
}
.ScheduleModalclose,
.ScheduleModalcoverclose{
    z-index: 0;
}
.ScheduleModalcoveropen{
    z-index: 6;
}
.ScheduleModalopen{
    z-index: 7;
}
#ScheduleModal{
    overflow-y: scroll;
}
.ScheduleModalcoveropen{
    top:0;
}
.ScheduleModalcoveropen,
.ScheduleModalcoverclose{
    position: fixed;
}
.ScheduleModalopen,
.ScheduleModalclose,
.ScheduleModalcoveropen,
.ScheduleModalcoverclose{
    transition: all 0.25s;
}
#modalmenuwapper{
    position: fixed;
    left: 0;
    bottom: 2rem;
    left: calc((100% - 45rem) / 2);
    width: 45rem;
}
.Scheduleloading{
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
.Modal2 > div > div:nth-child(1){
	position: sticky;
	top: 0;
}
.Modal2 > div > div:nth-child(2){
	position: sticky;
	top: 7rem;
}
@media (min-width: 768px){
    .ScheduleModalopen,
    .ScheduleModalclose{
        left: calc((100% - 45rem) / 2);
        width: 45rem;
    }
    .ScheduleModalopen{
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
    .ScheduleModalopen{
        top: 2rem;
    }
	#modalmenuwapper,
    .ScheduleModalopen,
    .ScheduleModalclose{
        width: 90%;
        left: 5%;
    }
}
</style>