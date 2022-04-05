export class PageNation{
    MakePagenation(amount, PageNow, TxtArea=true){
        var NumHTML = '';
        for(var i = 1; i <= amount; i++){
            var Pnow = Number(PageNow);

            if(i <= 3){
                if(i == Pnow){//今開いてるページ
                    NumHTML += `<p id="" class="pagenationnum PageNow PageNationNum cursor w-100 text-center p-1">${i}</p>`;
                }else{
                    NumHTML += `<p id="" class="pagenationnum PageNationNum cursor w-100 text-center p-1">${i}</p>`;
                }
            }
            if(3 < i){
                if(i == Pnow - 1){
                    NumHTML += `<p id="" class="pagenationnum PageNationNum cursor w-100 text-center p-1">${i}</p>`;
                }
                if(i == Pnow){//今開いてるページ
                    NumHTML += `<p id="" class="pagenationnum PageNow PageNationNum cursor w-100 text-center p-1">${i}</p>`;
                }
                if(i == Pnow + 1){
                    NumHTML += `<p id="" class="pagenationnum PageNationNum cursor w-100 text-center p-1">${i}</p>`;
                }
            }
            if(i == Pnow + 2 || i == Pnow - 2){
                NumHTML += `<p id="" class="pagenationnum PageNationNum cursor w-100 text-center p-1">...</p>`;
            }
            if(i == amount && amount - 1 > Pnow){
                NumHTML += `<p id="PageLastNum" class="pagenationnum PageNationNum cursor w-100 text-center p-1">${i}</p>`;
            }
        }
        if(TxtArea){
            NumHTML += `<input type="text" name="PageNationInput" value="${PageNow}" id="PageNationInput" class="mt-0 mb-0 col-2">`;
        }
        return NumHTML;
    }
}