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
						:class="`${Daycolor[DweekArr[new Date(calculate.MDFI(date, i-1)).getDay()]]} col-2 d-inline-block text-center float-left pt-1 pb-1 cursor`"
						>
						{{new Date(calculate.MDFI(date, i-1)).getDate()}}
						({{DweekArr[new Date(calculate.MDFI(date, i-1)).getDay()]}})
						</div>

						<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white position-relative">
							<small
							v-for="edata in sdata" :key="edata"
							class="w-100 d-inline-block position-relative float-left"
							>
								<span
								:class="`
								${
									edata.starttime &&
									edata.starttime.split(' ')[0]
									==
									`${calculate.MDFI(date, i-1).getFullYear()}-${calculate.ReturnDMFormat(new Date(calculate.MDFI(date, i-1)).getMonth()+1)}-${calculate.ReturnDMFormat(new Date(calculate.MDFI(date, i-1)).getDate())}`
									?
									'editsceduleicon cursor d-inline-block w-100 mb-1 position-relative z1'
									:
									'd-none'
								}
								`"
								>
									<span class="sleft d-inline-block float-left">
										<img
										src="@/assets/orangepenicon.png"
										class="rebaseschedule orangepenicon"
										:data-buttonuserid="`${edata.id}`"
										:data-mailaddress="`${edata.mail_address}`"
										:data-createdat="`${edata.created_at}`"
										:data-scheduleid="`${edata.scheduleid}`"
										:data-title="`${edata.title != null ? edata.title : 'タイトルがありません。'}`"
										:data-description="`${edata.description}`"
										:data-setscheduleinfo="`${new Date(calculate.MDFI(date, i-1)).getFullYear()}/${new Date(calculate.MDFI(date, i-1)).getMonth()+1}/${new Date(calculate.MDFI(date, i-1)).getDate()}`"
										:data-starttime="`${edata.starttime}`"
										:data-endtime="`${edata.endtime}`"
										:data-taskid="`${edata.taskid}`"
										data-groupid=""
										:data-tooltip="`${edata.title != null ? edata.title : 'タイトルがありません。'}`"
										@click="ModalMotion"
										>
										{{edata.title && calculate.CSNum(edata.title) < edata.title.length ? `${edata.title.slice(0, calculate.CSNum(edata.title))} ...` : edata.title}}
									</span>
									<span class="sright d-inline-block position-absolute timerangecover">
											<span v-for="(width, index) in calculate.GetScheduleMarkRange(edata.starttime, edata.endtime)" :key="width"
											:class="`slengtharea${index + 1} d-inline-block float-left`" :style="`width:${width}%;`"></span>
									</span>
								</span>
							</small>
							<div class="d-inline-block w-100">
								<button
								type="button"
								:id="`ScheduleId-${sdata[0].id}`"
								:data-setscheduleinfo="`${calculate.MDFI(date, i-1).getFullYear()}/${calculate.ReturnDMFormat(new Date(calculate.MDFI(date, i-1)).getMonth()+1)}/${calculate.ReturnDMFormat(new Date(calculate.MDFI(date, i-1)).getDate())}`"
								:data-buttonuserid="`${sdata[0].id}`"
								data-tooltip="スケジュールを追加する"
								class="calenderBtn tooltip-left bg-white cursor b-none p-0 float-right"
								@click="ModalMotion"
								>
								</button>
							</div>
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
import {Calculate} from "../../../../calculate";
import {Dataformat} from "../../../../dataformat";
import LoginIconview from '@/components/common/LoadingIcon.vue';
import ScheduleModal from '@/components/AfterLogin/parts/modal/ScheduleModal.vue';

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
			modaltitle:"",
			calculate:new Calculate(),
			dformat:new Dataformat()
        };
    },
    components: {
        LoginIconview,
		ScheduleModal
    },
    methods:{
        ModalMotion(e:any){
			this.ScheduleTagData = this.dformat.schedulemodalformat(e);

            this.modaltitle = e.target.dataset.tooltip;

            if(e.target.dataset.scheduleid){
                const http = new GetData();

                http.common(
                    "/api/schedule/get/id",
                    {"scheduleid":e.target.dataset.scheduleid},
                    (res:any) => {
                        this.dformat.schedulemodalformat(e).alreadyaddeduser = res.data;
                        this.ScheduleTagData = this.dformat.schedulemodalformat(e);
                    }
                );
            }

            document.getElementById('ScheduleModalcover')!.classList.remove('ScheduleModalcoverclose');
            document.getElementById('ScheduleModalcover')!.classList.add('ScheduleModalcoveropen');
            document.getElementById('ScheduleModal')!.classList.remove('ScheduleModalclose');
            document.getElementById('ScheduleModal')!.classList.add('ScheduleModalopen');
        }
    }
});
</script>

<style lang="scss" scoped>
.timerangecover{
	z-index:-1;
	height:1.25rem;
	width:100%;
	bottom:0;
	right:0;
}
.calenderBtn{
	right:1rem;
	bottom:0;
}
.slengtharea,
.slengtharea1,
.slengtharea2,
.slengtharea3{
    height: 1.25rem;
}

.slengtharea{
    width: 100%;
    right: 0.25rem;
    position: relative;
}
.slengtharea2{
    background: rgba(24, 71, 182, 0.3);
}

.sleft{
	width:40%;
}
.sright{
	width:60%;
}
</style>