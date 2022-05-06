export class Ajax{
    method1(url, method, data, callback, callback2=null){
        $.ajax({
            url:url,
            headers: {
                'X-CSRF-TOKEN': document.querySelectorAll('meta[name="csrf-token"]')[0].getAttribute('content')
            },
            type:method,
            data:data,
            dataType:"json"
        }).then(
            (result) => {
                callback(result);
            }
        ).fail((jqXHR, textStatus, errorThrown) => {
            callback2(jqXHR);
        });
    }
    //stat_item_idやその他の付き合わせデータをjsonファイルに格納しておいて呼び出す処理。
    GetJsonValue(dir, callback){
        var myJSON = new XMLHttpRequest();
        var returnJson = {};
        myJSON.onreadystatechange = function() {
            if ((myJSON.readyState === 4) && (myJSON.status === 200)) {
                var data = JSON.parse(myJSON.responseText);
                callback(data);
            }
        }
        myJSON.open("GET",`${location.protocol}//${location.host}/${dir}`, true);
        myJSON.send(null);
    }
}