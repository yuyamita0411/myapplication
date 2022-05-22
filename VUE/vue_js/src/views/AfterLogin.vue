<template>
    <div id="MainColumLoadArea" v-if="loadingstatus == true" class="position-absolute">
        <LoginIconview />
    </div>
    <div :class="`home ${loadstatus}`">
        <div class="dashbordwrapper d-inline-block w-100">
            <div id="dashboardnemue" class="dashboardnemue d-inline-block position-fixed w-100 p-0 bg-white">
                <div class="d-inline-block w-100 pr-1 pl-1 pt-1 pb-1 pr-md-3 pl-md-3">
                    <div class="d-inline-block float-left font-weight-bold pt-1 pb-1 pl-4 pl-md-0">
                        <span class="mr-2">
                            <img src="@/assets/logo.png" class="accounticon">
                        </span>
                        
                        <div @click="dashboard" to="dashboard" class="logoinnertxt d-none d-md-inline-block cursor">gware</div>
                    </div>
                    <div
                    id="AccountArea"
                    class="AccountArea cursor d-inline-block float-right font-weight-bold pt-1 pb-1 pl-3 pr-3 text-white"
                    @click="AmodalOpen"
                    >
                        <span class="mr-2">
                            <img src="@/assets/accounticon.png" class="accountpersonicon">
                        </span>
                        <span id="greetingbar" class="greeting font-weight-normal text-white" data-idnow="">ようこそ{{username}}</span>様
                        <span class="ml-2">
                            <img src="@/assets/accountarrow.png" id="accountrotateicon" class="accounticon">
                        </span>
                    </div>
                </div>
            </div>
            <div class="dashbordcontent w-100 position-relative">
                <div class="w-100 d-inline-block">
                    <div id="hbwrapper" class="hbwrapper w-100 position-fixed">
                        <div id="humburgerbutton" class="hbwrapper position-relative cursor float-right"
                        @click="SidebarOpen"
                        >
                            <span class="hbar w-75 d-inline-block position-absolute"></span>
                            <span class="hbar w-75 d-inline-block position-absolute"></span>
                            <span class="hbar w-75 d-inline-block position-absolute"></span>
                        </div>
                    </div>
                </div>
                <div
                id="sidebar" class="sidecolor sidebar shadowgrid col-12 col-md-3 float-md-left"
                @click="SidebarOpen"
                >
                    <router-link
                    data-tooltip="ダッシュボード"
                    class="sidemenu tooltip-bottom sidebar_menu cursor d-inline-block col-12 mt-md-2 mb-md-2 text-md-center"
                    to="/dashboard"
                    >
                        <img src="@/assets/homeicon.png" class="sidebaricon p-2">
                    </router-link>
                    <router-link
                    data-tooltip="スケジュール"
                    class="sidemenu tooltip-bottom sidebar_menu cursor d-inline-block col-12 mt-md-2 mb-md-2 text-md-center"
                    to="/schedule"
                    >
                        <img src="@/assets/Schedule.png" class="sidebaricon p-2">
                    </router-link>
                    <router-link
                    data-tooltip="タスク進捗"
                    class="sidemenu tooltip-bottom sidebar_menu cursor d-inline-block col-12 mt-md-2 mb-md-2 text-md-center"
                    to="/taskinfo"
                    >
                        <img src="@/assets/taskicon.png" class="sidebaricon p-2">
                    </router-link>


                    <div
                    id="SendTaskButton"
                    class="cursor d-flex w-100 mt-4 pt-2 pb-2 text-left"
                    to="/taskinfo"
                    @click="TaskModalOpen"
                    >
                        <span class="taskstrarea w-100 ml-1">タスク依頼</span>
                        <img src="@/assets/PlusButtonGray.png" class="TaskPlusIcon mr-1">
                    </div>

                </div>
                <div id="maincolumn" class="maincolumn position-relative float-md-right mb-3 pb-5">
                    <!--ここだけがコロコロ変わる-->
                    <router-view/>
                </div>
            </div>
        </div>

    </div>
    <div id="logoutmodalcover" :class="Amodalclass" @click="AmodalClose"></div>

    <AccountModal></AccountModal>
    <AddTaskModal></AddTaskModal>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import {GetData} from "@/http";
import LoginIconview from '@/components/common/LoadingIcon.vue';
import AccountModal from '@/components/AfterLogin/parts/common/modal/AccountModal.vue';
import AddTaskModal from '@/components/AfterLogin/parts/common/modal/AddTaskModal.vue';

export default defineComponent({
    name: 'AfterLoginView',
    data() {
        return {
            username:"",
            loadstatus:'op0',
            loadingstatus:true,
            urlnow:location.pathname,
            Amodalclass:"logoutmodalcover position-fixed cursor modalcover_close",
            addfriends_modal_wrapper_class:"logoutmodal position-fixed modal_close",
            message:'logoutmodal position-fixed modal_close'
        };
    },
    components: {
        AccountModal,
        LoginIconview,
        AddTaskModal
    },
    mounted(){
        this.loadingstatus = true;
        const http = new GetData();
        http.common(
            "/api/user/info",
            {},
            (res:any) => {
                this.loadingstatus = false;
                this.username = res.data.userinfo.name;
                this.loadstatus = 'op1';
            }
        );
    },
    methods: {
        AmodalOpen(){
            this.Amodalclass = "logoutmodalcover position-fixed cursor modalcover_open";
            document.getElementById('logoutmodal')!.classList.toggle("modal_close");
            document.getElementById('logoutmodal')!.classList.toggle("modal_open");
        },
        AmodalClose(){
            this.Amodalclass = "logoutmodalcover position-fixed cursor modalcover_close";
            document.getElementById('logoutmodal')!.classList.toggle("modal_close");
            document.getElementById('logoutmodal')!.classList.toggle("modal_open");
        },
        SidebarOpen(){
            if(window.innerWidth < 768){
                document.getElementById('humburgerbutton')!.classList.toggle("status_open");
                document.querySelectorAll('.hbar').forEach((ob) => {
                    ob.classList.toggle("barrotate");
                });
                document.getElementById('sidebar')!.classList.toggle("sidebaropen");
            }
        },
        TaskModalOpen(){
            const modalcover = document.getElementById('AddTaskModalcover') as HTMLElement;
            const modal = document.getElementById('AddTaskModal') as HTMLElement;

            modalcover.classList.remove('AddTaskModalcoverclose');
            modalcover.classList.add('AddTaskModalcoveropen');
            modal.classList.remove('AddTaskModalclose');
            modal.classList.add('AddTaskModalopen');
        }
    }
});
</script>

<style lang="scss">
#PagenationArea{
	bottom:0rem;
	right:0;
}
#PagenationArea{
    border-top:solid 1px rgb(0, 0, 0, 0.1);
}
.logoutmodal{
    overflow:scroll;
}
.logoutmodal,
.logoutmodalinner{
    height: 40vh;
}
#MainColumLoadArea{
    top:30vh;
}
#MainColumLoadArea{
    left:50%;
}
#SendTaskButton,
#SendTaskButton:hover{
    transition:all 0.5s;
}
.TaskPlusIcon {
    width: 24px;
    height: 24px;
    padding: 3px;
}
#SendTaskButton{
    background:white;
}
@media (min-width: 768px){
	#PagenationArea{
		width: calc(100% - 10rem);
	}
    .logoutmodal{
        margin: 30vh calc((100vw - 30rem) / 2);
    }
}
@media (max-width: 768px){
	#PagenationArea{
		width: 100%;
	}
    .logoutmodal,
    .logoutmodalinner{
        height: 80vh;
    }
    .logoutmodal{
        margin: 30vh calc((100vw - 90%) / 2);
    }
}
</style>