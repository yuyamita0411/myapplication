<template>
<div class="logoutmodal position-fixed modal_close" id="logoutmodal">
  <div class="logoutmodalinner w-100 bg-white position-relative">
    <div class="w-100 m-auto p-3 bg-white d-inline-block" id="">
      <div class="d-inline-block w-100 float-md-right pr-0 pl-0" id="">
        <div class="pt-3 m-auto">
          <div class="w-100 d-inline-block text-center">
            <h3 class="font-weight-bold pt-2 pb-2 mb-0 m-auto">アカウント</h3>
          </div>
        </div>
        <div class="pt-5 pb-5 w-100 p-3 m-auto">
          <div class="col-md-12 m-auto pt-3 pb-3 pl-0 pr-0 bg-white">
            <div class="col-12 pt-1 pb-1 m-auto">
              <div>
                <div class="w-100 d-inline-block b-none text-white text-center font-weight-bold p-2 cursor bgmain">
                アカウント情報
                </div>
              </div>
            </div><!--ログアウトのモーダル-->
            <div class="col-12 pt-1 pb-1 m-auto">
                <div
                class="w-100 d-inline-block b-none text-white text-center font-weight-bold p-2 cursor BgAccentColor"
                @click="Logout"
                >
                ログアウト
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
import router from '../../../../../router'
import http from "@/http";

export default defineComponent({
    name: 'AccountModal',
    methods:{
      Logout(): Promise<any> {
        return http.post(
        "/api/logout"
        )
        .then(response => {
            localStorage.setItem('access_token',"");
            this.$router.push('/login');
        })
        .catch(error => {
            console.log(error);
        });
      }
    }
});
</script>