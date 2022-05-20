<template>
    <div class="shadowwrapper m-auto pl-2 pr-2 pl-lg-0 pr-lg-0">
        <div class="contentwraper w-100 d-inline-block pt-3 pb-4 pl-0 pr-0 mt-3">
            <div class="articlewrapper col-12 m-auto p-3">
                <h3 class="mainfontcolor newarticletitle col-12 pt-1 pb-1 mb-0 bg-transparent pl-0 pr-0">NEW!!</h3>
                <div class="newestarticle d-flex w-100 bg-white pt-2 pb-2 pr-4 pl-4 mb-3">
                    <article class="p-news-list__item js-inter fadeInLeft is-invasion">
                        <a href="p-news-list__item%20js-inter%20fadeInLeft%20is-invasion">
                        <div class="w-100">
                            <p class="mb-0 font-weight-bold">{{TopNotification}}</p>
                        </div></a>
                    </article>
                </div>
                <div class="gridinside w-100 bg-white p-3 position-relative text-center">
                    <LoginIconview class="dashboardloading w-100 d-inline-block text-center" v-if="loadingstatus == true" />
                    <img class="clipicon position-absolute" src="@/assets/clipicon.png">
                    <div id="notificationarea" :class="`${loadstatus}`">
                        <article class="p-news-list__item js-inter fadeInLeft is-invasion mb-3 p-2 position-relative text-left"
                        v-if="notificationarr.length == 0">
                            <div class="p-news-list__item__data pb-2">
                                <p class="mb-0">
                                お知らせが見つかりませんでした。
                                </p>
                            </div>
                        </article>
                        <article class="p-news-list__item js-inter fadeInLeft is-invasion mb-3 p-2 position-relative text-left" v-for="Nt in notificationarr" :key="Nt.id">
                            <router-link :to="{path: Nt.notificationlink = Nt.notificationlink != null ? Nt.notificationlink : '/dashboard'}">
                                <div class="p-news-list__item__data pb-2">
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
                </div>
            </div>
			<div id="PagenationArea" class="text-center d-flex position-fixed bg-white z1">
				<div
				class="paginationarea d-flex pt-4 col-12 col-lg-4 m-auto float-left"
				>
					<p
					v-for="obj in calculate.MakePagenation(Pjson, PageAmount, PageNow)" :key="obj"
					:id="obj.PId"
					:class="obj.PClass"
					@click="PageMotion">
					{{obj.PTxt}}
					</p>
                    <input type="text" name="PageNationInput" :value="PageNow" id="PageNationInput" @input="PageNationInput" class="mt-0 mb-0 col-2">
				</div>
			</div>

        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import {GetData} from "@/http";
import {Calculate} from "@/calculate";
import LoginIconview from '@/components/common/LoadingIcon.vue';

export default defineComponent({
    name: 'DashboardView',
    data() {
        return {
            loadingstatus:true,
            loadstatus:'op0',
            loadpn:'op0',
            TopNotification:'',
            notificationarr:[],
            PageNow:1,
            PageAmount:0,
            Pjson:[{}],
            pagenation:"",
            onlyint:/^[0-9]*$/,
            calculate:new Calculate()
        };
    },
    components: {
        LoginIconview
    },
    methods:{
        rebaseNotification(pagenow:number): void{
            if(!this.onlyint.test(pagenow.toString())){
                return;
            }
            const http = new GetData();
            this.loadingstatus = true;
            this.loadstatus = 'op0';

            http.common(
                "/api/notification/get",
                {PageNow: pagenow},
                (res:any) => {

                    if(res.data.NFirstArr == null){
                        this.TopNotification = '新しいお知らせはありません。';
                        this.loadingstatus = false;
                        return;
                    }

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
                    this.loadingstatus = false;
                    this.loadstatus = 'op1';
                    this.loadpn = 'op1';
                }
            );
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
        },
        PageMotion(e:any){
			this.PageNow = Number(e.target.innerText);
			this.rebaseNotification(this.PageNow);
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
#loadingarea{
    top:35%;
}
.newestarticle{
    height:2.5rem;
}
.dashboardloading{
    position:absolute;
    top:0;
    transform:scale(0.7);
}

#PagenationArea{
	bottom:2rem;
	right:0;
}
@media (min-width: 768px){
	#PagenationArea{
		width: calc(100% - 11rem);
	}
}
@media (max-width: 768px){
	#PagenationArea{
		width: 100%;
	}
}
</style>