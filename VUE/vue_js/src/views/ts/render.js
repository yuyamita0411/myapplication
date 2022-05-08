export class Render{
    makeUserButton(Obj, boolean=false){
        var innerHTML = '';
        for (const prop in Obj) {
            innerHTML += `
            <div
            data-id="${Obj[prop].id}"
            data-name="${Obj[prop].name}"
            data-mail_address="${Obj[prop].mail_address}"
            `;
            innerHTML +=  `class="`;
            if(boolean == true){
                innerHTML +=  'adduserbuton ';
            }
            if(boolean == false){
                innerHTML +=  'existingusernow ';
            }
            innerHTML +=
            `d-inline-block float-left pt-1 pb-1 pr-2 pl-2 text-white mb-2 mr-2 cursor br5px"
            >
            ${Obj[prop].name}
            </div>`;
        }
        return innerHTML;
    }

    makeGroupHTMLFormat(innerHTML, editinggnow){
        var innerHTML =
        `
        <h5 class="mainfontcolor col-12 pt-4 pb-1 mb-0">現在のメンバー</h5>
        <div class=" col-md-12 m-auto pt-3 pb-3 pl-0 pr-0 bg-white d-flex">
            <div id="groupmembernow" class="col-12 pb-1 m-auto">${innerHTML}</div>
        </div>
        <h5 class="mainfontcolor col-12 pt-4 pb-1 mb-2">メンバーを追加する <small id="AddedMemberAlert" class="red"></small></h5>
        <div id="AddedMember" class="col-12 mb-0 d-inline-block"></div>
        <div class=" col-md-12 m-auto pb-3 pl-0 pr-0 bg-white d-flex">
            <div id="" class="col-12 pb-1 m-auto">
                <div class=" w-100 d-inline-block pb-3 pl-0 pr-0 bg-white">
                    <div class="w-100 pb-1 m-auto">
                        <div class="d-inline-block w-100 mb-3 pl-0 pr-0">
                            <div class="searchbarwrapper d-inline-block w-100 mt-0">
                                <input type="text" id="addgroupmember" name="addgroupmember" data-groupeditingnow="${editinggnow}" class="w-100 searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2" placeholder="ユーザー名を入力してください。">
                            </div>
                        </div>
                    </div>
                    <div id="SearchResultArea"></div>
                </div>
            </div>
        </div>
        `;
        return innerHTML;
    }

    createGroupHTMLFormat(userid){
        var innerHTML =
        `
        <h5 class="mainfontcolor col-12 pt-4 pb-1 mb-2">メンバーを追加する <small id="AddedMemberAlert" class="red"></small></h5>
        <div id="AddedMember" class="col-12 mb-0 d-inline-block"></div>
        <div class=" col-md-12 m-auto pb-3 pl-0 pr-0 bg-white d-flex">
            <div id="" class="col-12 pb-1 m-auto">
                <div class=" w-100 d-inline-block pb-3 pl-0 pr-0 bg-white">
                    <div class="w-100 pb-1 m-auto">
                        <div class="d-inline-block w-100 mb-3 pl-0 pr-0">
                            <div class="searchbarwrapper d-inline-block w-100 mt-0">
                                <input type="text" id="addgroupmember" name="addgroupmember"
                                data-userid="${userid}"
                                    class="w-100 searchbar bg-brightgray border-top-left-radius-1rem 
                                    border-bottom-left-radius-1rem border-top-right-radius-1rem
                                    border-bottom-right-radius-1rem b-none float-left pl-2"
                                    placeholder="ユーザー名を入力してください。">
                            </div>
                        </div>
                    </div>
                    <div id="SearchResultArea"></div>
                </div>
            </div>
        </div>
        `;
        return innerHTML;
    }
}