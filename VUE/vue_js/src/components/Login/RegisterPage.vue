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
                        <div class="w-100 d-inline-block mb-3 position-relative">
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
                            <small :class="`AlertArea red text-left d-block w-100 mt-1 position-absolute ${AlertshowClass}`">{{nonamealert}}</small>
                        </div>
                        <div class="w-100 d-inline-block mb-3 position-relative">
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
                            <small :class="`AlertArea red text-left d-block w-100 mt-1 position-absolute ${AlertshowClass}`">{{noemailalert}}</small>
                        </div>
                        <div class="w-100 d-inline-block mb-3 position-relative">
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
                            <small :class="`AlertArea red text-left d-block w-100 mt-1 position-absolute ${AlertshowClass}`">{{nopasswordalert}}</small>
                        </div>
                        <div class="w-100 d-inline-block mb-3 position-relative">
                            <div class="tablediv bg-white w-100 d-inline-block">
                                <input id="password_confirmation"
                                type="text"
                                class="loginborder br5px w-100 bg-white pl-2 fileinput"
                                name="password_confirmation"
                                ref="password_confirm"
                                value=""
                                placeholder="user password confirm(必須)"
                                >
                            </div>
                            <small :class="`AlertArea red text-left d-block w-100 mt-1 position-absolute ${AlertshowClass}`">{{nopasswordconfalert}}</small>
                        </div>
                        <div class="w-100 d-inline-block mb-3 position-relative">
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
                            <small :class="`AlertArea red text-left d-block w-100 mt-1 position-absolute ${AlertshowClass}`">{{companynamealert}}</small>
                        </div>
                        <div class="w-100 d-inline-block mb-3 position-relative">
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
                            <small :class="`AlertArea red text-left d-block w-100 mt-1 position-absolute ${AlertshowClass}`">{{companyaddressalert}}</small>
                        </div>
                        <div class="w-100 d-inline-block mb-3 position-relative">
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
                            <small :class="`AlertArea red text-left d-block w-100 mt-1 position-absolute ${AlertshowClass}`">{{companytelalert}}</small>
                        </div>
                        <div class="w-100 d-inline-block mb-3 position-relative">
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
                            <small :class="`AlertArea red text-left d-block w-100 mt-1 position-absolute ${AlertshowClass}`">{{companymailalert}}</small>
                        </div>
                        <div class="w-100 d-inline-block mb-3 position-relative">
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
                            <small :class="`AlertArea red text-left d-block w-100 mt-1 position-absolute ${AlertshowClass}`">{{companyindustryalert}}</small>
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
            AlertshowClass: 'AlertShowHide',
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
            const NAElement = this.$refs.name as HTMLInputElement
            const EMElement = this.$refs.email as HTMLInputElement
            const PAElement = this.$refs.password as HTMLInputElement
            const PACONElement = this.$refs.password_confirm as HTMLInputElement
            const CNElement = this.$refs.companyname as HTMLInputElement
            const CADDElement = this.$refs.companyaddress as HTMLInputElement
            const CTELLElement = this.$refs.companytel as HTMLInputElement
            const CMAILElement = this.$refs.companymail as HTMLInputElement
            const CINDElement = this.$refs.companyindustry as HTMLInputElement

            this.AlertshowClass = 'AlertShowHide';

            return http.post(
            "/api/register",
            {
                'name':NAElement.value,
                'email':EMElement.value,
                'password':PAElement.value,
                'password_confirmation':PACONElement.value,
                'companyname':CNElement.value,
                'companyaddress':CADDElement.value,
                'companytel':CTELLElement.value,
                'companymail':CMAILElement.value,
                'companyindustry':CINDElement.value
            })
            .then(response => {
                console.log(response);
                this.nonamealert = response.data.EmptyCheck.name;
                this.noemailalert = response.data.EmptyCheck.email;
                this.nopasswordalert = response.data.EmptyCheck.password;
                this.nopasswordconfalert = response.data.EmptyCheck.password_confirmation;
                this.companynamealert = response.data.EmptyCheck.companyname;
                this.companyaddressalert = response.data.EmptyCheck.companyaddress;
                this.companytelalert = response.data.EmptyCheck.companytel;
                this.companymailalert = response.data.EmptyCheck.companymail;
                this.companyindustryalert = response.data.EmptyCheck.companyindustry;

                this.AlertshowClass = 'AlertShow';

                //重複するユーザーがいた時もモーダルを出すようにする。
                if(response.data.RegisterStatus == "success" || response.data.RegisterStatus == "duplicated"){
                    this.SModalClass = 'position-fixed w-100 h-100 smodalshow';
                    this.completemsg = response.data.message;
                }

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