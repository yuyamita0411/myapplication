import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

createApp(App).use(store).use(router).mount('#app');

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.isAuthenticated)) {
        if (!localStorage.getItem('access_token')) {
            console.log("1");
            next({ name: 'Login' });
        }else{
            console.log("2");
            next();
        }
    }else{
        if (localStorage.getItem('access_token')) {
            if(to.name == 'Login' || to.name == 'home'){
                console.log("3");
                next({ name: 'Dashboard' });
            }else{
                console.log("4");
                next();
            }
        }else{
            next();
        }
    }
});