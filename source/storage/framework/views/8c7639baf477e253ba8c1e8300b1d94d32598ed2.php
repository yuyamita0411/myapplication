<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo e(env('APP_NAME')); ?></title>
        <script src="<?php echo e(secure_asset('js/jquery.min.js')); ?>"></script>
        <script type="javascript" src="<?php echo e(secure_asset('js/popper.min.js')); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.2/xlsx.full.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>
        <link href="<?php echo e(secure_asset('css/tooltip.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(secure_asset('css/bootstrap.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(secure_asset('css/style.css')); ?>" rel="stylesheet">
        <meta name="robots" content="noindex" />
    </head>
    <body id="<?php echo e($commondata['SlugArr'][Auth::getUser()->type]); ?>">
        <div class="dashbordwrapper d-inline-block w-100">
            <div id="dashboardnemue" class="dashboardnemue d-inline-block position-fixed w-100 p-0 bg-white">
                <div class="d-inline-block w-100 pr-1 pl-1 pt-1 pb-1 pr-md-3 pl-md-3">
                    <div class="d-inline-block float-left font-weight-bold pt-1 pb-1 pl-4 pl-md-0">
                        <span class="mr-2">
                            <img src="<?php echo e(secure_asset('asset/logo.png')); ?>" class="accounticon">
                        </span>
                        <a href="/" class="logoinnertxt d-none d-md-inline-block"><?php echo e(env('APP_NAME')); ?></a>
                    </div>
                    <div id="AccountArea" class="AccountArea cursor d-inline-block float-right font-weight-bold pt-1 pb-1 pl-3 pr-3 text-white">
                        <span class="mr-2">
                            <img src="<?php echo e(secure_asset('asset/accounticon.png')); ?>" class="accountpersonicon">
                        </span>
                        <span id="greetingbar" class="greeting font-weight-normal text-white" data-idnow="<?php echo e($commondata['useridnow']); ?>">ようこそ</span><?php echo e(Auth::user()->name); ?>様
                        <span class="ml-2">
                            <img src="<?php echo e(secure_asset('asset/accountarrow.png')); ?>" id="accountrotateicon" class="accounticon">
                        </span>
                    </div>
                </div>
            </div>
            <div class="dashbordcontent w-100 position-relative">
                <div class="w-100 d-inline-block">
                    <div id="hbwrapper" class="hbwrapper w-100 position-fixed">
                        <div id="humburgerbutton" class="hbwrapper position-relative cursor float-right">
                            <span class="hbar w-75 d-inline-block position-absolute"></span>
                            <span class="hbar w-75 d-inline-block position-absolute"></span>
                            <span class="hbar w-75 d-inline-block position-absolute"></span>
                        </div>
                    </div>
                </div>
                <div id="sidebar" class="sidecolor sidebar shadowgrid col-12 col-md-3 float-md-left">
                    <a href="<?php echo e(route('dashboard')); ?>"
                        class="sidemenu tooltip-bottom sidebar_menu cursor d-inline-block 
                        col-6 col-md-12 mt-md-2 mb-md-2 text-center"
                        data-tooltip="ダッシュボード"
                        >
                        <img src="<?php echo e(secure_asset('asset/homeicon.png')); ?>" class="sidebaricon p-2">
                    </a>
                    <?php $__currentLoopData = $commondata['LinkInfoArr'][Auth::getUser()->type]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $LinkInfos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($LinkInfos['link']); ?>"
                    class="sidemenu sidebar_menu cursor d-inline-block
                    col-6 col-md-12 mt-md-2 mb-md-2 text-center tooltip-bottom"
                    data-tooltip="<?php echo e($LinkInfos['name']); ?>">
                        <img src="<?php echo e(asset($LinkInfos['img'])); ?>" class="sidebaricon p-2">
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div id="maincolumn" class="maincolumn position-relative float-md-right mb-3 pb-5">
                    <div class="<?php if(!Request::routeIs('schedule')): ?> shadowwrapper <?php endif; ?> m-auto pl-2 pr-2 pl-lg-0 pr-lg-0">
                        <div class="contentwraper w-100 d-inline-block pt-3 pb-4 pl-0 pr-0 mt-3">
                            <?php echo $__env->yieldContent('content'); ?>
                        </div>
                    </div>
                </div>
                <div class="maincolumn bottom0 right0 BottomMshadow position-fixed bg-white d-flex z3">
                    <div id="SendTaskButton" class="w-100 float-left BgAccentMain">
                        <div class="cursor p-1 d-inline-block text-center mb-0 float-left w-100">タスク依頼</div>
                    </div>
                    <div id="AddButton" class="w-100 float-left BgAccentMain">
                        <div class="cursor p-1 d-inline-block text-center mb-0 float-left w-100">グループ作成</div>
                    </div>
                    <div class="w-100 float-left BgAccentMain">
                        <div class="cursor p-1 d-inline-block text-center mb-0 float-left w-100">メッセージ</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="logoutmodalcover" class="logoutmodalcover position-fixed cursor"></div>
        <div id="logoutmodal" class="logoutmodal position-fixed">
            <div class="logoutmodalinner w-100 bg-white position-relative">
                <div id="" class="w-100 m-auto p-3 bg-white d-inline-block">
                    <div id="" class="d-inline-block w-100 float-md-right pr-0 pl-0">
                        <div class="pt-3 m-auto">
                            <div class="w-100 d-inline-block text-center">
                                <h3 class="font-weight-bold pt-2 pb-2 mb-0 m-auto">アカウント</h3>
                            </div>
                        </div>
                        <div class="pt-5 pb-5 w-100 p-3 m-auto">
                            <div class=" col-md-12 m-auto pt-3 pb-3 pl-0 pr-0 bg-white">
                                <div class="col-12 pt-1 pb-1 m-auto">
                                    <div>
                                        <button type="submit" class="w-100 d-inline-block b-none text-white text-center font-weight-bold p-2 cursor bgmain">アカウント情報</button>
                                    </div>
                                </div>
                                <!--ログアウトのモーダル-->
                                <div class="col-12 pt-1 pb-1 m-auto">
                                    <form action="<?php echo e(route('logout')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="w-100 d-inline-block b-none text-white text-center font-weight-bold p-2 cursor BgAccentColor">ログアウト</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!----↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ パーツにして使いまわせるようにする。 ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓----------------------------------------------------------->
        <div id="commonmodalcover" class="position-fixed cursor commonmodalcoverclose"></div>
        <form method="POST" action="" id="commonmodal" class="position-fixed commonmodalclose pr-0 mb-0 bg-white">
            <?php echo csrf_field(); ?>
            <div class="modalinnerwrapper  overflow-hidden">
                <div id="EditMd" class="modalinnercover d-flex position-relative">
                    <div id="commonmodal1" class="Modal1 col-12 p-3 bg-white">
                        <div class=" w-100 d-inline-block pt-3 pb-3 pl-0 pr-0 bg-white pb-3">
                            <div id="" class="col-12 pr-0 pl-0 bg-white">
                                <div class="">
                                    <div class="w-100 d-inline-block text-center">
                                        <!--変わるところ-->
                                        <h3 id="FirstTitle" class="notificationtitle font-weight-bold pt-4 pb-2 mb-0 m-auto"></h3>
                                    </div>
                                </div>
                                <div id="FirstHTML" class="m-auto"></div>
                            </div>
                        </div>
                    </div>
                    <div id="commonmodal2" class="Modal2 col-12 pl-0 pr-0 position-relative bg-white">
                        <div class="m-auto h-100 bg-white">
                            <div class="">
                                <div class="w-100 d-inline-block text-center">
                                    <h3 id="SecondTitle" class="notificationtitle font-weight-bold pt-4 pb-2 mb-0 m-auto"></h3>
                                </div>
                            </div>
                            <div class=" col-md-12 m-auto pt-3 pb-3 pl-0 pr-0 bg-white">
                                <h5 id="SecondMsgTitle" class="mainfontcolor shadowtext col-12 pt-1 pb-1 mb-0"><!--変わるところ--></h5>
                                <div id="SecondMsg" class="col-12 pt-1 pb-1 mb-0">
                                <!--変わるところ-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!--モーダルのメニューは固定する-->
            <div id="commonmodalMenuBar" class="modalinnerwrapper overflow-hidden commonmodalbarclose">
                <div id="EditMdMn" class="modalinnercover d-flex position-relative">
                    <div class=" modalfinishbuttonwrapper col-12 mb-0 pt-0 pb-0 pl-0 pr-0 bg-white">
                        <div class="bgstripe45deg  col-12 m-auto pt-0 pb-0 pt-md-3 pb-md-3 pl-0 pr-0">
                            <div class="buttonarea d-flex m-auto">
                                <div id="commonmodalclosebutton" class="buttonicon margin-right-two p-2">
                                    <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                        <img src="<?php echo e(secure_asset('asset/modalclosebutton.png')); ?>" class="d-inline-block w-100 p-2">
                                    </div>
                                </div>
                                <div id="EditMdTo2" class="buttonicon p-2">
                                    <div class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold cursor br-50 line-3rem">
                                        <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                            <div id="SubmitButton" class="inportbutton w-100 d-inline-block b-none text-white text-center font-weight-bold cursor br-50 line-3rem">確認<!--変わるところ--></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" modalfinishbuttonwrapper col-12 mb-0 pt-0 pb-0 pl-0 pr-0 bg-white">
                        <div class="bgstripe45deg  col-12 m-auto pt-0 pb-0 pt-md-3 pb-md-3 pl-0 pr-0">
                            <div class="">
                                <div id="modalfinishbutton" class="buttonicon p-2 m-auto">
                                    <div class="w-100 d-inline-block text-center text-white font-weight-bold cursor br-50 bordergray bg-white">
                                        <img src="<?php echo e(secure_asset('asset/modalclosebutton.png')); ?>" class="d-inline-block w-100 p-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--モーダルのメニューは固定する-->
<!---↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ パーツにして使いまわせるようにする。 ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ ------------------------------------------------------------------------------------------------->

        <script type="module">
        import {SetElementMiddle, SetTopMargin, SetTopPadding} from '../../js/design.js'
        import {ModalCommonMotion} from '../../js/modal.js'
        import {Validation} from '../../js/validation.js'
        import {Ajax} from '../js/Ajax.js';
        import {Render} from '../js/render.js';
        /*ハンバーガーメニュー*/
        (() => {
            if(!document.getElementById('hbwrapper')) return;
                document.getElementById('hbwrapper').addEventListener('click', () => {
                    document.getElementById('humburgerbutton').classList.toggle('status_open');
                    document.getElementById('sidebar').classList.toggle('sidebaropen');
                    document.querySelectorAll('.hbwrapper > .hbar').forEach((El) => {
                    El.classList.toggle('barrotate');
                });
            });
        })();
        /*ハンバーガーメニュー*/

        ['load', 'resize'].forEach((ev) => {
            window.addEventListener(ev, () => {
                SetTopPadding('maincolumn', ['dashboardnemue', 'hbwrapper']);
                SetTopPadding('sidebar', ['dashboardnemue', 'hbwrapper']);
                SetElementMiddle('Loginmodal');
                SetTopMargin('hbwrapper', ['dashboardnemue']);
                var hprop = '';
                if(768 < window.innerWidth){
                    hprop = `height:calc(${window.innerHeight}px - 10rem);`
                }
                if(window.innerWidth <= 768){
                    hprop = `height:calc(${window.innerHeight}px - 8rem);`
                }
                document.getElementById('commonmodal').setAttribute(
                    'style',
                    hprop
                );
            });
        });

        /*アカウント情報のモーダル*/
        (() => {
            ['AccountArea', 'logoutmodalcover'].forEach((Idname) => {
                if(!document.getElementById(Idname)) return;
                document.getElementById(Idname).addEventListener('click', () => {
                    document.querySelectorAll('body')[0].classList.toggle('loginmodalisopen');
                    document.getElementById('logoutmodalcover').classList.toggle('modalcover_open');
                    document.getElementById('logoutmodal').classList.toggle('modal_open');
                    document.getElementById('accountrotateicon').classList.toggle('status_rotate');
                });
            });
        })();

        [`commonmodalcover`, `commonmodalclosebutton`, `modalfinishbutton`].forEach((Idname) => {
            if(!document.getElementById(Idname)){
                return
            }
            document.getElementById(Idname).addEventListener('click', () => {
                ModalCommonMotion();
            });
        });

        document.getElementById('SendTaskButton').addEventListener('click', () => {
            ModalCommonMotion();
            document.getElementById("EditMd").removeAttribute("style");
            document.getElementById("EditMdMn").removeAttribute("style");

            document.getElementById('FirstTitle').innerText = 'タスクを依頼する';
            document.getElementById('SecondTitle').innerText = '完了';
            document.getElementById('SecondMsg').innerText = '完了';
            document.getElementById('SecondMsgTitle').innerText = 'タスクを依頼しました';
            document.getElementById("commonmodal").action = "<?php echo e(route('taskinfo.assign')); ?>";

            document.getElementById('FirstHTML').innerHTML = `
            <div class=" col-md-12 m-auto pl-0 pr-0">
                <div class="col-12 pt-1 pb-1 m-auto">
                    <div class="w-100 d-inline-block mb-2">宛先</div>
                    <select name="selectincharge" class="br5px w-100 fileinput b-none mb-4">
                        <?php $__currentLoopData = $commondata['companydata']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Ykey => $Yvalu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($Yvalu['id']); ?>:<?php echo e($Yvalu['name']); ?>"><?php echo e($Yvalu['name']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div class="w-100 d-inline-block mb-2">タイトル <small id="sendTaskTitleAlert" class="red"></small></div>
                    <input name="sendTaskTitle" type="text" class="w-100 d-inline-block mb-4">
                    <div class="w-100 d-inline-block mb-2">メッセージ <small id="sendTaskMsgAlert" class="red"></small></div>
                    <textarea name="sendTaskMsg" class="w-100 d-inline-block mb-4"></textarea>

                    <div class="w-100 d-inline-block mb-2">期日 <small id="DateAlert" class="red"></small></div>
                    <div class="d-flex mb-4">
                        <input name="deadlineyear" type="text" class="w-100 d-inline-block">
                        <div class="w-100 d-inline-block text-center">年</div>
                        <input name="deadlinemonth" type="text" class="w-100 d-inline-block">
                        <div class="w-100 d-inline-block text-center">月</div>
                        <input name="deadlinedate" type="text" class="w-100 d-inline-block">
                        <div class="w-100 d-inline-block text-center">日</div>
                    </div>
                </div>
            </div>
            `;
        });

        document.getElementById('SubmitButton').addEventListener('click', () => {
            const validation = new Validation();
            var submitflag = true;

            //バリデーションはここ
            if(document.getElementById('commonmodal').action == "<?php echo e(route('taskinfo.assign')); ?>"){
                var Tt = document.querySelectorAll('input[name="sendTaskTitle"]');
                var TMs = document.querySelectorAll('textarea[name="sendTaskMsg"]');
                var TDy = document.querySelectorAll('input[name="deadlineyear"]');
                var TDm = document.querySelectorAll('input[name="deadlinemonth"]');
                var TDd = document.querySelectorAll('input[name="deadlinedate"]');

                if(!validation.IfIsNotEmpty(Tt[0].value)){
                    submitflag = false;
                    document.getElementById('sendTaskTitleAlert').innerText = '必須項目です。';
                }
                if(!validation.IfIsNotEmpty(TMs[0].value)){
                    submitflag = false;
                    document.getElementById('sendTaskMsgAlert').innerText = '必須項目です。';
                }
                if(!validation.IfIsNotEmpty(TDy[0].value)){
                    submitflag = false;
                    document.getElementById('DateAlert').innerText = '必須項目です。';
                }
                if(!validation.IfIsNotEmpty(TDm[0].value)){
                    submitflag = false;
                    document.getElementById('DateAlert').innerText = '必須項目です。';
                }
                if(!validation.IfIsNotEmpty(TDd[0].value)){
                    submitflag = false;
                    document.getElementById('DateAlert').innerText = '必須項目です。';
                }
                if(!validation.IfIsMunOnly(TDy[0].value)){
                    submitflag = false;
                    document.getElementById('DateAlert').innerText = '半角英数字を入力ください。';
                }
                if(!validation.IfIsMunOnly(TDm[0].value)){
                    submitflag = false;
                    document.getElementById('DateAlert').innerText = '半角英数字を入力ください。';
                }
                if(!validation.IfIsMunOnly(TDd[0].value)){
                    submitflag = false;
                    document.getElementById('DateAlert').innerText = '半角英数字を入力ください。';
                }
            }

            if(document.getElementById('commonmodal').action == "<?php echo e(route('taskinfo.send')); ?>"){
                var Mt = document.querySelectorAll('input[name="messaagetitle"]');
                var Mp = document.querySelectorAll('textarea[name="messagepassage"]');
                if(!validation.IfIsNotEmpty(Mt[0].value)){
                    submitflag = false;
                    document.getElementById('messaagetitleAlert').innerText = '必須項目です。';
                }
                if(!validation.IfIsNotEmpty(Mp[0].value)){
                    submitflag = false;
                    document.getElementById('messagepassageAlert').innerText = '必須項目です。';
                }
            }

            if(location.href.match(/taskdetail/)){
                var SCt = document.querySelectorAll('input[name="sendCommentTitle"]');
                var SCm = document.querySelectorAll('textarea[name="sendCommentMsg"]');
                if(!validation.IfIsNotEmpty(SCt[0].value)){
                    submitflag = false;
                    document.getElementById('sendCommentTitleAlert').innerText = '必須項目です。';
                }
                if(!validation.IfIsNotEmpty(SCm[0].value)){
                    submitflag = false;
                    document.getElementById('sendCommentMsgAlert').innerText = '必須項目です。';
                }
            }

            if(document.getElementById('commonmodal').action == "<?php echo e(route('groupinfo.add.user')); ?>"){
                if(document.querySelectorAll('input[name="UserToAdd[]"]').length == 0){
                    submitflag = false;
                    document.getElementById('AddedMemberAlert').innerText = '一人以上追加してください';
                }
            }

            if(document.getElementById('commonmodal').action == "<?php echo e(route('groupinfo.create')); ?>"){
                var Gn = document.getElementById('CreateGroupName');
                var Gd = document.getElementById('CreateGroupDescription');
                var Gu = document.getElementById('CreateSearchUser');
                if(!validation.IfIsNotEmpty(Gn.value)){
                    submitflag = false;
                    document.getElementById('CreateGroupNameAlert').innerText = '必須項目です。';
                }
                if(!validation.IfIsNotEmpty(Gd.value)){
                    submitflag = false;
                    document.getElementById('CreateGroupDescriptionAlert').innerText = '必須項目です。';
                }
                if(!validation.IfIsNotEmpty(Gu.value)){
                    submitflag = false;
                    document.getElementById('CreateSearchUserAlert').innerText = '必須項目です。';
                }
            }

            (() => {
                if(submitflag == false){
                    return;
                }
                document.getElementById(`EditMd`).setAttribute(
                    "style",
                    "left:-100%;"
                );
                document.getElementById(`EditMdMn`).setAttribute(
                    "style",
                    "left:-100%;"
                );
            })();

            setTimeout(() => {
                if(submitflag != true){
                    return;
                }
                document.getElementById('commonmodal').submit();
            }, 500);
            
        });

        /*let count = 0;
        setInterval(() => {
            count++
            var whichfase = count % 2;
            if(whichfase == 0){
                document.getElementById('BacktoPrevButton').classList.toggle('BacktoPrevButtonMoveLeft');
                document.getElementById('BacktoPrevButton').classList.toggle('BacktoPrevButtonMoveRight');
            }else{
                document.getElementById('BacktoPrevButton').classList.toggle('BacktoPrevButtonMoveLeft');
                document.getElementById('BacktoPrevButton').classList.toggle('BacktoPrevButtonMoveRight');
            }
        }, 500);*/

        document.getElementById('AddButton').addEventListener('click', () => {
            ModalCommonMotion();
            document.getElementById("EditMd").removeAttribute("style");
            document.getElementById("EditMdMn").removeAttribute("style");

            document.getElementById('FirstTitle').innerText = 'グループの作成';
            document.getElementById('SecondTitle').innerText = '完了';
            document.getElementById('SecondMsg').innerText = '完了';
            document.getElementById('SecondMsgTitle').innerText = '新規グループを作成しました。';
            document.getElementById("commonmodal").action = "<?php echo e(route('groupinfo.create')); ?>";

            document.getElementById('FirstHTML').innerHTML = `
                <h5 class="mainfontcolor col-12 pt-4 pb-1 mb-3 pl-4 pr-4">グループ名、メンバーをご記入ください</h5>
                <div class=" col-md-12 m-auto pb-2 pl-0 pr-0 bg-white d-flex">
                    <div id="" class="col-12 pb-1 m-auto">
                        <div class=" w-100 d-inline-block pl-0 pr-0 bg-white">
                            <div class="w-100 pb-1 m-auto">
                                <div class="d-inline-block w-100 pl-0 pr-0">
                                    <div class="searchbarwrapper d-inline-block w-100 mt-0">
                                        <input id="CreateGroupName" name="CreateGroupName" type="text" class="w-100 searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2" placeholder="グループ名を入力してください。">
                                        <small id="CreateGroupNameAlert" class="red"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" col-md-12 m-auto pb-2 pl-0 pr-0 bg-white d-flex">
                    <div id="" class="col-12 pb-1 m-auto">
                        <div class=" w-100 d-inline-block pl-0 pr-0 bg-white">
                            <div class="w-100 pb-1 m-auto">
                                <div class="d-inline-block w-100 pl-0 pr-0">
                                    <div class="searchbarwrapper d-inline-block w-100 mt-0">
                                        <textarea id="CreateGroupDescription" name="CreateGroupDescription" type="text" class="w-100 searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2" placeholder="概要"></textarea>
                                        <small id="CreateGroupDescriptionAlert" class="red"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" col-md-12 m-auto pt-3 pb-3 pl-0 pr-0 bg-white d-flex">
                    <div id="CreateMember" class="col-12 pb-1 m-auto"></div>
                </div>
                <div class=" col-md-12 m-auto pb-2 pl-0 pr-0 bg-white d-flex">
                    <div id="" class="col-12 pb-1 m-auto">
                        <div class=" w-100 d-inline-block pl-0 pr-0 bg-white">
                            <div class="w-100 pb-1 m-auto">
                                <div class="d-inline-block w-100 pl-0 pr-0">
                                    <div class="searchbarwrapper d-inline-block w-100 mt-0">
                                        <input id="CreateSearchUser" type="text" class="w-100 searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2" placeholder="ユーザー名を入力してください。">
                                        <small id="CreateSearchUserAlert" class="red"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-md-12 m-auto pt-3 pb-3 pl-0 pr-0 bg-white d-flex">
                    <div id="CreateGroupMemberResult" class="col-12 pb-1 m-auto"></div>
                </div>
            `;
        });

        const ajax = new Ajax();
        const render = new Render();
        window.addEventListener('input', (el) => {
            if (el.target.id.match(/CreateSearchUser/)) {
                document.getElementById('CreateGroupMemberResult').innerHTML = `
                    <div class="w-100 d-inline-block text-center position-relative" style="top:5rem;">
                        <img id="loadingicon" src="<?php echo e(secure_asset('asset/loadingicon.png')); ?>" class="col-2 m-auto d-block">
                        <p class="mt-3">Loading</p>
                    </div>
                `;
                ajax.method1(
                    "<?php echo e(route('groupinfo.search')); ?>",
                    'POST',
                    {
                        "addgroupmember":el.target.value
                    },
                    (Res) => {
                        document.getElementById('CreateGroupMemberResult').innerHTML = render.makeUserButton(Res, true);
                    },
                    (r1, r2) => {
                        console.log(r1);
                        console.log("fail!!");
                    }
                );
            }
        });
        </script>
        <style>
            #commonmodalMenuBar{
                position: fixed;
            }
            .commonmodalbarclose{
                opacity:0;
                bottom: -15rem;
                z-index:-1;
            }
            .commonmodalbaropen{
                opacity:1;
                bottom: 2rem;
                z-index: 9999;
            }
            .commonmodalbarclose,
            .commonmodalbaropen{
                transition:all 0.25s;
            }
            @media (min-width: 768px){
                #commonmodalMenuBar{
                    left: calc((100% - 45rem) / 2);
                    width: 45rem;
                }
            }
            @media (max-width: 768px){
                #commonmodalMenuBar{
                    width: 90%;
                    left: 5%;
                }
            }
        </style>
    </body>
</html><?php /**PATH /var/www/html/gware/resources/views/layouts/app.blade.php ENDPATH**/ ?>