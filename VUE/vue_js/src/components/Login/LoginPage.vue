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
                        <div class="w-100 d-inline-block mb-3">
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
                            <small class="red text-left d-block w-100 mt-1">{{nomailalert}}</small>
                        </div>
                        <div class="w-100 d-inline-block mb-3">
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
                            <small class="red text-left d-block w-100 mt-1">{{nopasswordalert}}</small>
                        </div>
                    </div>
                    <small class="red text-left d-block w-100 mt-1">{{mailorpasswrong}}</small>
                </div>
                <div class="col-12 col-lg-10 m-auto pb-4">
                    <button
                    type="submit"
                    class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold p-2 cursor br5px"
                    @click="login">
                        ログイン
                    </button>
                </div>

                <div class="col-12 col-lg-10 m-auto pb-4">
                    <button
                    type="submit"
                    class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold p-2 cursor br5px"
                    @click="CheckAccesstoken">
                        トークン確認
                    </button>
                </div>

                <div class="d-inline-block w-100">
                    <router-link class="d-inline-block font-weight-bold" to="/password/forgot">パスワードを忘れた方はこちら</router-link>
                </div>
                <div class="d-inline-block w-100">
                    <router-link class="d-inline-block font-weight-bold" to="/register">サインインする</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import http from "@/views/ts/http";
import router from '../../router'

export default defineComponent({
    name: 'LoginPage',
    data() {
        return {
            token:null,
            nomailalert: '',
            nopasswordalert: '',
            mailorpasswrong: ''
        };
    },
    methods: {
        login(): Promise<any> {
            const MAElement = this.$refs.mail_address as HTMLInputElement
            const PAElement = this.$refs.password as HTMLInputElement
            return http.post(
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
            })
            .catch(error => {
                console.log(error);
                this.mailorpasswrong = error.data.WrongMsg;
            });
        },
        CheckAccesstoken(): Promise<any> {
            return http.get(
            "/api/check/auth/accesstoken",
            {
                //アクセスする時はローカルストレージに保存されたアクセストークンをリクエストヘッダに入れてlaravel側のAuth::userで照合する。
                headers: {
                    Authorization: `Bearer ${this.token}`
                }
            })
            .then(response => {
                console.log(localStorage.getItem('access_token'));
            })
            .catch(error => {
                console.log(error);
            });
        },
    },

});
</script>