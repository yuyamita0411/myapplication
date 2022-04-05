@extends('layouts.app')
@section('content')
    <h5 class="mainfontcolor mb-3 w-100 d-inline-block">タスクを検索</h5>
    <form method="GET" action="{{route('taskinfo')}}" class="d-inline-block w-100 overflow-hidden">
        <div class="mb-3 w-100 d-inline-block">
            <div class="tablediv tabledivleft col-6 col-md-6 float-left pl-2">担当者名</div>
            <div id="inchargewrapper" class="tablediv bg-white col-6 col-md-6 float-right pl-0 pr-0">
                <div id="selectincharge" class="w-100 d-inline-block cursor text-white pl-2">担当者を選択する <small id="selectwhich" class="text-white">{{$paraminfo['selectinchargename']}}</small></div>
                <div class="inchargemenu w-100 d-inline-block position-absolute inchargemenuclose">
                    <div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="">
                        すべて
                    </div>
                    @foreach($commondata['companydata'] as $Ykey => $Yvalu)
                    <div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="{{$Yvalu['id']}}:{{$Yvalu['name']}}">
                        {{$Yvalu['name']}}
                    </div>
                    @endforeach
                    <input type="hidden" name="selectincharge" value="{{$paraminfo['selectincharge']}}">
                </div>
            </div>
        </div>
        <div class="mb-3 w-100 d-inline-block">
            <div class="d-flex tablediv bg-white col-12 col-md-5 float-md-left mb-4 pl-0">
                <input name="deadlinebeginyear" type="text" class="w-100 d-inline-block" value="{{$paraminfo['by']}}">
                <div class="text-center">年</div>
                <input name="deadlinebeginmonth" type="text" class="w-100 d-inline-block" value="{{$paraminfo['bm']}}">
                <div class="text-center">月</div>
                <input name="deadlinebegindate" type="text" class="w-100 d-inline-block" value="{{$paraminfo['bd']}}">
                <div class="text-center">日</div>
            </div>
            <div class="tablediv col-12 col-md-1 float-md-left d-inline-block pl-2">〜</div>
            <div class="d-flex tablediv bg-white col-12 col-md-5 float-md-left mb-4 pl-0">
                <input name="deadlineendyear" type="text" class="w-100 d-inline-block" value="{{$paraminfo['ey']}}">
                <div class="text-center">年</div>
                <input name="deadlineendmonth" type="text" class="w-100 d-inline-block" value="{{$paraminfo['em']}}">
                <div class="text-center">月</div>
                <input name="deadlineenddate" type="text" class="w-100 d-inline-block" value="{{$paraminfo['ed']}}">
                <div class="text-center">日</div>
            </div>
            <div class="float-right float-lg-left d-inline-block pl-2">
                <img
                src="{{ asset('asset/modalclosebutton.png') }}"
                id="delete_date_area"
                class="searchicon cursor mt-1 p-1 tooltip-top"
                data-tooltip="入力を取り消す"
                >
            </div>
        </div>
        <div class="mb-3 d-flex w-100">
            <div class="pr-3 w-100">
                <div class="searchbarwrapper mt-0">
                    <input type="text"
                    name="searchTaskTitle"
                    class="w-100 searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2"
                    placeholder="キーワードを入力してください。"
                    value="{{$paraminfo['searchTaskTitle']}}"
                    >
                </div>
            </div>
            <input
                type="image"
                value="検索"
                class="searchicon"
                src="{{ asset('asset/SearchGlassIcon.png') }}"
            >
        </div>
    </form>


    <div class="">
        <div id="TaskDisplayArea" class="w-100 d-inline-block mt-3">
            @foreach($taskdata['taskdata'] as $key => $grouparr)
            <div class="gridinside d-inline-block w-100 mb-3 bg-white position-relative">
                <div class="d-inline-block w-100 pt-3 pb-3 pr-2 pl-2 overflow-hidden">
                <?php $count = 0;?>
                @foreach($grouparr as $eacharrkey => $eacharrval)
                @if($eacharrval['labelname'] != '依頼日' && 
                    $eacharrval['labelname'] != 'ID' && 
                    $eacharrval['labelname'] != 'USERID'
                )
                    <div class="col-12 col-md-4 float-left p-2">
                        <div class="tooltip-top float-left cursor" data-tooltip="{{$eacharrval['labelname']}}">
                            @if(!empty($commondata['Iconinfo'][$eacharrval['labelname']]))
                            <img src="{{ asset($commondata['Iconinfo'][$eacharrval['labelname']]) }}"
                            class="searchicon d-inline-block">
                            @endif
                        </div>
                        @if($eacharrval['labelname'] == '期日')
                        <span class="col-10 float-left">
                            <span class="taskinfoalertare d-inline-block float-left ml-2 font-lg-12 w-100 pr-0 pl-0"></span>
                            <span class="taskinfostr deadlinestr d-inline-block float-left ml-2 font-lg-12 w-100 pr-0 pl-0">
                                {{date('Y-m-d',  strtotime($eacharrval['value']))}}
                            </span>
                        </span>
                        @else
                        <span class="d-inline-block position-absolute font-lg-12 col-10">
                            {{$eacharrval['value']}}
                        </span>
                        @endif
                    </div>
                @endif
                @endforeach
                </div>
                <div class="d-inline-block w-100 p2px">
                    <div class="d-inline-block w-100 position-relative p-2 bg-white">
                        <div class="col-12 col-md-6 col-lg-2 float-left pl-0 pr-0">
                        @foreach($grouparr as $eacharrkey => $eacharrval)
                            @if($eacharrval['labelname'] == 'ID')
                            <a href="{{ route('taskdetail', ['id' => $eacharrval['value']]) }}" data-taskid="{{$eacharrval['value']}}" class="BgAccentColor text-white cursor p-2 p-lg-1 d-inline-block text-center mb-0 float-left w-100">詳細ページへ</a>
                            @endif
                        @endforeach
                        </div>
                        <div class="d-inline-block col-12 float-left pl-0 pr-0 mt-2">
                            @foreach($grouparr as $eacharrkey => $eacharrval)
                            @if($eacharrval['labelname'] == 'USERID')
                            <div class="searchicon tooptip-top float-right cursor" data-tooltip="担当者にメッセージを送る">
                                <img src="{{ asset('asset/mailsendicon.png') }}" id="SendMsgUserButton-{{$eacharrval['value']}}" class="d-inline-block w-100">
                            </div>
                            @endif
                            @endforeach
                        @foreach($grouparr as $eacharrkey => $eacharrval)
                            @if($eacharrval['labelname'] == '依頼日')
                            <span class="font-lg-12 d-inline-block pt-2 pb-2 text-right loat-left">依頼日: <span class="FontAccent">{{date('Y-m-d',  strtotime($eacharrval['value']))}}</span></span>
                            @endif
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div id="PageNationNumArea" class="w-100 d-flex col-md-6 m-auto pt-3">
        {{ $taskdata['taskobj']->onEachSide(1)->appends(request()->input())->links() }}
    </div>
@endsection

<script type="module">
    import {Ajax} from '../js/Ajax.js';
    import {PageNation} from '../js/Pagenation.js';
    import {ModalCommonMotion, commonloadMotion} from '../../js/modal.js';
    import {Validation} from '../../js/validation.js'

    const pagenation = new PageNation();

    window.addEventListener('click', (e) => {
        if (e.target.id.match(/SendMsgUserButton/)) {
            document.getElementById('FirstTitle').innerText = '担当者にメッセージを送る';
            document.getElementById('SecondTitle').innerText = '完了';
            document.getElementById('SecondMsg').innerText = '完了';
            document.getElementById('SecondMsgTitle').innerText = '担当者にメッセージを送信しました。';
            document.getElementById("commonmodal").action = "{{ route('taskinfo.send') }}";
            document.getElementById('FirstHTML').innerHTML = `
            <h5 class="mainfontcolor col-12 pt-4 pb-1 mb-2">タイトル <small id="messaagetitleAlert" class="red"></small></h5>
            <div class=" col-md-12 m-auto pl-0 pr-0 bg-white d-flex">
                <div id="" class="col-12 pb-1 m-auto">
                    <div class=" w-100 d-inline-block pl-0 pr-0 bg-white">
                        <div class="w-100 pb-1 m-auto">
                            <div class="">
                                <div class="searchbarwrapper d-inline-block w-100 mt-0">
                                    <input name="messaagetitle" type="text" class="w-100 searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2" placeholder="メッセージのタイトルを入力してください。">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="mainfontcolor col-12 pt-4 pb-1 mb-2">本文 <small id="messagepassageAlert" class="red"></small></h5>
            <div class=" col-md-12 m-auto pl-0 pr-0 bg-white d-flex">
                <div id="" class="col-12 pb-1 m-auto">
                    <div class=" w-100 d-inline-block pl-0 pr-0 bg-white">
                        <div class="w-100 pb-1 m-auto">
                            <div class="">
                                <div class="searchbarwrapper d-inline-block w-100 mt-0">
                                    <textarea name="messagepassage" class="taskmsgaarea w-100 searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2" placeholder="メッセージの本文を入力してください。"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            `;
            commonmotion();
            ModalCommonMotion();
            var div = document.createElement("div");
            div.setAttribute('id', 'Taskidhidden');
            var innerdiv = `
                <input type="hidden" name="userid" value="${e.target.id.replace('SendMsgUserButton-', '')}">
                <input type="hidden" name="taskid" value="${e.target.parentNode.parentNode.previousElementSibling.childNodes[1].dataset.taskid}">
                `;
            div.innerHTML = innerdiv;
            document.getElementById('commonmodal').appendChild(div);
        }

        if(e.target.className.indexOf('inchargeinner') != -1){
            if(e.target.parentNode.classList.contains('inchargemenuclose')){
                e.target.parentNode.classList.toggle('inchargemenuclose');
                e.target.parentNode.classList.toggle('inchargemenuopen');
            }else{
                e.target.parentNode.classList.toggle('inchargemenuclose');
                e.target.parentNode.classList.toggle('inchargemenuopen');
            }

            document.querySelectorAll('input[name="selectincharge"]')[0].value = e.target.dataset.incharge;
            document.getElementById('selectwhich').innerText = e.target.innerText;
        }

        if(e.target.id == 'selectincharge'){
            if(e.target.nextElementSibling.classList.contains('inchargemenuclose')){
                e.target.nextElementSibling.classList.toggle('inchargemenuclose');
                e.target.nextElementSibling.classList.toggle('inchargemenuopen');
            }else{
                e.target.nextElementSibling.classList.toggle('inchargemenuclose');
                e.target.nextElementSibling.classList.toggle('inchargemenuopen');
            }
        }
    });

    /*** 送信するデータは大体決まっているから使い回す ***/
    const ajax = new Ajax();
    var searchTaskTitle = document.querySelectorAll('input[name="searchTaskTitle"]')[0],
    selectincharge = document.querySelectorAll('input[name="selectincharge"]')[0],

    deadlinebeginyear = document.querySelectorAll('input[name="deadlinebeginyear"]')[0],
    deadlinebeginmonth = document.querySelectorAll('input[name="deadlinebeginmonth"]')[0],
    deadlinebegindate = document.querySelectorAll('input[name="deadlinebegindate"]')[0],

    deadlineendyear = document.querySelectorAll('input[name="deadlineendyear"]')[0],
    deadlineendmonth = document.querySelectorAll('input[name="deadlineendmonth"]')[0],
    deadlineenddate = document.querySelectorAll('input[name="deadlineenddate"]')[0];

    
    /****** モーダル部分共通の挙動 ******/
    const commonmotion = () => {
        document.getElementById("EditMd").removeAttribute("style");
        document.getElementById("EditMdMn").removeAttribute("style");
    }

    /****** バックエンドに送る際に送るデータは大体決まってるのでまとめた ******/
    const returnSearchVal = () => {
        return {
            "searchTaskTitle":searchTaskTitle.value,
            "selectincharge":selectincharge.value,

            "deadlinebeginyear":`0${deadlinebeginyear.value}`.slice(-2),
            "deadlinebeginmonth":`0${deadlinebeginmonth.value}`.slice(-2),
            "deadlinebegindate":`0${deadlinebegindate.value}`.slice(-2),

            "deadlineendyear":`0${deadlineendyear.value}`.slice(-2),
            "deadlineendmonth":`0${deadlineendmonth.value}`.slice(-2),
            "deadlineenddate":`0${deadlineenddate.value}`.slice(-2)
        };
    }
    /****** バックエンドに送る際に送るデータは大体決まってるのでまとめた ******/


    /****** 検索した時に取得データの数をカウントしてページネーションを作る処理 ******/

    /****** 期限切れのタスクに対して赤文字、残りの日数をカウントする処理 ******/
    const CaluculateDeadLine = () => {
        document.querySelectorAll('.deadlinestr').forEach((Obj) => {
            var _Deadline = new Date(Obj.innerText);
            var Deadline = new Date(_Deadline.getFullYear(), _Deadline.getMonth(), _Deadline.getDate(), 0, 0, 0);
            Deadline.setDate(Deadline.getDate() + 1);//5/11締め切りだったら 5/12 0:00までになるから日付は1足す

            var today = new Date();

            if(Deadline < today){
                Obj.previousElementSibling.innerText = "期限切れ";
                Obj.classList.add('red');
            }else{
                var dateDiffMillisec = Deadline - today;
                var diffDays = parseInt(dateDiffMillisec / 1000 / 60 / 60 / 24);
                Obj.previousElementSibling.innerText = `期限切れまであと${diffDays}日`;
            }
        });
    }
    CaluculateDeadLine();
    /****** 期限切れのタスクに対して赤文字、残りの日数をカウントする処理 ******/

    document.getElementById('delete_date_area').addEventListener('click', () => {
        document.querySelectorAll("input[name*='deadline']").forEach((obj) => {
            obj.value = "";
        });
    });

    /****** ページネーションをクリックした時にデータを取得するための処理 ******/
    const GetDataFromPageNation = () => {
        returnSearchVal();
    }
    /****** ページネーションをクリックした時にデータを取得するための処理 ******/

    /****** 吹き出しを見えるようにする ******/
    window.addEventListener('mouseover', (el) => {
        if(el.target.className.match(/searchicon/)){
            el.target.closest('.taskdarea').classList.toggle('overflow-hidden');
        }
    });
    window.addEventListener('mouseout', (el) => {
        if(el.target.className.match(/searchicon/)){
            el.target.closest('.taskdarea').classList.toggle('overflow-hidden');
        }
    });
    /****** 吹き出しを見えるようにする ******/

</script>

<style>
th, td {
    outline: 0.5px solid #ddd;
    padding-top: 10px;
    padding-bottom: 10px;
    text-align: center;
}
.taskinfostr{
    bottom: 0.5rem;
    left: 3rem;
}
.taskinfoalertare{
    color:red;
    top: 0.5rem;
    left: 3rem;
}

.taskdarea{
    box-shadow: 0 0 0 0 rgb(0, 0, 0, 0.13), 0 0.06rem 0.1rem 0 rgb(0, 0, 0, 0.11);
}
.p2px{
    padding:2px;
}
</style>