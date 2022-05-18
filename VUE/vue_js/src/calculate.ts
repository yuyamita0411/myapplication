export class Calculate{
    MDFI(obj:string, plus:number){
        const Dobj = new Date(obj);
        const returnobj = new Date(Dobj.setDate(Dobj.getDate() + plus));
        return returnobj;
    }
    ReturnDMFormat(str:string){
        if (str.toString().length == 1) {
            str = "0" + str;
        }
        return str;
    }
    GetScheduleMarkRange(starttime:string, endtime:string){

        if(!starttime ||!endtime){
            return;
        }

        const planedate = `${starttime.split(" ")[0].replace("-", "/").replace("-", "/")} 09:00:00`,//当日の0時 2022/04/11
        sstart:string = starttime.replace("-", "/").replace("-", "/"),//文字
        ssend:string = endtime.replace("-", "/").replace("-", "/"),//文字

        tmstr:any = `${starttime.split(" ")[0].replace("-", "/").replace("-", "/")} 18:00:00`,//

        pr1:any = new Date(tmstr),
        pr2:any = new Date(planedate),
        pr3:any = new Date(sstart),
        pr4:any = new Date(ssend),

        alllentgh:number = pr1 - pr2,
        lenno1:number = ((pr3 - pr2) / (pr1 - pr2)) * 100,
        lenno2:number = ((pr4 - pr3) / (pr1 - pr2)) * 100,
        lenno3:number = ((pr1 - pr4) / (pr1 - pr2)) * 100;

        return [lenno1, lenno2, lenno3];
    }
    CSNum(str:string){
        return Math.floor(16 * (window.innerWidth / 550));
    }
    MakePagenation(Pjson:any, amount:number, PageNow:number){
        interface PInfo {
            PId: string;
            PClass: string;
            PTxt: any;
        }

        Pjson = [{}];
        for(let i = 1; i <= amount; i++){
            const Pnow = Number(PageNow);
            const PInow: PInfo = {
                PId: "",
                PClass: "d-none",
                PTxt:i
            }
            if((i < 3 && i == Pnow) || (3 <= i && i == Pnow)){
                PInow.PClass = "pagenationnum PageNow PageNationNum cursor w-100 text-center p-1";
            }
            if(
                (i < 3 && i != Pnow) || 
                (3 <= i && i == Pnow - 1) || 
                (3 <= i && i == Pnow + 1) ||
                i == Pnow + 2 ||
                i == Pnow - 2 && i != 1 ||
                (i == amount && amount - 1 > Pnow) ||
                (i == 1 && i != Pnow)
            ){
                PInow.PClass = "pagenationnum PageNationNum cursor w-100 text-center p-1";
            }

            if((i == Pnow + 2 && i != amount) || (i == Pnow - 2 && i != amount) && i != 1){
                PInow.PTxt = "...";
            }

            if(i == amount && amount - 1 > Pnow){
                PInow.PId = "PageLastNum";
            }

            Pjson.push(PInow);
        }
        return Pjson;
    }

}