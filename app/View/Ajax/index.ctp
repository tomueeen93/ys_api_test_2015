<script>
	var selected_id = <?php echo $search_id ?>;
	console.log("selected_id : \t"+selected_id);
	
	setPrefecture(selected_id);
	// ajaxの通信が終了して帰ってきたデータ
	function setResultArray(response){
		console.log(response);
		// オフセットを追加（ホントは取得したデータの数だけ追加）
		load_items_offset += 20;
		// 取得したデータを描写開始
		addLoadedData(response);
	}
	function ajaxloader(){
		console.log("loader lunch");
		load_items(selected_prefecture_name,load_items_offset);
	}
</script>

<div class="row">
<div class="viewport col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div id="mainflip" class="flipsnap">
       <div class="item">
       		<div id="prefecture-name" class="row">
       			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
       				<h2><</h2>
       			</div>
       			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
       				<h2 class="prefecture-name">
       					静岡
       				</h2>
       			</div>
       			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
       				<h2>></h2>
       			</div>
       		</div>
       		<div id="item_id_22" class="row">
				<!-- here is items space -->
       		</div>
       </div>    
    </div>
</div>
</div>
<div class="row">
	<button onclick="ajaxloader();" class="btn btn-default">NEXT</button>
</div>

<script>Flipsnap('.flipsnap');</script>
