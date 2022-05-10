import { createApp, defineComponent } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

createApp(App).use(store).use(router).mount('#app');
/** 
 * ログイン時のロジック
 * ページを読み込んだ段階でローカルストレージにアクセストークンがあるかを確認する。
 * アクセストークンが存在しない、有効期限が切れている場合は/loginへリダイレクト
 * ローカルストレージに値がある場合は
 *   1. トークンと紐付くuser_idをaccess_token(テーブル)から取得
 *   2. トークンと紐付くデバイス情報をaccess_token(テーブル)から取得
 *   3. 現在ログイン中のユーザーがいないか確認
 * 一致するものがあればアクセスを許可し、一致しない場合は/loginへリダイレクト
 * useridはグローバル変数へ格納し、各コンポーネントで使い回す予定
*/
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.isAuthenticated)) {
        if (!localStorage.getItem('access_token')) {
            next({ name: 'Login' });
            console.log('1');
        }else{
            next();
            console.log('2');
        }
    }else{
        if (localStorage.getItem('access_token')) {
            if(to.name == 'Login' || to.name == 'home'){
                next({ name: 'Dashboard' });
                console.log('3');
            }else{
                next();
                console.log('4');
            }
        }
    }
    console.log("5");
    next();

});