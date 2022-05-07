export class Calender{
    CalenderInit(headername, calendername, startname, endname){
        const week = ["日", "月", "火", "水", "木", "金", "土"];
        const today = new Date();
        var year = today.getFullYear();
        var month = today.getMonth();
        var yearfordata = today.getFullYear();
        var monthfordata = today.getMonth();

        document.querySelector(`#${headername}`).innerHTML = year + "年 " + (month + 1) + "月";

        var calendar = "<table class='w-100'><tr class='dayOfWeek'>";
        for (var i = 0; i < week.length; i++) {
            calendar += "<th>" + week[i] + "</th>";
        }
        calendar += "</tr>";

        var count = 0;
        var startDayOfWeek = new Date(year, month, 1).getDay();
        var endDate = new Date(year, month + 1, 0).getDate();
        var lastMonthEndDate = new Date(year, month, 0).getDate();
        var row = Math.ceil((startDayOfWeek + endDate) / week.length);

        // 1行ずつ設定
        for (var i = 0; i < row; i++) {
            calendar += "<tr>";
            // 1colum単位で設定
            for (var j = 0; j < week.length; j++) {
                if (i == 0 && j < startDayOfWeek) {
                    // 1行目で1日まで先月の日付を設定
                    calendar += "<td class='disabled pt-0 pb-0 text-left pt-1 pl-1 cursor'>" + (lastMonthEndDate - startDayOfWeek + j + 1) + "</td>";
                } else if (count >= endDate) {
                    // 最終行で最終日以降、翌月の日付を設定
                    count++;
                    calendar += "<td class='disabled pt-0 pb-0 text-left pt-1 pl-1 cursor'>" + (count - endDate) + "</td>";
                } else {
                    // 当月の日付を曜日に照らし合わせて設定
                    count++;
                    if(year == today.getFullYear()
                    && month == (today.getMonth())
                    && count == today.getDate()){
                        calendar += `
                        <td
                        class='today pt-0 pb-0 text-left pt-1 pl-1 cursor'
                        data-${startname}='${yearfordata}-${`0${monthfordata+1}`.slice(-2)}-${`0${count}`.slice(-2)}'
                        >
                        ${count}
                        </td>`;
                    } else {
                        calendar += `
                        <td
                        class='pt-0 pb-0 text-left pt-1 pl-1 cursor'
                        data-${endname}='${yearfordata}-${`0${monthfordata+1}`.slice(-2)}-${`0${count}`.slice(-2)}'
                        >
                        ${count}
                        </td>`;
                    }
                }
            }
            calendar += "</tr>";
        }
        document.querySelector(`#${calendername}`).innerHTML = calendar;
    }

    claenderfunc(headername, calendername, prevname, nextname, startname, endname){
        const week = ["日", "月", "火", "水", "木", "金", "土"];
        const today = new Date();
        // 月末だとずれる可能性があるため、1日固定で取得
        var showDate = new Date(today.getFullYear(), today.getMonth(), 1);

        var yearfordata,
        monthfordata;

        document.getElementById(prevname).addEventListener('click', () => {
            showDate.setMonth(showDate.getMonth() - 1);
            showProcess(showDate);
        });
        document.getElementById(nextname).addEventListener('click', () => {
            showDate.setMonth(showDate.getMonth() + 1);
            showProcess(showDate);
        });

        // カレンダー表示
        function showProcess(date) {
            var year = date.getFullYear();
            var month = date.getMonth();
            yearfordata = date.getFullYear();
            monthfordata = date.getMonth();

            document.querySelector(`#${headername}`).innerHTML = year + "年 " + (month + 1) + "月";

            var calendar = createProcess(year, month);
            document.querySelector(`#${calendername}`).innerHTML = calendar;
        }

        // カレンダー作成
        function createProcess(year, month) {
            // 曜日
            var calendar = "<table class='w-100'><tr class='dayOfWeek'>";
            for (var i = 0; i < week.length; i++) {
                calendar += "<th>" + week[i] + "</th>";
            }
            calendar += "</tr>";

            var count = 0;
            var startDayOfWeek = new Date(year, month, 1).getDay();
            var endDate = new Date(year, month + 1, 0).getDate();
            var lastMonthEndDate = new Date(year, month, 0).getDate();
            var row = Math.ceil((startDayOfWeek + endDate) / week.length);

            // 1行ずつ設定
            for (var i = 0; i < row; i++) {
                calendar += "<tr>";
                // 1colum単位で設定
                for (var j = 0; j < week.length; j++) {
                    if (i == 0 && j < startDayOfWeek) {
                        // 1行目で1日まで先月の日付を設定
                        calendar += "<td class='disabled pt-0 pb-0 text-left pt-1 pl-1 cursor'>" + (lastMonthEndDate - startDayOfWeek + j + 1) + "</td>";
                    } else if (count >= endDate) {
                        // 最終行で最終日以降、翌月の日付を設定
                        count++;
                        calendar += "<td class='disabled pt-0 pb-0 text-left pt-1 pl-1 cursor'>" + (count - endDate) + "</td>";
                    } else {
                        // 当月の日付を曜日に照らし合わせて設定
                        count++;
                        if(year == today.getFullYear()
                        && month == (today.getMonth())
                        && count == today.getDate()){
                            calendar += `
                            <td
                            class='today pt-0 pb-0 text-left pt-1 pl-1 cursor'
                            data-${startname}='${yearfordata}-${`0${monthfordata+1}`.slice(-2)}-${`0${count}`.slice(-2)}'
                            >
                            ${count}
                            </td>`;
                        } else {
                            calendar += `
                            <td
                            class='pt-0 pb-0 text-left pt-1 pl-1 cursor'
                            data-${endname}='${yearfordata}-${`0${monthfordata+1}`.slice(-2)}-${`0${count}`.slice(-2)}'
                            >
                            ${count}
                            </td>`;
                        }
                    }
                }
                calendar += "</tr>";
            }
            return calendar;
        }
    }
}

export class Schedule {
    MakeScheduleArea(startdata, yearselector, monthselector, dateselector, morp, ratio){//startDay は '2014/04/18' の形式にする
        const DweekArr = [ "日", "月", "火", "水", "木", "金", "土" ];
        const Daycolor = {"土":"SaturdayColor", "日":"SundayColor"};
        var dateval = startdata;//
        var date = new Date(dateval);
        var cdate = date;
        date.setDate(date.getDate() + (morp*ratio));
        var dayOfWeek = date.getDay();
        var Chtml = '';
        var McolorObj = {
            12:"decCalBg",
            1:"JanuCalBg",
            2:"FebCalBg",
            3:"MarCalBg",
            4:"ApCalBg",
            5:"MaCalBg",
            6:"JunCalBg",
            7:"JulCalBg",
            8:"AugCalBg",
            9:"SeptCalBg",
            10:"OctCalBg",
            11:"NovCalBg"
        }

        var daycolor = '';
        if(DweekArr[dayOfWeek] == '土'){
            daycolor = 'SaturdayColor';
        }
        if(DweekArr[dayOfWeek] == '日'){
            daycolor = 'SundayColor';
        }

        Chtml += '<div class="d-md-flex">';
        Chtml += `<div id="SortArea"
                    class="SortAreaishidde tooltip-top w-100 d-inline-block
                    text-center cursor position-relative pt-2 pb-2"
                    data-tooltip="並び変え">
                    <img src="../asset/sorticon.png" class="sccheduleplusbutton">
                    <div id="sortmenu" class="position-absolute sbwrapper b-gray sbhidden bg-white">
                        <div data-orderby="asc" class="sortelem p-2">昇順</div>
                        <div data-orderby="desc" class="sortelem p-2">降順</div>
                        <input type="hidden" value="" name="clorderby">
                    </div>
                  </div>`;
        Chtml += `<div id="CFirstDate" class="${daycolor} w-100 text-center pt-2 pb-2 font12" 
        data-forcommondate="${date.getFullYear()}/${date.getMonth()+1}/${date.getDate()}"
        data-cstartdate="${date.getFullYear()}/${date.getMonth()+1}/${date.getDate()}"
        >${date.getDate()}(${DweekArr[dayOfWeek]})</div>`;

        for(var i=2; i <= 7; i++){
            var Dobj = new Date(cdate.setDate(cdate.getDate() + 1));
            var year = Dobj.getFullYear();
            var month = Dobj.getMonth();
            var day = Dobj.getDate();
            var dayOfWeek = Dobj.getDay();
            var getdatarange = '';
            var daycolor = '';
            var forcmdate = Dobj;
            if(DweekArr[dayOfWeek] == '土'){
                daycolor = 'SaturdayColor';
            }
            if(DweekArr[dayOfWeek] == '日'){
                daycolor = 'SundayColor';
            }
            Chtml += `<div class="${daycolor} w-100 text-center pt-2 pb-2 font12"
            data-forcommondate="${forcmdate.getFullYear()}/${forcmdate.getMonth()+1}/${forcmdate.getDate()}"
            >${day}(${DweekArr[dayOfWeek]})</div>`;

            if(i == 4){
                //ここで月をhtmlに入れる
                getdatarange += `${year}-${month+1}-${day}`;
                document.getElementById(monthselector).innerHTML = `
                <div 
                data-forcommondate="${forcmdate.getFullYear()}/${forcmdate.getMonth()+1}/${forcmdate.getDate()}"
                id="MonthButton"
                class="d-inline-block cursor pt-2 pb-2 text-left pl-2">${month+1}月</div>
                `;
            }
            if(i == 7){
                getdatarange += `${year}/${month+1}/${day}`;
            }

            /*** 年のエリア ***/
            document.getElementById(yearselector).innerText = year;
            /*var yearHTML = '';
            var yeartodayobj = new Date();
            yearHTML += '<select>';
            for(var i2=1970; i2 <= yeartodayobj.getFullYear(); i2++){
                if(year == i2){
                    yearHTML += `<option value="${year}">${year}年</option>`;
                }
            }
            for(var i3=1970; i3 <= yeartodayobj.getFullYear(); i3++){
                if(year != i3){
                    yearHTML += `<option value="${i3}">${i3}年</option>`;
                }
            }
            yearHTML += '</select>';
            document.getElementById(yearselector).innerHTML = yearHTML;*/
            /*** 年のエリア ***/

        }
        Chtml += `<div id="getCalenderRange" data-cenddate="${getdatarange}"></div>`;
        Chtml += '</div>';
        document.getElementById(dateselector).innerHTML = Chtml;
    }

    MakeYearArea(cstartselector, target, selecteddate=null){
        document.getElementById(target).innerHTML = '';
        var gettodayobj = new Date();
        var yearHTML = '';
        var getyear = gettodayobj.getFullYear();

        yearHTML += '<div id="scheduleinnerselector" class="scheduleinnerselector position-absolute">';
        for(var i2=getyear; 1970 <= i2; i2--){
            if(selecteddate == i2){
                yearHTML += `<div class="yearvalselector BgAccentColor font16 cursor pt-2 pb-2 pl-5 pr-5 text-white" data-yeardata="${selecteddate}">${selecteddate}年</div>`;
            }
        }
        for(var i3=getyear; 1970 <= i3; i3--){
            if(selecteddate != i3){
                yearHTML += `<div class="yearvalselector font16 cursor pt-2 pb-2 pl-5 pr-5" data-yeardata="${i3}">${i3}年</div>`;
            }
        }
        yearHTML += '</div>';
        document.getElementById(target).innerHTML = yearHTML;
    }

    MakeMonthArea(cstartselector, target, selecteddate=null){
        document.getElementById(target).innerHTML = '';
        var gettodayobj = new Date();
        var yearHTML = '';
        var getyear = gettodayobj.getFullYear();

        yearHTML += '<div id="scheduleinnerselector" class="scheduleinnerselector position-absolute">';
        for(var i2=1; i2 <=12; i2++){
            if(selecteddate == i2){
                yearHTML += `<div class="monthvalselector BgAccentColor font16 cursor pt-2 pb-2 pl-5 pr-5 text-white" data-monthdata="${selecteddate}">${selecteddate}月</div>`;
            }
        }
        for(var i3=1; i3 <= 12; i3++){
            if(selecteddate != i3){
                yearHTML += `<div class="monthvalselector font16 cursor pt-2 pb-2 pl-5 pr-5" data-monthdata="${i3}">${i3}月</div>`;
            }
        }
        yearHTML += '</div>';
        document.getElementById(target).innerHTML = yearHTML;
    }

    CaluculateCschedule(Res){
        var innerhtml = '';
        if(768 < window.innerWidth){
            innerhtml = this.ScheduleFormatPC(Res);
        }
        if(window.innerWidth <= 768){
            innerhtml = this.ScheduleFormatSP(Res);
        }
        return innerhtml;
    }

    ScheduleFormatPC(Res){
        var UsInner = '';
        for (const property in Res) {
            if(!Res[property][0]){
                return;
            }
            if(Res[property][0].name != undefined){
                UsInner += `<div data-nameidforsort="${Res[property][0].name}-${Res[property][0].id}">`;
                UsInner += `<div class="d-flex`;
                if(Res[property][0].id == document.getElementById('greetingbar').dataset.idnow){
                    UsInner += ` mycolor`;
                }
                UsInner += `">`;
                UsInner += `
                    <div class="w-100 d-inline-block text-center pt-2 pb-2">
                        <div class="d-inline-block mt-3">
                            <img src="../asset/personicon.png" class="searchicon">
                            ${Res[property][0].name}
                        </div>
                    </div>`;
                var dayarea = document.querySelectorAll('#DayArea > div > div:not(#getCalenderRange):not(#SortArea)');
                dayarea.forEach((Obj) => {
                    //Obj.dataset.cstartdate;//2022/2/25の形式
                    UsInner += `<div class="w-100 d-inline-block pt-2 pb-2 position-relative"`;

                    Res[property].forEach((ech) => {
                        if(!ech.starttime){
                            return;
                        }
                        var dstr = ech.starttime.split(' ')[0].replace('-', '/').replace('-', '/');

                        if(`${new Date(dstr)}` == `${new Date(Obj.dataset.forcommondate)}`){
                            UsInner += `data-name="${ech.name}" `;
                            UsInner += `data-mail_address="${ech.mail_address}" `;
                            UsInner += `data-scheduleid="${ech.scheduleid}" `;
                            UsInner += `data-starttime="${ech.starttime}" `;
                            UsInner += `data-endtime="${ech.starttime}" `;
                            UsInner += `data-taskid="${ech.taskid}" `;
                            UsInner += `data-title="${ech.title}"`;
                        }
                    });

                    UsInner += `>`;

                    UsInner += `<button type="button"
                                id="ScheduleId-${Res[property][0].id}"
                                data-setscheduleinfo="${Obj.dataset.forcommondate}"
                                data-buttonuserid="${Res[property][0].id}"
                                data-tooltip="スケジュールを追加する"
                                class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0">
                                </button>`;

                    Res[property].forEach((ech) => {
                        if(!ech.starttime){
                            return;
                        }
                        var dstr = ech.starttime.split(' ')[0].replace('-', '/').replace('-', '/');

                        if(`${new Date(dstr)}` == `${new Date(Obj.dataset.forcommondate)}`){
                            UsInner += `<small class="font10 pl-2 cursor d-inline-block w-100 mb-1">${ech.title ? ech.title : ''}
                                            <span class="editsceduleicon cursor ml-1 tooltip-left"
                                                data-tooltip="スケジュールを編集する"
                                                >
                                                <img src="../asset/orangepenicon.png"
                                                class="rebaseschedule orangepenicon"
                                                data-id="${ech.id ? ech.id : ''}"
                                                data-mail_address="${ech.mail_address ? ech.mail_address : ''}"
                                                data-created_at="${ech.created_at ? ech.created_at : ''}"
                                                data-scheduleid="${ech.scheduleid ? ech.scheduleid : ''}"
                                                data-title="${ech.title ? ech.title : ''}"
                                                data-description="${ech.description ? ech.description : ''}"    
                                                data-starttime="${ech.starttime ? ech.starttime : ''}"
                                                data-endtime="${ech.endtime ? ech.endtime : ''}"
                                                data-groupid="${ech.groupid ? ech.groupid : ''}"
                                                data-taskid="${ech.taskid ? ech.taskid : ''}"
                                                >
                                            </span>
                                        </small><br>`;
                        }
                    });
                    UsInner += '</div>';
                });
                UsInner += '</div>';
                UsInner += '</div>';
            }
        }
        return UsInner;
    }
    ScheduleFormatSP(Res){
        var UsInner = '';
        for (const property in Res) {
            if(!Res[property][0]){
                return;
            }
            if(Res[property][0].name != undefined){
                UsInner += `<div class="b-gray d-inline-block w-100 mb-3" data-nameidforsort="${Res[property][0].name}${Res[property][0].id}">`;
                UsInner += `<div class="d-inline-block w-100">`;
                UsInner += `<div class="bbgray bgray w-100 d-inline-block text-left pt-2 pb-2 pl-4">
                                <img src="../asset/personicon.png" class="searchicon">
                                ${Res[property][0].name}
                            </div>`;

                //UsInner += `${document.querySelectorAll('#DayArea > div')[0].innerHTML}`;

                var dayarea = document.querySelectorAll('#DayArea > div > div:not(#getCalenderRange):not(#SortArea)');
                dayarea.forEach((Obj) => {
                    UsInner += `<div class="bbgray w-100 d-inline-block">`;
                    UsInner += `<div class="`

                    if(Obj.innerText.match(/土/)){
                        UsInner += ` SaturdayColor `;
                    }
                    if(Obj.innerText.match(/日/)){
                        UsInner += ` SundayColor `;
                    }

                    UsInner += `col-2 d-inline-block text-center float-left pt-1 pb-1 cursor">${Obj.innerText}</div>`;
                    //Obj.dataset.cstartdate;//2022/2/25の形式
                    UsInner += `<div class="borderleftgray schedulespdic col-10 d-inline-block text-left float-right pt-1 pb-1 pl-1 pr-1 bg-white"`;

                    Res[property].forEach((ech) => {
                        if(!ech.starttime){
                            return;
                        }                    
                        var dstr = ech.starttime.split(' ')[0].replace('-', '/').replace('-', '/');

                        if(`${new Date(dstr)}` == `${new Date(Obj.dataset.forcommondate)}`){
                            UsInner += `data-name="${ech.name}" `;
                            UsInner += `data-mail_address="${ech.mail_address}" `;
                            UsInner += `data-scheduleid="${ech.scheduleid}" `;
                            UsInner += `data-starttime="${ech.starttime}" `;
                            UsInner += `data-endtime="${ech.starttime}" `;
                            UsInner += `data-taskid="${ech.taskid}" `;
                            UsInner += `data-title="${ech.title}"`;
                        }
                    });

                    UsInner += `>`;
                    UsInner += `<button type="button"
                                id="ScheduleId-${Res[property][0].id}"
                                data-setscheduleinfo="${Obj.dataset.forcommondate}"
                                data-buttonuserid="${Res[property][0].id}"
                                data-tooltip="スケジュールを追加する"
                                class="calenderBtn tooltip-left bg-white cursor position-absolute b-none p-0">
                                </button>`;

                    Res[property].forEach((ech) => {
                        if(!ech.starttime){
                            return;
                        }
                        var dstr = ech.starttime.split(' ')[0].replace('-', '/').replace('-', '/');

                        if(`${new Date(dstr)}` == `${new Date(Obj.dataset.forcommondate)}`){
                            UsInner += `<small class="cursor d-inline-block w-100 mb-1">${ech.title ? ech.title : ''}
                                            <span class="editsceduleicon cursor ml-1
                                                tooltip-right"
                                                data-tooltip="スケジュールを編集する"
                                                >
                                                <img src="../asset/orangepenicon.png"
                                                class="rebaseschedule orangepenicon"
                                                data-id="${ech.id ? ech.id : ''}"
                                                data-mail_address="${ech.mail_address ? ech.mail_address : ''}"
                                                data-created_at="${ech.created_at ? ech.created_at : ''}"
                                                data-scheduleid="${ech.scheduleid ? ech.scheduleid : ''}"
                                                data-title="${ech.title ? ech.title : ''}"
                                                data-description="${ech.description ? ech.description : ''}"    
                                                data-starttime="${ech.starttime ? ech.starttime : ''}"
                                                data-endtime="${ech.endtime ? ech.endtime : ''}"
                                                data-groupid="${ech.groupid ? ech.groupid : ''}"
                                                data-taskid="${ech.taskid ? ech.taskid : ''}"
                                                >
                                            </span>
                                        </small><br>`;
                        }
                    });
                    UsInner += '</div>';
                    UsInner += '</div>';
                });
                UsInner += '</div>';
                UsInner += '</div>';
            }
        }
        return UsInner;
    }
    CreateSchedule(data){
        var createElement = document.createElement('div');
        createElement.setAttribute('class', 'schedulemodal position-relative d-inline-block col-12');
        var Eleminnertxt = '';

        Eleminnertxt += `
        <div class="d-inline-block mt-5 w-100">
            <small id="schedulenameAlert" class="red"></small>
        </div>
        `;
        Eleminnertxt += 
            `<input type="text"
            name="schedulename"
            class="w-100 searchbar bg-brightgray mb-3
            border-top-left-radius-1rem
            border-bottom-left-radius-1rem
            border-top-right-radius-1rem
            border-bottom-right-radius-1rem
            b-none float-left pl-2" placeholder="タイトルを入力してください">`;
        
        Eleminnertxt += `
        <div class="d-inline-block w-100">
            <small id="schedulediscAlert" class="red"></small>
        </div>
        `;
        Eleminnertxt += 
            `<textarea
            name="scheduledisc"
            class="w-100 searchbar bg-brightgray mb-3
            border-top-left-radius-1rem
            border-bottom-left-radius-1rem
            border-top-right-radius-1rem
            border-bottom-right-radius-1rem
            b-none float-left pl-2" value="" placeholder="概要を入力してください"></textarea>
            `;

        for(const sendtata in data){
            Eleminnertxt += `<input type="hidden" name="${sendtata}" value="${data[sendtata]}">`;
        }
        createElement.innerHTML = Eleminnertxt;
        return createElement;
    }
}