<template>
	<div class="shadowwrapper m-auto pl-2 pr-2 pl-lg-0 pr-lg-0">
		<div class="contentwraper w-100 d-inline-block pb-4 pl-0 pr-0">
			<h5 class="mainfontcolor w-100">グループを検索</h5>
			<form action="" class="w-100 mb-3 d-inline-block" method="get">
				<div class="searchbarwrapper w-100 mt-0 d-flex">
					<input class="w-100 mr-3 searchbar bg-brightgray BTLR1 BBLR1 BTRR1 BBRR1 b-none float-left pl-2"
					id="searchGroupInfo"
					name="searchGroupInfo"
					placeholder="キーワードを入力してください。"
					type="text">
					<!--input class="searchicon" src="@/assets/microscopeicon.png" type="image" value="検索"-->
					<img class="searchicon" src="@/assets/SearchGlassIcon.png">
				</div>
			</form>
			<div class="w-100 pb-3 pl-0 pr-0 bg-white d-inline-block" id="AddressArea">
				<div class="col-12 col-lg-6 float-lg-left pr-0 pl-0 mb-2">
					<div class="w-100 pr-0 pl-0 pl-lg-1 float-lg-left">
						<small class="position-absolute pr-2 pl-2 bgmain text-white">グループ名2</small>
						<div class="b-gray w-100 pt-3 pt-lg-4">
							<div class="text-center">
								<div class="pt-0 pr-2 pl-2 pb-0 pt-md-1 float-md-left text-center text-md-right col-12 col-md-6">
									<small class="font18">管理者</small>
								</div>
								<p class="font-gray font18 pt-md-1 font-weight-bold text-center text-md-left float-md-right col-12 col-md-6 pr-0 pl-0 mb-0">ユーザー名3</p>
							</div>
							<div class="text-center">
								<div class="pt-0 pr-2 pl-2 pb-0 pt-md-0 float-md-left text-center text-md-right col-12 col-md-6">
									<small class="font12">作成日時</small>
								</div>
								<p class="font-gray font12 font-weight-bold text-center text-md-left float-md-right col-12 col-md-6 pr-0 pl-0 mb-0">2020-02-06 00:00:00</p>
							</div>
							<div class="bg-check gridinside w-100 pt-2 pb-2 pl-0 pr-0 mt-3 d-inline-block">
								<div class="">
									<div class="buttonicon tooltip-top p-2 float-right" data-tooltip="グループを編集する">
										<div class="w-100 font-weight-bold cursor br-50 bg-white"><img class="d-inline-block w-100 p-2" id="EditButton-2" src="@/assets/editicon.png"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-6 float-lg-left pr-0 pl-0 mb-2">
					<div class="w-100 pr-0 pl-0 pl-lg-1 float-lg-left">
						<small class="position-absolute pr-2 pl-2 bgmain text-white">グループ名4</small>
						<div class="b-gray w-100 pt-3 pt-lg-4">
							<div class="text-center">
								<div class="pt-0 pr-2 pl-2 pb-0 pt-md-1 float-md-left text-center text-md-right col-12 col-md-6">
									<small class="font18">管理者</small>
								</div>
								<p class="font-gray font18 pt-md-1 font-weight-bold text-center text-md-left float-md-right col-12 col-md-6 pr-0 pl-0 mb-0">ユーザー名5</p>
							</div>
							<div class="text-center">
								<div class="pt-0 pr-2 pl-2 pb-0 pt-md-0 float-md-left text-center text-md-right col-12 col-md-6">
									<small class="font12">作成日時</small>
								</div>
								<p class="font-gray font12 font-weight-bold text-center text-md-left float-md-right col-12 col-md-6 pr-0 pl-0 mb-0">2020-02-06 00:00:00</p>
							</div>
							<div class="bg-check gridinside w-100 pt-2 pb-2 pl-0 pr-0 mt-3 d-inline-block">
								<div class="">
									<div class="buttonicon tooltip-top p-2 float-right" data-tooltip="グループを編集する">
										<div class="w-100 font-weight-bold cursor br-50 bg-white"><img class="d-inline-block w-100 p-2" id="EditButton-4" src="@/assets/editicon.png"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-6 float-lg-left pr-0 pl-0 mb-2">
					<div class="w-100 pr-0 pl-0 pl-lg-1 float-lg-left">
						<small class="position-absolute pr-2 pl-2 bgmain text-white">グループ名6</small>
						<div class="b-gray w-100 pt-3 pt-lg-4">
							<div class="text-center">
								<div class="pt-0 pr-2 pl-2 pb-0 pt-md-1 float-md-left text-center text-md-right col-12 col-md-6">
									<small class="font18">管理者</small>
								</div>
								<p class="font-gray font18 pt-md-1 font-weight-bold text-center text-md-left float-md-right col-12 col-md-6 pr-0 pl-0 mb-0">ユーザー名2</p>
							</div>
							<div class="text-center">
								<div class="pt-0 pr-2 pl-2 pb-0 pt-md-0 float-md-left text-center text-md-right col-12 col-md-6">
									<small class="font12">作成日時</small>
								</div>
								<p class="font-gray font12 font-weight-bold text-center text-md-left float-md-right col-12 col-md-6 pr-0 pl-0 mb-0">2020-02-06 00:00:00</p>
							</div>
							<div class="bg-check gridinside w-100 pt-2 pb-2 pl-0 pr-0 mt-3 d-inline-block">
								<div class="">
									<div class="buttonicon tooltip-top p-2 float-right" data-tooltip="グループを編集する">
										<div class="w-100 font-weight-bold cursor br-50 bg-white"><img class="d-inline-block w-100 p-2" id="EditButton-6" src="@/assets/editicon.png"></div>
									</div>
									<div class="buttonicon tooltip-top p-2 float-right" data-tooltip="グループを削除する">
										<div class="w-100 font-weight-bold cursor br-50 bg-white"><img class="d-inline-block w-100 p-2" id="ModalOpenButton-6" src="@/assets/TrashIcon.png"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-6 float-lg-left pr-0 pl-0 mb-2">
					<div class="w-100 pr-0 pl-0 pl-lg-1 float-lg-left">
						<small class="position-absolute pr-2 pl-2 bgmain text-white">グループ名8</small>
						<div class="b-gray w-100 pt-3 pt-lg-4">
							<div class="text-center">
								<div class="pt-0 pr-2 pl-2 pb-0 pt-md-1 float-md-left text-center text-md-right col-12 col-md-6">
									<small class="font18">管理者</small>
								</div>
								<p class="font-gray font18 pt-md-1 font-weight-bold text-center text-md-left float-md-right col-12 col-md-6 pr-0 pl-0 mb-0">ユーザー名4</p>
							</div>
							<div class="text-center">
								<div class="pt-0 pr-2 pl-2 pb-0 pt-md-0 float-md-left text-center text-md-right col-12 col-md-6">
									<small class="font12">作成日時</small>
								</div>
								<p class="font-gray font12 font-weight-bold text-center text-md-left float-md-right col-12 col-md-6 pr-0 pl-0 mb-0">2020-02-06 00:00:00</p>
							</div>
							<div class="bg-check gridinside w-100 pt-2 pb-2 pl-0 pr-0 mt-3 d-inline-block">
								<div class="">
									<div class="buttonicon tooltip-top p-2 float-right" data-tooltip="グループを編集する">
										<div class="w-100 font-weight-bold cursor br-50 bg-white"><img class="d-inline-block w-100 p-2" id="EditButton-8" src="@/assets/editicon.png"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-6 float-lg-left pr-0 pl-0 mb-2">
					<div class="w-100 pr-0 pl-0 pl-lg-1 float-lg-left">
						<small class="position-absolute pr-2 pl-2 bgmain text-white">グループ名10</small>
						<div class="b-gray w-100 pt-3 pt-lg-4">
							<div class="text-center">
								<div class="pt-0 pr-2 pl-2 pb-0 pt-md-1 float-md-left text-center text-md-right col-12 col-md-6">
									<small class="font18">管理者</small>
								</div>
								<p class="font-gray font18 pt-md-1 font-weight-bold text-center text-md-left float-md-right col-12 col-md-6 pr-0 pl-0 mb-0">ユーザー名1</p>
							</div>
							<div class="text-center">
								<div class="pt-0 pr-2 pl-2 pb-0 pt-md-0 float-md-left text-center text-md-right col-12 col-md-6">
									<small class="font12">作成日時</small>
								</div>
								<p class="font-gray font12 font-weight-bold text-center text-md-left float-md-right col-12 col-md-6 pr-0 pl-0 mb-0">2020-02-06 00:00:00</p>
							</div>
							<div class="bg-check gridinside w-100 pt-2 pb-2 pl-0 pr-0 mt-3 d-inline-block">
								<div class="">
									<div class="buttonicon tooltip-top p-2 float-right" data-tooltip="グループを編集する">
										<div class="w-100 font-weight-bold cursor br-50 bg-white"><img class="d-inline-block w-100 p-2" id="EditButton-10" src="@/assets/editicon.png"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="w-100 d-inline-block">
				<div class="col-10 col-md-6 col-lg-4 d-flex m-auto">
					<div class="w-100 float-left" id="PageNationNumArea">
						<nav>
							<ul class="pagination">
								<li aria-disabled="true" aria-label="« Previous" class="page-item disabled"><span aria-hidden="true" class="page-link">‹</span></li>
								<li class="page-item active"><span class="page-link">1</span></li>
								<li class="page-item">
									<a class="page-link" href="https://localhost:8081/groupinfo?page=2">2</a>
								</li>
								<li class="page-item">
									<a aria-label="Next »" class="page-link" href="https://localhost:8081/groupinfo?page=2" rel="next">›</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'GroupInfoView',
  props: {
    msg: String,
  },
});
</script>