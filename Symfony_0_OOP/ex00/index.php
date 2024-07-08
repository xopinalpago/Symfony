<?php
include('./TemplateEngine.php');

$t_engine = new TemplateEngine();
$fileName = 'test.html';
$templateName = 'book_description.html';
$parameters = array(array("nom","Rems"), array("auteur","XXX"), array("description","COUCOU CA VA?"), array("prix", 10));
$t_engine->createFile($fileName, $templateName, $parameters)
?>