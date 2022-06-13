<template>
    <div id="ScheduleModalcover" class="position-fixed cursor ScheduleModalcoverclose"
	ref="modalcover"
	@click="ModalMotion"
	>
    </div>
    <div
	id="ScheduleModal"
	class="position-fixed pr-0 mb-0 bg-white ScheduleModalclose"
	ref="modal"
	>
		<div class="modalinnerwrapper overflow-hidden">
			<div class="modalinnercover d-flex position-relative" id="">
				<div class="Modal1 col-12 p-3 bg-white" id="" :style="mfstyle">
					<div class="w-100 d-inline-block pt-3 pb-3 pl-0 pr-0 bg-white pb-3">
						<div class="col-12 pr-0 pl-0 bg-white" id="">
							<div class="">
								<div class="w-100 d-inline-block text-center">
									<h3 class="notificationtitle font-weight-bold pt-4 pb-2 mb-0 m-auto" id="">{{modaltitle}}</h3>
								</div>
							</div>
							<div class="m-auto" id="">
								<p class="col-12">{{ScheduleTagData.startdate}}</p>
								<div class="col-12 d-flex"
								>
									<div class="tooltip-right" data-tooltip="時刻を設定する">
										<img
										class="l2rem cursor p-1 mr-3"
										src="@/assets/timeicon.png">
									</div>
									<div class="w-100 text-center pr-2 position-relative">
										<div
										@click="EditTime($event),
										$event.currentTarget.nextElementSibling.classList.toggle('z1'),
										$event.currentTarget.nextElementSibling.classList.toggle('menushow'),
										$event.currentTarget.nextElementSibling.classList.toggle('zm1'),
										$event.currentTarget.nextElementSibling.classList.toggle('menuhide')
										"
										class="starthour buttonicon w-100 d-inline-block searchbar bg-brightgray BTLR1 BBLR1 BTRR1 BBRR1 b-none cursor" id=""
										ref="sstime">
											{{ScheduleTagData.sstime}}
										</div>
										<div
										class="Scaccordion position-absolute bg-white menuhide zm1 gridinside"
										id=""
										el="Scaccordion"
										>
											<div
											@click="
											this.$refs.sstime.innerText = $event.target.innerText,
											$event.currentTarget.closest('.Scaccordion').classList.toggle('z1'),
											$event.currentTarget.closest('.Scaccordion').classList.toggle('menushow'),
											$event.currentTarget.closest('.Scaccordion').classList.toggle('zm1'),
											$event.currentTarget.closest('.Scaccordion').classList.toggle('menuhide')
											"
											v-for="i in 9" :key="i"
											class="starthourmenubutton Sbutton w-100 d-inline-block cursor bb" data-makeour="0"
											>{{ReturnDMFormat(i+8)}}</div>
										</div>
									</div>
									<div class="buttonicon text-center pr-2">
										:
									</div>
									<div class="w-100 text-center pr-2 position-relative">
										<div
										@click="EditTime($event),
										$event.currentTarget.nextElementSibling.classList.toggle('z1'),
										$event.currentTarget.nextElementSibling.classList.toggle('menushow'),
										$event.currentTarget.nextElementSibling.classList.toggle('zm1'),
										$event.currentTarget.nextElementSibling.classList.toggle('menuhide')
										"
										class="
										startminute buttonicon w-100 d-inline-block searchbar bg-brightgray
										BTLR1 BBLR1 BTRR1
										BBRR1 b-none cursor" id=""
										ref="ssminute">
											{{ScheduleTagData.ssminute}}
										</div>
										<div class="Scaccordion position-absolute bg-white menuhide zm1 gridinside" id="">
											<div
											@click="
											this.$refs.ssminute.innerText = $event.target.innerText,
											$event.currentTarget.closest('.Scaccordion').classList.toggle('z1'),
											$event.currentTarget.closest('.Scaccordion').classList.toggle('menushow'),
											$event.currentTarget.closest('.Scaccordion').classList.toggle('zm1'),
											$event.currentTarget.closest('.Scaccordion').classList.toggle('menuhide')
											"
											v-for="i in 59" :key="i"
											class="startminutemenubutton Sbutton w-100 d-inline-block cursor bb" data-makeour="0"
											>{{ReturnDMFormat(i)}}</div>
										</div>
									</div>
									<div class="buttonicon text-center">
										~
									</div>
									<div class="w-100 text-center pl-2 position-relative">
										<div
										@click="EditTime($event),
										$event.currentTarget.nextElementSibling.classList.toggle('z1'),
										$event.currentTarget.nextElementSibling.classList.toggle('menushow'),
										$event.currentTarget.nextElementSibling.classList.toggle('zm1'),
										$event.currentTarget.nextElementSibling.classList.toggle('menuhide')
										"
										class="endhour buttonicon w-100 d-inline-block searchbar bg-brightgray BTLR1 BBLR1 BTRR1 BBRR1 b-none cursor" id=""
										ref="sendtime">
											{{ScheduleTagData.sendtime}}
										</div>
										<div class="Scaccordion position-absolute bg-white menuhide zm1 gridinside" id="">
											<div
											@click="
											this.$refs.sendtime.innerText = $event.target.innerText,
											$event.currentTarget.closest('.Scaccordion').classList.toggle('z1'),
											$event.currentTarget.closest('.Scaccordion').classList.toggle('menushow'),
											$event.currentTarget.closest('.Scaccordion').classList.toggle('zm1'),
											$event.currentTarget.closest('.Scaccordion').classList.toggle('menuhide')
											"
											v-for="i in 9" :key="i"
											class="starthourmenubutton Sbutton w-100 d-inline-block cursor bb" data-makeour="0">{{ReturnDMFormat(i+9)}}</div>
										</div>
									</div>
									<div class="buttonicon text-center pl-2">
										:
									</div>
									<div class="w-100 text-center pl-2 position-relative">
										<div
										@click="EditTime($event),
										$event.currentTarget.nextElementSibling.classList.toggle('z1'),
										$event.currentTarget.nextElementSibling.classList.toggle('menushow'),
										$event.currentTarget.nextElementSibling.classList.toggle('zm1'),
										$event.currentTarget.nextElementSibling.classList.toggle('menuhide')
										"
										class="endminute buttonicon w-100 d-inline-block searchbar bg-brightgray BTLR1 BBLR1 BTRR1 BBRR1 b-none cursor" id=""
										ref="sendminute">
											{{ScheduleTagData.sendminute}}
										</div>
										<div class="Scaccordion position-absolute bg-white menuhide zm1 gridinside" id="">
											<div
											@click="
											this.$refs.sendminute.innerText = $event.target.innerText,
											$event.currentTarget.closest('.Scaccordion').classList.toggle('z1'),
											$event.currentTarget.closest('.Scaccordion').classList.toggle('menushow'),
											$event.currentTarget.closest('.Scaccordion').classList.toggle('zm1'),
											$event.currentTarget.closest('.Scaccordion').classList.toggle('menuhide')
											"
											v-for="i in 59" :key="i"
											class="startminutemenubutton Sbutton w-100 d-inline-block cursor bb" data-makeour="0"
											>{{ReturnDMFormat(i)}}</div>
										</div>
									</div>
								</div>
								<span class="d-inline-block w-100 text-center red mt-3" id=""></span>
								<div class="schedulemodal position-relative d-inline-block col-12">
									<div class="d-inline-block w-100">
										<small class="red" id=""></small>
									</div>
									<input
									class="w-100 searchbar bg-brightgray mb-3 pt-1 pb-1 BTLR1 BBLR1 BTRR1 BBRR1 b-none float-left pl-2"
									name="schedulename"
									placeholder="タイトルを入力してください"
									type="text"
									:value="ScheduleTagData.title"
									ref="schedulename"
									@input="Inputtitle($event)"
									>
									<div class="d-inline-block w-100">
										<small class="red" id=""></small>
									</div>
									<textarea class="w-100 searchbar bg-brightgray mb-3 BTLR1 BBLR1 BTRR1 BBRR1 b-none float-left pl-2"
									name="scheduledisc"
									placeholder="概要を入力してください"
									:value="ScheduleTagData.description"
									ref="scheduledisc"
									@input="Inputdescription($event)"
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
                                    :class="`${eachadded != {} && eachadded.id ? 'addeduserbuton d-inline-block float-left pt-1 pb-1 pr-2 pl-2 text-white mb-2 mr-2 cursor br5px' : 'd-none'}`"
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
														@input="
														SearchMember($event),
														loadingstatus = true,
														loadstatus = 'op0',
														searchuserval = $event.target.value
														"
														@focus="searchareashow = 'setSareaheight'"
														@blur="searchareashow = ''"
														class="w-100 pt-1 pb-1 searchbar bg-brightgray BTLR1 BBLR1 BTRR1 BBRR1 b-none float-left pl-2"
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
												<LoadingIconview v-if="loadingstatus == true" class="Scheduleloading" />
												<div
                                                @click="AddUserFromResult"
												v-for="EUobj in searchuser" :key="EUobj.id"
												:data-id="EUobj.id"
												:data-name="EUobj.name"
												:data-mailaddress="EUobj.mail_address"
												:class="`${addmemberid.indexOf(EUobj.id) != -1 ? 'inportbutton' : 'adduserbuton'} d-inline-block float-left pt-1 pb-1 pr-2 pl-2 text-white mb-2 mr-2 cursor br5px`">
												{{EUobj.name}}
												</div>
											</div>
										</div>
									</div>
								</div>
<!-- 条件分岐 -->
                                <div
                                v-if="ScheduleTagData.alreadyaddeduser && 0 < ScheduleTagData.alreadyaddeduser.length"
                                id="" class="col-12 mb-0 d-inline-block">
                                    <h5 class="mainfontcolor w-100 pt-4 pb-1 mb-2">参加済み</h5>
                                    <div
                                    @click="DeleteUserFromAuser"
                                    v-for="eachadded in AppendAuser()" :key="eachadded.id"
                                    :class="`${eachadded.id ? 'addeduserbuton d-inline-block float-left pt-1 pb-1 pr-2 pl-2 text-white mb-2 mr-2 cursor br5px' : 'd-none'}`"
                                    :data-addeduserid="eachadded.id">
                                        {{eachadded.name}}
                                    </div>
                                </div>
<!-- 条件分岐 -->
							</div>
						</div>
					</div>
				</div>
				<div class="Modal2 col-12 pl-0 pr-0 position-relative bg-white" id="" :style="mfstyle">
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
                <div class=" modalfinishbuttonwrapper col-12 mb-0 pt-0 pb-0 pl-0 pr-0 bg-white" :style="mfstyle">
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
                <div class="modalfinishbuttonwrapper col-12 mb-0 pt-0 pb-0 pl-0 pr-0 bg-white" :style="mfstyle">
                    <div class="bgstripe45deg  col-12 m-auto pt-0 pb-0 pt-md-3 pb-md-3 pl-0 pr-0">
                        <div class="">
                            <div id="" class="buttonicon p-2 m-auto">
                                <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                    <img src="@/assets/modalclosebutton.png" class="d-inline-block w-100 p-2">
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
import {GetData} from "@/http";
import LoadingIconview from '@/components/common/LoadingIcon.vue';

export default defineComponent({
    name: 'ScheduleModal',
	props:{
		ScheduleTagData:Object,
		modaltitle:String,
		modalclass:String,
		modalcoverclass:String
	},
	emits: ['ReRender'],
    data() {
		const adm:object[] = [],
		su:object[] = [],
		aa:object[] = [];
        return {
			searchuser:su,
			loadstatus:"op0",
			searchareashow:"",
			loadingstatus:false,
            alreadyaddedmember: aa,
            addmember:adm,
			addmemberid:[0],
            searchuserval:"",
			mfstyle:"left: 0%; transition:all 0.25s;"
        };
    },
	components:{
		LoadingIconview
	},
	methods:{
		Timeevent(event:Event, changeval:HTMLElement): void{
			var t = event.target as HTMLInputElement;
			changeval.innerText = t.innerText;
		},	
		Inputtitle(event:Event):void{
			var t = event.target as HTMLInputElement;
			this.ScheduleTagData!.title = t.value;
		},
		Inputdescription(event:Event):void{
			var t = event.target as HTMLInputElement;
			this.ScheduleTagData!.description = t.value;
		},
		AppendAuser(){
			this.alreadyaddedmember = this.ScheduleTagData != undefined ? this.ScheduleTagData.alreadyaddeduser : [{}];
			return this.alreadyaddedmember;
		},
		ModalMotion(){
			this.addmember = [];
			this.addmemberid = [];
			this.searchuser = [];
            this.searchuserval = "";

			const modalcover = this.$refs.modalcover as HTMLElement;
			const modal = this.$refs.modal as HTMLElement;

			modalcover.classList.add('ScheduleModalcoverclose');
			modalcover.classList.remove('ScheduleModalcoveropen');
            modal.classList.add('ScheduleModalclose');
            modal.classList.remove('ScheduleModalopen');

			const Scaccordion = document.querySelectorAll<HTMLElement>(".Scaccordion");
			Scaccordion.forEach((obj:HTMLElement) => {
				obj.classList.add('zm1');
				obj.classList.remove('z1');
				obj.classList.add('menuhide');
				obj.classList.remove('menushow');
			});

		},
        ReturnDMFormat(str:string){
			if(str != undefined){
				if (str.toString().length == 1) {
					str = "0" + str;
				}
			}
            return str;
        },
		EditTime(event:Event){
			var t = event.currentTarget as HTMLElement;
			return t.innerText;
		},

		SearchMember(event:Event){
			var t = event.target as HTMLInputElement;
            const http = new GetData();

            http.common(
                "/api/schedule/search",
                {"addgroupmember": t.value},
                (res:any) => {
					var sres:object[] = [];
					res.data.forEach((ob:any) => {
						if(ob.id != t.dataset.userid){
							sres.push(ob);
						}
					});
					this.searchuser = sres;

                    //読み込みが完全に終わってからカバーを外す
                    this.loadingstatus = false;
                    this.loadstatus = 'op1';
                }
            );
		},
        AddUserFromResult(e:Event){
			var t = e.target as HTMLElement;
			const id:number = t.dataset.id ? Number(t.dataset.id) : 0;
			const name:string = t.dataset.name ? t.dataset.name : "";
			const mailaddress:string = t.dataset.mailaddress ? t.dataset.mailaddress: "";

            //既に追加されたユーザーは追加できないようにする処理
            if(this.addmemberid.indexOf(id) == -1){

				if(name){
					interface MemberDataObj {
						id: number;
						name: string;
						mailaddress: string;
					}
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
        DeleteUserFromResult(e:Event){
			var t = e.target as HTMLElement;
			var newarr:{id:number, name:string, mailaddress:string}[] = [];
			var newarrforcheck:number[] = [];

            this.addmember.forEach((ob:any):void => {
				var uid:number = t.dataset.addeduserid != undefined ? Number(t.dataset.addeduserid) : 0;
                if(uid != ob.id){
                    newarr.push(ob);
                    newarrforcheck.push(ob.id);
                }
            });
            this.addmember = newarr;
            this.addmemberid = newarrforcheck;
        },
		DeleteUserFromAuser(e:Event){//追加済みのユーザーを削除
			var t = e.target as HTMLElement;
			var newarrforcheck:number[] = [];
			this.alreadyaddedmember.forEach((ob:any):void => {
				var uid:number = t.dataset.addeduserid != undefined ? Number(t.dataset.addeduserid) : 0;
                if(uid == ob.id){
					var index = this.alreadyaddedmember.indexOf(ob.id);
					this.alreadyaddedmember.splice(index, 1);
                }
			});
		},
		AddSchedule(){
			//バリデーションの処理
			//バックエンドにデータを送る

			//送信用にデータを整える
			var rawstagdata = this.ScheduleTagData ? this.ScheduleTagData.startdate : "";
			var vdatestr = rawstagdata.split("/");
			var vdate = `${this.ReturnDMFormat(vdatestr[0])}-${this.ReturnDMFormat(vdatestr[1])}-${this.ReturnDMFormat(vdatestr[2])}`;
			
			const schedulename = this.$refs.schedulename as HTMLInputElement;
			const scheduledisc = this.$refs.scheduledisc as HTMLInputElement;
			const sstime = this.$refs.sstime as HTMLElement;
			const ssminute = this.$refs.ssminute as HTMLElement;
			const sendtime = this.$refs.sendtime as HTMLElement;
			const sendminute = this.$refs.sendminute as HTMLElement;

			interface ScheduleBackObj {
				schedulename: string;
				scheduledisc: string;
				starttime: string;
				Sstarttime: string;
				Sendtime: string;
				mainid: number;
				UserToAdd: number[];
			}
			var addmemberobj: ScheduleBackObj = {
				schedulename: schedulename.value,
				scheduledisc: scheduledisc.value,
				starttime: vdate,
				Sstarttime: `${this.ReturnDMFormat(sstime.innerText)}:${this.ReturnDMFormat(ssminute.innerText)}`,
				Sendtime: `${this.ReturnDMFormat(sendtime.innerText)}:${this.ReturnDMFormat(sstime.innerText)}`,
				mainid:0,
				UserToAdd: []
			};

			//addmemberid {0: 16, 1: 26, 2: 36, 3: 54}
			//既に存在するユーザーに関してはモーダルが開いた瞬間に変数に格納しておいてコンポーネント内で追加削除ができるようにする。
			//修正のタイミングでaddmemberidとマージしてエンドポイントに渡す。
			//ScheduleTagData = {alreadyaddeduser: [{id:6, username, ...}, Object, Object, ...] (1)...}
			const http = new GetData();
			//オブジェクトに scheduleid がある場合とない場合でエンドポイントを分ける
			var checkDobj = this.ScheduleTagData != undefined ? this.ScheduleTagData : null;
			if(checkDobj != undefined){
				var endpoint = "/api/schedule/add";
				if(!checkDobj.scheduleid){
					addmemberobj.mainid = Number(this.ScheduleTagData ? this.ScheduleTagData.userid : null);
					addmemberobj.UserToAdd = this.addmemberid;
				}
				if(checkDobj.scheduleid){
					endpoint = "/api/schedule/rebase";
					addmemberobj.mainid = Number(this.ScheduleTagData ? this.ScheduleTagData.scheduleid : null);

					var arr:number[] = [];
					this.alreadyaddedmember.forEach((o:any) => {
						arr.push(o.id);
					});
					addmemberobj.UserToAdd = this.addmemberid.concat(arr);
				}
				
				http.Postcommon(
					endpoint,
					addmemberobj,
					(res:any) => {
						this.mfstyle = 'left: -100%; transition:all 0.25s;';
						setTimeout(() => {
							this.ModalMotion();
							this.mfstyle = 'left: 0%; transition:all 0.25s;';
							
							this.$router.push('/schedule');

							this.$emit('ReRender', false);

						}, 1000);
					}
				);
			}
		}
	}
});
</script>

<style lang="scss" scoped>
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
.Modal2 > div > div:nth-child(1){
	position: sticky;
	top: 0;
}
.Modal2 > div > div:nth-child(2){
	position: sticky;
	top: 7rem;
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