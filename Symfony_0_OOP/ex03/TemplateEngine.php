<?php
class TemplateEngine {
    private Elem $elem;

    public function __construct(Elem $elem) {
        $this->elem = $elem;
    }

    public function createFile($fileName) {
		$template = $this->elem->getHTML();
		if (($handle = fopen($fileName, "w+")) !== FALSE) {
		    fwrite($handle,$template);
    		fclose($handle);
		}
	}
}
?>