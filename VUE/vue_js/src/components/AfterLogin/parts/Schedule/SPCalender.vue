<template>
	<div id="ScheduleWrapper" class="position-relative">
	<LoginIconview class="calenderloading w-100 d-inline-block text-center" v-if="loadingstatus == true" />
		<div :class="`schedulearea ${loadstatus}`" id="UserScheduleArea">

			<div
			class="b-gray d-inline-block w-100 mb-3"
			v-for="(sdata, skey) in ScheduleData" :key="skey"
			>
				<div
				class="d-inline-block w-100"
				v-if="sdata[0].name"
				>
					<div
					class="bbgray bgray w-100 d-inline-block text-left pt-2 pb-2 pl-4">
						<img class="searchicon" src="@/assets/personicon.png">
						{{sdata[0].name}}
					</div>
					<div
					v-for="i in 7" :key="i"
					class="bbgray w-100 d-flex"
					>

						<div
						:class="`${Daycolor[DweekArr[new Date(MDFI(date, i-1)).getDay()]]} col-2 d-inline-block text-center float-left pt-1 pb-1 cursor`"
						>
						{{new Date(MDFI(date, i-1)).getDate()}}
						({{DweekArr[new Date(MDFI(date, i-1)).getDay()]}})
						</div>

						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white">

							<small
							v-for="edata in sdata" :key="edata"
							>
								<span
								v-if="
								edata.starttime &&
								edata.starttime.split(' ')[0]
								==
								`${MDFI(date, i-1).getFullYear()}-${ReturnDMFormat(new Date(MDFI(date, i-1)).getMonth()+1)}-${ReturnDMFormat(new Date(MDFI(date, i-1)).getDate())}`
								"
								class="cursor d-inline-block w-100 mb-1"
								>
									{{edata.title}}
									<span
									class="editsceduleicon cursor ml-1
									tooltip-right"
									data-tooltip="スケジュールを編集する">
									<img
									src="@/assets/orangepenicon.png"
									class="rebaseschedule orangepenicon"
									:data-id="`${edata.id}`"
									:data-mailaddress="`${edata.mail_address}`"
									:data-createdat="`${edata.created_at}`"
									:data-scheduleid="`${edata.scheduleid}`"
									:data-title="`${edata.title}`"
									data-description=""
									:data-starttime="`${edata.starttime}`"
									:data-endtime="`${edata.endtime}`"
									data-groupid=""
									:data-taskid="`${edata.taskid}`">
									</span>
								</span>

							</small>

							<button
							type="button"
							:id="`ScheduleId-${sdata[0].id}`"
							:data-setscheduleinfo="`${new Date(MDFI(date, i-1)).getFullYear()}/${new Date(MDFI(date, i-1)).getMonth()+1}/${new Date(MDFI(date, i-1)).getDate()}`"
							:data-buttonuserid="`${sdata[0].id}`"
							data-tooltip="スケジュールを追加する"
							class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0">
							</button>
						</div>
					</div>
				</div>
			</div>

		</div>
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
		loadstatus: String,
		ScheduleData: Object
	},
    data() {
        return {
			DweekArr:[ "日", "月", "火", "水", "木", "金", "土" ],
			Daycolor:{"土":"SaturdayColor", "日":"SundayColor", "月":"", "火":"", "水":"", "木":"", "金":""}
        };
    },
    components: {
        LoginIconview
    },
    methods:{
		RebaseSchedule(){
			console.log("param");
		},
		MDFI(obj:any, plus:number){
			//一旦変数に入れる。
			var Dobj = new Date(obj);
			var returnobj = new Date(Dobj.setDate(Dobj.getDate() + plus));
			return returnobj;
		},
        ReturnDMFormat(str:string){
            if (str.toString().length == 1) {
                str = "0" + str;
            }
            return str;
        }
    }
});
</script>

<style lang="scss">

</style>