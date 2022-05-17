<template>
    <div id="ScheduleWrapper" :class="`position-relative ${scheduleborder}`">
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
                            `${MDFI(date, i-1).getFullYear()}-${ReturnDMFormat(new Date(MDFI(date, i-1)).getMonth()+1)}-${ReturnDMFormat(new Date(MDFI(date, i-1)).getDate())}`
                            ?
                            'd-inline-block w-100 d-inline-block float-left mb-1'
                            : 'd-none'
                        }`"
                        :data-tooltip="`${edata.title != null ? `${edata.title} ${edata.starttime.split(' ')[1]}~` : 'タイトルがありません。'}`"
                        >
                            <img
                            src="@/assets/orangepenicon.png"
                            class="rebaseschedule orangepenicon d-inline-block float-left ml-1"
                            :data-buttonuserid="`${edata.id}`"
                            :data-mailaddress="`${edata.mail_address}`"
                            :data-createdat="`${edata.created_at}`"
                            :data-scheduleid="`${edata.scheduleid}`"
                            :data-title="`${edata.title != null ? edata.title : 'タイトルがありません。'}`"
                            :data-description="`${edata.description}`"
                            :data-setscheduleinfo="`${new Date(MDFI(date, i-1)).getFullYear()}/${new Date(MDFI(date, i-1)).getMonth()+1}/${new Date(MDFI(date, i-1)).getDate()}`"
                            :data-starttime="`${edata.starttime}`"
                            :data-endtime="`${edata.endtime}`"
                            :data-taskid="`${edata.taskid}`"
                            data-groupid=""
                            :data-tooltip="`${edata.title != null ? `${edata.title} ${edata.starttime.split(' ')[1]}~` : 'タイトルがありません。'}`"
                            @click="ModalMotion"
                            >
                            <span class="slengtharea float-right d-inline-block">
                                <span v-for="(fruit, index) in GetScheduleMarkRange(edata.starttime, edata.endtime)" :key="fruit"
                                :class="`slengtharea${index + 1} d-inline-block float-left`" :style="`width:${fruit}px;`">
                                </span>
                            </span>

                        </small>
                        <div class="w-100 d-inline-block">
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
            modaltitle:""
        };
    },
    components: {
        LoginIconview,
		ScheduleModal
    },
    methods:{
        ModalMotion(e:any){
            interface STagFormat {
                startdate: string;
                userid: string;
                mailaddress: string;
                createdat: string;
                scheduleid: string;
                title: string;
                description: string;
                setscheduleinfo: string;
                starttime: string;
                endtime: string;
                taskid: string;
                alreadyaddeduser: any;
            }

            const stag: STagFormat = {
                startdate: e.target.dataset.setscheduleinfo,
                userid: e.target.dataset.buttonuserid,
                mailaddress: e.target.dataset.mailaddress,
                createdat: e.target.dataset.createdat,
                scheduleid: e.target.dataset.scheduleid,
                title: e.target.dataset.title,
                description: e.target.dataset.description,
                setscheduleinfo: e.target.dataset.setscheduleinfo,
                starttime: e.target.dataset.starttime,
                endtime: e.target.dataset.endtime,
                taskid: e.target.dataset.taskid,
                alreadyaddeduser: [],
            };
            this.ScheduleTagData = stag;

            this.modaltitle = e.target.dataset.tooltip;

            if(e.target.dataset.scheduleid){
                const http = new GetData();

                http.common(
                    "/api/schedule/get/id",
                    {"scheduleid":e.target.dataset.scheduleid},
                    (res:any) => {
                        stag.alreadyaddeduser = res.data;
                        this.ScheduleTagData = stag;
                    }
                );
            }

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
        },
        GetScheduleMarkRange(starttime:string, endtime:string){
            /*starttime - 当日0時 1の長さ `${starttime.split(" ")[0]} 00:00:00` - starttime
            starttime - endtime 2の長さ endtime - starttime
            翌日0時 - endtime 3の長さ 
            data-starttime="2022-05-18 09:00:00"
            data-endtime="2022-05-18 10:00:00"*/
            console.log("test");
            if(!starttime ||!endtime){
                return;
            }

            var planedate:any = `${starttime.split(" ")[0].replace("-", "/").replace("-", "/")} 00:00:00`;//当日の0時 2022/04/11
            var sstart:string = starttime.replace("-", "/").replace("-", "/");//文字
            var ssend:string = endtime.replace("-", "/").replace("-", "/");//文字

            var pDob:any = this.MDFI(new Date(starttime.replace("-", "/").replace("-", "/")), 1);
            var tmstr:any = `${pDob.getFullYear()}/${pDob.getMonth()+1}/${pDob.getDate()+1} 00:00:00`;//

            var pr1:any = new Date(tmstr);
            var pr2:any = new Date(planedate);
            var pr3:any = new Date(sstart);
            var pr4:any = new Date(ssend);

            var alllentgh:number = pr1 - pr2;
            var lenno1:number = ((pr3 - pr2) / (pr1 - pr2)) * 100;
            var lenno2:number = ((pr4 - pr3) / (pr1 - pr2)) * 100;
            var lenno3:number = ((pr1 - pr4) / (pr1 - pr2)) * 100;

            var resultarr = [lenno1, lenno2, lenno3]

            return resultarr;
/*
            return {
                "1":`<span class="slengtharea1 d-inline-block" style="width:${lenno1}px;"></span>`,
                "2":`<span class="slengtharea2 d-inline-block" style="width:${lenno2}px;"></span>`,
                "3":`<span class="slengtharea3 d-inline-block" style="width:${lenno3}px;"></span>`
            }*/
        }
    }
});
</script>

<style lang="scss">
#loadingarea{
    left:50%;
}
#loadingarea{
    top:35%;
}
.slengtharea,
.slengtharea2{
    height: 1rem;
}
.slengtharea{
    width: calc(100% - 1.75rem);
    right: 0.25rem;
    position: relative;
}
.slengtharea2{
    background:blue;
}
@media (min-width: 768px) {
	.scheduleborder {
		box-shadow: 0px 0px 3px 0px rgb(0, 0, 0, 0.1);
	}
}
</style>