<?php $__env->startSection('content'); ?>
<div class="d-inline-block w-100 mb-3">
    <div class="m-auto">
        <div class="col-md-12 m-auto pl-0 pr-0 position-relative">
            <div class="w-100 d-inline-block pl-3 pr-3">
                <div class="w-100 d-inline-block position-relative">
                    <div id="YearMenuArea" class="font1-3 d-inline-block w-100 cursor year_menu_closed"></div>
                    <div class="YearAreaWrapper mycolor d-flex mb-0 p-2">
                        <div id="YearArea" class="font1-3 d-inline-block mr-3 cursor"></div>
                        <input type="text" id="SearchCbyWord" name="SearchCbyWord"
                        class="searchbar border-top-left-radius-1rem border-bottom-left-radius-1rem
                        border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2 mt-0"
                        placeholder="担当者名から検索"
                        >
                        <input type="text" id="PerPageArea" name="PerPage"
                        class="col-1 ml-2 searchbar border-top-left-radius-1rem border-bottom-left-radius-1rem
                        border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2 mt-0"
                        placeholder="表示件数"
                        >
                    </div>
                    <div id="MonthMenuArea" class="font1-3 d-inline-block w-100 cursor month_menu_closed"></div>
                    <div class="w-100 d-md-flex">            
                        <div class="Carea d-inline-block w-100">
                            <div class="montharea d-md-flex w-100 mb-0">
                                <div id="MonthArea" class="text-center w-100 d-flex pr-2"></div>
                                <div id="prev7"
                                    class="cbutton tooltip-top d-inline-block text-center cursor col-auto pl-0 pr-0 font12"
                                    data-tooltip="7日前">◀︎◀︎</div>
                                <div id="prev"
                                    class="cbutton tooltip-top d-inline-block text-center cursor col-auto pl-0 pr-0 font12"
                                    data-tooltip="1日前">◀︎</div>
                                <div id="next"
                                    class="cbutton tooltip-top d-inline-block text-center cursor col-auto pl-0 pr-0 font12"
                                    data-tooltip="1日後">▶︎</div>
                                <div id="next7"
                                    class="cbutton tooltip-top d-inline-block text-center cursor col-auto pl-0 pr-0 font12"
                                    data-tooltip="7日後">▶︎▶︎</div>
                            </div>
                            <div id="DayArea" class="mt-0"></div>
                        </div>
                    </div>

                    <div id="ScheduleWrapper" clsss="position-relative">
                        <div id="ScheduleLoadingArea" class="position-absolute loadinghidden h-100 w-100 bg-white"></div>
                        <div id="MyScheduleArea" class="myschedulearea"></div>
                        <div id="UserScheduleArea" class="schedulearea"></div>
                    </div>
                    <div id="PagenationArea" class="paginationarea d-flex pt-4 col-12 col-lg-4 m-auto"></div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<script type="module">
    import {ModalCommonMotion} from '../../js/modal.js'
    import {Calender, Schedule} from '../js/calender.js';
    import {Param} from '../js/param.js';
    import {Ajax} from '../js/Ajax.js';
    import {commonloadMotion} from '../js/modal.js';
    import {Render} from '../js/render.js';
    import {PageNation} from '../js/Pagenation.js';
    const ajax = new Ajax();
    const schedule = new Schedule();
    const param = new Param();
    const render = new Render();
    const pagination = new PageNation();
    var AddMemberHTML = '';
    var AddedUserList = {};
    var orderby = "asc";
    var PageNow = 1;

    window.addEventListener('load', (e) => {
        var dateobj = param.GetUrlParamObj();
        var appenddate = new Date();
        commonloadMotion('ScheduleLoadingArea', "<?php echo e(secure_asset('asset/loadingicon.png')); ?>");
        if(dateobj.year && dateobj.month && dateobj.day){
            appenddate = `${dateobj.year}/${dateobj.month}/${dateobj.day}`;
        }

        if(location.search == ''){
            schedule.MakeScheduleArea(appenddate, 'YearArea', 'MonthArea', 'DayArea', 0, 1);
        }
        if(location.search.match(/starttime=/)){
            schedule.MakeScheduleArea(location.search.split('=')[1], 'YearArea', 'MonthArea', 'DayArea', 0, 1);
        }
        //ここから、htmlに格納されたdata属性からその後のバックエンドの処理が走る

        //日付、タイトル名、概要、キーワードなどでその後の処理を決める
        RebaseCalender(0);
    });

    window.addEventListener('resize', (e) => {
        RebaseCalender(0);
    });

    window.addEventListener('click', (e) => {
        //prev next prev7 next7
        if(e.target.id == "prev"){
            RebaseCalender(-1);
        }
        if(e.target.id == "prev7"){
            RebaseCalender(-7);
        }
        if(e.target.id == "next"){
            RebaseCalender(1);
        }
        if(e.target.id == "next7"){
            RebaseCalender(7);
        }
        if(e.target.id == 'SortArea'){
            sortelem();
        }
        if(e.target.className.match(/sortelem/)){
            sortelem();
            orderby = e.target.dataset.orderby;
            RebaseCalender(0);
        }
        if(e.target.className.match(/calenderBtn/)){
            AddedUserList = {};
            var senddata = {
                "userid":e.target.dataset.buttonuserid,
                "startdate":e.target.dataset.setscheduleinfo
            }
            //AddedUserList['userid'] = e.target.dataset.buttonuserid;
            var smodal = schedule.CreateSchedule(senddata);
            document.getElementById('FirstHTML').innerHTML = '';
            document.getElementById('FirstHTML').innerHTML += `
            <input type="hidden" name="mainid" value="${e.target.dataset.buttonuserid}">
            <input type="hidden" name="starttime" value="${e.target.dataset.setscheduleinfo}">
            <p class="col-12">${e.target.dataset.setscheduleinfo}</p>
            <div class="col-12 d-flex">
                <img
                src="<?php echo e(secure_asset('asset/timeicon.png')); ?>"
                class="searchicon cursor p-1 mr-3 tooltip-top"
                data-tooltip="時刻を設定する"
                >
                <div class="w-100 text-center pr-2 position-relative">
                    <div id="starthour" class="starthour buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor">09</div>
                    <div id="starthourmenu" class="position-absolute bg-white menuhide gridinside"></div>
                </div>
                <div class="buttonicon text-center pr-2">:</div>
                <div class="w-100 text-center pr-2 position-relative">
                    <div id="startminute" class="startminute buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor">00</div>
                    <div id="startminutemenu" class="position-absolute bg-white menuhide gridinside"></div>
                </div>
                <div class="buttonicon text-center">~</div>
                <div class="w-100 text-center pl-2 position-relative">
                    <div id="endhour" class="endhour buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor">10</div>
                    <div id="endhourmenu" class="position-absolute bg-white menuhide gridinside"></div>
                </div>
                <div class="buttonicon text-center pl-2">:</div>
                <div class="w-100 text-center pl-2 position-relative">
                    <div id="endminute" class="endminute buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor">00</div>
                    <div id="endminutemenu" class="position-absolute bg-white menuhide gridinside"></div>
                </div>
                <input type="hidden" id="Sstarttime" name="Sstarttime" value="09:00">
                <input type="hidden" id="Sendtime" name="Sendtime" value="10:00">
            </div>
            <span id="timealert" class="d-inline-block w-100 text-center red mt-3"></span>
            `;

            ModalCommonMotion();
            document.getElementById("EditMd").removeAttribute("style");
            document.getElementById("EditMdMn").removeAttribute("style");

            document.getElementById('FirstTitle').innerText = 'スケジュールを追加する';
            document.getElementById('SecondTitle').innerText = '完了';
            document.getElementById('SecondMsg').innerText = '完了';
            document.getElementById('SecondMsgTitle').innerText = 'スケジュールを追加しました。';
            document.getElementById("commonmodal").action = "<?php echo e(route('schedule.schedule.add')); ?>";
            
            document.getElementById('FirstHTML').append(smodal);

            document.getElementById('FirstHTML').innerHTML += render.createGroupHTMLFormat(e.target.dataset.buttonuserid);

        }
        if(e.target.className.match(/rebaseschedule/)){
            AddedUserList = {};
            var senddata = {
                "userid":e.target.dataset.buttonuserid,
                "startdate":e.target.dataset.setscheduleinfo
            }
            //var smodal = schedule.CreateSchedule(senddata);
            document.getElementById('FirstHTML').innerHTML = '';
            document.getElementById('FirstHTML').innerHTML += `<input type="hidden" name="mainid" value="${e.target.dataset.buttonuserid}">`;
            document.getElementById('FirstHTML').innerHTML += `<input type="hidden" name="starttime" value="${e.target.dataset.setscheduleinfo}">`;
            ModalCommonMotion();
            document.getElementById("EditMd").removeAttribute("style");
            document.getElementById("EditMdMn").removeAttribute("style");

            document.getElementById('FirstTitle').innerText = 'スケジュールを編集する';
            document.getElementById('SecondTitle').innerText = '完了';
            document.getElementById('SecondMsg').innerText = '完了';
            document.getElementById('SecondMsgTitle').innerText = 'スケジュールを編集しました。';
            document.getElementById("commonmodal").action = "<?php echo e(route('schedule.schedule.rebase')); ?>";
            MakeEditSchedule(e);
        }

        if (e.target.className.match(/adduserbuton/)) {
            AddMemberHTML = '';
            if(isKeyExists(AddedUserList, e.target.dataset.id) == false){
                AddedUserList[e.target.dataset.id] = 
                {
                    "name":e.target.dataset.name,
                    "id":e.target.dataset.id
                }
                e.target.classList.remove('adduserbuton');
                e.target.classList.add('inportbutton');
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
            if(e.target.parentNode.id == "SearchResultArea"){
                document.getElementById('AddedMember').innerHTML = AddMemberHTML;
            }
            if(e.target.parentNode.id == "CreateGroupMemberResult"){
                document.getElementById('CreateMember').innerHTML = AddMemberHTML;
            }
        }
        if(e.target.className.match(/addeduserbuton/)){
            AddMemberHTML = '';
            document.querySelectorAll('.adduserbuton, .inportbutton').forEach((Obj) => {
                if(Obj.dataset.id == e.target.dataset.addeduserid){
                    Obj.classList.remove('inportbutton');
                    Obj.classList.add('adduserbuton');
                }
                for(var object in AddedUserList){
                    if(e.target.dataset.addeduserid == AddedUserList[object].id){
                        delete AddedUserList[object];
                        e.target.remove();
                    }
                }
            });
        }

        if(e.target.className.match(/alreadyadded/)){
            e.target.remove();
        }

        //年の文字を押した時
        if(e.target.id == 'YearArea' || e.target.className.match(/yearvalselector/)){

            document.getElementById('YearMenuArea').classList.toggle('year_menu_closed');
            document.getElementById('YearMenuArea').classList.toggle('year_menu_open');

            var appendyear = document.getElementById('CFirstDate').dataset.cstartdate.split('/');

            if(document.getElementById('YearMenuArea').classList.contains('year_menu_open')){
                schedule.MakeYearArea('CFirstDate', 'YearMenuArea', appendyear[0]);
            }else{
                document.getElementById('YearMenuArea').innerHTML = '';
            }
            //左から年を選択するメニューの開閉
        }
        if(e.target.id != 'YearArea' && !e.target.className.match(/yearvalselector/) && document.getElementById('YearMenuArea').classList.contains('year_menu_open')){
            document.getElementById('YearMenuArea').classList.toggle('year_menu_closed');
            document.getElementById('YearMenuArea').classList.toggle('year_menu_open');
            document.getElementById('YearMenuArea').innerHTML = '';
        }
        //年のエリアを閉じる時 年のメニューをクリックした時
        //id CFirstDateの data cstartdate の年以外の部分を抽出し、カレンダーを作成する処理を入れる。
        //今は0
        if(e.target.className.match(/yearvalselector/) ){
            var datanowarr = document.getElementById('CFirstDate').dataset.cstartdate.split('/');
            var appenddate = `${e.target.dataset.yeardata}/${datanowarr[1]}/${datanowarr[2]}`;
            schedule.MakeScheduleArea(appenddate, 'YearArea', 'MonthArea', 'DayArea', 0, 1);
            RebaseCalender(0);
        }

        if(e.target.id == 'MonthButton' || e.target.className.match(/monthvalselector/)){
            document.getElementById('MonthMenuArea').classList.toggle('month_menu_closed');
            document.getElementById('MonthMenuArea').classList.toggle('month_menu_open');

            var appendmonth = document.getElementById('CFirstDate').dataset.cstartdate.split('/');

            if(document.getElementById('MonthMenuArea').classList.contains('month_menu_open')){
                schedule.MakeMonthArea('CFirstDate', 'MonthMenuArea', appendmonth[1]);
            }else{
                document.getElementById('MonthMenuArea').innerHTML = '';
            }
        }
        if(e.target.id != 'MonthArea' && !e.target.className.match(/monthvalselector/) && document.getElementById('MonthMenuArea').classList.contains('year_menu_open')){
            document.getElementById('MonthMenuArea').classList.toggle('month_menu_closed');
            document.getElementById('MonthMenuArea').classList.toggle('month_menu_open');
            document.getElementById('MonthMenuArea').innerHTML = '';
        }
        if(e.target.className.match(/monthvalselector/)){
            var datanowarr = document.getElementById('CFirstDate').dataset.cstartdate.split('/');
            var appenddate = `${datanowarr[0]}/${e.target.dataset.monthdata}/${datanowarr[2]}`;
            schedule.MakeScheduleArea(appenddate, 'YearArea', 'MonthArea', 'DayArea', 0, 1);
            RebaseCalender(0);
        }

        if(e.target.className.match(/pagenationnum/)){
            PageNow = e.target.innerText;
            RebaseCalender(0);
        }

        ['start', 'end'].forEach((s) => {
            ['hour', 'minute'].forEach((t) => {
                if(e.target.className.match(new RegExp(`${s}${t}`)) || e.target.className.match(new RegExp(`${s}${t}menubutton`))){
                    document.getElementById(`${s}${t}menu`).classList.toggle('menushow');
                    if(document.getElementById(`${s}${t}menu`).classList.contains('menushow')){
                        if(t == 'hour'){
                            document.getElementById(`${s}${t}menu`).innerHTML = MakeHourHTML(`${s}${t}menubutton Sbutton`);
                        }
                        if(t == 'minute'){
                            document.getElementById(`${s}${t}menu`).innerHTML = MakeMinuteHTML(`${s}${t}menubutton Sbutton`);
                        }
                    }else{
                        if(e.target.className.match(new RegExp(`${s}${t}menubutton`))){
                            e.target.parentNode.previousElementSibling.innerText = e.target.innerText;
                            document.getElementById('Sstarttime').value = `${document.getElementById('starthour').innerText}:${document.getElementById('startminute').innerText}`;
                            document.getElementById('Sendtime').value = `${document.getElementById('endhour').innerText}:${document.getElementById('endminute').innerText}`;

                            document.getElementById('timealert').innerText = '';
                            var date = document.querySelectorAll('input[name="starttime"]')[0].value;
                            var sh = document.getElementById('starthour').innerText;
                            var sm = document.getElementById('startminute').innerText;
                            var eh = document.getElementById('endhour').innerText;
                            var em = document.getElementById('endminute').innerText;

                            if(new Date(`${date} ${eh}:${em}`).getTime() - new Date(`${date} ${sh}:${sm}`).getTime() < 0){
                                document.getElementById('timealert').innerText = '開始時間 < 終了時間 でお願いします。';
                            }

                        }
                        document.getElementById(`${s}${t}menu`).innerHTML = '';
                    }
                    document.getElementById(`${s}${t}menu`).classList.toggle('menuhide');
                }
            });
        });

    });

    window.addEventListener('input', (el) => {
        if (el.target.id.match(/addgroupmember/)) {
            ajax.method1(
                "<?php echo e(route('schedule.schedule.search')); ?>",
                'POST',
                {
                    "memberitself":el.target.dataset.userid,
                    "addgroupmember":el.target.value,
                    "editinggnum":document.getElementById('addgroupmember').dataset.groupeditingnow
                },
                (Res) => {
                    document.getElementById('SearchResultArea').innerHTML = render.makeUserButton(Res, true);
                },
                (r1, r2) => {
                    console.log("fail!!");
                }
            );
        }

        if(el.target.id.match(/SearchCbyWord/)){
            schedule.MakeScheduleArea(
                document.getElementById('CFirstDate').dataset.cstartdate,
                'YearArea',
                'MonthArea',
                'DayArea',
                1,
                0
            );
            PageNow = 1;
            RebaseCalender(0);
        }

        if(el.target.id.match(/PerPageArea/)){
            schedule.MakeScheduleArea(
                document.getElementById('CFirstDate').dataset.cstartdate,
                'YearArea',
                'MonthArea',
                'DayArea',
                1,
                0
                );
            PageNow = 1;
            RebaseCalender(0);
        }

        if(el.target.id.match(/PageNationInput/)){
            setTimeout(() => {
                if(el.target.value != ''){
                    PageNow = el.target.value;
                    RebaseCalender(0);
                }
            }, 500);
        }

    });

    const MakeHourHTML = (menuclass) => {
        var html = '';
        for(var i=0; i <= 12; i++){
            html += `<div class="${menuclass} w-100 d-inline-block cursor bb" data-makeour="${i}">${i}</div>`;
        }
        return html;
    }
    const MakeMinuteHTML = (menuclass) => {
        var html = '';
        for(var i=0; i <= 59; i++){
            html += `<div class="${menuclass} w-100 d-inline-block cursor bb" data-makeminute="${i}">${i}</div>`;
        }
        return html;
    }

    const isKeyExists = (obj,key) => {
        if( obj[key] == undefined ){
            return false;
        }else{
            return true;
        }
    }
    const sortelem = () => {
        document.getElementById('sortmenu').classList.toggle('sbhidden');
        document.getElementById('sortmenu').classList.toggle('sbshow');
        document.getElementById('SortArea').classList.toggle('SortAreaisshow');
        document.getElementById('SortArea').classList.toggle('SortAreaishidde');
    }

    const RebaseCalender = (val) => {
        document.getElementById('ScheduleLoadingArea').classList.remove('loadinghidden');
        document.getElementById('ScheduleLoadingArea').classList.add('loadingshow');
        commonloadMotion('ScheduleLoadingArea', "<?php echo e(secure_asset('asset/loadingicon.png')); ?>");
        var startdaynow = document.getElementById('CFirstDate').dataset.cstartdate;
        var Dobj = new Date(new Date(startdaynow).setDate(new Date(startdaynow).getDate() + val));
        var startdateappend = `${Dobj.getFullYear()}/${Dobj.getMonth()+1}/${Dobj.getDate()}`;

        schedule.MakeScheduleArea(startdateappend, 'YearArea', 'MonthArea', 'DayArea', 0, val);
        ajax.method1(
            "<?php echo e(route('schedule.me.post')); ?>",
            'POST',
            {
                "starttime":startdateappend,
                "endtime":startdateappend,
            },//ok
            (Res) => {
                document.getElementById('MyScheduleArea').innerHTML = schedule.CaluculateCschedule(Res);
            },
            (r1, r2) => {
                console.log("fail!!");
            }
        );

        ajax.method1(
            "<?php echo e(route('schedule.post')); ?>",
            'POST',
            {
                "starttime":startdateappend,
                "endtime":startdateappend,
                "keyword":document.getElementById('SearchCbyWord').value,
                "PerPage":document.getElementById('PerPageArea').value,
                "orderby":orderby,
                "PageNow":PageNow
            },//ok
            (Res) => {
                document.getElementById('UserScheduleArea').innerHTML = schedule.CaluculateCschedule(Res);
                document.getElementById('PagenationArea').innerHTML = pagination.MakePagenation(Res['PageAmount'][0], PageNow);
                document.getElementById('ScheduleLoadingArea').classList.remove('loadingshow');
                document.getElementById('ScheduleLoadingArea').classList.add('loadinghidden');
                document.getElementById('ScheduleLoadingArea').innerHTML = '';
            },
            (r1, r2) => {
                console.log("fail!!");
            }
        );
    }
    
    const MakeEditSchedule = (e) => {
        var createElement = document.createElement('div');
        createElement.setAttribute('class', 'schedulemodal position-relative d-inline-block col-12');
        var Eleminnertxt = '';

        //e.target.dataset.data-buttonscheduleid からHTMLを生成する
        ajax.method1(
            "<?php echo e(route('schedule.schedule.fromid')); ?>",
            'POST',
            {
                "scheduleid":e.target.dataset.scheduleid
            },
            (Res) => {
                var elem = document.createElement('div');
                var innerhtml = '';
                var sh = Res[0].starttime ? Res[0].starttime.split(' ')[1].split(':')[0] : '00';
                var sm = Res[0].starttime ? Res[0].starttime.split(' ')[1].split(':')[1] : '00';
                var eh = Res[0].endtime ? Res[0].endtime.split(' ')[1].split(':')[0] : '00';
                var em = Res[0].endtime ? Res[0].endtime.split(' ')[1].split(':')[1] : '00';

                innerhtml += `
                <input type="hidden" name="mainid" value="${Res[0].scheduleid}">
                <input type="hidden" name="starttime" value="${Res[0].starttime.split(' ')[0]}">
                <div class="col-12 d-flex">
                    <img src="<?php echo e(secure_asset('asset/timeicon.png')); ?>" class="searchicon cursor p-1 mr-3 tooltip-top" data-tooltip="時刻を設定する">
                    <div class="w-100 text-center pr-2 position-relative">
                        <div id="starthour" class="starthour buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor">${sh}</div>
                        <div id="starthourmenu" class="position-absolute bg-white menuhide gridinside"></div>
                    </div>
                    <div class="buttonicon text-center pr-2">:</div>
                    <div class="w-100 text-center pr-2 position-relative">
                        <div id="startminute" class="startminute buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor">${sm}</div>
                        <div id="startminutemenu" class="position-absolute bg-white menuhide gridinside"></div>
                    </div>
                    <div class="buttonicon text-center">~</div>
                    <div class="w-100 text-center pl-2 position-relative">
                        <div id="endhour" class="endhour buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor">${eh}</div>
                        <div id="endhourmenu" class="position-absolute bg-white menuhide gridinside"></div>
                    </div>
                    <div class="buttonicon text-center pl-2">:</div>
                    <div class="w-100 text-center pl-2 position-relative">
                        <div id="endminute" class="endminute buttonicon w-100 d-inline-block searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none cursor">${em}</div>
                        <div id="endminutemenu" class="position-absolute bg-white menuhide gridinside"></div>
                    </div>
                    <input type="hidden" id="Sstarttime" name="Sstarttime" value="${sh}:${sm}">
                    <input type="hidden" id="Sendtime" name="Sendtime" value="${eh}:${em}">
                </div>
                <span id="timealert" class="d-inline-block w-100 text-center red mt-3"></span>
                <div class="schedulemodal position-relative d-inline-block col-12">
                    <div class="d-inline-block mt-5 w-100">
                        <small id="schedulenameAlert" class="red"></small>
                    </div>
                    <input type="text" name="schedulename" class="w-100 searchbar bg-brightgray mb-3
                        border-top-left-radius-1rem
                        border-bottom-left-radius-1rem
                        border-top-right-radius-1rem
                        border-bottom-right-radius-1rem
                        b-none float-left pl-2" value="${Res[0].title ? Res[0].title : ''}" placeholder="タイトルを入力してください">
                    <div class="d-inline-block w-100">
                        <small id="schedulediscAlert" class="red"></small>
                    </div>
                    <textarea name="scheduledisc" class="w-100 searchbar bg-brightgray mb-3
                        border-top-left-radius-1rem
                        border-bottom-left-radius-1rem
                        border-top-right-radius-1rem
                        border-bottom-right-radius-1rem
                        b-none float-left pl-2" value="" placeholder="概要を入力してください">${Res[0].description ? Res[0].description : ''}</textarea>
                        <input type="hidden" name="userid" value="2"><input type="hidden" name="startdate" value="2022/3/22"></div>
                    <h5 class="mainfontcolor col-12 pt-4 pb-1 mb-2">メンバーを追加する <small id="AddedMemberAlert" class="red"></small></h5>
                    <div id="AddedMember" class="col-12 mb-0 d-inline-block"></div>
                    <div class=" col-md-12 m-auto pb-3 pl-0 pr-0 bg-white d-flex">
                        <div id="" class="col-12 pb-1 m-auto">
                            <div class=" w-100 d-inline-block pb-3 pl-0 pr-0 bg-white">
                                <div class="w-100 pb-1 m-auto">
                                    <div class="d-inline-block w-100 mb-3 pl-0 pr-0">
                                        <div class="searchbarwrapper d-inline-block w-100 mt-0">
                                            <input type="text" id="addgroupmember" name="addgroupmember" data-userid="2" class="w-100 searchbar bg-brightgray border-top-left-radius-1rem 
                                                border-bottom-left-radius-1rem border-top-right-radius-1rem
                                                border-bottom-right-radius-1rem b-none float-left pl-2" placeholder="ユーザー名を入力してください。">
                                        </div>
                                    </div>
                                </div>
                                <div id="SearchResultArea"></div>
                            </div>
                        </div>
                    </div>`;

                    innerhtml += `
                    <h5 class="mainfontcolor col-12 pt-4 pb-1 mb-2">既に追加されたメンバー</h5>
                    <div id="" class="col-12 mb-0 d-inline-block">`;
                    for(var key in Res){
                        if(Res[key].starttime){
                            innerhtml += 
                            `<div class="alreadyadded addeduserbuton d-inline-block float-left pt-1 pb-1 pr-2 pl-2 text-white mb-2 mr-2 cursor br5px" data-addeduserid="6">
                            ${Res[key].name}
                            <input type="hidden" name="UserToAdd[]" value="${Res[key].id}">
                            </div>`;
                        }
                    }
                    innerhtml += `</div>`;
                innerhtml +=
                `</div>`;

                document.getElementById('FirstHTML').innerHTML = innerhtml;
            },
            (r1, r2) => {
                console.log("fail!!");
                console.log(r1);
                console.log(r2);
            }
        );
    }

</script>

<style>
.saturdayBG{
    background:#E8EEFB;
}
.sundayBG{
    background:#FFE5E5;
}
.SuturdayColor{
    color:#0069d9;
}
.Parea{
    width:2rem;
}

.SaturdayColor{
    background:rgb(24, 71, 182, 0.1);
    color:#0069d9;
}
.SundayColor{
    background:rgb(255, 183, 90, 0.1);
    color:rgb(255, 183, 90, 1);
}
.montharea{
    margin-bottom:5px;
    border-bottom:solid rgb(0, 0, 0, 0.1) 1px;
}
#DayArea{
    margin-top:5px;
}
.Carea{
    box-shadow: 0px 0px 3px 0px rgb(0, 0, 0, 0.1);
}
#prev{
    top:0;
}
#prev7{
    bottom:0;
}
#next{
    top:0;
}
#next7{
    bottom:0;
}
.schedulearea{
    min-height:20vh;
}
/*
#DayArea{
    width:87.5%;
    float:right;
}*/
div[class*="CalBg"]{
    background-size: 3px 3px;
}

#UserScheduleArea > div:nth-child(2n) > div:not(.mycolor){
    background:rgb(0, 0, 0, 0.03);
}
#UserScheduleArea > div:nth-child(2n+1) > div:not(.mycolor){
    background:#ffff;
}

.decCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #097bf6 25%,
        #097bf6 50%, 
        #fff 50%, #fff 75%,
        #097bf6 75%, 
        #097bf6
    );
    color:#097bf6;
}
.JanuCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #09baf6 25%,
        #09baf6 50%, 
        #fff 50%, #fff 75%,
        #09baf6 75%, 
        #09baf6
    );
}
.FebCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #09f6e9 25%,
        #09f6e9 50%, 
        #fff 50%, #fff 75%,
        #09f6e9 75%, 
        #09f6e9
    );
}
.MarCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #09f681 25%,
        #09f681 50%, 
        #fff 50%, #fff 75%,
        #09f681 75%, 
        #09f681
    );
}
.ApCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #09f618 25%,
        #09f618 50%, 
        #fff 50%, #fff 75%,
        #09f618 75%, 
        #09f618
    );
}
.MaCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #a1f609 25%,
        #a1f609 50%, 
        #fff 50%, #fff 75%,
        #a1f609 75%, 
        #a1f609
    );
}
.JunCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #eaf609 25%,
        #eaf609 50%, 
        #fff 50%, #fff 75%,
        #eaf609 75%, 
        #eaf609
    );
}
.JulCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #f6e209 25%,
        #f6e209 50%, 
        #fff 50%, #fff 75%,
        #f6e209 75%, 
        #f6e209
    );
}
.AugCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #f68f09 25%,
        #f68f09 50%, 
        #fff 50%, #fff 75%,
        #f68f09 75%, 
        #f68f09
    );
}
.SeptCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #f63109 25%,
        #f63109 50%, 
        #fff 50%, #fff 75%,
        #f63109 75%, 
        #f63109
    );
}
.OctCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #f63109 25%,
        #f63109 50%, 
        #f63109 50%, #fff 75%,
        #f63109 75%, 
        #f63109
    );
}
.NovCalBg{
    background-image:
        linear-gradient(
        -45deg, #fff 25%,
        #f609a8 25%,
        #f609a8 50%, 
        #fff 50%, #fff 75%,
        #f609a8 75%, 
        #f609a8
    );
}
.montharea > .cbutton:nth-child(2){
    border-left: solid 0.5px rgb(0, 0, 0, 0.1);
}
.montharea > .cbutton:not(:nth-child(5)){
    border-right: solid 0.5px rgb(0, 0, 0, 0.1);
}
.monthvalselector,
.yearvalselector{
    background:#fff;
}
.monthvalselector:hover,
.yearvalselector:hover{
    background:#F2F2F2;
}
.monthvalselector,
.monthvalselector:hover,
.yearvalselector,
.yearvalselector:hover{
    transition:all 0.5s;
}

.month_menu_closed > .scheduleinnerselector,
.month_menu_open > .scheduleinnerselector,
.year_menu_closed > .scheduleinnerselector,
.year_menu_open > .scheduleinnerselector{
    transition:all 0.5s;
}
.year_menu_closed > .scheduleinnerselector{
    height:0;
}
.month_menu_open > .scheduleinnerselector,
.year_menu_open > .scheduleinnerselector,
.sselector_open{
    height:15rem;
}
.scheduleinnerselector{
    overflow: scroll;
}
#starthourmenu,#startminutemenu,#endhourmenu,#endminutemenu{
    left:0;
    overflow:scroll;
    height:8rem;
    z-index:1;
}
.menuhide{
    opacity:0;
}
.menushow{
    opacity:1;
}
.menuhide,
.menushow{
    transition:opacity 0.5s;
}
@media (min-width: 768px){
    #MyScheduleArea > div > div > div:not(:nth-child(8)){
        border-right: solid 0.5px #ffff;
    }
    #DayArea > div > div:not(:nth-child(8)),
    #UserScheduleArea > div > div > div:not(:nth-child(8)){
        border-right: solid 0.5px rgb(0, 0, 0, 0.1);
    }
    .schedulearea{
        box-shadow: 0px 0px 3px 0px rgb(0, 0, 0, 0.1);
    }
}
</style>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/gware/resources/views/layout/schedule.blade.php ENDPATH**/ ?>