<template>
    <div>
    <LoginIconview class="calenderloading w-100 d-inline-block text-center position-relative" v-if="loadingstatus == true" />
        <div :class="`w-100 d-inline-block ${modalstatus}`" id="TaskDisplayArea">
            <router-link
            v-for="eachtask in taskdata.taskdata" :key="eachtask"
            class="tasklink d-inline-block w-100 tseparate float-left text-decoration-none"
            :to="`/taskdetail/${eachtask[4].value}`">
                <div :class="`d-inline-block w-100 pt-2 pb-2 pl-1 pr-1 float-left ${taskwrapperclass}`">

                    <div :class="`${eachlabel.key == 'taskname' ? 'float-left pr-0 pl-0 mb-2 mb-md-0' : 'd-none'}`"
                    v-for="eachlabel in eachtask" :key="eachlabel"
                    >
                        <div v-if="eachlabel.key == 'taskname'" class="d-inline-block w-100"><span class="taskname">○</span> {{eachlabel.value}}</div>
                    </div>

                    <div class="float-right ml-2"
                    v-for="eachlabel in eachtask" :key="eachlabel"
                    >
                        <div
                        :class="`${eachlabel.key != 'id' && eachlabel.key != 'userid' && eachlabel.key != 'startdate' && eachlabel.key != 'taskname' ? 'tooltip-top float-left cursor' : 'd-none'}`"
                        :data-tooltip="eachlabel.labelname"
                        v-if="eachlabel.key != 'id' && eachlabel.key != 'userid' && eachlabel.key != 'startdate' && eachlabel.key != 'taskname'">
                            <img
                            @mouseover="taskwrapperclass = ''"
                            @mouseleave="taskwrapperclass = 'overflow-hidden'"
                            v-if="eachlabel.key == 'username'" class="searchicon d-inline-block"
                            src="@/assets/personicon.png">
                            <img
                            @mouseover="taskwrapperclass = ''"
                            @mouseleave="taskwrapperclass = 'overflow-hidden'"
                            v-if="eachlabel.key == 'deadline'" class="searchicon d-inline-block"
                            src="@/assets/deadlineicon.png">
                            <img
                            @mouseover="taskwrapperclass = ''"
                            @mouseleave="taskwrapperclass = 'overflow-hidden'"
                            v-if="eachlabel.key == 'status'" class="searchicon d-inline-block"
                            src="@/assets/statusicon.png">
                            <small
                            @mouseover="taskwrapperclass = ''"
                            @mouseleave="taskwrapperclass = 'overflow-hidden'"
                            class="ml-1 font12"
                            >{{`${eachlabel.key == 'deadline' ? RFdate(eachlabel.value.split(' ')[0]) : eachlabel.value}`}}</small>
                        </div>
                    </div>
                </div>
            </router-link>
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
        loadingstatus:Boolean/*,
        taskstatus:Boolean*/
    },
    components: {
        LoginIconview
    },
    data() {
        return {
            urlnow:location.pathname,
            taskwrapperclass:'overflow-hidden'
        }
    },
    methods:{
        RFdate(str:string){
            return `${new Date(str).getFullYear()}/${new Date(str).getMonth()+1}/${new Date(str).getDate()}`;
        }
    }
});
</script>
<style lang="scss" scoped>
.calenderloading {
	position: absolute;
	transform: scale(0.7);
}
.twrapper{
    height:1.5rem;
    line-height:1.5rem;
}
.tasklink:hover{
    color:inherit;
    background: rgb(24, 71, 182, 0.1);
}

.tasklink,
.tasklink:hover{
    transition:all 0.5s;
}
.tseparate{
    box-shadow: 0px 1px 1px 0px rgba(0, 0, 0, 0.05);
}
.taskname{
    color:#0069d9;
}
</style>