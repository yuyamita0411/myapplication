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
									<div class="font1-3 d-inline-block mr-3 cursor" id="YearArea">
										2022
									</div><input class="searchbar border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2 mt-0" id="SearchCbyWord" name="SearchCbyWord" placeholder="担当者名から検索" type="text"> <input class="col-1 ml-2 searchbar border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2 mt-0" id="PerPageArea" name="PerPage" placeholder="表示件数" type="text">
								</div>
								<div class="font1-3 d-inline-block w-100 cursor month_menu_closed" id="MonthMenuArea"></div>
								<div class="w-100 d-md-flex">
									<div class="Carea d-inline-block w-100">
										<div class="montharea d-md-flex w-100 mb-0">
											<div class="text-center w-100 d-flex pr-2" id="MonthArea">
												<div class="d-inline-block cursor pt-2 pb-2 text-left pl-2" data-forcommondate="2022/5/12" id="MonthButton">
													5月
												</div>
											</div>
											<div class="cbutton tooltip-top d-inline-block text-center cursor col-auto pl-0 pr-0 font12" data-tooltip="7日前" id="prev7">
												◀︎◀︎
											</div>
											<div class="cbutton tooltip-top d-inline-block text-center cursor col-auto pl-0 pr-0 font12" data-tooltip="1日前" id="prev">
												◀︎
											</div>
											<div class="cbutton tooltip-top d-inline-block text-center cursor col-auto pl-0 pr-0 font12" data-tooltip="1日後" id="next">
												▶︎
											</div>
											<div class="cbutton tooltip-top d-inline-block text-center cursor col-auto pl-0 pr-0 font12" data-tooltip="7日後" id="next7">
												▶︎▶︎
											</div>
										</div>
										<div class="mt-0" id="DayArea">
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
												<div class=" w-100 text-center pt-2 pb-2 font12" data-cstartdate="2022/5/9" data-forcommondate="2022/5/9" id="CFirstDate">
													9(月)
												</div>
												<div class=" w-100 text-center pt-2 pb-2 font12" data-forcommondate="2022/5/10">
													10(火)
												</div>
												<div class=" w-100 text-center pt-2 pb-2 font12" data-forcommondate="2022/5/11">
													11(水)
												</div>
												<div class=" w-100 text-center pt-2 pb-2 font12" data-forcommondate="2022/5/12">
													12(木)
												</div>
												<div class=" w-100 text-center pt-2 pb-2 font12" data-forcommondate="2022/5/13">
													13(金)
												</div>
												<div class="SaturdayColor w-100 text-center pt-2 pb-2 font12" data-forcommondate="2022/5/14">
													14(土)
												</div>
												<div class="SundayColor w-100 text-center pt-2 pb-2 font12" data-forcommondate="2022/5/15">
													15(日)
												</div>
												<div data-cenddate="2022/5/15" id="getCalenderRange"></div>
											</div>
										</div>
									</div>
								</div>
								<div id="ScheduleWrapper">
									<div class="position-absolute h-100 w-100 bg-white loadinghidden" id="ScheduleLoadingArea"></div>
									<div class="myschedulearea" id="MyScheduleArea"></div>
									<div class="schedulearea" id="UserScheduleArea">
										<div data-nameidforsort="名前1-6">
											<div class="d-flex">
												<div class="w-100 d-inline-block text-center pt-2 pb-2">
													<div class="d-inline-block mt-3">
														<img class="searchicon" src="@/assets/personicon.png"> 名前1
													</div>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/9" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/10" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/11" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/12" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/13" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/14" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="6" data-setscheduleinfo="2022/5/15" data-tooltip="スケジュールを追加する" id="ScheduleId-6" type="button"></button>
												</div>
											</div>
										</div>
										<div data-nameidforsort="名前1-16">
											<div class="d-flex">
												<div class="w-100 d-inline-block text-center pt-2 pb-2">
													<div class="d-inline-block mt-3">
														<img class="searchicon" src="@/assets/personicon.png"> 名前1
													</div>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/9" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/10" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/11" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/12" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/13" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/14" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="16" data-setscheduleinfo="2022/5/15" data-tooltip="スケジュールを追加する" id="ScheduleId-16" type="button"></button>
												</div>
											</div>
										</div>
										<div data-nameidforsort="名前1-26">
											<div class="d-flex">
												<div class="w-100 d-inline-block text-center pt-2 pb-2">
													<div class="d-inline-block mt-3">
														<img class="searchicon" src="@/assets/personicon.png"> 名前1
													</div>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/9" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/10" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/11" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/12" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/13" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/14" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="26" data-setscheduleinfo="2022/5/15" data-tooltip="スケジュールを追加する" id="ScheduleId-26" type="button"></button>
												</div>
											</div>
										</div>
										<div data-nameidforsort="名前1-36">
											<div class="d-flex">
												<div class="w-100 d-inline-block text-center pt-2 pb-2">
													<div class="d-inline-block mt-3">
														<img class="searchicon" src="@/assets/personicon.png"> 名前1
													</div>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/9" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/10" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/11" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/12" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/13" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/14" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="36" data-setscheduleinfo="2022/5/15" data-tooltip="スケジュールを追加する" id="ScheduleId-36" type="button"></button>
												</div>
											</div>
										</div>
										<div data-nameidforsort="名前1-54">
											<div class="d-flex">
												<div class="w-100 d-inline-block text-center pt-2 pb-2">
													<div class="d-inline-block mt-3">
														<img class="searchicon" src="@/assets/personicon.png"> 名前1
													</div>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/9" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/10" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/11" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/12" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/13" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/14" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
												</div>
												<div class="w-100 d-inline-block pt-2 pb-2 position-relative">
													<button class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0" data-buttonuserid="54" data-setscheduleinfo="2022/5/15" data-tooltip="スケジュールを追加する" id="ScheduleId-54" type="button"></button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="paginationarea d-flex pt-4 col-12 col-lg-4 m-auto" id="PagenationArea">
									<p class="pagenationnum PageNow PageNationNum cursor w-100 text-center p-1" id="">1</p>
									<p class="pagenationnum PageNationNum cursor w-100 text-center p-1" id="">2</p>
									<p class="pagenationnum PageNationNum cursor w-100 text-center p-1" id="">3</p>
									<p class="pagenationnum PageNationNum cursor w-100 text-center p-1" id="">...</p>
									<p class="pagenationnum PageNationNum cursor w-100 text-center p-1" id="PageLastNum">39</p><input class="mt-0 mb-0 col-2" id="PageNationInput" name="PageNationInput" type="text" value="1">
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

export default defineComponent({
  name: 'ScheduleView',
  props: {
    msg: String,
  },
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