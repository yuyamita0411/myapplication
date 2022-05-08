<template>
    <div class="LoginmodalOutside p-2 p-md-0 text-center">
        <div id="Loginmodal" class="LoginFormWrapper m-auto pt-5 pb-5 pr-3 pl-3 bg-white d-inline-block col-10 col-md-6 col-lg-4 position-relative">
            <RegisterPage />
        </div>
    </div>
</template>
<script lang="ts">
import { defineComponent, ref, reactive, onMounted } from 'vue'
import RegisterPage from '@/components/Login/RegisterPage.vue';

export default defineComponent({
    name: 'RegisterView',
    components: {
        RegisterPage
    }
});
</script>

<style lang="scss">
</style>