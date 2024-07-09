<?php

class Tea extends HotBeverage {
	private string $description;
	private string $comment;

	public function __construct() {
		parent::__construct('Tea', 5, 2);
		$this->description = "HOT";
		$this->comment = "Disgusting";
	}

    public function getDescription(): string {
        return $this->description;
    }
    public function getComment(): string {
        return $this->comment;
    }
}

?>