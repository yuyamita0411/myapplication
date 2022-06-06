<template>
<div class=" shadowwrapper  m-auto pl-2 pr-2 pl-lg-0 pr-lg-0">
    <div class="contentwraper w-100 d-inline-block pt-3 pb-4 pl-0 pr-0 mt-3">
        <h5 class="mainfontcolor mb-3 w-100 d-inline-block">フォーマット用csvをダウンロードする</h5>
        <div class="bgstripe45deg pt-3 pb-3 pr-2 pl-2 mb-5">
            <div class="d-inline-block w-100 mb-3">
                <div class="d-inline-block w-100 position-relative">
                    <div class="col-12 float-left pl-0 pr-0">
                        <div class="bgstripe45deg d-inline-block w-100">
                            <div class="">
                                <p class="mb-0 p-2 bg-white d-inline-block w-100">＊メンバーを一括でインポートするためのフォーマットのダウンロードをお願いします。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
            @click="DlFormat()"
            id="dlformat"
            class="formatdl BgAccentColor text-white cursor p-2 p-lg-1 text-center m-auto">csvフォーマットをダウンロードする</div>
        </div>
        <h5 class="mainfontcolor mb-3 w-100 d-inline-block">アカウントをインポートする</h5>
        <div class="bgstripe45deg pt-3 pb-3 pr-2 pl-2 mb-5">
            <div class="d-inline-block w-100 mb-3">
                <div class="d-inline-block w-100 position-relative">
                    <div class="col-12 float-left pl-0 pr-0">
                        <div class="bgstripe45deg d-inline-block w-100">
                            <div class="">
                                <p class="mb-0 p-2 bg-white d-inline-block w-100">＊↑で指定されたフォーマットに従いcsvをアップロードすると、メンバーを一括でインポートできます。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
            id="importformat"
            :class="`formatdl BgAccentColor text-white cursor p-2 p-lg-1 text-center m-auto`"
            @click="
            this.$refs['modal'].$el.querySelector('#csvmodalcover').classList.add('csvmodalcoveropen'),
            this.$refs['modal'].$el.querySelector('#csvmodalcover').classList.remove('csvmodalcoverclose'),
            this.$refs['modal'].$el.querySelector('#csvmodal').classList.add('csvmodalopen'),
            this.$refs['modal'].$el.querySelector('#csvmodal').classList.remove('csvmodalclose')
            "
            >アカウントをインポートする</div>
        </div>
        <ManageUserModal ref="modal"/>
    </div>
</div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import ManageUserModal from '@/components/AfterLogin/parts/ManageUser/ManageUserModal.vue';
import ExcelJS from 'exceljs';

export default defineComponent({
	name: 'ManageUserView',
    data() {
        return {
            type: 'xlsx'
        }
    },
	components: {
		ManageUserModal
	},
    methods:{
        async DlFormat() {
            const workbook = new ExcelJS.Workbook();
            workbook.addWorksheet('新規ユーザー追加');
            const worksheet = workbook.getWorksheet('新規ユーザー追加');

            worksheet.columns = [
                { header: '名前', key: 'name' },
                { header: 'メールアドレス', key: 'mail_address' },
            ];

            const uint8Array = await workbook.xlsx.writeBuffer();
            const blob = new Blob([uint8Array], { type: 'application/octet-binary' });
            const a = document.createElement('a');
            a.href = (window.URL || window.webkitURL).createObjectURL(blob);
            a.download = `MyImportFormat.xlsx`;
            a.click();
            a.remove()
        }
    }
});
</script>

<style lang="scss" scoped>
.p2px {
    padding: 2px;
}
.formatdl{
    max-width:20rem;
}
#csvmodalMenuBar{
    position: fixed;
}
.csvmodalbarclose{
    opacity:0;
    bottom: -15rem;
    z-index:-1;
}
.csvmodalbaropen{
    opacity:1;
    bottom: 2rem;
    z-index: 9999;
}
.csvmodalbarclose,
.csvmodalbaropen{
    transition:all 0.25s;
}
@media (min-width: 768px){
    #csvmodalMenuBar{
        left: calc((100% - 45rem) / 2);
        width: 45rem;
    }
}
@media (max-width: 768px){
    #csvmodalMenuBar{
        width: 90%;
        left: 5%;
    }
}
</style>