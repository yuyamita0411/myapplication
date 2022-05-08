<template>
    <div class="LoginmodalOutside p-2 p-md-0 text-center">
        <div id="Loginmodal" class="LoginFormWrapper m-auto pt-5 pb-5 pl-3 pr-3 bg-white d-inline-block col-10 col-md-6 col-lg-4 position-relative">
            <ForgotPassPage />
        </div>
    </div>
</template>
<script lang="ts">
import { defineComponent, ref, reactive, onMounted } from 'vue'
import ForgotPassPage from '@/components/Login/ForgotPassPage.vue';

export default defineComponent({
    name: 'ForgotPassView',
    components: {
        ForgotPassPage
    }
});
</script>

<style lang="scss">
</style>