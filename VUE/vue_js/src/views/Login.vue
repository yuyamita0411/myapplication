<template>
    <div class="LoginmodalOutside p-2 p-md-0 text-center">
        <div id="Loginmodal" class="LoginFormWrapper m-auto pt-5 pb-5 pr-3 pl-3 bg-white d-inline-block col-12 col-md-6 col-lg-4 position-relative">
            <LoginPage />
        </div>
    </div>
</template>
<script lang="ts">
import { defineComponent } from 'vue'
import LoginPage from '@/components/Login/LoginPage.vue';

export default defineComponent({
    name: 'loginView',
    components: {
        LoginPage
    }
});
</script>

<style lang="scss">
</style>