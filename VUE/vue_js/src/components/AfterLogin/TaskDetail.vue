<template>
	<div class="shadowwrapper m-auto pl-2 pr-2 pl-lg-0 pr-lg-0">
    <LoginIconview class="dashboardloading w-100 d-inline-block text-center" v-if="loadingstatus == true" />
		<div :class="`${loadstatus} contentwraper w-100 d-inline-block pt-3 pb-4 pl-0 pr-0 mt-3`">
			<div class="pt-3 pb-3 w-100">
				<div class="gridinside pt-3 pb-3 bg-white position-relative" id="AddressArea">
					<img class="clipicon position-absolute" src="@/assets/clipicon.png">
					<div class="col-12 p-2">
                    
						<h4 @click="SearchTask">{{taskobj.taskname}}</h4>
						<p>{{taskobj.taskdescription}}</p>
					</div>
					<div class="d-inline-block w-100 position-relative">
						<div class="col-12 col-md-6 float-left p-2">
							<div class="float-left cursor">
								<img class="d-inline-block searchicon" src="@/assets/personicon.png"> 担当者
							</div><span class="d-inline-block float-left w-100" style="margin-top:4px;">{{taskobj.username}}</span>
						</div>
						<div class="col-12 col-md-6 float-left p-2">
							<div class="float-left cursor">
								<img class="d-inline-block searchicon" src="@/assets/groupicon.png"> グループ名
							</div><span class="d-inline-block float-left w-100" style="margin-top:4px;">{{taskobj.groupname}}</span>
						</div>
						<div class="col-12 col-md-6 float-left p-2">
							<div class="float-left cursor">
								<img class="d-inline-block searchicon" src="@/assets/deadlineicon.png"> 締切
							</div><span class="d-inline-block float-left w-100" style="margin-top:4px;">{{taskobj.deadline}}</span>
						</div>
						<div class="col-12 col-md-6 float-left p-2">
							<div class="float-left cursor">
								<img class="d-inline-block searchicon" src="@/assets/statusicon.png"> ステータス
							</div><span class="d-inline-block float-left w-100" style="margin-top:4px;">{{taskobj.status}}</span>
						</div>
						<div class="col-12 float-left p-2">
							<p class="mb-1"><small>依頼者: <span class="FontAccent">{{taskobj.fromusername}}</span></small></p>
							<p class="mb-1"><small>依頼日: <span class="FontAccent">{{taskobj.startdate}}</span></small></p>
						</div>
					</div>
				</div>
				<div class="m-auto">
					<div class="gridinside col-md-12 m-auto pt-3 pb-5 pl-0 pr-0 bg-white">
						<div class="col-12 pb-1 pr-2 pl-2 m-auto">
                            <h5 class="mainfontcolor w-100 mb-3">コメントを検索</h5>
                            <div class="d-inline-block w-100 mb-3">
                                <input
                                @input="SearchComment($event)"
                                :class="` w-100 searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2`"
                                id="TaskCommentSearchArea"
                                placeholder="キーワードを入力してください。"
                                type="text">
                            </div>
                            <LoginIconview class="dashboardloading w-100 d-inline-block text-center" v-if="commentloadingstatus == true" />
                            <div id="CommentDisplayArea"
                            :class="commentloadstatus"
                            >
                                <div
                                v-for="eachmsg in taskmsgobj" :key="eachmsg"
                                :class="`${commentloadstatus} commenttag w-100 mb-4 p-2`">
                                    <h4>{{eachmsg.commenttitle}}</h4>
                                    <p>{{eachmsg.commentpassage}}</p>
                                    <small class="d-inline-block w-100 text-right">
                                        <span class="font-weight-bold">送信日:</span>
                                        <span class="FontAccent">{{eachmsg.created_at}}</span>
                                    </small>
                                    <small class="d-inline-block w-100 text-right">
                                        <span class="font-weight-bold">更新日:</span>
                                        <span class="FontAccent">{{eachmsg.updated_at}}</span>
                                    </small>
                                </div>
                            </div>
                            <img
                            id="commentbutton"
                            class="d-inline-block searchicon float-right cursor"
                            src="@/assets/addcomments.png"
                            @click="AddCommentModal()"
                            >
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <TaskDetailModal />
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import {GetData} from "@/http";
import LoginIconview from '@/components/common/LoadingIcon.vue';
import TaskDetailModal from '@/components/AfterLogin/parts/TaskDetail/modal/TaskDetailModal.vue';

export default defineComponent({
	name: 'TaskDetailView',
    data() {
        return {
            http:new GetData(),
            taskobj:{},
            taskmsgobj:[],
            loadingstatus:true,
            commentloadingstatus:false,
            loadstatus:'op0',
            commentloadstatus:'op1',
            taskidsend:''
        }
    },
    components: {
        LoginIconview,
        TaskDetailModal
    },
	methods:{
        SearchTask(){
            this.loadingstatus = true;
            var paramval = Number(location.pathname.split('/')[2]);
            this.http.common(
                `/api/taskdetail/${paramval}`,
                {},
                (res:any) => {
                    console.log(res.data.taskobj);
                    console.log(res.data.taskmsgobj);
                    this.taskobj = res.data.taskobj[0];
                    this.taskmsgobj = res.data.taskmsgobj;

                    this.loadingstatus = false;
                    this.loadstatus = 'op1';
                }
            );
        },
        AddCommentModal(){
            document.getElementById('ScheduleModalcover')!.classList.remove('ScheduleModalcoverclose');
            document.getElementById('ScheduleModalcover')!.classList.add('ScheduleModalcoveropen');
            document.getElementById('ScheduleModal')!.classList.remove('ScheduleModalclose');
            document.getElementById('ScheduleModal')!.classList.add('ScheduleModalopen');
        },
        SearchComment(event:Event){
            this.commentloadingstatus = true;
            this.commentloadstatus = 'op0';
            var paramval = Number(location.pathname.split('/')[2]);

            const inputtag = event.target as HTMLInputElement;

            this.http.Postcommon(
                `/api/taskdetail/addcomments/${paramval}/search`,
                {
                    'TaskCommentSearchArea':inputtag.value
                },
                (res:any) => {
                    this.taskmsgobj = res.data;

                    this.commentloadingstatus = false;
                    this.commentloadstatus = 'op1';
                }
			);

        }
    },
    mounted(){
        this.SearchTask();
    }
});
</script>

<style lang="scss" scoped>
    #AddressArea{
        border: double 3px #0069d9;
    }
    .commenttag{
        position: relative;
        padding: 20px;
        background-color: #ffff;
        border-radius: 10px;
        border: solid 1px rgb(0, 0, 0, 0.11);
    }

    .commenttag::before{
        content: '';
        position: absolute;
        display: block;
        width: 0;
        height: 0;
        left: 21.5px;
        bottom: -20px;
        border-top: 20px solid rgb(0, 0, 0, 0.11);
        border-right: 0px solid transparent;
        border-left: 26px solid transparent;
    }

    .commenttag::after{
        content: '';
        position: absolute;
        display: block;
        width: 0;
        height: 0;
        left: 23.5px;
        bottom: -18px;
        border-top: 18px solid #fff;
        border-right: 0px solid transparent;
        border-left: 23px solid transparent;
    }
/*.taskdetailpart{
    min-height:100vh;
}
.taskdetailpart{
    right:0;
}
.calenderloading {
	position: absolute;
	transform: scale(0.7);
}

@media (min-width: 768px){
    .taskdetailpart{
        top:5.5rem;
    }
    .taskdetailpart{
        width: calc(100% - 10rem);
    }
}
@media (max-width: 768){
    .taskdetailpart{
        top:4rem;
    }
    .taskdetailpart{
        width:100%;
    }
}*/
</style>