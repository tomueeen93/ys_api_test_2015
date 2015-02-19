function load_items(id,offset) {
	console.log("selected_prefecture_id : " + id + " load_items_offset : " + offset);
    $.ajax({
    		type: "POST",
    		url: "http://127.0.0.1/ys_api_test_2015/Ajax/ajaxTest/"+id+"/"+offset,
    		dataType: "json",
	        success : function(response){
	            //通信成功時の処理
	        	console.log("POST success");
	        	console.log(response)
	            setResultArray(response);
	        },
	        error: function(){
	            //通信失敗時の処理
	            console.log('POST failed');
	        }
    });
}