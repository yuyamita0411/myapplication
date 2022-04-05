export const ModalCommonMotion = () => {
    document.querySelectorAll('body')[0].classList.toggle(`commonmodalisopen`);
    document.getElementById(`commonmodal`).classList.toggle(`commonmodalopen`);
    document.getElementById(`commonmodalcover`).classList.toggle(`commonmodalcoverclose`);
    document.getElementById(`commonmodal`).classList.toggle(`commonmodalclose`);
    document.getElementById(`commonmodalcover`).classList.toggle(`commonmodalcoveropen`);

    document.getElementById(`commonmodalMenuBar`).classList.toggle(`commonmodalbaropen`);
    document.getElementById(`commonmodalMenuBar`).classList.toggle(`commonmodalbarclose`);
}

export const commonloadMotion = (areaname, iconpath) => {
    document.getElementById(areaname).innerHTML = `
    <div class="loadingcover w-100 pr-0 pl-0 pl-lg-1 float-lg-left d-inline-block text-center h-100 position-relative">
        <div class="sk-chase position-absolute" style="width:3rem; top:5rem; left:calc((100% - 3rem) / 2);">
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        </div>
        <p class="text-center position-absolute d-inline-block" style="top:9rem; left:calc((100% - 4rem) / 2);">Loading</p>
    </div>`;
}