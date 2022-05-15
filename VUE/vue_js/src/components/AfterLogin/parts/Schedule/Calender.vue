<template>
    <div id="ScheduleWrapper" :class="`position-relative ${scheduleborder}`">
    <LoginIconview class="calenderloading w-100 d-inline-block text-center" v-if="loadingstatus == true" />
        <div class="myschedulearea" id="MyScheduleArea"></div>
        <div id="UserScheduleArea" :class="loadstatus">
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
                        >
                            <span
                            v-if="
                            edata.starttime &&
                            edata.starttime.split(' ')[0]
                            ==
                            `${MDFI(date, i-1).getFullYear()}-${ReturnDMFormat(new Date(MDFI(date, i-1)).getMonth()+1)}-${ReturnDMFormat(new Date(MDFI(date, i-1)).getDate())}`
                            "
                            class="editsceduleicon cursor ml-1 tooltip-left" data-tooltip="スケジュールを編集する"
                            @click="RebaseModalMotion"
                            >
                                {{edata.title}}
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

                        </small>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <ScheduleAddModal
    :AddScheduleData="AddScheduleData"
    />
    <ScheduleRebaseModal
    :RebaseScheduleData="RebaseScheduleData"
    />
</template>

<script lang="ts">
import { defineComponent, createApp } from 'vue';
import http from "@/views/ts/http";
import {GetData} from "../../../../http";
import LoginIconview from '@/components/common/LoadingIcon.vue';
import ScheduleAddModal from '@/components/AfterLogin/parts/modal/ScheduleAddModal.vue';
import ScheduleRebaseModal from '@/components/AfterLogin/parts/modal/ScheduleRebaseModal.vue';
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
            AddScheduleData:{},
            RebaseScheduleData:{}
        };
    },
    components: {
        LoginIconview,
        ScheduleAddModal,
        ScheduleRebaseModal
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
        },
        ModalMotion(e:any){
            var t = e.target as HTMLElement;
            this.AddScheduleData = {
                "startdate":t.dataset.setscheduleinfo,
                "userid":t.dataset.buttonuserid
            }
            document.getElementById('ScheduleAddModalcover')!.classList.toggle('ScheduleAddModalcoverclose');
            document.getElementById('ScheduleAddModalcover')!.classList.toggle('ScheduleAddModalcoveropen');
            document.getElementById('ScheduleAddModal')!.classList.toggle('ScheduleAddModalclose');
            document.getElementById('ScheduleAddModal')!.classList.toggle('ScheduleAddModalopen');
        },
        RebaseModalMotion(e:any){
            var t = e.target as HTMLElement;
            this.RebaseScheduleData = {
                "startdate":t.dataset.setscheduleinfo,
                "userid":t.dataset.buttonuserid
            }
            document.getElementById('ScheduleRebaseModalcover')!.classList.toggle('ScheduleRebaseModalcoverclose');
            document.getElementById('ScheduleRebaseModalcover')!.classList.toggle('ScheduleRebaseModalcoveropen');
            document.getElementById('ScheduleRebaseModal')!.classList.toggle('ScheduleRebaseModalclose');
            document.getElementById('ScheduleRebaseModal')!.classList.toggle('ScheduleRebaseModalopen');
        },
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
@media (min-width: 768px) {
	.scheduleborder {
		box-shadow: 0px 0px 3px 0px rgb(0, 0, 0, 0.1);
	}
}
</style>