<template>
    <div id="" class="col-12 float-md-right pr-0 pl-0">
        <div class="m-auto">
            <div class="w-100 d-inline-block text-center">
                <h3 class="font-weight-bold mb-0 m-auto pb-4">
                    サインインする
                </h3>
            </div>
        </div>
        <div class="w-100 m-auto">
            <div class=" col-md-12 m-auto pl-0 pr-0 bg-white">
                <div class="col-12 m-auto">
                    <div class="w-100 d-inline-block">
                        <div class="w-100 d-inline-block mb-3">
                            <div class="tablediv bg-white w-100 d-inline-block">
                                <input id="name" type="text" 
                                class="loginborder br5px w-100 bg-white pl-2 fileinput @error('name') is-invalid @enderror"
                                placeholder="ユーザー名(必須)"
                                name="name"
                                ref="name"
                                value="" 
                                required autocomplete="name" 
                                autofocus>
                            </div>
                            <small class="red text-left d-block w-100 mt-1">{{nonamealert}}</small>
                        </div>
                        <div class="w-100 d-inline-block mb-3">
                            <div class="tablediv bg-white w-100 d-inline-block">
                                <input id="email"
                                type="email"
                                class="loginborder br5px w-100 bg-white pl-2 fileinput @error('email') is-invalid @enderror"
                                name="email"
                                ref="email"
                                placeholder="sample@gmail.com(必須)"
                                required
                                autocomplete="email"
                                value="">
                            </div>
                            <small class="red text-left d-block w-100 mt-1">{{noemailalert}}</small>
                        </div>
                        <div class="w-100 d-inline-block mb-3">
                            <div class="tablediv bg-white w-100 d-inline-block">
                                <input id="password"
                                type="text"
                                class="loginborder br5px w-100 bg-white pl-2 fileinput @error('password') is-invalid @enderror"
                                name="password"
                                ref="password"
                                placeholder="user password(必須)"
                                required
                                value=""
                                >
                            </div>
                            <small class="red text-left d-block w-100 mt-1">{{nopasswordalert}}</small>
                        </div>
                        <div class="w-100 d-inline-block mb-3">
                            <div class="tablediv bg-white w-100 d-inline-block">
                                <input id="password-confirm"
                                type="text"
                                class="loginborder br5px w-100 bg-white pl-2 fileinput"
                                name="password_confirmation"
                                ref="password_confirm"
                                value=""
                                placeholder="user password confirm(必須)"
                                required>
                            </div>
                            <small class="red text-left d-block w-100 mt-1">{{nopasswordconfalert}}</small>
                        </div>
                        <div class="w-100 d-inline-block mb-3">
                            <div class="tablediv bg-white w-100 d-inline-block">
                                <input id="companyname"
                                type="text"
                                class="loginborder br5px w-100 bg-white pl-2 fileinput"
                                name="companyname"
                                ref="companyname"
                                value=""
                                placeholder="社名(任意)"
                                >
                            </div>
                            <small class="red text-left d-block w-100 mt-1">{{companynamealert}}</small>
                        </div>
                        <div class="w-100 d-inline-block mb-3">
                            <div class="tablediv bg-white w-100 d-inline-block">
                                <input id="companyaddress"
                                type="text"
                                class="loginborder br5px w-100 bg-white pl-2 fileinput"
                                name="companyaddress"
                                ref="companyaddress"
                                value=""
                                placeholder="会社所在地(任意)"
                                >
                            </div>
                            <small class="red text-left d-block w-100 mt-1">{{companyaddressalert}}</small>
                        </div>
                        <div class="w-100 d-inline-block mb-3">
                            <div class="tablediv bg-white w-100 d-inline-block">
                                <input id="companytel"
                                type="text"
                                class="loginborder br5px w-100 bg-white pl-2 fileinput"
                                name="companytel"
                                ref="companytel"
                                value=""
                                placeholder="会社電話番号(任意)"
                                >
                            </div>
                            <small class="red text-left d-block w-100 mt-1">{{companytelalert}}</small>
                        </div>
                        <div class="w-100 d-inline-block mb-3">
                            <div class="tablediv bg-white w-100 d-inline-block">
                                <input id="companymail"
                                type="text"
                                class="loginborder br5px w-100 bg-white pl-2 fileinput"
                                name="companymail"
                                ref="companymail"
                                value=""
                                placeholder="会社メールアドレス(任意)"
                                >
                            </div>
                            <small class="red text-left d-block w-100 mt-1">{{companymailalert}}</small>
                        </div>
                        <div class="w-100 d-inline-block mb-3">
                            <div class="tablediv bg-white w-100 d-inline-block">
                                <input id="companyindustry"
                                type="text"
                                class="loginborder br5px w-100 bg-white pl-2 fileinput"
                                name="companyindustry"
                                ref="companyindustry"
                                value=""
                                placeholder="業界(任意)"
                                >
                            </div>
                            <small class="red text-left d-block w-100 mt-1">{{companyindustryalert}}</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 m-auto pb-4">
                    <button
                    type="submit"
                    class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold p-2 cursor br5px"
                    @click="register"
                    >
                        サインイン
                    </button>
                </div>
            </div>
            <div class="d-inline-block w-100">
                <router-link class="d-inline-block font-weight-bold" to="/login">もどる</router-link>
            </div>
        </div>
        <div :class="SModalClass" @click="SModalHide">
            <div class="col-11 col-md-6 m-auto bg-white pt-3 pb-3">
                <h3>{{completemsg}}</h3>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import http from "@/views/ts/http";

export default defineComponent({
    name: 'RegisterPage',
    data() {
        return {
            SModalClass:'position-fixed w-100 h-100 smodalhide',

            nonamealert: '',
            noemailalert: '',
            nopasswordalert: '',
            nopasswordconfalert: '',

            companynamealert: '',
            companyaddressalert: '',
            companytelalert: '',
            companymailalert: '',
            companyindustryalert: '',

            completemsg: ''
        };
    },
    methods: {
        register(data: any) {
            this.nonamealert = "";
            this.noemailalert = "";
            this.nopasswordalert = "";
            this.nopasswordconfalert = "";

            this.companynamealert = "";
            this.companyaddressalert = "";
            this.companytelalert = "";
            this.companymailalert = "";
            this.companyindustryalert = "";

            var flag = true;
            const regex = /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/;
            const onlyint = /^[0-9]*$/;

            const NAElement = this.$refs.name as HTMLInputElement
            const EMElement = this.$refs.email as HTMLInputElement
            const PAElement = this.$refs.password as HTMLInputElement
            const PACONElement = this.$refs.password_confirm as HTMLInputElement
            const CNElement = this.$refs.companyname as HTMLInputElement
            const CADDElement = this.$refs.companyaddress as HTMLInputElement
            const CTELLElement = this.$refs.companytel as HTMLInputElement
            const CMAILElement = this.$refs.companymail as HTMLInputElement
            const CINDElement = this.$refs.companyindustry as HTMLInputElement

            if(NAElement.value == ''){
                this.nonamealert = "*名前は必須です";
                flag = false;
            }
            if(200 < NAElement.value.length){
                this.nonamealert = "200文字以内でお願いします。";
                flag = false;
            }

            if(EMElement.value == ''){
                this.noemailalert = "*メールアドレスは必須です";
                flag = false;
            }
            if(200 < EMElement.value.length){
                this.noemailalert = "200文字以内でお願いします。";
                flag = false;
            }
            if(!regex.test(EMElement.value)){
                this.noemailalert = "メールアドレスの形式が正しくありません。";
                flag = false;
            }

            if(PAElement.value == ''){
                this.nopasswordalert = "*パスワードは必須です";
                flag = false;
            }
            if(255 < PAElement.value.length){
                this.nopasswordalert = "255文字以内でお願いします。";
                flag = false;
            }

            if(PACONElement.value == ''){
                this.nopasswordconfalert = "*パスワード確認は必須です";
                flag = false;
            }
            if(255 < PACONElement.value.length){
                this.nopasswordconfalert = "255文字以内でお願いします。";
                flag = false;
            }
            if(PAElement.value != PACONElement.value){
                this.nopasswordconfalert = "パスワードが一致しません。";
                flag = false;
            }

            if(255 < CNElement.value.length){
                this.companynamealert = "255文字以内でお願いします。";
                flag = false;
            }

            if(255 < CADDElement.value.length){
                this.companyaddressalert = "255文字以内でお願いします。";
                flag = false;
            }

            if(255 < CTELLElement.value.length){
                this.companytelalert = "255文字以内でお願いします。";
                flag = false;
            }
            if(!onlyint.test(CTELLElement.value)){
                this.companytelalert = "数字のみでお願いします";
                flag = false;
            }

            if(255 < CMAILElement.value.length){
                this.companymailalert = "255文字以内でお願いします。";
                flag = false;
            }
            if(!regex.test(CMAILElement.value) && CMAILElement.value.length != 0){
                this.companymailalert = "メールアドレスの形式が正しくありません。";
                flag = false;
            }

            if(255 < CINDElement.value.length){
                this.companyindustryalert = "255文字以内でお願いします。";
                flag = false;
            }

            if(flag != true){
                return;
            }

            return http.post(
            "/api/register",
            {
                'name':NAElement.value,
                'email':EMElement.value,
                'password':PAElement.value,
                'password-confirm':PACONElement.value,
                'companyname':CNElement.value,
                'companyaddress':CADDElement.value,
                'companytel':CTELLElement.value,
                'companymail':CMAILElement.value,
                'companyindustry':CINDElement.value
            })
            .then(response => {
                this.SModalClass = 'position-fixed w-100 h-100 smodalshow';
                this.completemsg = response.data.message;
                setTimeout(() => {
                    this.SModalClass = 'position-fixed w-100 h-100 smodalhide';
                }, 2000);
            })
            .catch(error => {
                console.log('error:', error);
            });

        },
        SModalHide(){
            this.SModalClass = 'position-fixed w-100 h-100 smodalhide';
        }
    }
});
</script>

<style lang="scss">
.smodalhide{
    top:100%;
    opacity:0;
    z-index:-1;
}
.smodalshow{
    top:0;
    opacity:1;
    z-index:1;
}
.smodalhide,
.smodalshow{
    display: inline-grid;
    background:rgb(0, 0, 0, 0.5);
    left:0;
    transition:all 0.5s;
    cursor:pointer;
}
</style>