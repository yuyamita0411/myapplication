<template>
    <div id="" class="col-12 float-md-right pr-0 pl-0">
        <div class="m-auto">
            <div class="w-100 d-inline-block text-center">
                <h3 class="font-weight-bold mb-0 m-auto pb-4">
                    ログイン
                </h3>
            </div>
        </div>
        <div class="w-100 m-auto">
            <div class=" col-md-12 m-auto pl-0 pr-0 bg-white">
                <div class="col-12 col-lg-10 m-auto">
                    <div class="w-100 d-inline-block">
                        <div class="w-100 d-inline-block mb-3 position-relative">
                            <div class="tablediv bg-white w-100 d-inline-block">
                                <input
                                id="mail_address"
                                type="mail_address" 
                                ref="mail_address"
                                class="loginborder br5px w-100 bg-white pl-2 fileinput"
                                placeholder="mail@gmail.com"
                                name="mail_address" value="" 
                                required autocomplete="mail_address" 
                                autofocus>
                            </div>
                            <small :class="`AlertArea red text-left d-block w-100 mt-1 position-absolute ${AlertshowClass}`">{{nomailalert}}</small>
                        </div>
                        <div class="w-100 d-inline-block mb-3 position-relative">
                            <div class="tablediv bg-white w-100 d-inline-block">
                                <input id="password"
                                type="password"
                                ref="password"
                                class="loginborder br5px w-100 bg-white pl-2 fileinput"
                                name="password"
                                placeholder="password"
                                required
                                autocomplete="current-password">
                            </div>
                            <small :class="`AlertArea red text-left d-block w-100 mt-1 position-absolute ${AlertshowClass}`">{{nopasswordalert}}</small>
                        </div>
                    </div>
                    <small :class="`AlertArea red text-left d-block w-100 mt-1 ${AlertshowClass}`">{{mailorpasswrong}}</small>
                </div>
                <div class="col-12 col-lg-10 m-auto pb-4">
                    <button
                    type="submit"
                    class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold p-2 cursor br5px"
                    @click="login">
                        ログイン
                    </button>
                </div>

                <div class="d-inline-block w-100">
                    <router-link class="d-inline-block font-weight-bold" to="/password/forgot">パスワードを忘れた方はこちら</router-link>
                </div>
                <div class="d-inline-block w-100">
                    <router-link class="d-inline-block font-weight-bold" to="/register">サインインする</router-link>
                </div>

                <div class="col-12 col-lg-10 m-auto pt-4">
                    <button
                    type="submit"
                    class="bgred w-100 d-inline-block b-none text-white text-center font-weight-bold p-2 cursor br5px"
                    @click="LoginTestUser">
                        テストユーザーでログインする
                    </button>
                    <p class="red text-left">*メールアドレス、パスワードなしでテスト用アカウントにログインいただけます。</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import {apiClient} from "@/http";

export default defineComponent({
    name: 'LoginPage',
    data() {
        return {
            token:null,
            nomailalert: '',
            AlertshowClass: 'AlertShowHide',
            nopasswordalert: '',
            mailorpasswrong: ''
        };
    },
    methods: {
        login(): Promise<any> {
            const MAElement = this.$refs.mail_address as HTMLInputElement
            const PAElement = this.$refs.password as HTMLInputElement
            this.AlertshowClass = 'AlertShowHide';

            return apiClient.post(
            "/api/login",
            {
                "mail_address":MAElement.value,
                "password":PAElement.value
            })
            .then(response => {
                this.token = response.data.token;
                if(response.data.token != undefined && response.data.token != null && response.data.token != ""){
                    localStorage.setItem('access_token', response.data.token);
                    //ダッシュボードへ
                    this.$router.push('/dashboard');
                }
                this.nomailalert = response.data.EmptyCheck != undefined ? response.data.EmptyCheck.mail_address: '';
                this.nopasswordalert = response.data.EmptyCheck != undefined ? response.data.EmptyCheck.password: '';
                this.mailorpasswrong = MAElement.value != '' && PAElement.value != '' ? response.data.WrongMsg : '';

                this.AlertshowClass = 'AlertShow';
            })
            .catch(error => {
                this.mailorpasswrong = error.data!.WrongMsg;
            });
        },

        //テストユーザー用
        LoginTestUser(){
            return apiClient.post(
            "/api/login/testuser",
            {})
            .then(response => {
                this.token = response.data.token;
                if(response.data.token != undefined && response.data.token != null && response.data.token != ""){
                    localStorage.setItem('access_token', response.data.token);
                    this.$router.push('/dashboard');
                }
            });
        }
    },

});
</script>

<style lang="scss">
.bgred{
    background:red;
}
</style>