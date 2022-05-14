<template>
	<div class="m-auto pl-2 pr-2 pl-lg-0 pr-lg-0">
		<div class="contentwraper w-100 d-inline-block pt-3 pb-4 pl-0 pr-0 mt-3">
			<div class="d-inline-block w-100 mb-3">
				<div class="m-auto">
					<div class="col-md-12 m-auto pl-0 pr-0 position-relative">
						<div class="w-100 d-inline-block pl-3 pr-3">
							<div class="w-100 d-inline-block position-relative">
								<div class="font1-3 d-inline-block w-100 cursor year_menu_closed" id="YearMenuArea"></div>
								<div class="YearAreaWrapper mycolor d-flex mb-0 p-2">

									<div id="YearArea" class="font1-3 d-inline-block mr-3 cursor">
										{{date.getFullYear()}}
									</div>

									<input type="text" id="SearchCbyWord" name="SearchCbyWord"
									class="searchbar border-top-left-radius-1rem border-bottom-left-radius-1rem
									border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2 mt-0"
									placeholder="担当者名から検索"
									>
									<input type="text" id="PerPageArea" name="PerPage"
									class="col-1 ml-2 searchbar border-top-left-radius-1rem border-bottom-left-radius-1rem
									border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2 mt-0"
									placeholder="表示件数"
									>
								</div>
								<div class="font1-3 d-inline-block w-100 cursor month_menu_closed" id="MonthMenuArea"></div>
								<div class="w-100 d-md-flex">
									<div class="Carea d-inline-block w-100">
										<div class="montharea d-md-flex w-100 mb-0">

											<div id="MonthArea" class="text-center w-100 d-flex pr-2">
												<div class="d-inline-block cursor pt-2 pb-2 text-left pl-2" :data-forcommondate="`${date.getFullYear()}/${date.getMonth()+1}/${date.getDate()}`" id="MonthButton">
													{{date.getMonth()+1}}月
												</div>
											</div>
											<div id="prev7"
												@click="SevenDaysAgo"
												class="cbutton tooltip-top d-inline-block text-center cursor col-auto pl-0 pr-0 font12"
												data-tooltip="7日前">◀︎◀︎</div>
											<div id="prev"
												@click="OneDayAgo"
												class="cbutton tooltip-top d-inline-block text-center cursor col-auto pl-0 pr-0 font12"
												data-tooltip="1日前">◀︎</div>
											<div id="next"
												@click="OneDayNext"
												class="cbutton tooltip-top d-inline-block text-center cursor col-auto pl-0 pr-0 font12"
												data-tooltip="1日後">▶︎</div>
											<div id="next7"
												@click="SevenDaysNext"
												class="cbutton tooltip-top d-inline-block text-center cursor col-auto pl-0 pr-0 font12"
												data-tooltip="7日後">▶︎▶︎</div>
										</div>
										<div class="mt-0" id="DayArea" v-if="location == ''">
											<div class="d-md-flex">
												<div class="SortAreaishidde tooltip-top w-100 d-inline-block text-center cursor position-relative pt-2 pb-2" data-tooltip="並び変え" id="SortArea">
													<img class="sccheduleplusbutton" src="@/assets/accountarrow.png">
													<div class="position-absolute sbwrapper b-gray sbhidden bg-white" id="sortmenu">
														<div class="sortelem p-2" data-orderby="asc">
															昇順
														</div>
														<div class="sortelem p-2" data-orderby="desc">
															降順
														</div><input name="clorderby" type="hidden" value="">
													</div>
												</div>
												
												<div
												class="w-100"
												v-for="i in 7" :key="i">
													<div
													v-if="i == 1" id="CFirstDate"
													:data-forcommondate="`${date.getFullYear()}/${date.getMonth()+1}/${date.getDate()}`"
													:data-cstartdate="`${date.getFullYear()}/${date.getMonth()+1}/${date.getDate()}`"
													:class="`${Daycolor[DweekArr[date.getDay()]]} w-100 h-100 text-center pt-2 pb-2 font12`"
													>{{date.getDate()}}({{DweekArr[date.getDay()]}})
													</div>
													<div
													v-else
													:data-forcommondate="`${new Date(MakeDateFromInstance(date, i-1))}`"
													:class="`${Daycolor[DweekArr[new Date(MakeDateFromInstance(date, i-1)).getDay()]]} w-100 h-100 text-center pt-2 pb-2 font12`"
													>{{new Date(MakeDateFromInstance(date, i-1)).getDate()}}({{DweekArr[new Date(MakeDateFromInstance(date, i-1)).getDay()]}})
													</div>
												</div>

												<div :data-cenddate="`${cdate.getFullYear()}/${cdate.getMonth()+1}/${cdate.getDate()}`" id="getCalenderRange"></div>
											</div>
										</div>

										<div class="mt-0" id="DayArea" v-if="location.match(/starttime=/)">
											<div class="d-md-flex">
												<div class="SortAreaishidde tooltip-top w-100 d-inline-block text-center cursor position-relative pt-2 pb-2" data-tooltip="並び変え" id="SortArea">
													<img class="sccheduleplusbutton" src="@/assets/accountarrow.png">
													<div class="position-absolute sbwrapper b-gray sbhidden bg-white" id="sortmenu">
														<div class="sortelem p-2" data-orderby="asc">
															昇順
														</div>
														<div class="sortelem p-2" data-orderby="desc">
															降順
														</div><input name="clorderby" type="hidden" value="">
													</div>
												</div>

												<div
												class="w-100"
												v-for="i in 7" :key="i">
													<div
													v-if="i == 1" id="CFirstDate"
													:data-forcommondate="`${date.getFullYear()}/${date.getMonth()+1}/${date.getDate()}`"
													:data-cstartdate="`${date.getFullYear()}/${date.getMonth()+1}/${date.getDate()}`"
													:class="`${Daycolor[DweekArr[date.getDay()]]} w-100 h-100 text-center pt-2 pb-2 font12`"
													>{{date.getDate()}}({{DweekArr[date.getDay()]}})													
													</div>
													<div
													v-else
													:data-forcommondate="`${new Date(MakeDateFromInstance(date).setDate(MakeDateFromInstance(date).getDate() + 1))}/${date.getMonth()+1}/${date.getDate()}`"
													:class="`${Daycolor[DweekArr[date.getDay()]]} w-100 h-100 text-center pt-2 pb-2 font12`"
													>{{date.getDate()}}({{DweekArr[date.getDay()]}})
													</div>
												</div>
												<div :data-cenddate="`${date.getFullYear()}/${date.getMonth()+1}/${cdate.getDate()}`" id="getCalenderRange"></div>
											</div>
										</div>

									</div>
								</div>

								<!-- コンポーネント化 -->
								<CalenderView />
								<!-- コンポーネント化 -->

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import CalenderView from '@/components/AfterLogin/parts/Schedule/Calender.vue';
import http from "@/views/ts/http";
import {GetData} from "../../http";
import {Param} from "../../param";
import {PageNation} from "../../Pagenation";

export default defineComponent({
	name: 'ScheduleView',
    data() {
        return {
            AddedUserList:{},
			location:location.search,
			param:new Param(),
			DweekArr:[ "日", "月", "火", "水", "木", "金", "土" ],
			Daycolor:{"土":"SaturdayColor", "日":"SundayColor", "月":"", "火":"", "水":"", "木":"", "金":""},
			appenddateObj:new Date(),
			appenddate:'',
			date:new Date(),
			cdate:new Date(),
			Dobj:new Date(),
			dayOfWeek:0,
			daycolor:'',
			forcmdate:new Date(),
        };
    },
    components: {
        CalenderView
    },
	props: {
		msg: String,
	},

	methods:{
		RebaseSchedule(){
			console.log("rebase!!");
			
		},
		MakeDateFromInstance(obj:any, plus:number){
			//一旦変数に入れる。
			var Dobj = new Date(obj);
			var returnobj = new Date(Dobj.setDate(Dobj.getDate() + plus));
			return returnobj;
		},
		SevenDaysAgo(){
			this.date = new Date(this.date.setDate(this.date.getDate() - 7));
		},
		OneDayAgo(){
			this.date = new Date(this.date.setDate(this.date.getDate() - 1));
		},
		OneDayNext(){
			this.date = new Date(this.date.setDate(this.date.getDate() + 1));
		},
		SevenDaysNext(){
			this.date = new Date(this.date.setDate(this.date.getDate() + 7));
		}
		//クリックイベントはthis.dateに足し引きしていく。
	},
    mounted(){
		//マウント時はパラメータの有無を確認。
		//パラメータがある場合はパラメータの日付を取得する。
		//ない場合は今日の日付を取得する。
		var dateobj = this.param.GetUrlParamObj();
        if(dateobj.year && dateobj.month && dateobj.day){
            this.appenddate = `${dateobj.year}/${dateobj.month}/${dateobj.day}`;
			var dateval = this.appenddate;//
			this.date = new Date(dateval);
			this.cdate = this.date;
			/*this.date.setDate(this.date.getDate());
			this.dayOfWeek = this.date.getDay();

			if(this.DweekArr[this.dayOfWeek] == '土'){
				this.daycolor = 'SaturdayColor';
			}
			if(this.DweekArr[this.dayOfWeek] == '日'){
				this.daycolor = 'SundayColor';
			}*/
			/*for(var i=2; i <= 7; i++){
				this.Dobj = new Date(this.cdate.setDate(this.cdate.getDate() + 1));
				var year = this.Dobj.getFullYear();
				var month = this.Dobj.getMonth();
				var day = this.Dobj.getDate();
				var dayOfWeek = this.Dobj.getDay();
				var getdatarange = '';
				var daycolor = '';
				this.forcmdate = this.Dobj;
			}*/
        }

		//いずれかで日付を取得できたらカレンダーの日付のエリアを作成する

        /*if(this.dateobj.year && this.dateobj.month && this.dateobj.day){
            this.appenddate = `${this.dateobj.year}/${this.dateobj.month}/${this.dateobj.day}`;
        }*/
		
        console.log(new Date("2022/5/14"));
    }
});
</script>

<style lang="scss">
.saturdayBG{
    background:#E8EEFB;
}
.sundayBG{
    background:#FFE5E5;
}
.SuturdayColor{
    color:#0069d9;
}
.Parea{
    width:2rem;
}

.SaturdayColor{
    background:rgb(24, 71, 182, 0.1);
    color:#0069d9;
}
.SundayColor{
    background:rgb(255, 183, 90, 0.1);
    color:rgb(255, 183, 90, 1);
}
.montharea{
    margin-bottom:5px;
    border-bottom:solid rgb(0, 0, 0, 0.1) 1px;
}
#DayArea{
    margin-top:5px;
}
.Carea{
    box-shadow: 0px 0px 3px 0px rgb(0, 0, 0, 0.1);
}
#prev{
    top:0;
}
#prev7{
    bottom:0;
}
#next{
    top:0;
}
#next7{
    bottom:0;
}
.schedulearea{
    min-height:20vh;
}
/*
#DayArea{
    width:87.5%;
    float:right;
}*/
div[class*="CalBg"]{
    background-size: 3px 3px;
}

#UserScheduleArea > div:nth-child(2n) > div:not(.mycolor){
    background:rgb(0, 0, 0, 0.03);
}
#UserScheduleArea > div:nth-child(2n+1) > div:not(.mycolor){
    background:#ffff;
}

.decCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #097bf6 25%,
        #097bf6 50%, 
        #fff 50%, #fff 75%,
        #097bf6 75%, 
        #097bf6
    );
    color:#097bf6;
}
.JanuCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #09baf6 25%,
        #09baf6 50%, 
        #fff 50%, #fff 75%,
        #09baf6 75%, 
        #09baf6
    );
}
.FebCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #09f6e9 25%,
        #09f6e9 50%, 
        #fff 50%, #fff 75%,
        #09f6e9 75%, 
        #09f6e9
    );
}
.MarCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #09f681 25%,
        #09f681 50%, 
        #fff 50%, #fff 75%,
        #09f681 75%, 
        #09f681
    );
}
.ApCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #09f618 25%,
        #09f618 50%, 
        #fff 50%, #fff 75%,
        #09f618 75%, 
        #09f618
    );
}
.MaCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #a1f609 25%,
        #a1f609 50%, 
        #fff 50%, #fff 75%,
        #a1f609 75%, 
        #a1f609
    );
}
.JunCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #eaf609 25%,
        #eaf609 50%, 
        #fff 50%, #fff 75%,
        #eaf609 75%, 
        #eaf609
    );
}
.JulCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #f6e209 25%,
        #f6e209 50%, 
        #fff 50%, #fff 75%,
        #f6e209 75%, 
        #f6e209
    );
}
.AugCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #f68f09 25%,
        #f68f09 50%, 
        #fff 50%, #fff 75%,
        #f68f09 75%, 
        #f68f09
    );
}
.SeptCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #f63109 25%,
        #f63109 50%, 
        #fff 50%, #fff 75%,
        #f63109 75%, 
        #f63109
    );
}
.OctCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #f63109 25%,
        #f63109 50%, 
        #f63109 50%, #fff 75%,
        #f63109 75%, 
        #f63109
    );
}
.NovCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #f609a8 25%,
        #f609a8 50%, 
        #fff 50%, #fff 75%,
        #f609a8 75%, 
        #f609a8
    );
}
.montharea > .cbutton:nth-child(2){
    border-left: solid 0.5px rgb(0, 0, 0, 0.1);
}
.montharea > .cbutton:not(:nth-child(5)){
    border-right: solid 0.5px rgb(0, 0, 0, 0.1);
}
.monthvalselector,
.yearvalselector{
    background:#fff;
}
.monthvalselector:hover,
.yearvalselector:hover{
    background:#F2F2F2;
}
.monthvalselector,
.monthvalselector:hover,
.yearvalselector,
.yearvalselector:hover{
    transition:all 0.5s;
}

.month_menu_closed > .scheduleinnerselector,
.month_menu_open > .scheduleinnerselector,
.year_menu_closed > .scheduleinnerselector,
.year_menu_open > .scheduleinnerselector{
    transition:all 0.5s;
}
.year_menu_closed > .scheduleinnerselector{
    height:0;
}
.month_menu_open > .scheduleinnerselector,
.year_menu_open > .scheduleinnerselector,
.sselector_open{
    height:15rem;
}
.scheduleinnerselector{
    overflow: scroll;
}
#starthourmenu,#startminutemenu,#endhourmenu,#endminutemenu{
    left:0;
    overflow:scroll;
    height:8rem;
    z-index:1;
}
.menuhide{
    opacity:0;
}
.menushow{
    opacity:1;
}
.menuhide,
.menushow{
    transition:opacity 0.5s;
}
@media (min-width: 768px){
    #MyScheduleArea > div > div > div:not(:nth-child(8)){
        border-right: solid 0.5px #ffff;
    }
    #DayArea > div > div:not(:nth-child(8)),
    #UserScheduleArea > div > div > div:not(:nth-child(8)){
        border-right: solid 0.5px rgb(0, 0, 0, 0.1);
    }
    .schedulearea{
        box-shadow: 0px 0px 3px 0px rgb(0, 0, 0, 0.1);
    }
}
</style>