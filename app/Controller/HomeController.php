<?php
class HomeController extends AppController {
   	public $helpers = array('Html', 'Form' );
	public function index(){
		$this -> set('test_request', "this is test request");
	}
}
?>