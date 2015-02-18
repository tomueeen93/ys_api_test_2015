<?php
set_include_path(APP.'vendors/');
App::uses('Xml', 'Utility');

class HomeController extends AppController {
   	public $helpers = array('Html', 'Form' );
	public $uses = null;
	
	public function index($select_category_id = null){
		// API のパラメータ設定
		$api = 'http://shopping.yahooapis.jp/ShoppingWebService/V1/json/categoryRanking';
		$appid = 'dj0zaiZpPThma1IzcVpTRThzViZzPWNvbnN1bWVyc2VjcmV0Jng9YzY-';
		$offset = 1;
		$category_id = 1;
		
		$categories = array(
                    "1" => "すべてのカテゴリから",
                    "13457"=> "ファッション",
                    "2498"=> "食品",
                    "2500"=> "ダイエット、健康",
                    "2501"=> "コスメ、香水",
                    "2502"=> "パソコン、周辺機器",
                    "2504"=> "AV機器、カメラ",
                    "2505"=> "家電",
                    "2506"=> "家具、インテリア",
                    "2507"=> "花、ガーデニング",
                    "2508"=> "キッチン、生活雑貨、日用品",
                    "2503"=> "DIY、工具、文具",
                    "2509"=> "ペット用品、生き物",
                    "2510"=> "楽器、趣味、学習",
                    "2511"=> "ゲーム、おもちゃ",
                    "2497"=> "ベビー、キッズ、マタニティ",
                    "2512"=> "スポーツ",
                    "2513"=> "レジャー、アウトドア",
                    "2514"=> "自転車、車、バイク用品",
                    "2516"=> "CD、音楽ソフト",
                    "2517"=> "DVD、映像ソフト",
                    "10002"=> "本、雑誌、コミック"
                    );
		$sortOrder = array(
                   "-score" => "おすすめ順",
                   "+price" => "商品価格が安い順",
                   "-price" => "商品価格が高い順",
                   "+name" => "ストア名昇順",
                   "-name" => "ストア名降順",
                   "-sold" => "売れ筋順"
                   );
		
		// カテゴリが指定されていた場合
		if($select_category_id != null){
			$category_id = $categories($select_category_id);
		}
		
		// パラメータの指定
		$params = array(
			'offset' => $offset,
			'category_id' => $category_id
		);
		
		// GETクエリの生成
		$ch = curl_init($api.'?'.http_build_query($params));
		curl_setopt_array($ch, array(
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_USERAGENT      => "Yahoo AppID: $appid"
		));
		
		// GETの実行
		$result = curl_exec($ch);
		// セッションの終了
		curl_close($ch);
		
		// XMLの文字列を配列に変換
		//$xml_array = Xml::toArray(Xml::build($result));
		
		// jsonの文字列を配列に変換
		$json_array = json_decode($result,true);
		
		// Viewにパラメータを渡す
		$this -> set('api_result', $json_array);
	}
	
	public function search($seach_word = null) {
		// API のパラメータ設定
		$api = 'http://shopping.yahooapis.jp/ShoppingWebService/V1/json/itemSearch';
		$appid = 'dj0zaiZpPThma1IzcVpTRThzViZzPWNvbnN1bWVyc2VjcmV0Jng9YzY-';
		$word = $this->request->data['search_word'];
		$hits = 50;

		$params = array(
			'query' => $word,
			'hits' => $hits
		);
		
		// GETクエリの生成
		$ch = curl_init($api.'?'.http_build_query($params));
		curl_setopt_array($ch, array(
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_USERAGENT      => "Yahoo AppID: $appid"
		));
		
		// GETの実行
		$result = curl_exec($ch);
		// セッションの終了
		curl_close($ch);
		
		// XMLの文字列を配列に変換
		//$xml_array = Xml::toArray(Xml::build($result));
		
		// jsonの文字列を配列に変換
		$json_array = json_decode($result,true);
		
		$this -> set('query', $word);
		$this -> set('api_result', $json_array);
	}
	public function flipsnap(){
		
	}
	/**
	 * @brief 特殊文字を HTML エンティティに変換する
	 * @param string $str 変換したい文字列
	 * @return string html用に変換した文字列
	 */
	function h($str) {
    	return htmlspecialchars($str, ENT_QUOTES);
	}
}
?>