<template>
    <div>
    <LoginIconview class="calenderloading w-100 d-inline-block text-center position-relative" v-if="loadingstatus == true" />
        <div :class="`w-100 d-inline-block mt-3 ${modalstatus}`" id="TaskDisplayArea">
            <div
            v-for="eachtask in taskdata.taskdata" :key="eachtask"
            class="gridinside d-inline-block w-100 mb-3 bg-white position-relative">
                <div class="d-inline-block w-100 pt-3 pb-3 pr-2 pl-2 overflow-hidden">

                    <div class="col-12 col-md-4 float-left p-2"
                    v-for="eachlabel in eachtask" :key="eachlabel"
                    >
                        <div class="tooltip-top float-left cursor" :data-tooltip="eachlabel.labelname"
                        v-if="eachlabel.key != 'id' && eachlabel.key != 'userid' && eachlabel.key != 'startdate'">
                            <img v-if="eachlabel.key == 'taskname'" class="searchicon d-inline-block" src="@/assets/taskicon.png">
                            <img v-if="eachlabel.key == 'username'" class="searchicon d-inline-block" src="@/assets/personicon.png">
                            <img v-if="eachlabel.key == 'groupname'" class="searchicon d-inline-block" src="@/assets/groupicon.png">
                            <img v-if="eachlabel.key == 'deadline'" class="searchicon d-inline-block" src="@/assets/deadlineicon.png">
                            <img v-if="eachlabel.key == 'status'" class="searchicon d-inline-block" src="@/assets/statusicon.png">
                        </div>
                        <span class="d-inline-block position-absolute font-lg-12 col-10"
                        v-if="eachlabel.key != 'id' && eachlabel.key != 'userid' && eachlabel.key != 'startdate' && eachlabel.key != 'deadline'"
                        >{{eachlabel.value}}</span>
                        <span class="d-inline-block position-absolute font-lg-12 col-10"
                        v-if="eachlabel.key == 'deadline'"
                        >{{RFdate(eachlabel.value.split(' ')[0])}}</span>
                    </div>
                </div>
                <div class="d-inline-block w-100 p2px">
                    <div class="d-inline-block w-100 position-relative p-2 bg-white">
                        <div class="col-12 col-md-6 col-lg-2 float-left pl-0 pr-0">
                            <router-link
                            class="BgAccentColor text-white cursor p-2 p-lg-1 d-inline-block text-center mb-0 float-left w-100"
                            :data-taskid="eachtask[5].value"
                            :to="`/taskdetail/${eachtask[5].value}`"
                            >詳細ページへ</router-link>
                        </div>
                        <div class="d-inline-block col-12 float-left pl-0 pr-0 mt-2">
                            <div class="searchicon tooptip-top float-right cursor" data-tooltip="担当者にメッセージを送る">
                                <img class="d-inline-block w-100" :id="`SendMsgUserButton-${eachtask[6].value}`" src="">
                            </div>
                            <span class="font-lg-12 d-inline-block pt-2 pb-2 text-right loat-left">
                            依頼日: <span class="FontAccent">{{RFdate(eachtask[7].value.split(' ')[0])}}</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import {GetData} from "@/http";
import LoginIconview from '@/components/common/LoadingIcon.vue';

export default defineComponent({
    name: 'TaskInfoInnerView',
    props: {
        taskdata: Object,
        modalstatus:String,
        loadingstatus:Boolean
    },
    components: {
        LoginIconview
    },
    data() {
        return {
            urlnow:location.pathname
        }
    },
    methods:{
        RFdate(str:string){
            return `${new Date(str).getFullYear()}/${new Date(str).getMonth()}/${new Date(str).getDate()}`;
        }
    }
});
</script>
<style lang="scss" scoped>
.calenderloading {
	position: absolute;
	transform: scale(0.7);
}
</style>