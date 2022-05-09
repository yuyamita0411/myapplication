<template>
  <router-view/>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import {SIZE} from './views/ts/design';
export default defineComponent({
    name: 'APP'
});

['load', 'resize'].forEach((ev:string) => {
    window.addEventListener(ev, () => {
        SIZE.SetTopPadding('maincolumn', ['dashboardnemue', 'hbwrapper']);
        SIZE.SetTopPadding('sidebar', ['dashboardnemue', 'hbwrapper']);
        SIZE.SetElementMiddle('Loginmodal');
        SIZE.SetTopMargin('hbwrapper', ['dashboardnemue']);
        var hprop = '';
        if(768 < window.innerWidth){
            hprop = `height:calc(${window.innerHeight}px - 10rem);`
        }
        if(window.innerWidth <= 768){
            hprop = `height:calc(${window.innerHeight}px - 8rem);`
        }
        document.getElementById('commonmodal')!.setAttribute(
            'style',
            hprop
        );
    });
});
</script>

<style lang="scss">
@import "views/scss/bootstrap.scss";
@import "views/scss/style.scss";
@import "views/scss/tooltip.scss";

.LoginmodalOutside{
    height:100vh;
}
.LoginmodalOutside{
    display: table-cell;
    vertical-align: middle;
    width: 100vw;
}
#commonmodalMenuBar{
    position: fixed;
}
.commonmodalbarclose{
    opacity:0;
    bottom: -15rem;
    z-index:-1;
}
.commonmodalbaropen{
    opacity:1;
    bottom: 2rem;
    z-index: 9999;
}
.commonmodalbarclose,
.commonmodalbaropen{
    transition:all 0.25s;
}
@media (min-width: 768px){
    #commonmodalMenuBar{
        left: calc((100% - 45rem) / 2);
        width: 45rem;
    }
}
@media (max-width: 768px){
    #commonmodalMenuBar{
        width: 90%;
        left: 5%;
    }
}
</style>