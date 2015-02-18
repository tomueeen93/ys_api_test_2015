function ajaxMethod(search_prefecture,offset_request) {
    $.ajax({
        url: "/ys_api_test_2015/Ajax/ajaxTest/"+search_prefecture+"/"+offset_request,
        type: "get",
        data: { prefecture : search_prefecture , offset: offset_request },
        dataType: "json",
        success : function(response){
            //通信成功時の処理
            var ajax_result = response;
            setResultArray(response);
        },
        error: function(){
            //通信失敗時の処理
            alert('通信失敗');
        }
    });
}