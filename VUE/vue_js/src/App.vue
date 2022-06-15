<template>
  <router-view/>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
    name: 'APP'
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
    #maincolumn{
        margin-top:4.5rem;
    }
    #sidebar{
        margin-top:3.5rem;
    }
    #hbwrapper{
        margin-top:2rem;
    }
}
@media (max-width: 768px){
    #commonmodalMenuBar{
        width: 90%;
        left: 5%;
    }
    /*#maincolumn{
        margin-top:3rem;
    }*/
}
</style>