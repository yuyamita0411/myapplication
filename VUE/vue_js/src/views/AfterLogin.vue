<template>
  <div class="home">
        <div class="dashbordwrapper d-inline-block w-100">
            <div id="dashboardnemue" class="dashboardnemue d-inline-block position-fixed w-100 p-0 bg-white">
                <div class="d-inline-block w-100 pr-1 pl-1 pt-1 pb-1 pr-md-3 pl-md-3">
                    <div class="d-inline-block float-left font-weight-bold pt-1 pb-1 pl-4 pl-md-0">
                        <span class="mr-2">
                            <img src="@/assets/logo.png" class="accounticon">
                        </span>
                        <a href="/" class="logoinnertxt d-none d-md-inline-block">gware</a>
                    </div>
                    <div
                    id="AccountArea"
                    class="AccountArea cursor d-inline-block float-right font-weight-bold pt-1 pb-1 pl-3 pr-3 text-white"
                    @click="AccountInfoShow"
                    >
                        <span class="mr-2">
                            <img src="@/assets/accounticon.png" class="accountpersonicon">
                        </span>
                        <span id="greetingbar" class="greeting font-weight-normal text-white" data-idnow="">ようこそ</span>様
                        <span class="ml-2">
                            <img src="@/assets/accountarrow.png" id="accountrotateicon" class="accounticon">
                        </span>
                    </div>
                </div>
            </div>
            <div class="dashbordcontent w-100 position-relative">
                <div class="w-100 d-inline-block">
                    <div id="hbwrapper" class="hbwrapper w-100 position-fixed">
                        <div id="humburgerbutton" class="hbwrapper position-relative cursor float-right">
                            <span class="hbar w-75 d-inline-block position-absolute"></span>
                            <span class="hbar w-75 d-inline-block position-absolute"></span>
                            <span class="hbar w-75 d-inline-block position-absolute"></span>
                        </div>
                    </div>
                </div>
                <div id="sidebar" class="sidecolor sidebar shadowgrid col-12 col-md-3 float-md-left">
                    <div
                        class="sidemenu tooltip-bottom sidebar_menu cursor d-inline-block col-6 col-md-12 mt-md-2 mb-md-2 text-center"
                        data-tooltip="ダッシュボード"
                        @click="dashboard"
                    >
                        <img src="@/assets/homeicon.png" class="sidebaricon p-2">
                    </div>
                    <div
                        class="sidemenu tooltip-bottom sidebar_menu cursor d-inline-block col-6 col-md-12 mt-md-2 mb-md-2 text-center"
                        data-tooltip="スケジュール"
                        @click="schedule"
                    >
                        <img src="@/assets/Schedule.png" class="sidebaricon p-2">
                    </div>
                    <div
                        class="sidemenu tooltip-bottom sidebar_menu cursor d-inline-block col-6 col-md-12 mt-md-2 mb-md-2 text-center"
                        data-tooltip="グループ"
                        @click="groupinfo"
                    >
                        <img src="@/assets/groupicon.png" class="sidebaricon p-2">
                    </div>
                    <div
                        class="sidemenu tooltip-bottom sidebar_menu cursor d-inline-block col-6 col-md-12 mt-md-2 mb-md-2 text-center"
                        data-tooltip="タスク進捗"
                        @click="taskinfo"
                    >
                        <img src="@/assets/taskicon.png" class="sidebaricon p-2">
                    </div>
                </div>
                <div id="maincolumn" class="maincolumn position-relative float-md-right mb-3 pb-5">
                    <DashboardView v-if="urlnow == '/dashboard'" />
                    <ScheduleView v-if="urlnow == '/schedule'" />
                    <GroupInfoView v-if="urlnow == '/groupinfo'" />
                    <TaskInfoView v-if="urlnow == '/taskinfo'" />
                </div>
                <div class="maincolumn bottom0 right0 BottomMshadow position-fixed bg-white d-flex z3">
                    <div id="SendTaskButton" class="w-100 float-left BgAccentMain">
                        <div class="cursor p-1 d-inline-block text-center mb-0 float-left w-100">タスク依頼</div>
                    </div>
                    <div id="AddButton" class="w-100 float-left BgAccentMain">
                        <div class="cursor p-1 d-inline-block text-center mb-0 float-left w-100">グループ作成</div>
                    </div>
                    <div class="w-100 float-left BgAccentMain">
                        <div class="cursor p-1 d-inline-block text-center mb-0 float-left w-100">メッセージ</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="logoutmodalcover" class="logoutmodalcover position-fixed cursor"></div>
        <div id="logoutmodal" class="logoutmodal position-fixed">
            <div class="logoutmodalinner w-100 bg-white position-relative">
                <div id="" class="w-100 m-auto p-3 bg-white d-inline-block">
                    <div id="" class="d-inline-block w-100 float-md-right pr-0 pl-0">
                        <div class="pt-3 m-auto">
                            <div class="w-100 d-inline-block text-center">
                                <h3 class="font-weight-bold pt-2 pb-2 mb-0 m-auto">アカウント</h3>
                            </div>
                        </div>
                        <div class="pt-5 pb-5 w-100 p-3 m-auto">
                            <div class=" col-md-12 m-auto pt-3 pb-3 pl-0 pr-0 bg-white">
                                <div class="col-12 pt-1 pb-1 m-auto">
                                    <div>
                                        <button type="submit" class="w-100 d-inline-block b-none text-white text-center font-weight-bold p-2 cursor bgmain">アカウント情報</button>
                                    </div>
                                </div>
                                <!--ログアウトのモーダル-->
                                <div class="col-12 pt-1 pb-1 m-auto">
                                    <form action="" method="POST">
                                        <button type="submit" class="w-100 d-inline-block b-none text-white text-center font-weight-bold p-2 cursor BgAccentColor">ログアウト</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="commonmodalcover" class="position-fixed cursor commonmodalcoverclose"></div>
        <form method="POST" action="" id="commonmodal" class="position-fixed commonmodalclose pr-0 mb-0 bg-white">
            <div class="modalinnerwrapper  overflow-hidden">
                <div id="EditMd" class="modalinnercover d-flex position-relative">
                    <div id="commonmodal1" class="Modal1 col-12 p-3 bg-white">
                        <div class=" w-100 d-inline-block pt-3 pb-3 pl-0 pr-0 bg-white pb-3">
                            <div id="" class="col-12 pr-0 pl-0 bg-white">
                                <div class="">
                                    <div class="w-100 d-inline-block text-center">
                                        <!--変わるところ-->
                                        <h3 id="FirstTitle" class="notificationtitle font-weight-bold pt-4 pb-2 mb-0 m-auto"></h3>
                                    </div>
                                </div>
                                <div id="FirstHTML" class="m-auto"></div>
                            </div>
                        </div>
                    </div>
                    <div id="commonmodal2" class="Modal2 col-12 pl-0 pr-0 position-relative bg-white">
                        <div class="m-auto h-100 bg-white">
                            <div class="">
                                <div class="w-100 d-inline-block text-center">
                                    <h3 id="SecondTitle" class="notificationtitle font-weight-bold pt-4 pb-2 mb-0 m-auto"></h3>
                                </div>
                            </div>
                            <div class=" col-md-12 m-auto pt-3 pb-3 pl-0 pr-0 bg-white">
                                <h5 id="SecondMsgTitle" class="mainfontcolor shadowtext col-12 pt-1 pb-1 mb-0"><!--変わるところ--></h5>
                                <div id="SecondMsg" class="col-12 pt-1 pb-1 mb-0">
                                <!--変わるところ-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--モーダルのメニューは固定する-->
        <div id="commonmodalMenuBar" class="modalinnerwrapper overflow-hidden commonmodalbarclose">
            <div id="EditMdMn" class="modalinnercover d-flex position-relative">
                <div class=" modalfinishbuttonwrapper col-12 mb-0 pt-0 pb-0 pl-0 pr-0 bg-white">
                    <div class="bgstripe45deg  col-12 m-auto pt-0 pb-0 pt-md-3 pb-md-3 pl-0 pr-0">
                        <div class="buttonarea d-flex m-auto">
                            <div id="commonmodalclosebutton" class="buttonicon margin-right-two p-2">
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
  <AccountModal class="aa" />
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import DashboardView from '@/components/AfterLogin/Dashboard.vue';
import ScheduleView from '@/components/AfterLogin/SchedulePage.vue';
import GroupInfoView from '@/components/AfterLogin/GroupInfo.vue';
import TaskInfoView from '@/components/AfterLogin/TaskInfoView.vue';
import AccountModal from '@/components/AfterLogin/parts/AccountModal.vue';

export default defineComponent({
    name: 'AfterLoginView',
    data() {
        return {
            urlnow:location.pathname
        };
    },
    components: {
        DashboardView,
        ScheduleView,
        GroupInfoView,
        TaskInfoView
    },
    methods: {
        dashboard(){
            this.$router.push('/dashboard');
            setTimeout(() => {this.urlnow = location.pathname;});
        },
        schedule(){
            this.$router.push('/schedule');
            setTimeout(() => {this.urlnow = location.pathname;});
        },
        groupinfo(){
            this.$router.push('/groupinfo');
            setTimeout(() => {this.urlnow = location.pathname;});
        },
        taskinfo(){
            this.$router.push('/taskinfo');
            setTimeout(() => {this.urlnow = location.pathname;});
        },
        AccountInfoShow(){
            console.log("test");
        }
    }
});
</script>