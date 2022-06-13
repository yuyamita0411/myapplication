<template>
    <div>
    <LoadingIconview class="calenderloading w-100 d-inline-block text-center position-relative" v-if="loadingstatus == true" />
        <div :class="`taskinfowrapper gridinside w-100 bg-white pt-5 pr-3 pl-3 pb-3 position-relative text-center ${modalstatus}`">
            <img class="clipicon position-absolute" src="@/assets/clipicon.png">
            <div id="" :class="`bg-white`">
                <article
                v-for="eachtask in taskdata.taskdata" :key="eachtask"
                class="p-news-list__item js-inter fadeInLeft is-invasion p-2 mb-3 position-relative text-left d-inline-block w-100">
                    <div class="router-link-active router-link-exact-active d-md-flex cursor">
                        <div class="p-news-list__item__data d-inline-block w-100 pb-0">
                            <p class="mb-0 d-inline-block float-left tooltip-top mr-3"
                            :data-tooltip="eachtask[2].labelname"
                            >
                                <img
                                class="searchicon d-inline-block mr-1"
                                src="@/assets/deadlineicon.png">
                                <small>{{RFdate(eachtask[2].value.split(' ')[0])}}</small>
                            </p>
                            <div class="p-news-list__item__data__line d-inline-block float-left"></div>
                            <p class="p-news-list__item__data__category mb-0 d-inline-block float-left">{{eachtask[0].value}}</p>
                        </div>
                        <p class="mb-0 d-inline-block col-3 col-md-2 mr-0 pr-0 pl-0 float-left tooltip-top"
                        :data-tooltip="eachtask[3].labelname"
                        >
                            <img
                            class="searchicon d-inline-block"
                            src="@/assets/personicon.png">
                            <small>{{eachtask[3].value}}</small>
                        </p>
                        <p class="mb-0 mr-0 col-3 col-md-1 pr-0 pl-0 float-left tooltip-top"
                        :data-tooltip="eachtask[1].labelname"
                        >
                            <img
                            class="searchicon d-inline-block"
                            src="@/assets/statusicon.png">
                            <small>{{eachtask[1].value}}</small>
                        </p>
                        <router-link :to="`/taskdetail/${eachtask[4].value}`" class="BgAccentColor text-white text-center mb-0 mr-0 col-3 col-md-1 pr-0 pl-0 float-right"><small>詳細へ</small></router-link>
                    </div>
                </article>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import {GetData} from "@/http";
import LoadingIconview from '@/components/common/LoadingIcon.vue';

export default defineComponent({
    name: 'TaskInfoInnerView',
    props: {
        taskdata: Object,
        modalstatus:String,
        loadingstatus:Boolean/*,
        taskstatus:Boolean*/
    },
    components: {
        LoadingIconview
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
}/*
.taskinfowrapper{
    min-height:40vh;
}*/
</style>