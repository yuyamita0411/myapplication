@extends('layouts.app')
@section('content')
        <h5 class="mainfontcolor w-100">グループを検索</h5>
        <form method="GET" action="" class="w-100 mb-3 d-inline-block">
            <div class="searchbarwrapper w-100 mt-0 d-flex">
                <input
                type="text"
                id="searchGroupInfo"
                name="searchGroupInfo"
                class="w-100 mr-3 searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2"
                placeholder="キーワードを入力してください。"
                >
                <input
                    type="image"
                    value="検索"
                    class="searchicon"
                    src="{{ asset('secure_asset/SearchGlassIcon.png') }}"
                >
            </div>
        </form>

        <div id="AddressArea" class="w-100 pb-3 pl-0 pr-0 bg-white d-inline-block">
            @foreach($Groupinfos as $GInfoKey => $GInfoVal)
            <div class="col-12 col-lg-6 float-lg-left pr-0 pl-0 mb-2">
                <div class="w-100 pr-0 pl-0 pl-lg-1 float-lg-left">
                    <small class="position-absolute pr-2 pl-2 bgmain text-white">{{$GInfoVal->groupname}}</small>
                    <div class="b-gray w-100 pt-3 pt-lg-4">
                        <div class="text-center">
                            <div class="pt-0 pr-2 pl-2 pb-0 pt-md-1 float-md-left text-center text-md-right col-12 col-md-6">
                                <small class="font18">管理者</small>
                            </div>
                            <p class="font-gray font18 pt-md-1 font-weight-bold text-center text-md-left float-md-right col-12 col-md-6 pr-0 pl-0 mb-0">{{$GInfoVal->cname}}</p>
                        </div>
                        <div class="text-center">
                            <div class="pt-0 pr-2 pl-2 pb-0 pt-md-0 float-md-left text-center text-md-right col-12 col-md-6">
                                <small class="font12">作成日時</small>
                            </div>
                            <p class="font-gray font12 font-weight-bold text-center text-md-left float-md-right col-12 col-md-6 pr-0 pl-0 mb-0">{{$GInfoVal->created_at}}</p>
                        </div>
                        <div class="bg-check gridinside w-100 pt-2 pb-2 pl-0 pr-0 mt-3 d-inline-block">
                            <div class="">
                                <div class="buttonicon tooltip-top p-2 float-right" data-tooltip="グループを編集する">
                                    <div class="w-100 font-weight-bold cursor br-50 bg-white">
                                        <img
                                        src="{{ asset('secure_asset/EditAreaShowIcon.png') }}"
                                        id="EditButton-{{$GInfoVal->id}}"
                                        class="d-inline-block w-100 p-2"
                                        >
                                    </div>
                                </div>
                                @if(Auth::user()->id == $GInfoVal->cid)
                                <div class="buttonicon tooltip-top p-2 float-right" data-tooltip="グループを削除する">
                                    <div class="w-100 font-weight-bold cursor br-50 bg-white">
                                        <img
                                        src="{{ asset('secure_asset/TrashIcon.png') }}"
                                        id="ModalOpenButton-{{$GInfoVal->id}}"
                                        class="d-inline-block w-100 p-2"
                                        >
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="w-100 d-inline-block">
            <div class="col-10 col-md-6 col-lg-4 d-flex m-auto">
                <div id="PageNationNumArea" class="w-100 float-left">
                    {{ $Groupinfos->onEachSide(1)->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
@endsection

<script type="module">
    import {Ajax} from '../js/Ajax.js';
    import {ModalCommonMotion, commonloadMotion} from '../../js/modal.js';
    import {PageNation} from '../js/Pagenation.js';
    import {Render} from '../js/Render.js';
    const ajax = new Ajax();
    const render = new Render();
    const pagenation = new PageNation();

    //EditButton-* をクリックした時 モーダルが開く
    window.addEventListener('click', (el) => {
        if (el.target.id.match(/EditButton-/)) {
            var elm = el.target;
            ModalCommonMotion();
            document.getElementById("EditMd").removeAttribute("style");
            document.getElementById("EditMdMn").removeAttribute("style");
            document.getElementById("commonmodal").action = "{{ route('groupinfo.add.user') }}";

            commonloadMotion('FirstHTML', "{{ asset('secure_asset/loadingicon.png') }}");
            document.getElementById('FirstTitle').innerText = 'グループの編集';
            document.getElementById('SecondTitle').innerText = '完了';
            document.getElementById('SecondMsg').innerText = '完了';
            document.getElementById('SecondMsgTitle').innerText = 'メンバーの追加が完了しました。';
            ajax.method1(
                "{{route('groupinfo.search.usernow')}}",
                'POST',
                {
                    "addgroupidnow":elm.id.replace('EditButton-', '')
                },
                (Res) => {
                    var innerHTML = render.makeUserButton(Res);
                    document.getElementById('FirstHTML').innerHTML = `
                        <input type="hidden" name="GOpenNow" value="${elm.id.replace('EditButton-', '')}">
                        ${render.makeGroupHTMLFormat(innerHTML, elm.id.replace('EditButton-', ''))}`;
                },
                (r1, r2) => {
                    console.log(r1);
                    console.log("fail!!");
                }
            );
        }

        if (el.target.id.match(/ModalOpenButton-/)) {
            var elm = el.target;
            ModalCommonMotion();
            document.getElementById("EditMd").removeAttribute("style");
            document.getElementById("EditMdMn").removeAttribute("style");
            document.getElementById("commonmodal").action = "{{ route('groupinfo.delete') }}";

            document.getElementById('FirstTitle').innerText = 'グループの削除';
            document.getElementById('SecondTitle').innerText = '完了';
            document.getElementById('SecondMsg').innerText = '完了';
            document.getElementById('SecondMsgTitle').innerText = 'グループの削除が完了しました。';

            var div = document.createElement("div");
            div.setAttribute('id', 'GroupIdhidden');
            var innerdiv = `<input type="hidden" name="groupid" value="${elm.id.replace('ModalOpenButton-', '')}">`;
            div.innerHTML = innerdiv;
            document.getElementById('commonmodal').appendChild(div);
        }
    });
//生成された要素に対してinputイベントを発火する
    window.addEventListener('input', (el) => {
        if (el.target.id.match(/addgroupmember/)) {
            commonloadMotion('SearchResultArea', "{{ asset('secure_asset/loadingicon.png') }}");
            ajax.method1(
                "{{route('groupinfo.search')}}",
                'POST',
                {
                    "addgroupmember":el.target.value,
                    "editinggnum":document.getElementById('addgroupmember').dataset.groupeditingnow
                },
                (Res) => {
                    document.getElementById('SearchResultArea').innerHTML = render.makeUserButton(Res, true);
                },
                (r1, r2) => {
                    console.log(r1);
                    console.log("fail!!");
                }
            );
        }
    });
    var AddMemberHTML = '';
    var AddedUserList = {};
    window.addEventListener('click', (el) => {
        if (el.target.className.match(/adduserbuton/)) {
            AddMemberHTML = '';
            if(isKeyExists(AddedUserList, el.target.dataset.id) == false){
                AddedUserList[el.target.dataset.id] = 
                {
                    "name":el.target.dataset.name,
                    "id":el.target.dataset.id
                }
                el.target.classList.remove('adduserbuton');
                el.target.classList.add('inportbutton');
            }

            for(var object in AddedUserList){
                AddMemberHTML += `
                <div
                class="addeduserbuton d-inline-block float-left pt-1 pb-1 pr-2 pl-2 text-white mb-2 mr-2 cursor br5px"
                data-addeduserid="${AddedUserList[object].id}"
                >
                ${AddedUserList[object].name}
                <input type="hidden" name="UserToAdd[]" value="${AddedUserList[object].id}">
                </div>
                `;
            }
            if(el.target.parentNode.id == "SearchResultArea"){
                document.getElementById('AddedMember').innerHTML = AddMemberHTML;
            }
            if(el.target.parentNode.id == "CreateGroupMemberResult"){
                document.getElementById('CreateMember').innerHTML = AddMemberHTML;
            }
        }
        if(el.target.className.match(/addeduserbuton/)){
            AddMemberHTML = '';
            document.querySelectorAll('.adduserbuton, .inportbutton').forEach((Obj) => {
                if(Obj.dataset.id == el.target.dataset.addeduserid){
                    Obj.classList.remove('inportbutton');
                    Obj.classList.add('adduserbuton');
                }
                for(var object in AddedUserList){
                    if(el.target.dataset.addeduserid == AddedUserList[object].id){
                        delete AddedUserList[object];
                        el.target.remove();
                    }
                }
            });
        }

    });
    const isKeyExists = (obj,key) => {
        if( obj[key] == undefined ){
            return false;
        }else{
            return true;
        }
    }
    /****** 検索した時に取得データの数をカウントしてページネーションを作る処理 ******/
</script>