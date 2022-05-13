export class PageNation{
    static PageNationClass(i:number, PageNow:number, PageAmount:number){
        let PageNationClass = "pagenationnum PageNationNum cursor w-100 text-center p-1";
        let PageNationId = "";
        let PageNationTxt = String(i);

        if((i <= 3 && i == PageNow) || (3 < i && i == PageNow)){
            PageNationClass = `pagenationnum PageNow PageNationNum cursor w-100 text-center p-1`;
        }
        if((i == PageNow + 2 || i == PageNow - 2) && i != PageAmount && i != 1){
            PageNationTxt = "...";
        }
        if(i == PageAmount && PageAmount - 1 > PageNow){
            PageNationId = `PageLastNum`;
        }

        return {
            "PageNationId":PageNationId,
            "PageNationClass":PageNationClass,
            "PageNationTxt":PageNationTxt
        };
    }

    MakePagenation(amount:any, PageNow:number, TxtArea=true){
        let NumHTML = '';
        for(let i = 1; i <= amount; i++){
            const Pnow = Number(PageNow);
            if(i < 3){
                if(i == Pnow){//今開いてるページ
                    NumHTML += `<p id="" class="pagenationnum PageNow PageNationNum cursor w-100 text-center p-1">${i}</p>`;
                }else{
                    NumHTML += `<p id="" class="pagenationnum PageNationNum cursor w-100 text-center p-1">${i}</p>`;
                }
            }
            if(3 <= i){
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