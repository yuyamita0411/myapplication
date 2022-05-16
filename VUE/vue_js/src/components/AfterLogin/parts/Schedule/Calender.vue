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
                    class="w-100 d-inline-block pt-2 pb-2 position-relative">
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
                        class="d-inline-block"
                        >
                            <span
                            v-if="
                            edata.starttime &&
                            edata.starttime.split(' ')[0]
                            ==
                            `${MDFI(date, i-1).getFullYear()}-${ReturnDMFormat(new Date(MDFI(date, i-1)).getMonth()+1)}-${ReturnDMFormat(new Date(MDFI(date, i-1)).getDate())}`
                            "
                            class="editsceduleicon cursor ml-1 tooltip-left w-100 d-inline-block"
                            >
                                {{edata.title}}
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

                        </small>
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
            };

            this.modaltitle = e.target.dataset.tooltip;

            if(e.target.dataset.scheduleid){
                const http = new GetData();

                http.common(
                    "/api/schedule/get/id",
                    {"scheduleid":e.target.dataset.scheduleid},
                    (res:any) => {
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
                            "taskid":e.target.dataset.taskid,
                            "alreadyaddeduser":res.data
                        };
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
@media (min-width: 768px) {
	.scheduleborder {
		box-shadow: 0px 0px 3px 0px rgb(0, 0, 0, 0.1);
	}
}
</style>