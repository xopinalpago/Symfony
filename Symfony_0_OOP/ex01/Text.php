<?php
class Text {
	public $data = array();
	public $values = array();
    function __construct($array) {
		$this->data = $array;
    }
	public function fillValues($array) {
		$this->values = $array;	
	}
	public function append($str) {
		if (gettype($str) == "array") {
			foreach ($str as $element) {
				array_push($this->data, $element);
			}
		} else {
			array_push($this->data, $str);
		}
	}
	public function appendValues($str) {
		if (gettype($str) == "array") {
			foreach ($str as $element) {
				array_push($this->values, $element);
			}
		} else {
			array_push($this->values, $str);
		}
	}
	public function readData() {
		foreach ($this->data as &$element) {
			$element = "<p>" . $element . "</p>";
		}
		unset($element);
        return ($this->data);	
	}
}
?>