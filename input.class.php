<?php

	class Input{

		public function __construct (){

		}

		public static function post( $var = ''){
			if( !empty($var) ){
				if (!empty($_POST[$var])){
					return $_POST[$var];
				}else{
					return '';
				}
			}else{
				return (object) $_POST;
			}
		}

		public static function get_user_ip(){
			return $_SERVER['REMOTE_ADDR'];
		}

		public static function get( $var = ''){
			if(!empty($var)){
				if (!empty($_GET[$var])){
					return $_GET[$var];
				}else{
					return '';
				}
			}else{
				return (object) $_GET;
			}
		}
	}

?>