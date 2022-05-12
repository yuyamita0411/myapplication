<template>
    <div class="shadowwrapper m-auto pl-2 pr-2 pl-lg-0 pr-lg-0">
        <div id="loadingarea" v-html="Loading"></div>
        <div class="contentwraper w-100 d-inline-block pt-3 pb-4 pl-0 pr-0 mt-3">
            <div :class="`articlewrapper col-12 m-auto p-3 ${loadstatus}`">
                <h3 class="mainfontcolor newarticletitle col-12 pt-1 pb-1 mb-0 bg-transparent pl-0 pr-0">NEW!!</h3>
                <div class="newestarticle d-flex w-100 bg-white pt-2 pb-2 pr-4 pl-4 mb-3">

                </div>
                <div class="gridinside w-100 bg-white p-3">
                    <img src="@/assets/clipicon.png" class="clipicon position-absolute">
                    <div id="notificationarea"></div>

                    <div class="d-inline-block w-100 mt-3">
                        <div id="notificationpagenationarea" class="col-10 col-md-6 col-lg-4 d-flex m-auto">
                            <article class="p-news-list__item js-inter fadeInLeft is-invasion mb-3 p-2">
                                <div v-for="Nt in notificationarr" :key="Nt.id">
                                    <div class="p-news-list__item__data pb-2" v-if="Nt != notificationarr[0] && Nt">
                                        <p class="p-news-list__item__data__date mb-0"></p>
                                        <div class="p-news-list__item__data__line"></div>
                                        <a href="" class="p-news-list__item__data__category mb-0">{{Nt.title}}</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent, createApp } from 'vue';
import http from "@/views/ts/http";
import {GetData, loading} from "../../http";

export default defineComponent({
    name: 'DashboardView',
    data() {
        return {
            Loading:loading,
            loadstatus:'d-none',
            TopNotification:'',
            notificationarr:[]
        };
    },
    props: {
        msg: String
    },
    mounted(){
        const http = new GetData();
        http.common("/api/dashboard",
        (res:any) => {
            this.TopNotification = res.data[0].title;
            this.notificationarr = res.data;
            this.Loading = '';
            this.loadstatus = '';
        });
    },
    methods:{
        mthod(){
            console.log("dammy");
        }
    }
});
</script>

<style lang="scss">
</style>