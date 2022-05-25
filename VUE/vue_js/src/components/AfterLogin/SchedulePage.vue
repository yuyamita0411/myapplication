<template>
	<div class="m-auto pl-2 pr-2 pl-lg-0 pr-lg-0">
		<div class="contentwraper w-100 d-inline-block pt-3 pb-4 pl-0 pr-0 mt-3">
			<div class="d-inline-block w-100 mb-3">
				<div class="m-auto">
					<div class="col-md-12 m-auto pl-0 pr-0 position-relative">
						<div class="w-100 d-inline-block pl-3 pr-3">
							<div class="w-100 d-inline-block position-relative">
								<div class="YearAreaWrapper d-flex mb-0 p-2">
									<div class="font1-3 d-inline-block mr-3 cursor" id="YearArea">{{date.getFullYear()}}</div>
                                    <input
                                    @input="PageNow = 1,SearchKeyword = $event.target.value, MakeSearchParam()
									"
                                    type="text"
                                    id="SearchCbyWord"
                                    name="SearchCbyWord"
                                    class="searchbar border-top-left-radius-1rem border-bottom-left-radius-1rem
                                    border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2 mt-0"
                                    placeholder="担当者名から検索"
                                    >
                                    <input
                                    @input="PageNow = 1, SearchDisplayNum = Number($event.target.value), MakeSearchParam()"
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
                                                @click="
												$event.target.classList.toggle('SortAreaisshow'),
												$event.target.classList.toggle('SortAreaishidde'),
												this.$refs.sortmenu.classList.toggle('sbshow'),
												this.$refs.sortmenu.classList.toggle('sbhidden')
												"
                                                id="SortArea">
                                                <img class="sccheduleplusbutton" src="@/assets/accountarrow.png">
												</div>
												<div class="d-md-flex position-absolute" id="sortmenuwrapper">
													<div class="position-absolute sbwrapper b-gray sbhidden bg-white" id="sortmenu" ref="sortmenu">
														<div
														class="sortelem p-2 cursor"
														data-orderby="asc"
														@click="
														PageNow = 1,
														SearchOrderBy = $event.target.dataset.orderby,
														$event.target.parentNode.parentNode.classList.toggle('SortAreaisshow'),
														$event.target.parentNode.parentNode.classList.toggle('SortAreaishidde'),
														this.$refs.sortmenu.classList.toggle('sbshow'),
														this.$refs.sortmenu.classList.toggle('sbhidden'),
														MakeSearchParam()
														"
														>
														昇順
														</div>
														<div
														class="sortelem p-2 cursor"
														data-orderby="desc"
														@click="
														PageNow = 1,
														SearchOrderBy = $event.target.dataset.orderby,
														$event.target.parentNode.parentNode.classList.toggle('SortAreaisshow'),
														$event.target.parentNode.parentNode.classList.toggle('SortAreaishidde'),
														$event.target.parentNode.classList.toggle('sbshow'),
														$event.target.parentNode.classList.toggle('sbhidden'),
														MakeSearchParam()
														"
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
												
												<div :data-cenddate="`${new Date(calculate.MDFI(date, 6)).getFullYear()}/${new Date(calculate.MDFI(date, 6)).getMonth()+1}/${new Date(calculate.MDFI(date, 6)).getDate()}`" id="getCalenderRange">
												</div>
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
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="PagenationArea" class="text-center d-flex position-fixed bg-white z1">
			<div
			class="paginationarea d-flex pt-2 pb-5 col-12 col-lg-4 m-auto float-left"
			>
				<p
				v-for="obj in calculate.MakePagenation(Pjson, PageAmount, PageNow)" :key="obj"
				:id="obj.PId"
				:class="obj.PClass"
				@click="
				PageNow = $event.target.innerText, MakeSearchParam()
				">
				{{obj.PTxt}}
				</p>
			</div>
			<div class="PNwrapper d-inline-block w-100 text-center position-absolute">
				<input type="text" name="PageNationInput" :value="PageNow" id="PageNationInput" @input="PageNationInput" class="mt-0 mb-0 col-2">
			</div>
		</div>
	</div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import CalenderView from '@/components/AfterLogin/parts/Schedule/Calender.vue';
import SPCalenderView from '@/components/AfterLogin/parts/Schedule/SPCalender.vue';
import {GetData} from "@/http";
import {Calculate} from "@/calculate";

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
			onlyint:/^[0-9]*$/,
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
		async MakeSearchParam(){
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

			await http.common(
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
        PageNationInput(e:any){
            var t = e.target as HTMLInputElement;
            if(!this.onlyint.test(t!.innerText.toString())){
                return;
            }
            setTimeout(() => {
                if(t!.value != ''){
                    this.PageNow = Number(t!.value);
                    this.MakeSearchParam();
                }
            }, 500);
        }
	},
	mounted(){
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

<style lang="scss" scoped>
.Carea {
	box-shadow: 0px 0px 3px 0px rgb(0, 0, 0, 0.1);
}
.saturdayBG {
	background: #E8EEFB;
}
.sundayBG {
	background: #FFE5E5;
}
.SuturdayColor {
	color: #0069d9;
}
.SaturdayColor {
	background: rgb(24, 71, 182, 0.1);
	color: #0069d9;
}
.SundayColor {
	background: rgb(255, 183, 90, 0.1);
	color: rgb(255, 183, 90, 1);
}
.YearAreaWrapper{
	background: rgb(0, 0, 0, 0.05);
}
.montharea {
	margin-bottom: 5px;
	border-bottom: solid rgb(0, 0, 0, 0.1) 1px;
}
@media (min-width: 768px){
	.montharea>.cbutton:not(:nth-child(5)) {
		border-right: solid 0.5px rgb(0, 0, 0, 0.1);
	}
	#MyScheduleArea>div>div>div:not(:nth-child(8)) {
		border-right: solid 0.5px #ffff;
	}
	#DayArea>div>div:not(:nth-child(8)), #UserScheduleArea > div > div > div:not(:nth-child(8)) {
		border-right: solid 0.5px rgb(0, 0, 0, 0.1);
	}
	.montharea>.cbutton:nth-child(2) {
		border-left: solid 0.5px rgb(0, 0, 0, 0.1);
	}
}
@media (max-width: 768px){
	#MonthArea{
		border-bottom:solid 0.5px rgb(0, 0, 0, 0.1);
	}
	.montharea>.cbutton:not(:nth-child(1)) {
		border-right: solid 0.5px rgb(0, 0, 0, 0.1);
	}
}
</style>