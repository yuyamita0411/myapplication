<template>
    <div class="LoginmodalOutside d-inline-block h-100 p-2 p-md-0 text-center">
        <div id="Loginmodal" class="LoginFormWrapper m-auto pt-5 pb-5 pr-3 pl-3 bg-white d-inline-block col-10 col-md-6 col-lg-4 position-relative">
            <div id="" class="col-12 float-md-right pr-0 pl-0">
                <div class="m-auto">
                    <div class="w-100 d-inline-block text-center">
                        <h3 class="font-weight-bold mb-0 m-auto pb-4">
                            ログイン
                        </h3>
                    </div>
                </div>
                <div class="w-100 m-auto">
                    <form method="POST" action="" class=" col-md-12 m-auto pl-0 pr-0 bg-white">
                        <div class="col-12 col-lg-10 m-auto">
                            <div class="w-100 d-inline-block">
                                <div class="w-100 d-inline-block mb-3">
                                    <div class="tablediv bg-white w-100 d-inline-block">
                                        <input id="mail_address" type="mail_address" 
                                        class="loginborder br5px w-100 bg-white pl-2 fileinput"
                                        placeholder="mail@gmail.com"
                                        name="mail_address" value="" 
                                        required autocomplete="mail_address" 
                                        autofocus>
                                    </div>
                                </div>
                                <div class="w-100 d-inline-block mb-3">
                                    <div class="tablediv bg-white w-100 d-inline-block">
                                        <input id="password"
                                        type="password"
                                        class="loginborder br5px w-100 bg-white pl-2 fileinput"
                                        name="password"
                                        placeholder="password"
                                        required
                                        autocomplete="current-password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-10 m-auto pb-4">
                            <button type="submit" class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold p-2 cursor br5px">
                                ログイン
                            </button>
                        </div>
                        <div class="d-inline-block w-100">
                            <router-link class="d-inline-block font-weight-bold" to="/password/forgot">パスワードを忘れた方はこちら</router-link>
                        </div>
                        <div class="d-inline-block w-100">
                            <router-link class="d-inline-block font-weight-bold" to="/register">サインインする</router-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts">
import { defineComponent } from 'vue'
//import { SIZE } from './test.ts'

export default defineComponent({
    name: 'loginView',
    mounted(){
       // SIZE.SetElementMiddle('Loginmodal');
    }
});

</script>