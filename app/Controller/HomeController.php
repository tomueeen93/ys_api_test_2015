<?php
set_include_path(APP.'vendors/');
App::uses('Xml', 'Utility');

class HomeController extends AppController {
   	public $helpers = array('Html', 'Form' );
	public $uses = null;
	
	public function index(){
		// API のパラメータ設定
		$api = 'http://shopping.yahooapis.jp/ShoppingWebService/V1/json/itemSearch';
		$appid = 'dj0zaiZpPThma1IzcVpTRThzViZzPWNvbnN1bWVyc2VjcmV0Jng9YzY-';
		$word = 'PC';
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
}
?>