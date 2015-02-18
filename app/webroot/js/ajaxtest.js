function ajaxMethod(search_prefecture,offset_request) {
	console.log("search_prefecture:" + search_prefecture + " offset_request:" + offset_request);
    $.ajax({
        url: "http://127.0.0.1/ys_api_test_2015/Ajax/ajaxTest/"+search_prefecture+"/"+offset_request,
        type: "get",
        dataType: "json",
        success : function(response){
            //通信成功時の処理
        	console.log(response)
            var ajax_result = response;
            setResultArray(response);
        },
        error: function(){
            //通信失敗時の処理
            alert('通信失敗');
        }
    });
}