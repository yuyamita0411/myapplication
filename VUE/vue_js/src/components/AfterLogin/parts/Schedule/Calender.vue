<template>
    <div id="ScheduleWrapper" :class="`position-relative ${scheduleborder} mb-1`">
    <LoginIconview class="calenderloading w-100 d-inline-block text-center" v-if="loadingstatus == true" />
        <div class="myschedulearea" id="MyScheduleArea"></div>
        <div id="UserScheduleArea" :class="`schedulearea ${loadstatus}`">
            <div
            v-for="(sdata, skey) in ScheduleData" :key="skey"
            >
                <div
                class="d-flex"
                v-if="sdata[0].name">
                    <div
                    class="w-100 d-inline-block text-center pt-2 pb-2">
                        <div class="d-inline-block mt-3">
                            <img src="@/assets/personicon.png" class="searchicon">
                            {{sdata[0].name}}
                        </div>
                    </div>
                    <div
                    v-for="i in 7" :key="i"
                    class="w-100 d-inline-block pt-2 pb-2 position-relative float-left">

                        <small
                        v-for="edata in sdata" :key="edata"
                        :class="
                        `${
                            edata.starttime && edata.starttime.split(' ')[0] == 
                            `${calculate.MDFI(date, i-1).getFullYear()}-${calculate.ReturnDMFormat(new Date(calculate.MDFI(date, i-1)).getMonth()+1)}-${calculate.ReturnDMFormat(new Date(calculate.MDFI(date, i-1)).getDate())}`
                            ?
                            'd-inline-block w-100 d-inline-block float-left mb-1'
                            : 'd-none'
                        }`"
                        :data-tooltip="`${edata.title != null ? `${edata.title}` : 'タイトルがありません。'}`"
                        >
                            <img
                            src="@/assets/orangepenicon.png"
                            class="rebaseschedule orangepenicon d-inline-block float-left ml-1"
                            :data-buttonuserid="`${edata.id}`"
                            :data-mailaddress="`${edata.mail_address}`"
                            :data-createdat="`${edata.created_at}`"
                            :data-scheduleid="`${edata.scheduleid}`"
                            :data-title="`${edata.title != undefined ? edata.title : ''}`"
                            :data-description="`${edata.description != undefined ? edata.description : ''}`"
                            :data-setscheduleinfo="`${new Date(calculate.MDFI(date, i-1)).getFullYear()}/${new Date(calculate.MDFI(date, i-1)).getMonth()+1}/${new Date(calculate.MDFI(date, i-1)).getDate()}`"
                            :data-starttime="`${edata.starttime}`"
                            :data-endtime="`${edata.endtime}`"
                            :data-taskid="`${edata.taskid}`"
                            data-groupid=""
                            :data-tooltip="`${edata.title != null ? `${edata.title}` : 'タイトルがありません。'}`"
                            @click="ModalMotion"
                            >
                            
                            <span class="slengtharea float-right d-inline-block position-relative overflow-hidden">
                            <p class="position-absolute col-12 pr-0 pl-0" style="right:0;"><span class="w-100 text-left pr-0 pl-0">{{edata.title}}</span></p>
                                <span v-for="(width, index) in calculate.GetScheduleMarkRange(edata.starttime, edata.endtime)" :key="width"
                                :class="`slengtharea${index + 1} d-inline-block float-left`" :style="`width:${width}%;`">
                                </span>
                            </span>
                        </small>
                        <div class="w-100 d-inline-block">
                            <button
                            type="button"
                            :id="`ScheduleId-${sdata[0].id}`"
                            :data-setscheduleinfo="`${new Date(calculate.MDFI(date, i-1)).getFullYear()}/${new Date(calculate.MDFI(date, i-1)).getMonth()+1}/${new Date(calculate.MDFI(date, i-1)).getDate()}`"
                            :data-buttonuserid="`${sdata[0].id}`"
                            data-tooltip="スケジュールを追加する"
                            class="calenderBtn tooltip-left cursor position-absolute"
                            @click="ModalMotion"
                            >
                            </button>
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
import { defineComponent } from 'vue';
import {GetData} from "@/http";
import {Calculate} from "@/calculate";
import {Dataformat} from "@/dataformat";
import LoginIconview from '@/components/common/LoadingIcon.vue';
import ScheduleModal from '@/components/AfterLogin/parts/Schedule/modal/ScheduleModal.vue';

export default defineComponent({
    name: 'CalenderView',
	props: {
		date: Object,
		searchparam: Object,
		loadingstatus: Boolean,
		loadstatus: String,
		scheduleborder: String,
        ScheduleData: Object
	},
    data() {
        return {
            ScheduleTagData:{},
            modaltitle:"",
            modalclass:"ScheduleModalclose",
            modalcoverclass:"ScheduleModalcoveropen",
            calculate:new Calculate(),
            dformat:new Dataformat()
        };
    },
    components: {
        LoginIconview,
		ScheduleModal
    },
    methods:{
        ModalMotion(e:Event):void{
            var t = e.target as HTMLElement;
            this.modaltitle = t.dataset.title != undefined ? t.dataset.title : 'スケジュールを追加する';
			var stag = this.dformat.Sformat();
            stag = {
                startdate: t.dataset.setscheduleinfo!,
                userid: t.dataset.buttonuserid!,
                mailaddress: t.dataset.mailaddress!,
                createdat: t.dataset.createdat!,
                scheduleid: t.dataset.scheduleid!,
                title: t.dataset.title!,
                description: t.dataset.description!,
                setscheduleinfo: t.dataset.setscheduleinfo!,
                starttime: t.dataset.starttime!,
                sstime:"09",
                ssminute:"00",
                sendtime:"10",
                sendminute:"00",
                endtime: t.dataset.endtime!,
                taskid: t.dataset.taskid!,
                alreadyaddeduser: [],
            };

            if(!t.dataset.scheduleid){
                this.ScheduleTagData = stag;
            }

            if(t.dataset.scheduleid){
                const http = new GetData();

                http.common(
                    "/api/schedule/get/id",
                    {"scheduleid":t.dataset.scheduleid!},
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
#loadingarea{
    left:50%;
}
#loadingarea{
    top:35%;
}
.slengtharea{
    height: 1rem;
}

.slengtharea1,
.slengtharea2,
.slengtharea3{
    height: 0.2rem;
    position: absolute;
    bottom: 0;
}

.slengtharea{
    width: calc(100% - 1.75rem);
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
#UserScheduleArea>div:nth-child(2n)>div:not(.mycolor) {
	background: rgb(0, 0, 0, 0.03);
}
#UserScheduleArea>div:nth-child(2n+1)>div:not(.mycolor) {
	background: #ffff;
}
.calenderBtn{
    padding:1px;
}
@media (min-width: 768px) {
	.scheduleborder {
		box-shadow: 0px 0px 3px 0px rgb(0, 0, 0, 0.1);
	}
	#DayArea>div>div:not(:nth-child(8)), #UserScheduleArea > div > div > div:not(:nth-child(8)) {
		border-right: solid 0.5px rgb(0, 0, 0, 0.1);
	}
}
</style>