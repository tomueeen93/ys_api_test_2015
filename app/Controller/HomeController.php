<?php
set_include_path(APP.'vendors/');

class HomeController extends AppController {
   	public $helpers = array('Html', 'Form' );
	public function index(){
		// API のパラメータ設定
		$api = 'http://shopping.yahooapis.jp/ShoppingWebService/V1/itemSearch';
		$appid = 'dj0zaiZpPThma1IzcVpTRThzViZzPWNvbnN1bWVyc2VjcmV0Jng9YzY-';

		$params = array(
			'query' => 'vaio'
		);
		// GETクエリの生成
		$ch = curl_init($api.'?'.http_build_query($params));
		curl_setopt_array($ch, array(
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_USERAGENT      => "Yahoo AppID: $appid"
		));
		
		$result = curl_exec($ch);
		curl_close($ch);
		$this -> set('test_request', "this is test request");
		$this -> set('api_result', $result);
	}
}
?>