<template>
    <div id="" class="col-12 float-md-right pr-0 pl-0">
        <div class="m-auto">
            <div class="w-100 d-inline-block text-center">
                <h3 class="font-weight-bold mb-0 m-auto pb-4">
                    パスワードリセット
                </h3>
            </div>
        </div>
        <div class="w-100 m-auto">
            <div class=" col-md-12 m-auto pl-0 pr-0 bg-white">
                <div class="col-12 col-lg-10 m-auto pb-3">
                    <div class="w-100 d-inline-block">
                        <div class="w-100 d-inline-block">
                            <div class="tablediv bg-white w-100 d-inline-block">
                                <input type="text" name="mail_address" 
                                class="br5px w-100 bg-white fileinput b-none mt-0" placeholder="test@gmail.com">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-10 m-auto pb-4">
                    <input type="submit" value="パスワード変更URLを通知する" class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold p-2 cursor br5px">
                </div>
                <router-link class="d-inline-block font-weight-bold" to="/login">もどる</router-link>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'ForgotPassPage',
  props: {
    msg: String,
  },
});
</script>