<?php
class App{
	
	public $input;
	private $data = array();
	public function __construct(){
		$this->input = new Input();
	}

	public function set_var ( $name, $value = ''){
			$this->data[$name] = $value;
	}

	public function get_var( $var ){
		if(array_key_exists($var, $this->data)){
			return $this->data[$var];
		}
	}
}
?>
