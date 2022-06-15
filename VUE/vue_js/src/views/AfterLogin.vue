<template>
    <LoadingIconview id="MainColumLoadArea" v-if="loadingstatus == true" class="position-relative" />
    <div :class="`home ${loadstatus}`">
        <div class="dashbordwrapper d-inline-block w-100">
            <div v-if="768 < windowwidth" id="dashboardnemue" class="dashboardnemue d-inline-block position-fixed w-100 p-0 bg-white">
                <div class="d-inline-block w-100 pr-1 pl-1 pt-1 pb-1 pr-md-3 pl-md-3">
                    <div class="d-inline-block float-left font-weight-bold pt-1 pb-1 pl-4 pl-md-0">
                        <span class="mr-2">
                            <img src="@/assets/logo.png" class="accounticon">
                        </span>
                        
                        <div @click="dashboard" to="dashboard" class="logoinnertxt d-none d-md-inline-block cursor">gware</div>
                    </div>
                    <div
                    id="AccountArea"
                    class="AccountArea cursor d-inline-block float-right font-weight-bold pt-1 pb-1 pl-3 pr-3"
                    @click="AmodalOpen"
                    >
                        <span class="mr-2">
                            <img src="@/assets/accounticon.png" class="accountpersonicon">
                        </span>
                        <span id="greetingbar" class="greeting font-weight-normal text-white" data-idnow="">{{username}} さん</span>
                        <span class="ml-2">
                            <img src="@/assets/accountarrow.png" id="accountrotateicon" class="accounticon">
                        </span>
                    </div>
                </div>
            </div>
            <div class="dashbordcontent w-100 position-relative">
                <!--img v-if="windowwidth <= 768" src="@/assets/logo.png" class="sidebaricon left0 position-fixed p-2"-->
                <div v-if="windowwidth <= 768"
                class="
                BgAccentColor z4 right0 text-white text-center
                mb-0 mr-0 p-2 position-fixed cursor"
                @click="SidebarOpen">
                    MENU
                </div>
                <div
                id="sidebar" class="sidecolor sidebar shadowgrid col-12 col-md-3 float-md-left pt-5 pt-md-0"
                @click="SidebarOpen"
                >
                    <router-link
                    data-tooltip="ダッシュボード"
                    class="sidemenu tooltip-bottom sidebar_menu cursor d-inline-block col-12 mt-md-2 mb-2 text-md-center"
                    to="/dashboard"
                    >
                        <img src="@/assets/homeicon.png" class="sidebaricon p-2">
                    </router-link>
                    <router-link
                    data-tooltip="スケジュール"
                    class="sidemenu tooltip-bottom sidebar_menu cursor d-inline-block col-12 mt-md-2 mb-2 text-md-center"
                    to="/schedule"
                    >
                        <img src="@/assets/Schedule.png" class="sidebaricon p-2">
                    </router-link>
                    <router-link
                    data-tooltip="タスク進捗"
                    class="sidemenu tooltip-bottom sidebar_menu cursor d-inline-block col-12 mt-md-2 mb-2 text-md-center"
                    to="/taskinfo"
                    >
                        <img src="@/assets/taskicon.png" class="sidebaricon p-2">
                    </router-link>

                    <router-link
                    v-if="usertype == '管理者'"
                    data-tooltip="アカウント管理"
                    class="sidemenu tooltip-bottom sidebar_menu cursor d-inline-block col-12 mt-md-2 mb-2 text-md-center"
                    to="/manageuser"
                    >
                        <img src="@/assets/manageicon.png" class="sidebaricon p-2">
                    </router-link>

                    <div
                    v-if="768 < windowwidth"
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
                    <router-view v-if="showChild" @ReRender="toggle" />
                </div>
            </div>
        </div>

    </div>
    <div id="logoutmodalcover" :class="Amodalclass" @click="AmodalClose"></div>

    <AccountModal></AccountModal>
    <AddTaskModal v-if="showChild" @ReRender="toggle"></AddTaskModal>
</template>

<script lang="ts">
import { defineComponent} from 'vue';
import {GetData} from "@/http";
import LoadingIconview from '@/components/common/LoadingIcon.vue';
import AccountModal from '@/components/AfterLogin/parts/common/modal/AccountModal.vue';
import AddTaskModal from '@/components/AfterLogin/parts/common/modal/AddTaskModal.vue';

export default defineComponent({
    name: 'AfterLoginView',
    data() {
        return {
            username:"",
            usertype:"",
            loadstatus:'op0',
            loadingstatus:true,
            urlnow:location.pathname,
            Amodalclass:"logoutmodalcover position-fixed cursor modalcover_close",
            addfriends_modal_wrapper_class:"logoutmodal position-fixed modal_close",
            message:'logoutmodal position-fixed modal_close',
            showChild: true,
            windowwidth:0
        };
    },
    components: {
        AccountModal,
        LoadingIconview,
        AddTaskModal
    },
    mounted(){
        this.setGnav();
        this.loadingstatus = true;
        const http = new GetData();
        http.common(
            "/api/user/info",
            {},
            (res:any) => {
                this.loadingstatus = false;
                this.username = res.data.userinfo.name;
                this.usertype = res.data.userinfo.type;
                this.loadstatus = 'op1';
            }
        );
    },
    methods: {
        toggle() {
            this.showChild = false;
            this.$nextTick(() => (this.showChild = true));
        },
        setGnav(){
            window.addEventListener('load', () => {
                this.windowwidth = window.innerWidth;
            });
            window.addEventListener('resize', () => {
                this.windowwidth = window.innerWidth;
            });
        },
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
                /*document.getElementById('humburgerbutton')!.classList.toggle("status_open");
                document.querySelectorAll('.hbar').forEach((ob) => {
                    ob.classList.toggle("barrotate");
                });*/
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
.wholeloader {
    top:10vh;
    left:0;
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
#PagenationArea{
    height: 5.5rem;
}
.PNwrapper{
	bottom:0.5rem;
}
#PageNationInput{
    width:4rem;
}
@media (min-width: 768px){
	#PagenationArea{
		width: calc(100% - 10rem);
	}
    .logoutmodal{
        margin: 30vh calc((100vw - 30rem) / 2);
    }
    .pagenationnum{
        max-width:3rem;
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
        margin: 10vh calc((100vw - 90%) / 2);
    }
}
</style>