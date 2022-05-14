<template>
    <LoginIconview class="calenderloading w-100 d-inline-block text-center" v-if="loadingstatus == true" />
	<div id="ScheduleWrapper" :class="loadstatus">
	{{searchparam}}
		<div class="schedulearea" id="UserScheduleArea">
			<div class="b-gray d-inline-block w-100 mb-3" data-nameidforsort="名前16">
				<div class="d-inline-block w-100">
					<div class="bbgray bgray w-100 d-inline-block text-left pt-2 pb-2 pl-4">
						<img class="searchicon" src="@/assets/personicon.png"> 名前1
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="SaturdayColor col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							14(土)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/14" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="SundayColor col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							15(日)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/15" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							16(月)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/16" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							17(火)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/17" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							18(水)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/18" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							19(木)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/19" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							20(金)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/20" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="b-gray d-inline-block w-100 mb-3" data-nameidforsort="名前116">
				<div class="d-inline-block w-100">
					<div class="bbgray bgray w-100 d-inline-block text-left pt-2 pb-2 pl-4">
						<img class="searchicon" src="@/assets/personicon.png"> 名前1
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class=" SaturdayColor col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							14(土)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/14" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class=" SundayColor col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							15(日)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/15" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							16(月)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/16" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							17(火)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/17" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							18(水)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/18" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							19(木)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/19" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							20(金)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/20" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="b-gray d-inline-block w-100 mb-3" data-nameidforsort="名前126">
				<div class="d-inline-block w-100">
					<div class="bbgray bgray w-100 d-inline-block text-left pt-2 pb-2 pl-4">
						<img class="searchicon" src="@/assets/personicon.png"> 名前1
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class=" SaturdayColor col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							14(土)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/14" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class=" SundayColor col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							15(日)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/15" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							16(月)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/16" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							17(火)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/17" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							18(水)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/18" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							19(木)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/19" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							20(金)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/20" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="b-gray d-inline-block w-100 mb-3" data-nameidforsort="名前136">
				<div class="d-inline-block w-100">
					<div class="bbgray bgray w-100 d-inline-block text-left pt-2 pb-2 pl-4">
						<img class="searchicon" src="@/assets/personicon.png"> 名前1
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class=" SaturdayColor col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							14(土)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/14" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class=" SundayColor col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							15(日)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/15" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							16(月)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/16" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							17(火)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/17" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							18(水)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/18" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							19(木)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/19" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							20(金)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/20" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="b-gray d-inline-block w-100 mb-3" data-nameidforsort="名前154">
				<div class="d-inline-block w-100">
					<div class="bbgray bgray w-100 d-inline-block text-left pt-2 pb-2 pl-4">
						<img class="searchicon" src="@/assets/personicon.png"> 名前1
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class=" SaturdayColor col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							14(土)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/14" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class=" SundayColor col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							15(日)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/15" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							16(月)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/16" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							17(火)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/17" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							18(水)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/18" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							19(木)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/19" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
						</div>
					</div>
					<div class="bbgray w-100 d-inline-block">
						<div class="col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">
							20(金)
						</div>
						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">
							<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/20" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
						</div>
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
    name: 'SPCalenderView',
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

</style>