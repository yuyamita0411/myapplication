<template>
	<LoginIconview class="calenderloading w-100 d-inline-block text-center position-absolute" v-if="loadingstatus == true" />
	<div id="ScheduleWrapper" class="position-relative">
		<div class="myschedulearea" id="MyScheduleArea"></div>
		<div id="UserScheduleArea" :class="`schedulearea ${loadstatus}`">

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
							<button
							type="button"
							:id="`ScheduleId-${sdata[0].id}`"
							:data-setscheduleinfo="`${new Date(MDFI(date, i-1)).getFullYear()}/${new Date(MDFI(date, i-1)).getMonth()+1}/${new Date(MDFI(date, i-1)).getDate()}`"
							:data-buttonuserid="`${sdata[0].id}`"
							data-tooltip="スケジュールを追加する"
							class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0"
							@click="ModalMotion"
							>
							</button>
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
									>
									<img
									src="@/assets/orangepenicon.png"
									class="rebaseschedule orangepenicon"
									:data-buttonuserid="`${edata.id}`"
									:data-mailaddress="`${edata.mail_address}`"
									:data-createdat="`${edata.created_at}`"
									:data-scheduleid="`${edata.scheduleid}`"
									:data-title="`${edata.title}`"
									:data-description="`${edata.description}`"
									:data-setscheduleinfo="`${new Date(MDFI(date, i-1)).getFullYear()}/${new Date(MDFI(date, i-1)).getMonth()+1}/${new Date(MDFI(date, i-1)).getDate()}`"
									:data-starttime="`${edata.starttime}`"
									:data-endtime="`${edata.endtime}`"
									:data-taskid="`${edata.taskid}`"
									data-groupid=""
									data-tooltip="スケジュールを編集する"
									@click="ModalMotion"
									>
									</span>
								</span>

							</small>

						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

    <ScheduleModal
    :ScheduleTagData="ScheduleTagData"
    :modaltitle="modaltitle"
    />
</template>

<script lang="ts">
import { defineComponent, createApp } from 'vue';
import http from "@/views/ts/http";
import {GetData} from "../../../../http";
import LoginIconview from '@/components/common/LoadingIcon.vue';
import ScheduleModal from '@/components/AfterLogin/parts/modal/ScheduleModal.vue';
import {PageNation} from "../../../../Pagenation";

export default defineComponent({
    name: 'SPCalenderView',
	props: {
		date: Object,
		searchparam: Object,
		loadingstatus: Boolean,
		loadstatus: String,
		ScheduleData: Object,
		DweekArr: Object,
		Daycolor: Object
	},
    data() {
        return {
			ScheduleTagData:{},
			modaltitle:""
        };
    },
    components: {
        LoginIconview,
		ScheduleModal
    },
    methods:{
        ModalMotion(e:any){
            this.ScheduleTagData = {
                "startdate":e.target.dataset.setscheduleinfo,
                "userid":e.target.dataset.buttonuserid,
                "mailaddress":e.target.dataset.mailaddress,
                "createdat":e.target.dataset.createdat,
                "scheduleid":e.target.dataset.scheduleid,
                "title":e.target.dataset.title,
                "description":e.target.dataset.description,
                "setscheduleinfo":e.target.dataset.setscheduleinfo,
                "starttime":e.target.dataset.starttime,
                "endtime":e.target.dataset.endtime,
                "taskid":e.target.dataset.taskid
            }
            this.modaltitle = e.target.dataset.tooltip;
            document.getElementById('ScheduleModalcover')!.classList.remove('ScheduleModalcoverclose');
            document.getElementById('ScheduleModalcover')!.classList.add('ScheduleModalcoveropen');
            document.getElementById('ScheduleModal')!.classList.remove('ScheduleModalclose');
            document.getElementById('ScheduleModal')!.classList.add('ScheduleModalopen');
        },
        MDFI(obj:any, plus:number){
            //一旦変数に入れる。
            const Dobj = new Date(obj);
            const returnobj = new Date(Dobj.setDate(Dobj.getDate() + plus));
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