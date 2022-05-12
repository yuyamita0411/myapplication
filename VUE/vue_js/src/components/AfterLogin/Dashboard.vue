<template>
    <div class="shadowwrapper m-auto pl-2 pr-2 pl-lg-0 pr-lg-0">
        <div id="loadingarea" v-html="Loading"></div>

        <div class="contentwraper w-100 d-inline-block pt-3 pb-4 pl-0 pr-0 mt-3">
            <div :class="`articlewrapper col-12 m-auto p-3 ${loadstatus}`">
                <h3 class="mainfontcolor newarticletitle col-12 pt-1 pb-1 mb-0 bg-transparent pl-0 pr-0">NEW!!</h3>
                <div class="newestarticle d-flex w-100 bg-white pt-2 pb-2 pr-4 pl-4 mb-3">
                    <article class="p-news-list__item js-inter fadeInLeft is-invasion">
                        <a href="p-news-list__item%20js-inter%20fadeInLeft%20is-invasion">
                        <div class="w-100">
                            <p class="mb-0 font-weight-bold">{{TopNotification}}</p>
                        </div></a>
                    </article>
                </div>
                <div class="gridinside w-100 bg-white p-3">
                    <img class="clipicon position-absolute" src="@/assets/clipicon.png">
                    <div id="notificationarea">
                        <article class="p-news-list__item js-inter fadeInLeft is-invasion mb-3 p-2 position-relative" v-for="Nt in notificationarr" :key="Nt.id">
                            <router-link :to="{path: Nt.notificationlink = Nt.notificationlink != null ? Nt.notificationlink : '/dashboard'}">
                                <div class="p-news-list__item__data pb-2" v-if="Nt != notificationarr[0] && Nt">
                                    <p class="p-news-list__item__data__date mb-0">
                                    {{`
                                        ${new Date(Nt.created_at).getFullYear()}-
                                        ${new Date(Nt.created_at).getMonth()}-
                                        ${new Date(Nt.created_at).getDate()}
                                    `}}
                                    </p>
                                    <div class="p-news-list__item__data__line"></div>
                                    <a href="" class="p-news-list__item__data__category mb-0">{{Nt.title}}</a>
                                </div>
                            </router-link>
                        </article>
                    </div>
                    <div class="d-inline-block w-100 mt-3">
                        <div class="col-10 col-md-6 col-lg-4 d-flex m-auto" id="notificationpagenationarea">
                            <p class="pagenationnum PageNow PageNationNum cursor w-100 text-center p-1" id="">1</p><input class="mt-0 mb-0 col-2" id="PageNationInput" name="PageNationInput" type="text" value="1">
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