window.addEventListener('DOMContentLoaded', function(){
    const appobj = document.getElementById('app');
    appobj.classList.add('appshow');

    function setfontsize(selector){
        titleobj = document.querySelectorAll(selector);
        if(!titleobj){
            return;
        }
        const fontlen = [];
        titleobj.forEach((elm, i) => {
            fontlen.push(elm.innerText.length);
        });
        const maxfontlen = Math.max.apply(null, fontlen);
        titleobj.forEach((elm, i) => {
            var fontsize = elm.clientWidth / 15;
            if(18 < fontsize){
                var fontsize = 18;
            }else{
                var fontsize = fontsize;
            }
            var test = elm.getAttribute('font-size');
            elm.setAttribute('style', 'font-size:'+fontsize+'px;');
        });
    }

    function set_samefontsize(selector){
        const targetobj = document.querySelectorAll(selector);
        var fontlens = [];
        targetobj.forEach((elm, i) => {
            fontlens.push(elm.innerText.length);
        });
        var max_fontlength = Math.max.apply(null, fontlens);

        targetobj.forEach((elm, i) => {
            var fontsize = elm.offsetWidth / (max_fontlength*1.05);

            if(18 < fontsize){
                var append_fontsize = 18;
            }else{
                var append_fontsize = fontsize;
            }
            elm.setAttribute('style', 'font-size:'+append_fontsize+'px;');
        });
    }

    function set_main_icon_height(parentselector, ratio){
        const obj = document.querySelectorAll(parentselector);
        obj.forEach((elm, i) => {
            elm.children[0].setAttribute('style', 'height:'+(elm.offsetWidth * ratio)+'px;');
        });
    }

    function set_icon_wrapper_height(target){
        const obj = document.querySelectorAll(target);
        var objheight = [];
        obj.forEach((elm, i) => {
            var heightamount = elm.children[0].offsetHeight + elm.children[1].offsetHeight;
            objheight.push(heightamount);
        });
        var each_height = Math.max.apply(null, objheight);

        obj.forEach((elm, i) => {
            elm.setAttribute('style', 'height:'+(each_height*1.05)+'px;');
        });
    }

    function set_same_height(targetselector, baseselector){
        const targetobj = document.querySelectorAll(targetselector);
        const baseobj = document.querySelectorAll(baseselector);
        targetobj.forEach((elm, i) => {
            baseobj.forEach((elm2, i2) => {
                elm.setAttribute('style', 'height:'+elm2.offsetHeight+'px;');
            });
        });
    }
    function append_largets_height(target){
        const obj = document.querySelectorAll(target);
        var objheight = [];
        obj.forEach((elm, i) => {
            objheight.push(elm.offsetHeight);
        });
        var each_height = Math.max.apply(null, objheight);
        if(300 < each_height){
            each_height = 300;
        }

        obj.forEach((elm, i) => {
            elm.setAttribute('style', `height:${each_height}px;`);
        });
    }

    function set_side_and_content_margin(baseselector, selectors, breakpoint){
        const baseobj = document.getElementById(baseselector);
        const appendobj = document.querySelectorAll(selectors);
        const contentheight = document.getElementById('contentwrapper');

        appendobj.forEach((elm, i) => {
            if(window.innerWidth < breakpoint){
                const baseheight = baseobj.offsetHeight;
                elm.setAttribute('style', 'margin-top:'+baseheight+'px;');
            }else{
                elm.setAttribute('style', 'height:'+contentheight.offsetHeight+'px;');
            }
        });
    }

    function set_sidebar_txt_position(selector){
        const obj = document.querySelectorAll(selector);
        obj.forEach((elm) => {
            var parentheight = elm.offsetHeight;
            var elmchild = elm.children[0]
            var childheight = elmchild.offsetHeight;
            var childtopposition = (parentheight - childheight) / 2;
            elmchild.setAttribute('style', 'top:'+childtopposition+'px;');
        });
    }

    //サイドバーの開閉
    const sidebar = document.getElementById('sidebar');
    const sidebarbutton = document.getElementById('sidebarbutton');

    var count = 0;
    if(!sidebarbutton){
        return;
    }
    sidebarbutton.addEventListener('click', function(e){
        count++;
        var open_ornot = count % 2;
        if(open_ornot == 1){
            sidebar.classList.add('sidebar_open');
            sidebarbutton.classList.add('sidebarbutton_open');
        }else{
            sidebar.classList.remove('sidebar_open');
            sidebarbutton.classList.remove('sidebarbutton_open');
        }
    });

    //吹き出し
    $('[data-toggle="tooltip"]').tooltip();


    ['load', 'resize'].forEach((elm, i) => {
        var icontimer = null;
        window.addEventListener(elm, function(){
            setfontsize('.companycatchcopy');
            setfontsize('.search_menue_area >  div > div > p');
            set_samefontsize('.nulllisttable > tbody > tr > th');
            set_samefontsize('.searchlisttable > thead > tr > th');
            set_samefontsize('.searchmethodselect > div > label');
            set_main_icon_height('.mainicon', 0.5);
            set_side_and_content_margin('navimenue', '#sidebar, #contentwrapper', 768);
            set_same_height('.comment_scrollarea > .detail_table_area > div:not(:last-child)', '.comment_scrollarea > .detail_table_area > div:not(:last-child)');
            set_sidebar_txt_position('.sidebarlink');
            set_sidebar_txt_position('.sidebar_icon_wrapper');
            var parentnode = document.querySelectorAll('.logininfowrapper');
            parentnode.forEach((elm, i) => {
                var parentheight = elm.offsetHeight;
                for(var i=0; i < elm.children.length; i++){
                    var childheight = elm.children[i].offsetHeight;
                    var childwidth = elm.children[i].offsetWidth;
                    var appendmargin = (parentheight - childheight) / 2;
                    var innertextlen = elm.children[i].innerText.length;
                    var namefontsize = childwidth / innertextlen;

                    if(i==1){
                        if(18 < namefontsize){
                            var styleprop = 'margin-top:'+appendmargin+'px; font-size:18px';
                        }else{
                            var styleprop = 'margin-top:'+appendmargin+'px; font-size:'+(namefontsize * 0.8)+'px';
                        }
                    }else{
                        var styleprop = 'margin-top:'+appendmargin+'px;';
                    }
                    elm.children[i].setAttribute('style', styleprop);
                }
            });

            //時間を置く
            setTimeout(() => {
                append_largets_height('.comment_scrollarea > .detail_table_area > div:last-child');
            }, 500);

            icontimer = setTimeout(function(){
                set_icon_wrapper_height('.mainicon');
            }, 500);

        });
    });

    document.querySelectorAll('.mainicon').forEach((elm, i) => {
        elm.addEventListener('mouseover', function(){
            elm.classList.add("main_mouseon");
        });

        elm.addEventListener('mouseleave', function(){
            elm.classList.remove("main_mouseon");
        });
    });

    //サイドバーの色付け
    window.addEventListener('load', function(){
        const sidebarobj = document.querySelectorAll('#sidebar > a');
        sidebarobj.forEach((elm,i) => {
            var currentpath = "";
            var sidebarpath = "";

            //companyの時
            if(elm.href.indexOf("company") != -1){
                currentpath = location.pathname.replace("/company", "").slice(1);
                sidebarpath = elm.href.replace(`${location.protocol}//${window.location.host}`,"").replace("/company", "").slice(1);
            }else{//それ以外の時
                currentpath = location.pathname.slice(1);
                sidebarpath = elm.href.replace(`${location.protocol}//${window.location.host}`,"").slice(1);
            }

            if(currentpath.indexOf(sidebarpath) != -1 && sidebarpath != ""){
                elm.classList.add('pagenow');
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function(){
    // タブに対してクリックイベントを適用
    const tabs = document.getElementsByClassName('tab');
    for(let i = 0; i < tabs.length; i++) {
      tabs[i].addEventListener('click', tabSwitch);
    }
  
    // タブをクリックすると実行する関数
    function tabSwitch(){
      // タブのclassの値を変更
      document.getElementsByClassName('is-active')[0].classList.remove('is-active');
      this.classList.add('is-active');
      // コンテンツのclassの値を変更
      document.getElementsByClassName('is-show')[0].classList.remove('is-show');
      const arrayTabs = Array.prototype.slice.call(tabs);
      const index = arrayTabs.indexOf(this);
      document.getElementsByClassName('panel')[index].classList.add('is-show');
    };
});