<template>
    <div id="AddTaskModalcover" class="position-fixed cursor AddTaskModalcoverclose"
	ref="modalcover"
	@click="
    this.$refs.modalcover.classList.add('AddTaskModalcoverclose'),
    this.$refs.modalcover.classList.remove('AddTaskModalcoveropen'),
    this.$refs.modal.classList.add('AddTaskModalclose'),
    this.$refs.modal.classList.remove('AddTaskModalopen')
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
                                        <select name="selectincharge" class="br5px w-100 fileinput b-none mb-4">
                                            <option value="4:名前4">名前4</option>
                                            <option value="4:名前4">名前4</option>
                                            <option value="4:名前4">名前4</option>
                                        </select>
                                        <div class="w-100 d-inline-block mb-2">タイトル <small id="sendTaskTitleAlert" class="red"></small></div>
                                        <input name="sendTaskTitle" type="text" class="w-100 d-inline-block mb-4">
                                        <div class="w-100 d-inline-block mb-2">メッセージ <small id="sendTaskMsgAlert" class="red"></small></div>
                                        <textarea name="sendTaskMsg" class="w-100 d-inline-block mb-4"></textarea>

                                        <div class="w-100 d-inline-block mb-2">期日 <small id="DateAlert" class="red"></small></div>
                                        <div class="d-flex mb-4">
                                            <input name="deadlineyear" type="text" class="w-100 d-inline-block">
                                            <div class="w-100 d-inline-block text-center">年</div>
                                            <input name="deadlinemonth" type="text" class="w-100 d-inline-block">
                                            <div class="w-100 d-inline-block text-center">月</div>
                                            <input name="deadlinedate" type="text" class="w-100 d-inline-block">
                                            <div class="w-100 d-inline-block text-center">日</div>
                                        </div>
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
									@click="ModalMotion"
									id=""
									src="@/assets/modalclosebutton.png" class="d-inline-block w-100 p-2">
                                </div>
                            </div>
                            <div id="" class="buttonicon p-2">
                                <div class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold cursor br-50 line-3rem">
                                    <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                        <div
										@click="AddAddTask"
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
            http:new GetData(),
            mfstyle:"left: 0%; transition:all 0.25s;"
        }
    },
    methods:{
        test(){
            console.log('test');
        }
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