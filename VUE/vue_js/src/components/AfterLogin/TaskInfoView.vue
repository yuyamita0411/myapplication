<template>
	<div class="shadowwrapper m-auto pl-2 pr-2 pl-lg-0 pr-lg-0">
		<div class="contentwraper w-100 d-inline-block pt-3 pb-5 pl-0 pr-0 mt-3">
			<h5 class="mainfontcolor mb-3 w-100 d-inline-block">タスクを検索</h5>
			<div class="d-inline-block w-100 overflow-hidden" method="get">
				<div class="mb-3 w-100 d-inline-block">
					<div class="tablediv tabledivleft col-6 col-md-6 float-left pl-2">
						担当者名
					</div>
					<div class="tablediv bg-white col-6 col-md-6 float-right pl-0 pr-0" id="inchargewrapper">
						<div class="w-100 d-inline-block cursor text-white pl-2"
						id="selectincharge"
						@click="
						this.$refs.chooseincharge.classList.toggle('inchargemenuclose'),
						this.$refs.chooseincharge.classList.toggle('inchargemenuopen')
						"
						>
							担当者を選択する <small class="text-white" id="selectwhich">{{selectwhich}}</small>
						</div>
						<div class="inchargemenu w-100 d-inline-block position-absolute inchargemenuclose"
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
				</div>
				<div class="mb-3 w-100 d-inline-block">
					<div class="d-flex tablediv bg-white col-12 col-md-5 float-md-left mb-4 pl-0">
						<input class="w-100 d-inline-block" name="deadlinebeginyear" type="text" value=""
						ref="deadlinebeginyear"
						@input="SearchTask()"
						>
						<div class="text-center">
							年
						</div>
						<input class="w-100 d-inline-block" name="deadlinebeginmonth" type="text" value=""
						ref="deadlinebeginmonth"
						@input="SearchTask()"
						>
						<div class="text-center">
							月
						</div>
						<input class="w-100 d-inline-block" name="deadlinebegindate" type="text" value=""
						ref="deadlinebegindate"
						@input="SearchTask()"
						>
						<div class="text-center">
							日
						</div>
					</div>
					<div class="tablediv col-12 col-md-1 float-md-left d-inline-block pl-2">
						〜
					</div>
					<div class="d-flex tablediv bg-white col-12 col-md-5 float-md-left mb-4 pl-0">
						<input class="w-100 d-inline-block" name="deadlineendyear" type="text" value=""
						ref="deadlineendyear"
						@input="SearchTask()"
						>
						<div class="text-center">
							年
						</div>
						<input class="w-100 d-inline-block" name="deadlineendmonth" type="text" value=""
						ref="deadlineendmonth"
						@input="SearchTask()"
						>
						<div class="text-center">
							月
						</div>
						<input class="w-100 d-inline-block" name="deadlineenddate" type="text" value=""
						ref="deadlineenddate"
						@input="SearchTask()"
						>
						<div class="text-center">
							日
						</div>
					</div>
					<div class="float-right float-lg-left d-inline-block pl-2">
						<img class="searchicon cursor mt-1 p-1 tooltip-top"
						data-tooltip="入力を取り消す"
						id="delete_date_area" src="@/assets/modalclosebutton.png">
					</div>
				</div>
				<div class="mb-3 d-flex w-100">
					<div class="pr-3 w-100">
						<div class="searchbarwrapper mt-0">
							<input class="w-100 searchbar bg-brightgray border-top-left-radius-1rem
							border-bottom-left-radius-1rem border-top-right-radius-1rem
							border-bottom-right-radius-1rem b-none float-left pl-2" name="searchTaskTitle"
							placeholder="キーワードを入力してください。" type="text" value=""
							ref="searchTaskTitle"
							@input="SearchTask()"
							>
						</div>
					</div>
					<img class="searchicon cursor" src="@/assets/SearchGlassIcon.png">
				</div>
			</div>
			
			<TaskInfoInnerView
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
import { defineComponent } from 'vue';
import TaskInfoInnerView from '@/components/AfterLogin/parts/TaskInfo/TaskInfo.vue';
import {GetData} from "@/http";
import {Calculate} from "@/calculate";

export default defineComponent({
	name: 'TaskInfoView',
	components: {
		TaskInfoInnerView
	},
    data() {
        return {
            taskdata:{},
			companydata:[{}],
			PageAmount:0,
			PageNow:1,
			selectwhich:"",
			incharge:"",
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
			console.log(searchtaskparam);

			this.http.common(
				"/api/taskinfo",
				searchtaskparam,
				(res:any) => {
					this.taskdata = res.data.taskdata;
					this.PageAmount = res.data.taskdata.Pagecount;
					this.modalstatus = "op1";
					this.loadingstatus = false;
					console.log(res);
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
                    this.SearchTask();
                }
            }, 500);
        },
        ToAfterLogin(value:string) {
            this.nexturlstr = value;
			this.$emit('from-taskinfo-vue', this.nexturlstr);
        }
	},
    mounted(){
        this.http.common(
            "/api/taskinfo",
            {"searchTaskTitle":""},
            (res:any) => {
				console.log(res);
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

</style>