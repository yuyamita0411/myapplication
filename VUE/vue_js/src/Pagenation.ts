export class PageNation{
    /*static MakePagenation(amount:number, PageNow:number){
        interface PInfo {
            PId: string;
            PClass: string;
            PTxt: any;
        }

        const Pjson = [{}];
        for(var i = 1; i <= amount; i++){
            const Pnow = Number(PageNow);
            const PInow: PInfo = {
                PId: "",
                PClass: "d-none",
                PTxt:i
            }
            if(i < 3){
                if(i == Pnow){
                    const PInow = {
                        PId: "",
                        PClass: "pagenationnum PageNow PageNationNum cursor w-100 text-center p-1",
                        PTxt:i
                    }
                }else{
                    const PInow = {
                        PId: "",
                        PClass: "pagenationnum PageNationNum cursor w-100 text-center p-1",
                        PTxt:i
                    }
                }
            }

            if(3 <= i){
                if(i == Pnow - 1){
                    const PInow = {
                        PId: "",
                        PClass: "pagenationnum PageNationNum cursor w-100 text-center p-1",
                        PTxt:i
                    }
                }
                if(i == Pnow){
                    const PInow = {
                        PId: "",
                        PClass: "pagenationnum PageNow PageNationNum cursor w-100 text-center p-1",
                        PTxt:i
                    }
                }
                if(i == Pnow + 1){
                    const PInow = {
                        PId: "",
                        PClass: "pagenationnum PageNationNum cursor w-100 text-center p-1",
                        PTxt:i
                    }
                }
            }

            if(i == Pnow + 3 || i == Pnow - 3 && i != 1){
                const PInow = {
                    PId: "",
                    PClass: "pagenationnum PageNationNum cursor w-100 text-center p-1",
                    PTxt:"..."
                }
            }

            if(i == amount && amount - 1 > Pnow){
                const PInow = {
                    PId: "PageLastNum",
                    PClass: "pagenationnum PageNationNum cursor w-100 text-center p-1",
                    PTxt:i
                }
            }

            if(i == 1 && i != Pnow){
                const PInow = {
                    PId: "",
                    PClass: "pagenationnum PageNationNum cursor w-100 text-center p-1",
                    PTxt:i
                }
            }

            Pjson.push(PInow);
        }
        return Pjson;
    }*/


    static PageNationClass(amount:number, PageNow:number){

        const PNArr = [];
        for(let i = 1; i <= amount; i++){
            const Pnow = Number(PageNow);
            if(i <= 3){
                if(i == Pnow){//今開いてるページ
                    const ep = {
                        "PageNationClass":"pagenationnum PageNow PageNationNum cursor w-100 text-center p-1",
                        "PageNationId":"",
                        "PageNationTxt":String(i)
                    };
                    PNArr.push(ep);
                }else{
                    const ep = {
                        "PageNationClass":"pagenationnum PageNationNum cursor w-100 text-center p-1",
                        "PageNationId":"",
                        "PageNationTxt":String(i)
                    };
                    PNArr.push(ep);
                }
            }
            if(3 < i){
                if(i == Pnow - 1){
                    const ep = {
                        "PageNationClass":"pagenationnum PageNationNum cursor w-100 text-center p-1",
                        "PageNationId":"",
                        "PageNationTxt":String(i)
                    };
                    PNArr.push(ep);
                }
                if(i == Pnow){//今開いてるページ
                    const ep = {
                        "PageNationClass":"pagenationnum PageNow PageNationNum cursor w-100 text-center p-1",
                        "PageNationId":"",
                        "PageNationTxt":String(i)
                    };
                    PNArr.push(ep);
                }
                if(i == Pnow + 1){
                    const ep = {
                        "PageNationClass":"pagenationnum PageNationNum cursor w-100 text-center p-1",
                        "PageNationId":"",
                        "PageNationTxt":String(i)
                    };
                    PNArr.push(ep);
                }
            }
            if(i == Pnow + 2 || i == Pnow - 2){
                const ep = {
                    "PageNationClass":"pagenationnum PageNationNum cursor w-100 text-center p-1",
                    "PageNationId":"",
                    "PageNationTxt":"..."
                };
                PNArr.push(ep);
            }
            if(i == amount && amount - 1 > Pnow){
                const ep = {
                    "PageNationClass":"pagenationnum PageNationNum cursor w-100 text-center p-1",
                    "PageNationId":"PageLastNum",
                    "PageNationTxt":String(i)
                };
                PNArr.push(ep);
            }
        }
        return PNArr;
    }
/*
    static MakePagenation(amount:number, PageNow:number, TxtArea=true){
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
*/
}