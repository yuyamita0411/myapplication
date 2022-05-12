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
                                <div class="p-news-list__item__data pb-2" v-if="Nt != notificationarr[Object.keys(notificationarr)[0]] && Nt">
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
                        <div class="col-10 col-md-6 col-lg-4 d-flex m-auto" id="notificationpagenationarea" v-html="PageNationHTML"></div>
                    </div>


                    <!--div class="d-inline-block w-100 mt-3">
                        <div class="col-10 col-md-6 col-lg-4 d-flex m-auto" id="">

                            <div v-for="i in PageAmount" :key="i" class="pagenationnum PageNationNum cursor w-100 text-center p-1">
                                <p v-if="i <= 3 && i == PageNow" id="" class="PageNow">{{i}}</p>
                                <p v-if="i <= 3 && i != PageNow" id="" class="">{{i}}</p>
                                <p v-if="3 < i && i == PageNow - 1" id="" class="">{{i}}</p>
                                <p v-if="3 < i && i == PageNow" id="" class="PageNow">{{i}}</p>
                                <p v-if="3 < i && i == PageNow + 1" id="" class="">{{i}}</p>
                                <p v-if="i == PageNow + 2 || i == PageNow - 2" id="" class="">...</p>
                                <p v-if="i == PageAmount && PageAmount - 1 > PageNow" id="PageLastNum" class="">{{i}}</p>
                            </div>

                        </div>
                    </div-->

                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent, createApp } from 'vue';
import http from "@/views/ts/http";
import {GetData, loading} from "../../http";
import {PageNation} from "../../Pagenation";

export default defineComponent({
    name: 'DashboardView',
    data() {
        return {
            Loading:loading,
            loadstatus:'d-none',
            TopNotification:'',
            notificationarr:[],
            PageNow:1,
            PageAmount:0,
            PageNationHTML:''
        };
    },
    methods:{
        rebaseNotification(pagenow:number): void{
            const http = new GetData();
            this.Loading = loading;
            this.loadstatus = 'd-none';

            http.common(
                "/api/notification/get",
                {PageNow: pagenow},
                (res:any) => {
                    this.TopNotification = res.data[Object.keys(res.data)[0]].title;
                    this.PageAmount = res.data.PageAmount;

                    var objarr:any = [];
                    for (var property in res.data) {
                        if(typeof res.data[property] == "object"){
                            objarr.push(res.data[property]);
                        }
                    }
                    this.notificationarr = objarr;

                    var pagination = new PageNation();
                    this.PageNationHTML = pagination.MakePagenation(this.PageAmount, pagenow);

                    //読み込みが完全に終わってからカバーを外す
                    this.Loading = '';
                    this.loadstatus = '';
                }
            );
        }
    },
    props: {
        msg: String
    },
    mounted(){
        const http = new GetData();
        this.rebaseNotification(this.PageNow);

        //ページネーション、インプットタグは生成されたものがマウントされるのでwindowイベント引数eからid, classを取得して対応
        window.addEventListener('click', (e) => {
            var t = e.target as HTMLElement;
            if(t!.className.match(/pagenationnum/)){
                this.PageNow = Number(t!.innerText);
                console.log(this.PageNow);
                //rebaseNotification(PageNow);
                this.rebaseNotification(this.PageNow);
            }
        });
        window.addEventListener('input', (e) => {
            var t = e.target as HTMLInputElement;
            if(t!.id.match(/PageNationInput/)){
                setTimeout(() => {
                    if(t!.value != ''){
                        this.PageNow = Number(t!.value);
                        console.log(this.PageNow);
                        //rebaseNotification(PageNow);
                        this.rebaseNotification(this.PageNow);
                    }
                }, 500);
            }
        });

    }
});
</script>

<style lang="scss">
</style>