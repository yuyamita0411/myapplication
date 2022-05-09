//サイズを調整する。
export const test = () => {
    return "test!!";
}
export class SIZE{
    //横幅と高さを同じにする
    static SetElementMiddlePosition(target:string){
        if(!document.getElementById(target)){
            return;
        }
        const tobj = document.getElementById(target)!;
        return (window.innerHeight - tobj.offsetHeight) / 2;
    }

    static SetElementMiddle(target:string){
        if(!document.getElementById(target)){
            return;
        }
        const tobj = document.getElementById(target)!;
        tobj.setAttribute('style', `top:${(window.innerHeight - tobj.offsetHeight) / 2}px;`);
    }

    static SetTopMargin(target:string, basearr:[string]){
        let margintop = 0;
        if(!document.getElementById(target)){
            return;
        }
        basearr.forEach((elm) => {
            if(!document.getElementById(elm)){
                return;
            }else{
                margintop += document.getElementById(elm)!.offsetHeight;
            }
        });
    
        if(window.innerWidth < 768){
            document.getElementById(target)!.setAttribute('style', `margin-top:${margintop}px`);
        }else{
            document.getElementById(target)!.removeAttribute('style');
        }
    }

    static SetTopPadding(target:string, basearr:[string, string]){
        let paddingtop = 0;
        if(!document.getElementById(target)){
            return;
        }
        basearr.forEach((elm) => {
            if(!document.getElementById(elm)){
                return;
            }else{
                paddingtop += document.getElementById(elm)!.offsetHeight;
            }
        });
        document.getElementById(target)!.setAttribute('style', `padding-top:${paddingtop}px`);
    }
}