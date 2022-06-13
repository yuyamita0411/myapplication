<template>
	<div class="shadowwrapper m-auto pl-2 pr-2 pl-lg-0 pr-lg-0">
		<div class="articlewrapper contentwraper w-100 d-inline-block p-3 pl-0 pr-0 mt-3 mb-5">
			<div class="d-inline-block w-100 mb-3 pt-2 pb-2 pl-1 pr-1">
				<div class="sorttask col-12 col-md-auto float-left pl-0 pr-0 mb-2 mb-md-0" id="inchargewrapper">

					<div class="d-inline-block cursor pl-1 pr-1 tooltip-top"
					data-tooltip="担当者でフィルタリング"
					id=""
					@click="
					this.$refs.chooseincharge.classList.toggle('inchargemenuclose'),
					this.$refs.chooseincharge.classList.toggle('inchargemenuopen')
					"
					>
						<img
						class="searchicon d-inline-block"
						src="@/assets/personicon.png"> <small class="" id="selectwhich">{{selectwhich}}</small>
					</div>
					<div class="inchargemenu d-inline-block position-absolute inchargemenuclose"
					ref="chooseincharge">
						<div
						data-incharge=""
						@click="
						this.$refs.chooseincharge.classList.toggle('inchargemenuclose'),
						this.$refs.chooseincharge.classList.toggle('inchargemenuopen'),
						selectwhich = $event.target.innerText,
						incharge = '',
						SearchTask()
						"
						class="w-100 d-inline-block cursor pl-2 inchargeinner"
						ref="incharge"
						>
							すべて
						</div>
						<div
						v-for="eachcdata in companydata" :key="eachcdata"
						:data-incharge="`${eachcdata.id}:${eachcdata.name}`"
						@click="
						this.$refs.chooseincharge.classList.toggle('inchargemenuclose'),
						this.$refs.chooseincharge.classList.toggle('inchargemenuopen'),
						selectwhich = $event.target.innerText,
						incharge = `${eachcdata.id}:${eachcdata.name}`,
						SearchTask()
						"
						class="w-100 d-inline-block cursor pl-2 inchargeinner"
						ref="incharge"
						>
							{{eachcdata.name}}
						</div>
					</div>
				</div>

				<div class="
				sorttask col-12 col-md-6 float-left float-md-right pr-1 pl-1 bg-white
				mb-1 mb-md-0
				BTLR1
				BBLR1
				BTRR1
				BBRR1
				tooltip-top
				"
				data-tooltip="日付でフィルタリング"
				>
					<!--div class="d-flex tablediv bg-white col-12 col-md-5 float-md-left pl-0 b-gray"-->
					<div class="datefilter d-flex sorttaskInput float-left pl-0 pr-0">
						<input class="bgtrans w-100 d-inline-block b-none text-center" name="deadlinebeginyear" type="text" value=""
						ref="deadlinebeginyear"
						placeholder="2022"
						@input="SearchTask()"
						>
						<div class="font-light-gray text-center">
							/
						</div>
						<input class="bgtrans w-100 d-inline-block b-none text-center" name="deadlinebeginmonth" type="text" value=""
						ref="deadlinebeginmonth"
						placeholder="1"
						@input="SearchTask()"
						>
						<div class="font-light-gray text-center">
							/
						</div>
						<input class="bgtrans w-100 d-inline-block b-none text-center" name="deadlinebegindate" type="text" value=""
						ref="deadlinebegindate"
						placeholder="1"
						@input="SearchTask()"
						>
					</div>
					<!--div class="tablediv font-light-gray col-12 col-md-1 float-md-left d-inline-block pl-2"-->
					<div class="sorttaskInput DeleteTfilter font-light-gray float-left d-inline-block pl-1 pr-1 text-center">
						〜
					</div>
					<!--div class="d-flex tablediv bg-white col-12 col-md-5 float-md-left pl-0 b-gray"-->
					<div class="datefilter d-flex sorttaskInput float-left pl-0 pr-0">
						<input class="bgtrans w-100 d-inline-block b-none text-center" name="deadlineendyear" type="text" value=""
						ref="deadlineendyear"
						placeholder="2022"
						@input="SearchTask()"
						>
						<div class="bgtrans font-light-gray text-center">
							/
						</div>
						<input class="bgtrans w-100 d-inline-block b-none text-center" name="deadlineendmonth" type="text" value=""
						ref="deadlineendmonth"
						placeholder="1"
						@input="SearchTask()"
						>
						<div class="bgtrans font-light-gray text-center">
							/
						</div>
						<input class="bgtrans w-100 d-inline-block b-none text-center" name="deadlineenddate" type="text" value=""
						ref="deadlineenddate"
						placeholder="2"
						@input="SearchTask()"
						>
					</div>
					<div class="float-right float-lg-left d-inline-block pl-2 DeleteTfilter">
						<img
						@click="DeleteSsetting"
						class="searchicon cursor p-2 tooltip-top sorttaskInput DeleteTfilter float-left"
						data-tooltip="入力を取り消す"
						id="delete_date_area" src="@/assets/modalclosebutton.png">
					</div>
				</div>

				<div class="d-flex col-12 col-md-3 float-right pr-0 pl-0 ml-0 mr-0 mr-md-3 mb-2 mb-md-0 tooltip-top cursor"
				data-tooltip="タスク名で検索"
				>
					<div class="w-100">
						<div class="searchbarwrapper mt-0">
							<input class="w-100 sorttask bg-white BTLR1
							BBLR1 BTRR1
							BBRR1 b-none float-left pl-2" name="searchTaskTitle"
							placeholder="タスク名" type="text" value=""
							ref="searchTaskTitle"
							@input="SearchTask()"
							>
						</div>
					</div>
					<!--img class="l2rem cursor p-1" src="@/assets/SearchGlassIcon.png"-->
				</div>

			</div>

			<TaskInfoInnerView
			:taskstatus="taskstatus"
			:taskdata="taskdata"
			:modalstatus="modalstatus"
			:loadingstatus="loadingstatus"
			@to-after-login-page="ToAfterLogin"
			/>
			<div id="PagenationArea" class="text-center d-flex position-fixed bg-white z1">
				<div
				class="paginationarea d-flex pt-2 pb-5 col-12 col-lg-4 m-auto float-left"
				>
					<p
					v-for="obj in calculate.MakePagenation(Pjson, PageAmount, PageNow)" :key="obj"
					:id="obj.PId"
					:class="obj.PClass"
					@click="
					PageNow = Number($event.target.innerText), SearchTask()
					">
					{{obj.PTxt}}
					</p>
				</div>
				<div class="PNwrapper d-inline-block w-100 text-center position-absolute">
					<input type="text" name="PageNationInput" :value="PageNow" id="PageNationInput" @input="PageNationInput" class="mt-0 mb-0 col-2">
				</div>
			</div>
		</div>
	</div>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue';
import TaskInfoInnerView from '@/components/AfterLogin/parts/TaskInfo/TaskInfo.vue';
import {GetData} from "@/http";
import {Calculate} from "@/calculate";

export default defineComponent({
	name: 'TaskInfoView',
	components: {
		TaskInfoInnerView
	},
	props:{
		taskstatus:Number
	},
    data() {
        return {
            taskdata:{},
			companydata:[{}],
			PageAmount:0,
			PageNow:1,
			selectwhich:"すべて",
			incharge:"",
			inputdaynow:"",
			Pjson:[{}],
			calculate:new Calculate(),
			http:new GetData(),
			modalstatus:"op0",
			onlyint:/^[0-9]*$/,
			loadingstatus:true,
			nexturlstr:""
        }
    },
	methods:{
		SearchTask(){
			interface TaskObj {
				searchTaskTitle: string;//ok
				deadlinebeginyear: string;
				deadlinebeginmonth: string;
				deadlinebegindate: string;
				deadlineendyear: string;
				deadlineendmonth: string;
				deadlineenddate: string;
				selectincharge: string;//ng
				PageNow:number;
			}

			const searchTaskTitle = this.$refs.searchTaskTitle as HTMLInputElement;
			const deadlinebeginyear = this.$refs.deadlinebeginyear as HTMLInputElement;
			const deadlinebeginmonth = this.$refs.deadlinebeginmonth as HTMLInputElement;
			const deadlinebegindate = this.$refs.deadlinebegindate as HTMLInputElement;
			const deadlineendyear = this.$refs.deadlineendyear as HTMLInputElement;
			const deadlineendmonth = this.$refs.deadlineendmonth as HTMLInputElement;
			const deadlineenddate = this.$refs.deadlineenddate as HTMLInputElement;

			var searchtaskparam: TaskObj = {
				searchTaskTitle: searchTaskTitle.value,
				deadlinebeginyear: deadlinebeginyear.value,
				deadlinebeginmonth: deadlinebeginmonth.value,
				deadlinebegindate: deadlinebegindate.value,
				deadlineendyear: deadlineendyear.value,
				deadlineendmonth: deadlineendmonth.value,
				deadlineenddate: deadlineenddate.value,
				selectincharge: this.incharge,
				PageNow:this.PageNow
			};
			this.modalstatus = "op0";
			this.loadingstatus = true;

			this.http.common(
				"/api/taskinfo",
				searchtaskparam,
				(res:any) => {
					this.taskdata = res.data.taskdata;
					this.PageAmount = res.data.taskdata.Pagecount;
					this.modalstatus = "op1";
					this.loadingstatus = false;
				}
			);

		},
        PageNationInput(e:any){
            var t = e.target as HTMLInputElement;
            if(!this.onlyint.test(t!.innerText.toString())){
                return;
            }
			if(t!.value != ''){
				this.PageNow = Number(t!.value);
				this.SearchTask();
			}
        },
        ToAfterLogin(value:string) {
            this.nexturlstr = value;
			this.$emit('from-taskinfo-vue', this.nexturlstr);
        },
		DeleteSsetting(){
			const deadlinebeginyear = this.$refs.deadlinebeginyear as HTMLInputElement;
			const deadlinebeginmonth = this.$refs.deadlinebeginmonth as HTMLInputElement;
			const deadlinebegindate = this.$refs.deadlinebegindate as HTMLInputElement;
			const deadlineendyear = this.$refs.deadlineendyear as HTMLInputElement;
			const deadlineendmonth = this.$refs.deadlineendmonth as HTMLInputElement;
			const deadlineenddate = this.$refs.deadlineenddate as HTMLInputElement;
			deadlinebeginyear.value = "";
			deadlinebeginmonth.value = "";
			deadlinebegindate.value = "";
			deadlineendyear.value = "";
			deadlineendmonth.value = "";
			deadlineenddate.value = "";
			this.SearchTask();
		}
	},
    mounted(){
        this.http.common(
            "/api/taskinfo",
            {"searchTaskTitle":""},
            (res:any) => {
				this.companydata = res.data.companydata;
                this.taskdata = res.data.taskdata;
				this.PageAmount = res.data.taskdata.Pagecount;
				this.modalstatus = "op1";
				this.loadingstatus = false;
            }
        );
    }
});
</script>

<style lang="scss" scoped>
.sorttask{
	height:2rem;
	line-height:2rem;
}
.sorttaskInput{
	height: calc(2rem - 1px);
	line-height: calc(2rem - 1px);
}
.DeleteTfilter{
	width:calc(2rem - 1px);
}
.datefilter{
	width:calc((100% - 4rem + 2px) / 2);
}
.bgtrans{
	background:transparent;
}
.inchargemenu{
	min-width:10rem;
}
</style>