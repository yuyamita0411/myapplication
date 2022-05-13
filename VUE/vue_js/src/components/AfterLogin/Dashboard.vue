<template>
    <div class="shadowwrapper m-auto pl-2 pr-2 pl-lg-0 pr-lg-0">
        
        <div class="contentwraper w-100 d-inline-block pt-3 pb-4 pl-0 pr-0 mt-3">
            <div class="articlewrapper col-12 m-auto p-3 position-relative">
                <h3 class="mainfontcolor newarticletitle col-12 pt-1 pb-1 mb-0 bg-transparent pl-0 pr-0">NEW!!</h3>
                <div class="newestarticle d-flex w-100 bg-white pt-2 pb-2 pr-4 pl-4 mb-3">
                    <article class="p-news-list__item js-inter fadeInLeft is-invasion">
                        <a href="p-news-list__item%20js-inter%20fadeInLeft%20is-invasion">
                        <div class="w-100">
                            <p class="mb-0 font-weight-bold">{{TopNotification}}</p>
                        </div></a>
                    </article>
                </div>
                <div id="loadingarea" v-html="Loading" class="position-absolute"></div>
                <div class="gridinside w-100 bg-white p-3">
                    <img class="clipicon position-absolute" src="@/assets/clipicon.png">
                    <div id="notificationarea" :class="`${loadstatus}`">
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
                        <div :class="`col-10 col-md-6 col-lg-4 m-auto d-flex ${this.loadpn}`" id="">
                            <div v-for="i in PageAmount" :key="i" class="pagenationnum PageNationNum cursor d-inline-block w-100 text-center p-1">
                                <p
                                :id="`${PageNationClass(i).PageNationId}`"
                                :class="`${PageNationClass(i).PageNationClass}`"
                                @click="PageNationClick">{{`${PageNationClass(i).PageNationTxt}`}}</p>
                            </div>
                            <input type="text" name="PageNationInput" :value="PageNow" id="PageNationInput" @input="PageNationInput" class="mt-0 mb-0 col-2">
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
import {PageNation} from "../../Pagenation";

export default defineComponent({
    name: 'DashboardView',
    data() {
        return {
            Loading:loading,
            loadstatus:'op0',
            loadpn:'op0',
            TopNotification:'',
            notificationarr:[],
            PageNow:1,
            PageAmount:0,
            onlyint:/^[0-9]*$/
        };
    },
    methods:{
        rebaseNotification(pagenow:number): void{
            if(!this.onlyint.test(pagenow.toString())){
                return;
            }
            const http = new GetData();
            this.Loading = loading;
            this.loadstatus = 'op0';

            http.common(
                "/api/notification/get",
                {PageNow: pagenow},
                (res:any) => {

                    this.TopNotification = res.data.NFirstArr.title;
                    this.PageAmount = res.data.NArr.PageAmount;
                    

                    var objarr:any = [];
                    for (var property in res.data.NArr) {
                        if(typeof res.data.NArr[property] == "object"){
                            objarr.push(res.data.NArr[property]);
                        }
                    }
                    this.notificationarr = objarr;

                    //読み込みが完全に終わってからカバーを外す
                    this.Loading = '';
                    this.loadstatus = 'op1';
                    this.loadpn = 'op1';
                }
            );
        },
        PageNationClass(i:number, PageNow:number, PageAmount:number){
            return PageNation.PageNationClass(i, this.PageNow , this.PageAmount);
        },
        PageNationClick(e:any){
            var t = e.target as HTMLElement;
            if(!this.onlyint.test(t!.innerText.toString())){
                return;
            }
            this.PageNow = Number(t!.innerText);
            console.log(this.PageNow);
            this.rebaseNotification(this.PageNow);
        },
        PageNationInput(e:any){
            var t = e.target as HTMLInputElement;
            if(!this.onlyint.test(t!.innerText.toString())){
                return;
            }
            setTimeout(() => {
                if(t!.value != ''){
                    this.PageNow = Number(t!.value);
                    this.rebaseNotification(this.PageNow);
                }
            }, 500);
        }
    },
    props: {
        msg: String
    },
    mounted(){
        const http = new GetData();
        this.rebaseNotification(this.PageNow);
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
.newestarticle{
    height:2.5rem;
}
.op0{
    opacity:0;
}
.op1{
    opacity:1;
}
.op0,
.op1{
    transition:all 0.5s;
}
</style>