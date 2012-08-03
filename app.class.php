<?php
class App{
	
	public $input;
	private static $data = array();
	public function __construct(){
		$this->input = new Input();
	}

	public static function set_var ( $name, $value = ''){
			self::$data[$name] = $value;
	}

	public function get_var( $var ){
		if(array_key_exists($var, self::$data)){
			return self::$data[$var];
		}
	}
}
?>
