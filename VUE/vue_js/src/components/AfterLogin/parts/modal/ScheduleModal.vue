<template>
    <div id="ScheduleModalcover" class="position-fixed cursor ScheduleModalcoverclose"
	@click="ModalMotion">
    </div>
    <div id="ScheduleModal" class="position-fixed pr-0 mb-0 bg-white ScheduleModalclose">
		<div class="modalinnerwrapper overflow-hidden">
			<div class="modalinnercover d-flex position-relative" id="">
				<div class="Modal1 col-12 p-3 bg-white" id="">
					<div class="w-100 d-inline-block pt-3 pb-3 pl-0 pr-0 bg-white pb-3">
						<div class="col-12 pr-0 pl-0 bg-white" id="">
							<div class="">
								<div class="w-100 d-inline-block text-center">
									<h3 class="notificationtitle font-weight-bold pt-4 pb-2 mb-0 m-auto" id="">{{modaltitle}}</h3>
								</div>
							</div>
							<div class="m-auto" id="">
								<p class="col-12">{{ScheduleTagData.startdate}}</p>
								<div class="col-12 d-flex">
									<img
									class="searchicon cursor p-1 mr-3 tooltip-top"
									data-tooltip="時刻を設定する"
									src="@/assets/timeicon.png">
									<div class="w-100 text-center pr-2 position-relative">
										<div
										@click="OpenScheduleStartTime"
										class="starthour buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor" id="">
											{{sstime}}
										</div>
										<div class="Scaccordion position-absolute bg-white menuhide zm1 gridinside" id="">
											<div
											@click="GetSStartTime"
											v-for="i in 12" :key="i"
											class="starthourmenubutton Sbutton w-100 d-inline-block cursor bb" data-makeour="0">{{ReturnDMFormat(i)}}</div>
										</div>
									</div>
									<div class="buttonicon text-center pr-2">
										:
									</div>
									<div class="w-100 text-center pr-2 position-relative">
										<div
										@click="OpenScheduleStartMinute"
										class="startminute buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor" id="">
											{{ssminute}}
										</div>
										<div class="Scaccordion position-absolute bg-white menuhide zm1 gridinside" id="">
											<div
											@click="GetSStartMinute"
											v-for="i in 59" :key="i"
											class="startminutemenubutton Sbutton w-100 d-inline-block cursor bb" data-makeour="0">{{ReturnDMFormat(i)}}</div>
										</div>
									</div>
									<div class="buttonicon text-center">
										~
									</div>
									<div class="w-100 text-center pl-2 position-relative">
										<div
										@click="OpenScheduleEndTime"
										class="endhour buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor" id="">
											{{sendtime}}
										</div>
										<div class="Scaccordion position-absolute bg-white menuhide zm1 gridinside" id="">
											<div
											@click="GetSendTime"
											v-for="i in 12" :key="i"
											class="starthourmenubutton Sbutton w-100 d-inline-block cursor bb" data-makeour="0">{{ReturnDMFormat(i)}}</div>
										</div>
									</div>
									<div class="buttonicon text-center pl-2">
										:
									</div>
									<div class="w-100 text-center pl-2 position-relative">
										<div
										@click="OpenScheduleEndMinute"
										class="endminute buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor" id="">
											{{sendminute}}
										</div>
										<div class="Scaccordion position-absolute bg-white menuhide zm1 gridinside" id="">
											<div
											@click="GetSendMinute"
											v-for="i in 59" :key="i"
											class="startminutemenubutton Sbutton w-100 d-inline-block cursor bb" data-makeour="0">{{ReturnDMFormat(i)}}</div>
										</div>
									</div>
								</div>
								<span class="d-inline-block w-100 text-center red mt-3" id=""></span>
								<div class="schedulemodal position-relative d-inline-block col-12">
									<div class="d-inline-block mt-5 w-100">
										<small class="red" id=""></small>
									</div>
									<input
									class="w-100 searchbar bg-brightgray mb-3 border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2"
									name="schedulename"
									placeholder="タイトルを入力してください"
									type="text"
									:value="addscheduletitle"
									@input="InputTitle"
									>
									<div class="d-inline-block w-100">
										<small class="red" id=""></small>
									</div>
									<textarea class="w-100 searchbar bg-brightgray mb-3 border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2"
									name="scheduledisc"
									placeholder="概要を入力してください"
									:value="addscheduledescription"
									@input="InputDescription"
									>
									</textarea>
								</div>
								<h5 class="mainfontcolor col-12 pt-4 pb-1 mb-2">
                                メンバーを追加する
								<small class="red" id="">
                                </small></h5>
<!-- クリックされるごとに追加される -->
                                <div id="AddedMember" class="col-12 mb-0 d-inline-block">
                                    <div
                                    @click="DeleteUserFromResult"
                                    v-for="eachadded in addmember" :key="eachadded.id"
                                    :class="`${eachadded.id ? 'addeduserbuton d-inline-block float-left pt-1 pb-1 pr-2 pl-2 text-white mb-2 mr-2 cursor br5px' : 'd-none'}`"
                                    :data-addeduserid="eachadded.id">
                                        {{eachadded.name}}
                                    </div>
                                </div>
<!-- クリックされるごとに追加される -->
								<div class=" col-md-12 m-auto pb-3 pl-0 pr-0 bg-white d-flex">
									<div class="col-12 pb-1 m-auto" id="">
										<div class=" w-100 d-inline-block pb-3 pl-0 pr-0 bg-white">
											<div class="w-100 pb-1 m-auto">
												<div class="d-inline-block w-100 mb-3 pl-0 pr-0">
													<div class="searchbarwrapper d-inline-block w-100 mt-0">
														<input
														@input="SearchMember"
														@focus="SearchResultFocus"
														@blur="SearchResultBlur"
														class="w-100 searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2"
														:data-userid="ScheduleTagData.userid"
														id=""
														name="addgroupmember"
														placeholder="ユーザー名を入力してください。"
														type="text"
                                                        :value="searchuserval"
                                                        >
													</div>
												</div>
											</div>
											<div id="" :class="`searchresultarea ${searchareashow}`">
												<LoginIconview v-if="loadingstatus == true" class="Scheduleloading" />
												<div
                                                @click="AddUserFromResult"
												v-for="EUobj in searchuser" :key="EUobj.id"
												:data-id="EUobj.id"
												:data-name="EUobj.name"
												:data-mailaddress="EUobj.mail_address"
												:class="`${addmemberid.indexOf(EUobj.id.toString()) != -1 ? 'inportbutton' : 'adduserbuton'} d-inline-block float-left pt-1 pb-1 pr-2 pl-2 text-white mb-2 mr-2 cursor br5px`">
												{{EUobj.name}}
												</div>
											</div>
										</div>
									</div>
								</div>
<!-- 条件分岐 -->
                                <div
                                v-if="ScheduleTagData.alreadyaddeduser"
                                id="" class="col-12 mb-0 d-inline-block">
                                    <h5 class="mainfontcolor w-100 pt-4 pb-1 mb-2">既に追加されたメンバー</h5>
                                    <div
                                    v-for="eachuserinfo in ScheduleTagData.alreadyaddeduser" :key="eachuserinfo.id"
                                    class="alreadyadded addeduserbuton d-inline-block float-left pt-1 pb-1 pr-2 pl-2 text-white mb-2 mr-2 cursor br5px" data-addeduserid="6">
                                        {{eachuserinfo.name}}
                                    </div>
                                </div>
<!-- 条件分岐 -->
							</div>
						</div>
					</div>
				</div>
				<div class="Modal2 col-12 pl-0 pr-0 position-relative bg-white" id="">
					<div class="m-auto h-100 bg-white">
						<div class="">
							<div class="w-100 d-inline-block text-center">
								<h3 class="notificationtitle font-weight-bold pt-4 pb-2 mb-0 m-auto" id="">完了</h3>
							</div>
						</div>
						<div class=" col-md-12 m-auto pt-3 pb-3 pl-0 pr-0 bg-white">
							<h5 class="mainfontcolor shadowtext col-12 pt-1 pb-1 mb-0" id="">スケジュールを追加しました。</h5>
							<div class="col-12 pt-1 pb-1 mb-0" id="">
								完了
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!--モーダルのメニューは固定する-->
        <div id="modalmenuwapper" class="modalinnerwrapper overflow-hidden">
            <div id="" class="modalinnercover d-flex position-relative">
                <div class=" modalfinishbuttonwrapper col-12 mb-0 pt-0 pb-0 pl-0 pr-0 bg-white">
                    <div class="bgstripe45deg  col-12 m-auto pt-0 pb-0 pt-md-3 pb-md-3 pl-0 pr-0">
                        <div class="buttonarea d-flex m-auto">
                            <div id="ScheduleModalclosebutton" class="buttonicon margin-right-two p-2">
                                <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                    <img
									@click="ModalMotion"
									id=""
									src="@/assets/modalclosebutton.png" class="d-inline-block w-100 p-2">
                                </div>
                            </div>
                            <div id="" class="buttonicon p-2">
                                <div class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold cursor br-50 line-3rem">
                                    <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                        <div
										@click="AddSchedule"
										id=""
										class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold cursor br-50 line-3rem">
										確認
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modalfinishbuttonwrapper col-12 mb-0 pt-0 pb-0 pl-0 pr-0 bg-white">
                    <div class="bgstripe45deg  col-12 m-auto pt-0 pb-0 pt-md-3 pb-md-3 pl-0 pr-0">
                        <div class="">
                            <div id="" class="buttonicon p-2 m-auto">
                                <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                    <img src="" class="d-inline-block w-100 p-2">
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
import { Component, Prop, Vue } from 'vue-property-decorator';
import router from '../../../../router'
import http from "@/views/ts/http";
import {GetData} from "../../../../http";
import LoginIconview from '@/components/common/LoadingIcon.vue';

export default defineComponent({
    name: 'ScheduleModal',
    data() {
        return {
            sstime:"09",
			ssminute:"00",
			sendtime:"10",
			sendminute:"00",
			addscheduletitle:"",
			addscheduledescription:"",
			searchuser:[],
			loadstatus:"op0",
			searchareashow:"",
			loadingstatus:false,
            alreadyaddedmember:[{}],
            addmember:[{}],
			addmemberid:[""],
            searchuserval:""
        };
    },

	props:{
		ScheduleTagData:Object,
		modaltitle:String
	},
	components:{
		LoginIconview
	},
	methods:{
        addfriends_modal_close(){
            this.$emit('close-addfriends-modal-class', "ScheduleModalclose");
		},
		ModalMotion(){
            this.sstime = "09";
			this.ssminute = "00";
			this.sendtime = "10";
			this.sendminute = "00";

			this.addscheduledescription = "";
			this.addmember = [];
			this.addmemberid = [];
			this.searchuser = [];
            this.searchuserval = "";
            document.getElementById('ScheduleModalcover')!.classList.add('ScheduleModalcoverclose');
            document.getElementById('ScheduleModalcover')!.classList.remove('ScheduleModalcoveropen');
            document.getElementById('ScheduleModal')!.classList.add('ScheduleModalclose');
            document.getElementById('ScheduleModal')!.classList.remove('ScheduleModalopen');
            document.querySelectorAll('.Scaccordion').forEach((obj) => {
                obj.classList.add('zm1');
                obj.classList.remove('z1');
                obj.classList.add('menuhide');
                obj.classList.remove('menushow');
            });
		},

		TmodalMotion(e:any){
			var t = e.target as HTMLElement;
			t.nextElementSibling!.classList.toggle("z1");
			t.nextElementSibling!.classList.toggle("menushow");
			t.nextElementSibling!.classList.toggle("zm1");
			t.nextElementSibling!.classList.toggle("menuhide");
		},
		TmodalParentMotion(e:any){
			var t = e.target as HTMLElement;
			t.closest('.Scaccordion')!.classList.toggle('z1');
			t.closest('.Scaccordion')!.classList.toggle('menushow');
			t.closest('.Scaccordion')!.classList.toggle('zm1');
			t.closest('.Scaccordion')!.classList.toggle('menuhide');
		},
        ReturnDMFormat(str:string){
            if (str.toString().length == 1) {
                str = "0" + str;
            }
            return str;
        },
		OpenScheduleStartTime(e:any){
			this.TmodalMotion(e);
		},
		OpenScheduleStartMinute(e:any){
			this.TmodalMotion(e);
		},
		OpenScheduleEndTime(e:any){
			this.TmodalMotion(e);
		},
		OpenScheduleEndMinute(e:any){
			this.TmodalMotion(e);
		},

		GetSStartTime(e:any){
			var t = e.target as HTMLElement;
            this.sstime = t.innerText;
			this.TmodalParentMotion(e);
		},
		GetSStartMinute(e:any){
			var t = e.target as HTMLElement;
			this.ssminute = t.innerText;
			this.TmodalParentMotion(e);
		},
		GetSendTime(e:any){
			var t = e.target as HTMLElement;
			this.sendtime = t.innerText;
			this.TmodalParentMotion(e);
		},
		GetSendMinute(e:any){
			var t = e.target as HTMLElement;
			this.sendminute = t.innerText;
			this.TmodalParentMotion(e);
		},
		InputTitle(e:any){
			var t = e.target as HTMLInputElement;
			this.addscheduletitle = t.value;
		},
		InputDescription(e:any){
			var t = e.target as HTMLInputElement;
			this.addscheduledescription = t.value;
		},

		SearchMember(e:any){
			var t = e.target as HTMLInputElement;
            const http = new GetData();
            this.loadingstatus = true;
            this.loadstatus = 'op0';
            this.searchuserval = t.value;
            http.common(
                "/api/schedule/search",
                {"addgroupmember": t.value},
                (res:any) => {
					this.searchuser = res.data;

                    //読み込みが完全に終わってからカバーを外す
                    this.loadingstatus = false;
                    this.loadstatus = 'op1';
                }
            );
		},
		SearchResultFocus(){
			this.searchareashow = "setSareaheight";
		},
		SearchResultBlur(){
			this.searchareashow = "";
		},
        AddUserFromResult(e:any){
			const id:string = e.target.dataset.id;
			const name:string = e.target.dataset.name;
			const mailaddress:string = e.target.dataset.mailaddress;
            //既に追加されたユーザーは追加できないようにする処理
            if(this.addmemberid.indexOf(id) == -1){

				interface MemberDataObj {
					id: string;
					name: string;
					mailaddress: string;
				}

				if(name){
					const addmemberobj: MemberDataObj = {
						id: id,
						name: name,
						mailaddress: mailaddress,
					};
					this.addmember.push(addmemberobj);
					//追加済みか否かを後ほどチェックするため。
					this.addmemberid.push(id);
				}

            }
        },
        DeleteUserFromResult(e:any){
			var newarr:{id:string, name:string, mailaddress:string}[] = [];
			var newarrforcheck:string[] = [];
            this.addmember.forEach((ob:any) => {
				var uid:number = e.target.dataset.addeduserid;
                if(uid != ob.id){
                    newarr.push(ob);
                    newarrforcheck.push(ob.id);
                }
            });
			console.log(newarr);
            this.addmember = newarr;
            this.addmemberid = newarrforcheck;
        },
		AddSchedule(){
            //バリデーションの処理
			//バックエンドにデータを送る
			interface ScheduleBackObj {
				schedulename: string;
				scheduledisc: string;
				starttime: string;
				Sstarttime: string;
				Sendtime: string;
				mainid: number;
				UserToAdd: string[];
			}

			//送信用にデータを整える
			var vdatestr = this.ScheduleTagData!.startdate.split("/");
			var vdate = `${this.ReturnDMFormat(vdatestr[0])}-${this.ReturnDMFormat(vdatestr[1])}-${this.ReturnDMFormat(vdatestr[2])}`

			var addmemberobj: ScheduleBackObj = {
				schedulename: this.addscheduletitle,
				scheduledisc: this.addscheduledescription,
				starttime: vdate,
				Sstarttime: `${this.ReturnDMFormat(this.sstime)}:${this.ReturnDMFormat(this.ssminute)}`,
				Sendtime: `${this.ReturnDMFormat(this.sendtime)}:${this.ReturnDMFormat(this.sendminute)}`,
				mainid: Number(this.ScheduleTagData!.userid),
				UserToAdd: this.addmemberid
			};

			const http = new GetData();
            http.Postcommon(
                "/api/schedule/add",
				addmemberobj,
                (res:any) => {
                    console.log(res);
                }
            );
		},
	}
});
</script>

<style lang="scss">
#ScheduleModal{
    height:calc(100vh - 4rem);
}
.ScheduleModalcoveropen,
.ScheduleModalcoverclose{
    height: 100%;
}
.ScheduleModalcoveropen,
.ScheduleModalcoverclose{
	width:100%;
}
.ScheduleModalcoveropen,
.ScheduleModalcoverclose{
    background:rgb(0, 0, 0, 0.5);
}
.ScheduleModalclose,
.ScheduleModalcoverclose{
    opacity: 0;
}
.ScheduleModalclose,
.ScheduleModalcoverclose{
    top: 100%;
}
.ScheduleModalclose,
.ScheduleModalcoveropen,
.ScheduleModalcoverclose{
    left: 0;
}
#ScheduleModal::-webkit-scrollbar-thumb{
    box-shadow: none;
}
#ScheduleModal::-webkit-scrollbar-track{
    border: none;
}
#ScheduleModal::-webkit-scrollbar-thumb{
    background: #aaa;
}
#ScheduleModal::-webkit-scrollbar-thumb,
#ScheduleModal::-webkit-scrollbar-track{
    border-radius: 5px;
}
.ScheduleModalclose{
    height: 100vh;
}
#ScheduleModal::-webkit-scrollbar{
    width: 12px;
}
.ScheduleModalcoveropen{
    opacity: 1;
}
.ScheduleModalclose,
.ScheduleModalcoverclose{
    z-index: 0;
}
.ScheduleModalcoveropen{
    z-index: 6;
}
.ScheduleModalopen{
    z-index: 7;
}
#ScheduleModal{
    overflow-y: scroll;
}
.ScheduleModalcoveropen{
    top:0;
}
.ScheduleModalcoveropen,
.ScheduleModalcoverclose{
    position: fixed;
}
.ScheduleModalopen,
.ScheduleModalclose,
.ScheduleModalcoveropen,
.ScheduleModalcoverclose{
    transition: all 0.25s;
}
#modalmenuwapper{
    position: fixed;
    left: 0;
    bottom: 2rem;
    left: calc((100% - 45rem) / 2);
    width: 45rem;
}
.Scheduleloading{
    transform:scale(0.7);
}
@media (min-width: 768px){
    .ScheduleModalopen,
    .ScheduleModalclose{
        left: calc((100% - 45rem) / 2);
        width: 45rem;
    }
    .ScheduleModalopen{
        top: 2rem;
    }
	.searchresultarea{
		height:10rem;
	}
	.setSareaheight{
		min-height:20rem;
	}
}
@media (max-width: 768px){
    .ScheduleModalopen{
        top: 2rem;
    }
	#modalmenuwapper,
    .ScheduleModalopen,
    .ScheduleModalclose{
        width: 90%;
        left: 5%;
    }
}
</style>