<template>
	<LoginIconview class="calenderloading w-100 d-inline-block text-center position-absolute" v-if="loadingstatus == true" />
	<div id="ScheduleWrapper" class="position-relative">
		<div class="myschedulearea" id="MyScheduleArea"></div>
		<div id="UserScheduleArea" :class="`schedulearea ${loadstatus}`">

			<div
			v-for="(sdata, skey) in ScheduleData" :key="skey"
			:class="`${sdata[0].name ? 'scheduleborder d-inline-block w-100 mb-3' : 'd-none'}`"
			>
				<div
				class="d-inline-block w-100"
				v-if="sdata[0].name"
				>
					<div
					class="Carea w-100 d-inline-block text-left pt-2 pb-2 pl-4">
						<img class="searchicon" src="@/assets/personicon.png">
						{{sdata[0].name}}
					</div>
					<div
					v-for="i in 7" :key="i"
					class="userssp w-100 d-flex"
					>

						<div
						:class="`${Daycolor[DweekArr[new Date(calculate.MDFI(date, i-1)).getDay()]]} 
						SPdatearea col-2 d-inline-block text-center float-left pt-1 pb-1 cursor`"
						>
						{{new Date(calculate.MDFI(date, i-1)).getDate()}}
						({{DweekArr[new Date(calculate.MDFI(date, i-1)).getDay()]}})
						</div>

						<div class="schedulespdic col-10 d-inline-block text-left float-right p-0 position-relative">

								<small
								v-for="edata in sdata" :key="edata"
								:class="`
								${
									edata.starttime &&
									edata.starttime.split(' ')[0]
									==
									`${calculate.MDFI(date, i-1).getFullYear()}-${calculate.ReturnDMFormat(new Date(calculate.MDFI(date, i-1)).getMonth()+1)}-${calculate.ReturnDMFormat(new Date(calculate.MDFI(date, i-1)).getDate())}`
									?
									'editsceduleicon cursor d-inline-block w-100 position-relative float-left '
									:
									'd-none'
								}
								`"
								>
									<span
									class="sleft d-inline-block pt-2 pb-2 pl-1">
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
								</small>
								<div class="calenderBtnWrapper d-inline-block w-100 bg-white">
									<button
									type="button"
									:id="`ScheduleId-${sdata[0].id}`"
									:data-setscheduleinfo="`${calculate.MDFI(date, i-1).getFullYear()}/${calculate.ReturnDMFormat(new Date(calculate.MDFI(date, i-1)).getMonth()+1)}/${calculate.ReturnDMFormat(new Date(calculate.MDFI(date, i-1)).getDate())}`"
									:data-buttonuserid="`${sdata[0].id}`"
									data-tooltip="スケジュールを追加する"
									class="calenderBtn tooltip-left cursor p-0 float-right"
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
import {GetData} from "@/http";
import {Calculate} from "@/calculate";
import {Dataformat} from "@/dataformat";
import LoginIconview from '@/components/common/LoadingIcon.vue';
import ScheduleModal from '@/components/AfterLogin/parts/Schedule/modal/ScheduleModal.vue';

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

            this.modaltitle = e.target.dataset.tooltip;
			var stag = this.dformat.Sformat();
            stag = {
                startdate: e.target.dataset.setscheduleinfo,
                userid: e.target.dataset.buttonuserid,
                mailaddress: e.target.dataset.mailaddress,
                createdat: e.target.dataset.createdat,
                scheduleid: e.target.dataset.scheduleid,
                title: e.target.dataset.title,
                description: e.target.dataset.description,
                setscheduleinfo: e.target.dataset.setscheduleinfo,
                starttime: e.target.dataset.starttime,
                sstime:"09",
                ssminute:"00",
                sendtime:"10",
                sendminute:"00",
                endtime: e.target.dataset.endtime,
                taskid: e.target.dataset.taskid,
                alreadyaddeduser: [],
            };

            if(!e.target.dataset.scheduleid){
                this.ScheduleTagData = stag;
            }

            if(e.target.dataset.scheduleid){
                const http = new GetData();

                http.common(
                    "/api/schedule/get/id",
                    {"scheduleid":e.target.dataset.scheduleid},
                    async (res:any) => {
                        stag.alreadyaddeduser = res.data;
                        stag.sstime = res.data[0].starttime.split(" ")[1].split(":")[0];
                        stag.ssminute = res.data[0].starttime.split(" ")[1].split(":")[1];
                        stag.sendtime = res.data[0].endtime.split(" ")[1].split(":")[0];
                        stag.sendminute = res.data[0].endtime.split(" ")[1].split(":")[1];
                        this.ScheduleTagData = stag;
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
	height:2rem;
	width:100%;
	bottom:0;
	right:0;
}
.calenderBtn{
	right:1rem;
	top:4.5px;
}
.calenderBtn{
    padding:1px;
}
.slengtharea,
.slengtharea1,
.slengtharea2,
.slengtharea3{
    height: 2rem;
}

.slengtharea{
    width: 100%;
    right: 0.25rem;
    position: relative;
}
.slengtharea2{
    background: rgba(24, 71, 182, 0.3);
}
.calenderloading {
	position: absolute;
	transform: scale(0.7);
}
.sleft{
	height:2rem;
}
.sleft{
	width:40%;
}
.sright{
	width:59%;
}
#UserScheduleArea>div:nth-child(2n)>div:not(.mycolor) > div:nth-child(1){
	background: rgb(0, 0, 0, 0.03);
}
#UserScheduleArea>div:nth-child(2n+1)>div:not(.mycolor) > div:nth-child(1){
	background: #ffff;
}
.saturdayBG {
	background: #E8EEFB;
}
.sundayBG {
	background: #FFE5E5;
}
.SuturdayColor {
	color: #0069d9;
}
.SaturdayColor {
	background: rgb(24, 71, 182, 0.1);
	color: #0069d9;
}
.SundayColor {
	background: rgb(255, 183, 90, 0.1);
	color: rgb(255, 183, 90, 1);
}
.scheduleborder {
	box-shadow: 0px 0px 3px 0px rgb(0, 0, 0, 0.1);
}
.Carea {
	box-shadow: 0px 0px 3px 0px rgb(0, 0, 0, 0.1);
}
.timerangecover,
.sleft,
.userssp{
	border-bottom: solid 0.5px rgba(0, 0, 0, 0.1);
}

/*.scheduleborder > div > div:not(:first-child){
	border-bottom: solid 2px rgba(0, 0, 0, 0.1);
}*/
.sleft{
	background: rgba(0, 0, 0, 0.02);
}
.calenderBtnWrapper{
	position: sticky;
	position: -webkit-sticky;
	right: 0;
	bottom:
	0;
}
.calenderBtnWrapper{
	height:1.5rem;
	border-top: solid 1px rgba(0, 0, 0, 0.1);
}
.SPdatearea{
	border-right: solid 0.5px rgba(0, 0, 0, 0.1);
}
</style>