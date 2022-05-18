import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

createApp(App).use(store).use(router).mount('#app');
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.isAuthenticated)) {
        if (!localStorage.getItem('access_token')) {
            next({ name: 'Login' });
        }else{
            next();
        }
    }else{
        if (localStorage.getItem('access_token')) {
            if(to.name == 'Login' || to.name == 'home'){
                next({ name: 'Dashboard' });
            }else{
                next();
            }
        }else{
            next();
        }
    }
});