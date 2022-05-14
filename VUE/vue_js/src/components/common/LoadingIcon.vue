<template>
    <div class="loadingcover w-100 pr-0 pl-0 pl-lg-1 float-lg-left d-inline-block text-center h-100">
        <div class="sk-chase position-absolute" style="width:rem; top:5rem; left:calc((100% - 3rem) / 2);">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>
        <h4 id="LoadingStr" class="loading text-center position-absolute d-flex w-100" style="top:12rem; left:calc((100% - 4rem) / 2); color:rgb(255, 183, 90);">
            <span :class="ll1">L</span>
            <span :class="ll2">o</span>
            <span :class="ll3">a</span>
            <span :class="ll4">d</span>
            <span :class="ll5">i</span>
            <span :class="ll6">n</span>
            <span :class="ll7">g</span>
        </h4>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { Component, Prop, Vue } from 'vue-property-decorator';

export default defineComponent({
    setup(props, context) {
        console.log("setup!!");
    },
    name: 'LoginIconview',
    data() {
        return {
            msg:"",
            ll1:"op02 llhide",
            ll2:"op02 llhide",
            ll3:"op02 llhide",
            ll4:"op02 llhide",
            ll5:"op02 llhide",
            ll6:"op02 llhide",
            ll7:"op02 llhide"
        };
    },
    mounted(){
        var count = 0;
        setInterval(() => {
            count += 1;
            var whichphase = count % 7;
            if(whichphase == 0){
                this.ll1 = "op02 llhide";
                this.ll2 = "op02 llhide";
                this.ll3 = "op02 llhide";
                this.ll4 = "op02 llhide";
                this.ll5 = "op02 llhide";
                this.ll6 = "op02 llhide";
                this.ll7 = "op02 llhide";
                this.ll7 = "op02 llshow";
            }
            if(whichphase == 1){
                this.ll1 = "op1 llshow";
            }
            if(whichphase == 2){
                this.ll2 = "op1 llshow";
            }
            if(whichphase == 3){
                this.ll3 = "op1 llshow";
            }
            if(whichphase == 4){
                this.ll4 = "op1 llshow";
            }
            if(whichphase == 5){
                this.ll5 = "op1 llshow";
            }
            if(whichphase == 6){
                this.ll6 = "op1 llshow";
            }
        }, 100);
        
    },
    methods: {
        LoadingMotion(){
            console.log("loaded!!");
        }
    }
});
</script>

<style lang="scss">
#LoadingStr{   
color: rgb(255, 183, 90);
}
.llhide{
    letter-spacing:2px;
    transform:scale(0.8);
}
.llshow{
    letter-spacing:5px;
    transform:scale(1);
}
.llhide,
.llshow{
    transition:all 0.1s;
}
/* ローディング関連 */
.sk-chase {
    width: 70px;
    height: 70px;
    position: relative;
    animation: sk-chase 2.5s infinite linear both;
}

.sk-chase-dot {
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0; 
    animation: sk-chase-dot 2.0s infinite ease-in-out both; 
}

.sk-chase-dot:before {
    content: '';
    display: block;
    width: 25%;
    height: 25%;
    background-color: #0069d9;
    border-radius: 100%;
    animation: sk-chase-dot-before 2.0s infinite ease-in-out both; 
}

.sk-chase-dot:nth-child(1) { animation-delay: -1.1s; }
.sk-chase-dot:nth-child(2) { animation-delay: -1.0s; }
.sk-chase-dot:nth-child(3) { animation-delay: -0.9s; }
.sk-chase-dot:nth-child(4) { animation-delay: -0.8s; }
.sk-chase-dot:nth-child(5) { animation-delay: -0.7s; }
.sk-chase-dot:nth-child(6) { animation-delay: -0.6s; }
.sk-chase-dot:nth-child(1):before { animation-delay: -1.1s; }
.sk-chase-dot:nth-child(2):before { animation-delay: -1.0s; }
.sk-chase-dot:nth-child(3):before { animation-delay: -0.9s; }
.sk-chase-dot:nth-child(4):before { animation-delay: -0.8s; }
.sk-chase-dot:nth-child(5):before { animation-delay: -0.7s; }
.sk-chase-dot:nth-child(6):before { animation-delay: -0.6s; }

@keyframes sk-chase {
    100% { transform: rotate(360deg); } 
}

@keyframes sk-chase-dot {
    80%, 100% { transform: rotate(360deg); } 
}

@keyframes sk-chase-dot-before {
    50% {
    transform: scale(0.4); 
    } 100%, 0% {
    transform: scale(1.0); 
    } 
}
/* ローディング関連 */
</style>