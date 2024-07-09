<?php
class TemplateEngine {
    public function createFile(HotBeverage $text) {
		$template = file_get_contents("./template.html");


        // Utiliser la réflexion pour obtenir les attributs de la classe et leurs valeurs
        $reflect = new ReflectionClass($text);
        $properties = $reflect->getProperties(ReflectionProperty::IS_PROTECTED | ReflectionProperty::IS_PRIVATE);
        foreach ($properties as $property) {
            $getter = 'get' . ucfirst($property->getName());
            if (method_exists($text, $getter)) {
                $value = $text->$getter();
                $template = str_replace("{" . $property->getName() . "}", $value, $template);
            }
        }
		if (($handle = fopen($text->getNom() . '.html', "w+")) !== FALSE) {
		    fwrite($handle,$template);
    		fclose($handle);
		}
	}
}
?>