<?php
class TemplateEngine {
    public function createFile($fileName, $text) {
		$template = file_get_contents($templateName);
		foreach ($parameters as $element) {
			list($param, $value) = $element;
			$template = str_replace("{" . $param . "}", $value, $template);
		}
		if (($handle = fopen($fileName, "w+")) !== FALSE) {
		    fwrite($handle,$template);
    		fclose($handle);
		}
	}
}
?>