/*対象の要素が画面の縦向きに真ん中になるようにする*/
export const SetElementMiddle = (target) => {
    if(!document.getElementById(target)){
        return;
    }
    const tobj = document.getElementById(target);
    tobj.setAttribute('style', `top:${(window.innerHeight - tobj.offsetHeight) / 2}px;`);
}
/*basearrの配列に入れたセレクタ(id)分だけtopにmerginがかかるようにする*/
export const SetTopMargin = (target, basearr) => {
    var margintop = 0;
    if(!document.getElementById(target)){
        return;
    }
    basearr.forEach((elm) => {
        if(!document.getElementById(elm)){
            return;
        }else{
            margintop += document.getElementById(elm).offsetHeight;
        }
    });

    if(window.innerWidth < 768){
        document.getElementById(target).setAttribute('style', `margin-top:${margintop}px`);
    }else{
        document.getElementById(target).removeAttribute('style');
    }
}
/*basearrの配列に入れたセレクタ(id)分だけtopにpaddingがかかるようにする*/
export const SetTopPadding = (target, basearr) => {
    var paddingtop = 0;
    if(!document.getElementById(target)){
        return;
    }
    basearr.forEach((elm) => {
        if(!document.getElementById(elm)){
            return;
        }else{
            paddingtop += document.getElementById(elm).offsetHeight;
        }
    });
    document.getElementById(target).setAttribute('style', `padding-top:${paddingtop}px`);
}