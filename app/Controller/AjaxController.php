<?php
set_include_path(APP.'vendors/');
App::uses('Xml', 'Utility'); 
class AjaxController extends AppController {
	public $uses = null;
    function index() {
        //初期表示処理
    }
 
    /**
     * Ajax用関数
     */
    function ajaxTest() {
    	// CakePHPのレンダー機能を無効化
        $this->autoRender = FALSE;
		
		// Ajaxのリクエストかどうかを判断
        if($this->request->is('ajax')) {
            // json形式のファイルを返す
            // API のパラメータ設定
			$api = 'http://shopping.yahooapis.jp/ShoppingWebService/V1/json/itemSearch';
			$appid = 'dj0zaiZpPThma1IzcVpTRThzViZzPWNvbnN1bWVyc2VjcmV0Jng9YzY-';
			$word = $this->request->data['search_prefecture'];
			$hits = 50;
			$offset = $this->request->data['offset'];
	
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
	        return $this->$json_array;
        }
    }
}
?>
