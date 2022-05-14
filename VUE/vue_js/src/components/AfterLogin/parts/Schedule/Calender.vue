<template>
    <LoginIconview class="calenderloading w-100 d-inline-block text-center" v-if="loadingstatus == true" />
    <div id="ScheduleWrapper" :class="loadstatus">
    {{searchparam}}
        <div class="position-absolute h-100 w-100 bg-white loadinghidden" id="ScheduleLoadingArea"></div>
        <div class="myschedulearea" id="MyScheduleArea"></div>
        <div class="schedulearea" id="UserScheduleArea">
            <div data-nameidforsort="名前1-6">
                <div class="d-flex">
                    <div class="w-100 d-inline-block text-center pt-2 pb-2">
                        <div class="d-inline-block mt-3">
                            <img class="searchicon" src="@/assets/personicon.png"> 名前1
                        </div>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/9" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/10" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/11" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/12" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/13" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/14" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/15" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
                    </div>
                </div>
            </div>
            <div data-nameidforsort="名前1-16">
                <div class="d-flex">
                    <div class="w-100 d-inline-block text-center pt-2 pb-2">
                        <div class="d-inline-block mt-3">
                            <img class="searchicon" src="@/assets/personicon.png"> 名前1
                        </div>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/9" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/10" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/11" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/12" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/13" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/14" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/15" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
                    </div>
                </div>
            </div>
            <div data-nameidforsort="名前1-26">
                <div class="d-flex">
                    <div class="w-100 d-inline-block text-center pt-2 pb-2">
                        <div class="d-inline-block mt-3">
                            <img class="searchicon" src="@/assets/personicon.png"> 名前1
                        </div>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/9" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/10" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/11" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/12" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/13" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/14" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/15" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
                    </div>
                </div>
            </div>
            <div data-nameidforsort="名前1-36">
                <div class="d-flex">
                    <div class="w-100 d-inline-block text-center pt-2 pb-2">
                        <div class="d-inline-block mt-3">
                            <img class="searchicon" src="@/assets/personicon.png"> 名前1
                        </div>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/9" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/10" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/11" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/12" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/13" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/14" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/15" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
                    </div>
                </div>
            </div>
            <div data-nameidforsort="名前1-54">
                <div class="d-flex">
                    <div class="w-100 d-inline-block text-center pt-2 pb-2">
                        <div class="d-inline-block mt-3">
                            <img class="searchicon" src="@/assets/personicon.png"> 名前1
                        </div>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/9" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/10" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/11" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/12" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/13" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/14" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
                    </div>
                    <div class="w-100 d-inline-block pt-2 pb-2 position-relative">
                        <button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/15" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div :class="`paginationarea d-flex pt-4 col-12 col-lg-4 m-auto ${loadstatus}`" id="PagenationArea">
        <p class="pagenationnum PageNow PageNationNum cursor w-100 text-center p-1" id="">1</p>
        <p class="pagenationnum PageNationNum cursor w-100 text-center p-1" id="">2</p>
        <p class="pagenationnum PageNationNum cursor w-100 text-center p-1" id="">3</p>
        <p class="pagenationnum PageNationNum cursor w-100 text-center p-1" id="">...</p>
        <p class="pagenationnum PageNationNum cursor w-100 text-center p-1" id="PageLastNum">39</p><input class="mt-0 mb-0 col-2" id="PageNationInput" name="PageNationInput" type="text" value="1">
    </div>
</template>

<script lang="ts">
import { defineComponent, createApp } from 'vue';
import http from "@/views/ts/http";
import {GetData} from "../../../../http";
import LoginIconview from '@/components/common/LoadingIcon.vue';
import {PageNation} from "../../../../Pagenation";

export default defineComponent({
    name: 'CalenderView',
	props: {
		date: Object,
		searchparam: Object,
		loadingstatus: Boolean,
		loadstatus: String
	},
    data() {
        return {
            dammy:true
        };
    },
    components: {
        LoginIconview
    },
    methods:{
		RebaseSchedule(){
            console.log("param");
		}
    }
});
</script>

<style lang="scss">
#notificationarea{
    height:40vh;
    overflow:scroll;
}
#loadingarea{
    left:50%;
}
#loadingarea{
    top:35%;
}
.newestarticle{
    height:2.5rem;
}
</style>