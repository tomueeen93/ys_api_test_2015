// ページ表示中のオフセット
var selected_prefecture_id = 0;
var selected_prefecture_name = "";
var selected_regions = [];
var load_items_offset = 0;

//　ドキュメントが読み込まれたら実行する処理
$(document).ready(function(){
    // 実行したい処理
});
// ウィンドウが読み込まれたら実行する処理
$(window).load(function () {
    // 実行したい処理
});
/*
 * ajax取得後の描写用のメソッド
 */
function addLoadedData(response){
	console.log("response data count : "+response.ResultSet.totalResultsReturned);
	// 今あるデータの末尾に追加していく
	//var parent_element = $("#item_id"+item_id);
	for(var i = 0; i < response.ResultSet.totalResultsReturned;i = i+1){
		// 必要なパラメータを抽出
		var name = response["ResultSet"][0]["Result"][i]["Name"];
		var code =  response["ResultSet"][0]["Result"][i]["Code"];
		var price = response["ResultSet"][0]["Result"][i]["Price"]["_value"];
		var link_url = response["ResultSet"][0]["Result"][i]["Url"];
		var image_url = response["ResultSet"][0]["Result"][i]["Image"]["Medium"];
		
		// 要素を作成
		var parent = $("<div>").addClass("content col-xs-6 col-sm-6 col-md-4 col-lg-3");
		var child1_1 = $("<div>").addClass("content-image centr col-xs-12 col-sm-12 col-md-12 col-lg-12");
		var child1_1_1 = $("<a>").attr("href",link_url).attr("target","_brank");
		var child1_1_1_1 = $("<img>").attr("src",image_url).attr("alt",code);
		var child1_2 = $("<div>").addClass("row");
		var child1_2_1 = $("<div>").addClass("content-name col-xs-12 col-sm-12 col-md-12 col-lg-12");
		var child1_2_1_1 = $("<p>").text(name);
		var child1_3 = $("<div>").addClass("row");
		var child1_3_1 = $("<div>").addClass("content-button col-xs-6 col-sm-6 col-md-6 col-lg-6");
		// var child1_3_1_1 = $("<button>").attr("hoge","hoge");
		var child1_3_2 = $("<div>").addClass("content-price col-xs-6 col-sm-6 col-md-6 col-lg-6");
		var child1_3_2_1 = $("<p>").text("￥"+price);
		// 親要素に全ての子要素を追加
		child1_3_2.append(child1_3_2_1);
		child1_3.append(child1_3_1).append(child1_3_2);
		child1_2_1.append(child1_2_1_1);
		child1_2.append(child1_2_1);
		child1_1_1.append(child1_1_1_1);
		child1_1.append(child1_1_1);
		parent.append(child1_1).append(child1_2).append(child1_3);
		// 確認
		//console.log(parent);
		// itemの末尾に追加
		console.log(selected_prefecture_id);
		$("#item_id_"+selected_prefecture_id).append(parent);
	}
}
/**
 * 今検索中の県を設定する
 * @param search_prefecture_id 検索したい県のID
 */
function setPrefecture(sid){
	// 選択したidを登録
	selected_prefecture_id = sid;
	// idから地域を特定
	var region_id = prefecture_to_reagion2[sid];
	// 地域の集合を取得
	selected_regions = japan_prefectures[region_id];
	// idから県名を特定
	selected_prefecture_name = prefectures[sid];
	// アイテム数を更新
	item_length = selected_regions.length;
	// 結果を表示
	console.log("region : "+region_id+" prefecture : "+selected_prefecture_name);
	console.log("---- selected regions ----");
	console.log(selected_regions);
	console.log("--------------------------");
}
/**
 * flipsnapを表示させてメニューバーに文字を表示する
 */
function setFlame(){
	// 選んだ県を一番に追加する
	var parent = $("<div>").addClass("item");
	var child1 = $("<div>").attr("id","prefecture_"+selected_prefecture_id).addClass("row");
	var child1_1 = $("<div>").addClass("col-xs-12 col-sm-12 col-md-12 col-lg-12");
	var child1_1_1 = $("<h2>").addClass("prefecutre-name").text("<\t\t"+selected_prefecture_name+"\t\t>");
	child1_1.append(child1_1_1);
	child1.append(child1_1);
	parent.append(child1);
	console.log(parent);
	$("#mainflip").append(parent);
	
	// その他の県を追加
	for (var key in selected_regions) {
		if(key != selected_prefecture_id){
			var inparent = $("<div>").addClass("item");
			var inchild1 = $("<div>").attr("id","prefecture_"+key).addClass("row");
			var inchild1_1 = $("<div>").addClass("col-xs-12 col-sm-12 col-md-12 col-lg-12");
			var inchild1_1_1 = $("<h2>").addClass("prefecutre-name").text("<\t\t"+selected_regions[key]+"\t\t>");
			inchild1_1.append(inchild1_1_1);
			inchild1.append(inchild1_1);
			parent.append(inchild1);
			$("#mainflip").append(inparent);
		}
	}
}