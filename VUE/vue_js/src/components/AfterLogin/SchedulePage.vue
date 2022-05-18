<template>
	<div class="m-auto pl-2 pr-2 pl-lg-0 pr-lg-0">
		<div class="contentwraper w-100 d-inline-block pt-3 pb-4 pl-0 pr-0 mt-3">
			<div class="d-inline-block w-100 mb-3">
				<div class="m-auto">
					<div class="col-md-12 m-auto pl-0 pr-0 position-relative">
						<div class="w-100 d-inline-block pl-3 pr-3">
							<div class="w-100 d-inline-block position-relative">
								<div class="YearAreaWrapper mycolor d-flex mb-0 p-2">
									<div class="font1-3 d-inline-block mr-3 cursor" id="YearArea">
										{{date.getFullYear()}}
									</div>
                                    <input
                                    @input="SearchIncharge"
                                    type="text"
                                    id="SearchCbyWord"
                                    name="SearchCbyWord"
                                    class="searchbar border-top-left-radius-1rem border-bottom-left-radius-1rem
                                    border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2 mt-0"
                                    placeholder="担当者名から検索"
                                    >
                                    <input
                                    @input="SetDisplayNum"
                                    type="text"
                                    id="PerPageArea"
                                    name="PerPage"
                                    class="col-1 ml-2 searchbar border-top-left-radius-1rem border-bottom-left-radius-1rem
                                    border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2 mt-0"
                                    placeholder="表示件数"
                                    >
								</div>
								<div class="w-100 d-md-flex">
									<div class="Carea d-inline-block w-100">
                                        <div class="montharea d-md-flex w-100 mb-0">
                                            <div id="MonthArea" class="text-center w-100 d-flex pr-2">
                                                <div class="d-inline-block cursor pt-2 pb-2 text-left pl-2" :data-forcommondate="`${date.getFullYear()}/${date.getMonth()+1}/${date.getDate()}`" id="MonthButton">
                                                {{date.getMonth()+1}}月
                                                </div>
                                            </div>
                                            <div id="prev7"
                                            @click="DaysShift(-7)"
                                            class="cbutton tooltip-top d-inline-block text-center cursor col-auto pl-0 pr-0 font12"
                                            data-tooltip="7日前"
                                            :data-cldata="`${new Date(calculate.MDFI(date, -7)).getFullYear()}/${new Date(calculate.MDFI(date, -7)).getMonth()+1}/${new Date(calculate.MDFI(date, -7)).getDate()}`"
                                            >◀︎◀︎</div>
                                            <div id="prev"
                                            @click="DaysShift(-1)"
                                            class="cbutton tooltip-top d-inline-block text-center cursor col-auto pl-0 pr-0 font12"
                                            data-tooltip="1日前"
                                            :data-cldata="`${new Date(calculate.MDFI(date, -1)).getFullYear()}/${new Date(calculate.MDFI(date, -1)).getMonth()+1}/${new Date(calculate.MDFI(date, -1)).getDate()}`"
                                            >◀︎</div>
                                            <div id="next"
                                            @click="DaysShift(1)"
                                            class="cbutton tooltip-top d-inline-block text-center cursor col-auto pl-0 pr-0 font12"
                                            data-tooltip="1日後"
                                            :data-cldata="`${new Date(calculate.MDFI(date, +1)).getFullYear()}/${new Date(calculate.MDFI(date, +1)).getMonth()+1}/${new Date(calculate.MDFI(date, +1)).getDate()}`"
                                            >▶︎</div>
                                            <div id="next7"
                                            @click="DaysShift(7)"
                                            class="cbutton tooltip-top d-inline-block text-center cursor col-auto pl-0 pr-0 font12"
                                            data-tooltip="7日後"
                                            :data-cldata="`${new Date(calculate.MDFI(date, +7)).getFullYear()}/${new Date(calculate.MDFI(date, +7)).getMonth()+1}/${new Date(calculate.MDFI(date, +7)).getDate()}`"
                                            >▶︎▶︎</div>
                                        </div>
                                        <div class="mt-0" id="DayArea">
                                            <div class="d-md-flex">
                                                <div
                                                :class="`${SortAreaClass} tooltip-top w-100 d-inline-block text-center cursor position-relative pt-2 pb-2`"
                                                data-tooltip="並び変え"
                                                @click="SortAreaOpen"
                                                id="SortArea">
                                                <img class="sccheduleplusbutton" src="@/assets/accountarrow.png">
                                                <div class="position-absolute sbwrapper b-gray sbhidden bg-white" id="sortmenu">
                                                    <div
                                                    class="sortelem p-2"
                                                    data-orderby="asc"
                                                    @click="ChangeOrderBy"
                                                    >
                                                    昇順
                                                    </div>
                                                    <div
                                                    class="sortelem p-2"
                                                    data-orderby="desc"
                                                    @click="ChangeOrderBy"
                                                    >
                                                    降順
                                                    </div>
                                                    <input name="clorderby" type="hidden" :value="`${SearchOrderBy}`">
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
                                                :data-forcommondate="`${new Date(calculate.MDFI(date, i-1)).getFullYear()}/${new Date(calculate.MDFI(date, i-1)).getMonth()+1}/${new Date(calculate.MDFI(date, i-1)).getDate()}`"
                                                :class="`${Daycolor[DweekArr[new Date(calculate.MDFI(date, i-1)).getDay()]]} w-100 h-100 text-center pt-2 pb-2 font12`"
                                                >
                                                {{new Date(calculate.MDFI(date, i-1)).getDate()}}
                                                ({{DweekArr[new Date(calculate.MDFI(date, i-1)).getDay()]}})
                                                </div>
                                            </div>

                                            <div :data-cenddate="`${new Date(calculate.MDFI(date, 6)).getFullYear()}/${new Date(calculate.MDFI(date, 6)).getMonth()+1}/${new Date(calculate.MDFI(date, 6)).getDate()}`" id="getCalenderRange"></div>
                                            </div>
                                        </div>
									</div>
								</div>
                                
                                <!-- コンポーネント化 -->
                                <CalenderView
                                v-if="WhichCstyle == 'pc'"
                                :date = "date"
                                :searchparam = "searchparam"
                                :loadingstatus = "loadingstatus"
                                :loadstatus = "loadstatus"
                                :scheduleborder = "scheduleborder"
								:ScheduleData="ScheduleData"
                                />

                                <SPCalenderView
                                v-if = "WhichCstyle == 'sp'"
                                :date = "date"
                                :searchparam = "searchparam"
                                :loadingstatus = "loadingstatus"
                                :loadstatus = "loadstatus"
								:ScheduleData="ScheduleData"
								:DweekArr="DweekArr"
								:Daycolor="Daycolor"
                                />
								<div id="PagenationArea" class="w-100 text-center d-flex">
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
									</div>
								</div>
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
import SPCalenderView from '@/components/AfterLogin/parts/Schedule/SPCalender.vue';
import http from "@/views/ts/http";
import {GetData} from "../../http";
import {Calculate} from "../../calculate";

export default defineComponent({
	name: 'ScheduleView',
	data() {
		return {
			AddedUserList:{},
			DweekArr:[ "日", "月", "火", "水", "木", "金", "土" ],
			Daycolor:{"土":"SaturdayColor", "日":"SundayColor", "月":"", "火":"", "水":"", "木":"", "金":""},
			date:new Date(),
			SortAreaClass:'SortAreaishidde',
			searchparam:{},
			SearchKeyword:'',
			SearchDisplayNum:5,
			SearchOrderBy:'desc',
			WhichCstyle:'',
			loadingstatus:true,
			loadstatus:'op0',
			scheduleborder:'',
			ScheduleData:{},
			PageNow:1,
			PageAmount:0,
			pagenation:'',
			Pjson:[{}],
			calculate:new Calculate()
		};
	},
	components: {
		CalenderView,
		SPCalenderView
	},
	methods:{
		DaysShift(num:number){
			this.date = new Date(this.date.setDate(this.date.getDate() + num));
			//検索結果を出力する共通処理を入れる
			this.MakeSearchParam();
		},
		SearchIncharge(e:any){
			this.PageNow = 1;
			this.SearchKeyword = e.target.value;
			//検索結果を出力する共通処理を入れる
			this.MakeSearchParam();
		},
		SetDisplayNum(e:any){
			this.PageNow = 1;
			this.SearchDisplayNum = Number(e.target.value);
			//検索結果を出力する共通処理を入れる
			this.MakeSearchParam();
		},
		SortAreaOpen(e:any){
			e.target.classList.toggle("SortAreaisshow");
			e.target.classList.toggle("SortAreaishidde");
			if(!e.target.getElementsByClassName('sbwrapper') || !e.target.getElementsByClassName('sbwrapper')[0]){
				return;
			}

			e.target.getElementsByClassName('sbwrapper')[0].classList.toggle("sbshow");
			e.target.getElementsByClassName('sbwrapper')[0].classList.toggle("sbhidden");
		},
		ChangeOrderBy(e:any){
			this.PageNow = 1;
			this.SearchOrderBy = e.target.dataset.orderby;
			e.target.parentNode.parentNode.classList.toggle("SortAreaisshow");
			e.target.parentNode.parentNode.classList.toggle("SortAreaishidde");
			e.target.parentNode.classList.toggle("sbshow");
			e.target.parentNode.classList.toggle("sbhidden");
			//検索結果を出力する共通処理を入れる
			this.MakeSearchParam();
		},

		DetermineDate(){
			if(location.search == ''){
			this.date = new Date();
			}
			if(location.search.match(/starttime=/)){
				//○○○○-○○-○○の形式以外は認めない
				var datestr = location.search.split('starttime=')[1].split('&')[0];
				const regex = /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/;
				if(!regex.test(datestr)){
					return;
				}
			this.date = new Date(datestr);
			}
		},
		//検索結果を出力する共通処理
		MakeSearchParam(){
			this.searchparam = {
				"orderby":this.SearchOrderBy,
				"keyword":this.SearchKeyword,
				"PerPage":this.SearchDisplayNum,
				"PageNow":this.PageNow,
				"starttime":`${this.date.getFullYear()}/${this.date.getMonth()+1}/${this.date.getDate()}`
			};

			const http = new GetData();
			this.loadingstatus = true;
			this.loadstatus = 'op0';
			this.scheduleborder = '';

			http.common(
				"/api/schedule",
				this.searchparam,
				(res:any) => {
					this.ScheduleData = res.data;
					this.PageAmount = res.data.PageAmount[0];

					//読み込みが完全に終わってからカバーを外す
					this.loadingstatus = false;
					this.scheduleborder = 'scheduleborder';
					this.loadstatus = 'op1';
				}
			);
		},
        PageMotion(e:any){
			this.PageNow = Number(e.target.innerText);
			this.MakeSearchParam();
        }
	},
	mounted(){
		//マウント時はパラメータの有無を確認。
		//パラメータがある場合はパラメータの日付を取得する。
		//ない場合は今日の日付を取得する。
		if(768 < window.innerWidth){
			this.WhichCstyle = "pc";
		}
		if(window.innerWidth <= 768){
			this.WhichCstyle = "sp";
		}
		this.DetermineDate();
		this.MakeSearchParam();
		window.addEventListener('resize', () => {
			if(768 < window.innerWidth){
				this.WhichCstyle = "pc";
			}
			if(window.innerWidth <= 768){
				this.WhichCstyle = "sp";
			}
		});
	}
});
</script>

<style lang="scss">
.saturdayBG {
	background: #E8EEFB;
}
.sundayBG {
	background: #FFE5E5;
}
.SuturdayColor {
	color: #0069d9;
}
.Parea {
	width: 2rem;
}
.SaturdayColor {
	background: rgb(24, 71, 182, 0.1);
	color: #0069d9;
}
.SundayColor {
	background: rgb(255, 183, 90, 0.1);
	color: rgb(255, 183, 90, 1);
}
.montharea {
	margin-bottom: 5px;
	border-bottom: solid rgb(0, 0, 0, 0.1) 1px;
}
#DayArea {
	margin-top: 5px;
}
.Carea {
	box-shadow: 0px 0px 3px 0px rgb(0, 0, 0, 0.1);
}
#prev {
	top: 0;
}
#prev7 {
	bottom: 0;
}
#next {
	top: 0;
}
#next7 {
	bottom: 0;
}
.schedulearea {
	min-height: 20vh;
}
div[class*="CalBg"] {
	background-size: 3px 3px;
}
#UserScheduleArea>div:nth-child(2n)>div:not(.mycolor) {
	background: rgb(0, 0, 0, 0.03);
}
#UserScheduleArea>div:nth-child(2n+1)>div:not(.mycolor) {
	background: #ffff;
}
.decCalBg {
	background-image: linear-gradient( -45deg, #fff 25%, #097bf6 25%, #097bf6 50%, #fff 50%, #fff 75%, #097bf6 75%, #097bf6);
	color: #097bf6;
}
.JanuCalBg {
	background-image: linear-gradient( -45deg, #fff 25%, #09baf6 25%, #09baf6 50%, #fff 50%, #fff 75%, #09baf6 75%, #09baf6);
}
.FebCalBg {
	background-image: linear-gradient( -45deg, #fff 25%, #09f6e9 25%, #09f6e9 50%, #fff 50%, #fff 75%, #09f6e9 75%, #09f6e9);
}
.MarCalBg {
	background-image: linear-gradient( -45deg, #fff 25%, #09f681 25%, #09f681 50%, #fff 50%, #fff 75%, #09f681 75%, #09f681);
}
.ApCalBg {
	background-image: linear-gradient( -45deg, #fff 25%, #09f618 25%, #09f618 50%, #fff 50%, #fff 75%, #09f618 75%, #09f618);
}
.MaCalBg {
	background-image: linear-gradient( -45deg, #fff 25%, #a1f609 25%, #a1f609 50%, #fff 50%, #fff 75%, #a1f609 75%, #a1f609);
}
.JunCalBg {
	background-image: linear-gradient( -45deg, #fff 25%, #eaf609 25%, #eaf609 50%, #fff 50%, #fff 75%, #eaf609 75%, #eaf609);
}
.JulCalBg {
	background-image: linear-gradient( -45deg, #fff 25%, #f6e209 25%, #f6e209 50%, #fff 50%, #fff 75%, #f6e209 75%, #f6e209);
}
.AugCalBg {
	background-image: linear-gradient( -45deg, #fff 25%, #f68f09 25%, #f68f09 50%, #fff 50%, #fff 75%, #f68f09 75%, #f68f09);
}
.SeptCalBg {
	background-image: linear-gradient( -45deg, #fff 25%, #f63109 25%, #f63109 50%, #fff 50%, #fff 75%, #f63109 75%, #f63109);
}
.OctCalBg {
	background-image: linear-gradient( -45deg, #fff 25%, #f63109 25%, #f63109 50%, #f63109 50%, #fff 75%, #f63109 75%, #f63109);
}
.NovCalBg {
	background-image: linear-gradient( -45deg, #fff 25%, #f609a8 25%, #f609a8 50%, #fff 50%, #fff 75%, #f609a8 75%, #f609a8);
}
.montharea>.cbutton:nth-child(2) {
	border-left: solid 0.5px rgb(0, 0, 0, 0.1);
}
.montharea>.cbutton:not(:nth-child(5)) {
	border-right: solid 0.5px rgb(0, 0, 0, 0.1);
}
.monthvalselector, .yearvalselector {
	background: #fff;
}
.monthvalselector:hover, .yearvalselector:hover {
	background: #F2F2F2;
}
.monthvalselector, .monthvalselector:hover, .yearvalselector, .yearvalselector:hover {
	transition: all 0.5s;
}
.month_menu_closed>.scheduleinnerselector, .month_menu_open>.scheduleinnerselector, .year_menu_closed>.scheduleinnerselector, .year_menu_open>.scheduleinnerselector {
	transition: all 0.5s;
}
.year_menu_closed>.scheduleinnerselector {
	height: 0;
}
.month_menu_open>.scheduleinnerselector, .year_menu_open>.scheduleinnerselector, .sselector_open {
	height: 15rem;
}
.scheduleinnerselector {
	overflow: scroll;
}
#starthourmenu, #startminutemenu, #endhourmenu, #endminutemenu {
	left: 0;
	overflow: scroll;
	height: 8rem;
	z-index: 1;
}
.menuhide {
	opacity: 0;
}
.menushow {
	opacity: 1;
}
.menuhide, .menushow {
	transition: opacity 0.5s;
}
.calenderloading {
	position: absolute;
	transform: scale(0.7);
}
.calenderloading {
	top: 0;
}
@media (min-width: 768px) {
	#MyScheduleArea>div>div>div:not(:nth-child(8)) {
		border-right: solid 0.5px #ffff;
	}
	#DayArea>div>div:not(:nth-child(8)), #UserScheduleArea>div>div>div:not(:nth-child(8)) {
		border-right: solid 0.5px rgb(0, 0, 0, 0.1);
	}
}
</style>