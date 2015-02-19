<?php
set_include_path(APP.'vendors/');
App::uses('Xml', 'Utility'); 

class AjaxController extends AppController {
	public $uses = null;
	
    public function index($search_prefecture_id=22) {
        //初期表示処理
        $this->set('search_id',$search_prefecture_id);
    }
 
    /**
     * Ajax用関数
     */
    public function ajaxTest($search_prefecture_id=null, $search_offset=0) {
    	// CakePHPのレンダー機能を無効化
        $this->autoRender = false;
		// Content-typeの設定
		header("Content-Type: application/json; charset=UTF-8");
		
		// Ajaxのリクエストかどうかを判断
		

		// json形式のファイルを返す
        // API のパラメータ設定
		$api = 'http://shopping.yahooapis.jp/ShoppingWebService/V1/json/itemSearch';
		$appid = 'dj0zaiZpPThma1IzcVpTRThzViZzPWNvbnN1bWVyc2VjcmV0Jng9YzY-';
		$word = $search_prefecture_id;
		$hits = 50;
		$offset = $search_offset;
	
		$params = array(
			'query' => $word,
			'offset' => $offset
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
		
		// jsonの配列を返す
		return new CakeResponse(array('type' => 'json', 'body' => json_encode($json_array)));
		
    }
}
?>
