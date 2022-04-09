@extends('layouts.app')
@section('content')
    <div class="pt-3 pb-3 w-100">
        <div id="AddressArea" class="gridinside pt-3 pb-3 bg-white position-relative">
            <img src="{{ asset('secure_asset/clipicon.png') }}" class="clipicon position-absolute">
            <div class="col-12 p-2">
            @foreach($taskobj as $key => $value)
                <h4>{{$value->taskname}}</h4>
                <p>{{$value->taskdescription}}</p>
            @endforeach
            </div>
            @foreach($taskobj as $key => $val)
            <div class="d-inline-block w-100 position-relative">
                <div class="col-12 col-md-6 float-left p-2">
                    <div class="float-left cursor">
                        <img class="d-inline-block searchicon" src="{{ asset('secure_asset/personicon.png') }}">
                        担当者
                    </div>
                    <span class="d-inline-block float-left w-100" style="margin-top:4px;">{{$val->username}}</span>
                </div>
                <div class="col-12 col-md-6 float-left p-2">
                    <div class="float-left cursor">
                        <img class="d-inline-block searchicon" src="{{ asset('secure_asset/groupicon.png') }}">
                        グループ名
                    </div>
                    <span class="d-inline-block float-left w-100" style="margin-top:4px;">{{$val->groupname}}</span>
                </div>
                <div class="col-12 col-md-6 float-left p-2">
                    <div class="float-left cursor">
                        <img class="d-inline-block searchicon" src="{{ asset('secure_asset/deadlineicon.png') }}">
                        締切
                    </div>
                    <span class="d-inline-block float-left w-100" style="margin-top:4px;">{{date('Y-m-d',  strtotime($val->deadline))}}</span>
                </div>
                <div class="col-12 col-md-6 float-left p-2">
                    <div class="float-left cursor">
                        <img class="d-inline-block searchicon" src="{{ asset('secure_asset/statusicon.png') }}">
                        ステータス
                    </div>
                    <span class="d-inline-block float-left w-100" style="margin-top:4px;">{{$val->status}}</span>
                </div>
                <div class="col-12 float-left p-2">
                    <p class="mb-1">
                        <small>依頼者: <span class="FontAccent">{{$val->fromusername}}</span></small>
                    </p>
                    <p class="mb-1">
                        <small>依頼日: <span class="FontAccent">{{date('Y-m-d',  strtotime($val->startdate))}}</span></small>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="m-auto">
            <div class="gridinside  col-md-12 m-auto pt-3 pb-5 pl-0 pr-0 bg-white">
                <div class="col-12 pb-1 pr-2 pl-2 m-auto">
                    <h5 class="mainfontcolor w-100 mb-3">コメントを検索</h5>
                    <div class="d-inline-block w-100 mb-3">
                        <input type="text" id="TaskCommentSearchArea" class="w-100 searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2" placeholder="キーワードを入力してください。">
                    </div>
                    <div id="CommentDisplayArea">
                        @foreach($taskmsgobj as $key => $value)
                        <div class="commenttag w-100 mb-4 p-2">
                            <h4>{{$value->commenttitle}}</h4>
                            <p>{{$value->commentpassage}}</p>
                            <small class="d-inline-block w-100 text-right">
                                <span class="font-weight-bold">送信日:</span>
                                <span class="FontAccent"> {{date('Y-m-d',  strtotime($value->created_at))}}</span>
                            </small>
                            <small class="d-inline-block w-100 text-right">
                                <span class="font-weight-bold">更新日:</span>
                                <span class="FontAccent"> {{date('Y-m-d',  strtotime($value->updated_at))}}</span>
                            </small>
                        </div>
                        @endforeach
                    </div>
                    <img id="commentbutton" class="d-inline-block searchicon float-right cursor" src="{{ asset('secure_asset/addcomments.png') }}">
                </div>
            </div>
        </div>
    </div>
@endsection

<script type="module">
import {Ajax} from '../js/Ajax.js';
import {ModalCommonMotion, commonloadMotion} from '../../js/modal.js'
import {Validation} from '../../js/validation.js'

    document.getElementById('commentbutton').addEventListener('click', () => {
        ModalCommonMotion();
        document.getElementById("EditMd").removeAttribute("style");
        document.getElementById("EditMdMn").removeAttribute("style");

        document.getElementById('FirstTitle').innerText = 'コメントを追加する';
        document.getElementById('SecondTitle').innerText = '完了';
        document.getElementById('SecondMsg').innerText = '完了';
        document.getElementById('SecondMsgTitle').innerText = 'コメントを追加しました。';
        document.getElementById("commonmodal").action = "{{ route('taskdetail.addcomments', ['id' => $taskobj[0]->id]) }}";

        document.getElementById('FirstHTML').innerHTML = `
        <div class=" col-md-12 m-auto pl-0 pr-0">
            <div class="col-12 pt-1 pb-1 m-auto">
                <div class="w-100 d-inline-block mb-2">タイトル <small id="sendCommentTitleAlert" class="red"></small></div>
                <input name="sendCommentTitle" type="text" class="w-100 d-inline-block mb-4">
                <div class="w-100 d-inline-block mb-2">メッセージ <small id="sendCommentMsgAlert" class="red"></small></div>
                <textarea name="sendCommentMsg" class="w-100 d-inline-block mb-4"></textarea>
                <input name="TaskObjId" type="hidden" value="{{$taskobj[0]->userid}}">
            </div>
        </div>
        `;
    });

    const ajax = new Ajax();
    const SearchArea = document.getElementById('TaskCommentSearchArea');
    SearchArea.addEventListener('input', (e) => {
        commonloadMotion('CommentDisplayArea', "{{ asset('secure_asset/loadingicon.png') }}");

        ajax.method1(
            "{{ route('taskdetail.searchcomments', ['id' => $id]) }}",
            'POST',
            {"TaskCommentSearchArea":SearchArea.value},
            (Res) => {
                document.getElementById('CommentDisplayArea').innerHTML = MakeSearchResultHtml(Res);
            },
            (Res1, res2) => {
                console.log("失敗");
            }
        );
    });

    const MakeSearchResultHtml = (Obj) => {
        var appendHTML = '';
        for (const prop in Obj) {
            appendHTML += `
            <div class="commenttag w-100 mb-4 p-2">
                <h4>${Obj[prop].commenttitle}</h4>
                <p>${Obj[prop].commentpassage}</p>
                <small class="d-inline-block w-100 text-right">
                    <span class="font-weight-bold">送信日:</span> <span class="FontAccent">${Obj[prop].created_at}</span>
                </small> 
                <small class="d-inline-block w-100 text-right">
                    <span class="font-weight-bold">更新日:</span> <span class="FontAccent">${Obj[prop].updated_at}</span>
                </small>
            </div>
            `;
        }
        return appendHTML;
    };
</script>
<style>
    #AddressArea{
        border: double 3px #0069d9;
    }
    .commenttag{
        position: relative;
        padding: 20px;
        background-color: #ffff;
        border-radius: 10px;
        border: solid 1px rgb(0, 0, 0, 0.11);
    }

    .commenttag::before{
        content: '';
        position: absolute;
        display: block;
        width: 0;
        height: 0;
        left: 21.5px;
        bottom: -20px;
        border-top: 20px solid rgb(0, 0, 0, 0.11);
        border-right: 0px solid transparent;
        border-left: 26px solid transparent;
    }

    .commenttag::after{
        content: '';
        position: absolute;
        display: block;
        width: 0;
        height: 0;
        left: 23.5px;
        bottom: -18px;
        border-top: 18px solid #fff;
        border-right: 0px solid transparent;
        border-left: 23px solid transparent;
    }
</style>