export class Calculate{
    MDFI(obj:any, plus:number){
        //一旦変数に入れる。
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

        const planedate:any = `${starttime.split(" ")[0].replace("-", "/").replace("-", "/")} 09:00:00`,//当日の0時 2022/04/11
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
}