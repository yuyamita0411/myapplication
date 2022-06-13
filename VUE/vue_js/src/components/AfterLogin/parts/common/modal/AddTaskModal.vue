<template>
    <div id="AddTaskModalcover" class="position-fixed cursor AddTaskModalcoverclose"
	ref="modalcover"
	@click="
    this.$refs.modalcover.classList.add('AddTaskModalcoverclose'),
    this.$refs.modalcover.classList.remove('AddTaskModalcoveropen'),
    this.$refs.modal.classList.add('AddTaskModalclose'),
    this.$refs.modal.classList.remove('AddTaskModalopen'),
    this.$refs.sendTaskTitleAlert.innerText = '',
    this.$refs.sendTaskMsgAlert.innerText = '',
    this.$refs.DateAlert.innerText = '',
    this.$refs.DateAlert.innerText == '' ? this.$refs.DateAlert.innerText = '' : this.$refs.DateAlert.innerText = ''
    "
	>
    </div>
    <div
	id="AddTaskModal"
	:class="`position-fixed pr-0 mb-0 bg-white AddTaskModalclose`"
	ref="modal"
	>
		<div class="modalinnerwrapper overflow-hidden">
			<div class="modalinnercover d-flex position-relative" id="">
				<div class="Modal1 col-12 p-3 bg-white" id="" :style="mfstyle">
                    <div class=" w-100 d-inline-block pt-3 pb-3 pl-0 pr-0 bg-white pb-3">
                        <div id="" class="col-12 pr-0 pl-0 bg-white">
                            <div class="">
                                <div class="w-100 d-inline-block text-center">
                                    <h3 id="FirstTitle" class="notificationtitle font-weight-bold pt-4 pb-2 mb-0 m-auto">タスクを依頼する</h3>
                                </div>
                            </div>
                            <div id="FirstHTML" class="m-auto">
                                <div class=" col-md-12 m-auto pl-0 pr-0">
                                    <div class="col-12 pt-1 pb-1 m-auto">
                                        <div class="w-100 d-inline-block mb-2">担当者</div>
                                        <select
                                        name="selectincharge"
                                        ref="selectincharge"
                                        class="br5px w-100 fileinput b-none mb-4">
                                            <option
                                            v-for="eachcdata in companydata" :key="eachcdata"
                                            :value="`${eachcdata.id}:${eachcdata.name}`">{{eachcdata.name}}</option>
                                        </select>
                                        <div class="d-md-flex">
                                            <div class="col-12 col-md-4 float-left pl-0 pr-0 pr-md-2 mb-2">
                                                <div class="w-100 d-inline-block mb-0">
                                                    <small id="sendTaskTitleAlert" class="red" ref="sendTaskTitleAlert"></small>
                                                </div>
                                                <input
                                                name="sendTaskTitle"
                                                ref="sendTaskTitle"
                                                type="text"
                                                class="w-100 bg-brightgray pt-1 pb-1 BTLR1 BBLR1 BTRR1 BBRR1 b-none"
                                                placeholder="タイトル"
                                                >
                                            </div>
                                            <div class="col-12 col-md-8 float-left pl-0 pr-0 mb-2 mb-md-0">
                                                <div class="w-100 d-inline-block mb-0">
                                                    <small id="DateAlert" class="red" ref="DateAlert"></small>
                                                </div>
                                                <div class="w-100 d-flex">
                                                    <input
                                                    name="deadlineyear"
                                                    ref="deadlineyear"
                                                    type="text"
                                                    placeholder="2022"
                                                    class="bg-brightgray w-100 d-inline-block text-center BTLR1 BBLR1 BTRR1 BBRR1 b-none pt-1 pb-1">
                                                    <div class="l2rem d-inline-block text-center">/</div>
                                                    <input
                                                    name="deadlinemonth"
                                                    ref="deadlinemonth"
                                                    type="text"
                                                    placeholder="1"
                                                    class="bg-brightgray w-100 d-inline-block text-center BTLR1 BBLR1 BTRR1 BBRR1 b-none pt-1 pb-1">
                                                    <div class="l2rem d-inline-block text-center">/</div>
                                                    <input
                                                    name="deadlinedate"
                                                    ref="deadlinedate"
                                                    type="text"
                                                    placeholder="1"
                                                    class="bg-brightgray w-100 d-inline-block text-center BTLR1 BBLR1 BTRR1 BBRR1 b-none pt-1 pb-1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-100 d-inline-block mb-0"><small id="sendTaskMsgAlert" class="red" ref="sendTaskMsgAlert"></small></div>
                                        <textarea
                                        ref="sendTaskMsg"
                                        name="sendTaskMsg"
                                        placeholder="概要"
                                        class="w-100 searchbar bg-brightgray mb-3 BTLR1 BBLR1 BTRR1 BBRR1 b-none float-left pl-2"></textarea>
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
							<h5 class="mainfontcolor shadowtext col-12 pt-1 pb-1 mb-0" id="">タスクを追加しました。</h5>
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
                            <div id="AddTaskModalclosebutton" class="buttonicon margin-right-two p-2">
                                <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                    <img
									@click="
                                    ModalMotion,
                                    this.$refs.sendTaskTitleAlert.innerText = '',
                                    this.$refs.sendTaskMsgAlert.innerText = '',
                                    this.$refs.DateAlert.innerText = ''
                                    "
									id=""
									src="@/assets/modalclosebutton.png" class="d-inline-block w-100 p-2">
                                </div>
                            </div>
                            <div id="" class="buttonicon p-2">
                                <div class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold cursor br-50 line-3rem">
                                    <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                        <div
										@click="
                                        flag = true,
                                        this.$refs.sendTaskTitleAlert.innerText = '',
                                        this.$refs.sendTaskMsgAlert.innerText = '',
                                        this.$refs.DateAlert.innerText = '',
                                        this.$refs.sendTaskTitleAlert.innerText = lessthan255(this.$refs.sendTaskTitle.value.length, flag),
                                        this.$refs.sendTaskTitleAlert.innerText = IfisEmpty(this.$refs.sendTaskTitle.value, flag),
                                        this.$refs.sendTaskMsgAlert.innerText = lessthan255(this.$refs.sendTaskMsg.value.length, flag),
                                        this.$refs.sendTaskMsgAlert.innerText = IfisEmpty(this.$refs.sendTaskMsg.value, flag),
                                        this.$refs.DateAlert.innerText = IFisValidDate(`${this.$refs.deadlineyear.value}/${this.$refs.deadlinemonth.value}/${this.$refs.deadlinedate.value}`, flag),
                                        this.$refs.deadlineyear.value == '' || this.$refs.deadlinemonth.value == '' || this.$refs.deadlinedate.value == '' ? (this.$refs.DateAlert.innerText = '必須項目です。', flag = false) : this.$refs.DateAlert.innerText = '',
                                        sendobj = {
                                            'sendTaskTitle':this.$refs.sendTaskTitle.value,
                                            'selectincharge':this.$refs.selectincharge.value,
                                            'sendTaskMsg':this.$refs.sendTaskMsg.value,
                                            'deadlineyear':this.$refs.deadlineyear.value,
                                            'deadlinemonth':this.$refs.deadlinemonth.value,
                                            'deadlinedate':this.$refs.deadlinedate.value
                                        },
                                        AddAddTask()
                                        "
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
    name: 'AddTaskModal',
    data() {
        return {
            companydata:[{}],
            http:new GetData(),
            mfstyle:"left: 0%; transition:all 0.25s;",
            flag:true,
            sendobj:{}
        }
    },
    emits: ['ReRender'],
    methods:{
        lessthan255(value:number, flag:boolean){
            var msg = '';
            255 < value ? (msg = '255文字以内でお願いします。', flag = false) : msg = '';
            return msg;
        },
        IfisEmpty(txt:string, flag:boolean){
            var msg = '';
            txt == '' ? (msg = '必須項目です。', flag = false) : msg = '';
            return msg;
        },
        IFisValidDate(datestr:string, flag:boolean){
            var msg = '', dobj = new Date(datestr);
            isNaN(dobj.getFullYear()) ? (msg = '日付の形式が正しくありません。', flag = false) : msg = '';
            return msg;
        },
        AddAddTask(){
            if(this.flag == false){
                return;
            }
            this.http.Postcommon(
                "/api/taskinfo/assign",
                this.sendobj,
                (res:any) => {
                    this.mfstyle = 'left: -100%; transition:all 0.25s;';
                    setTimeout(() => {
                        const modalcover = this.$refs.modalcover as HTMLInputElement;
                        const modal = this.$refs.modal as HTMLInputElement;
                        
                        modalcover.classList.add('AddTaskModalcoverclose');
                        modalcover.classList.remove('AddTaskModalcoveropen');
                        modal.classList.add('AddTaskModalclose');
                        modal.classList.remove('AddTaskModalopen');

                        this.mfstyle = 'left: 0%; transition:all 0.25s;';

                        //同じページを開いている時だけ再レンダリング
                        if(this.$route.path == '/taskinfo'){
                            this.$emit('ReRender', true);
                        }

                    }, 1000);
                }
            );

        }
    },
    mounted(){
        this.http.common(
            "/api/taskinfo",
            {"searchTaskTitle":""},
            (res:any) => {
				this.companydata = res.data.companydata;
            }
        );
    }
});
</script>

<style lang="scss">
#AddTaskModal{
    height:calc(100vh - 4rem);
}
.AddTaskModalcoveropen,
.AddTaskModalcoverclose{
    height: 100%;
}
.AddTaskModalcoveropen,
.AddTaskModalcoverclose{
	width:100%;
}
.AddTaskModalcoveropen,
.AddTaskModalcoverclose{
    background:rgb(0, 0, 0, 0.5);
}
.AddTaskModalclose,
.AddTaskModalcoverclose{
    opacity: 0;
}
.AddTaskModalclose,
.AddTaskModalcoverclose{
    top: 100%;
}
.AddTaskModalclose,
.AddTaskModalcoveropen,
.AddTaskModalcoverclose{
    left: 0;
}
#AddTaskModal::-webkit-scrollbar-thumb{
    box-shadow: none;
}
#AddTaskModal::-webkit-scrollbar-track{
    border: none;
}
#AddTaskModal::-webkit-scrollbar-thumb{
    background: #aaa;
}
#AddTaskModal::-webkit-scrollbar-thumb,
#AddTaskModal::-webkit-scrollbar-track{
    border-radius: 5px;
}
.AddTaskModalclose{
    height: 100vh;
}
#AddTaskModal::-webkit-scrollbar{
    width: 12px;
}
.AddTaskModalcoveropen{
    opacity: 1;
}
.AddTaskModalclose,
.AddTaskModalcoverclose{
    z-index: 0;
}
.AddTaskModalcoveropen{
    z-index: 6;
}
.AddTaskModalopen{
    z-index: 7;
}
#AddTaskModal{
    overflow-y: scroll;
}
.AddTaskModalcoveropen{
    top:0;
}
.AddTaskModalcoveropen,
.AddTaskModalcoverclose{
    position: fixed;
}
.AddTaskModalopen,
.AddTaskModalclose,
.AddTaskModalcoveropen,
.AddTaskModalcoverclose{
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
    .AddTaskModalopen,
    .AddTaskModalclose{
        left: calc((100% - 45rem) / 2);
        width: 45rem;
    }
    .AddTaskModalopen{
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
    .AddTaskModalopen{
        top: 2rem;
    }
	#modalmenuwapper,
    .AddTaskModalopen,
    .AddTaskModalclose{
        width: 90%;
        left: 5%;
    }
}
</style>