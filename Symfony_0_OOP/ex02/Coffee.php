<?php

class Coffee extends HotBeverage {
	private string $description;
	private string $comment;

	public function __construct() {
		parent::__construct('Coffee', 10, 4);
		$this->description = "Smooth";
		$this->comment = "Very good";
	}

    public function getDescription(): string {
        return $this->description;
    }
    public function getComment(): string {
        return $this->comment;
    }
}

?>