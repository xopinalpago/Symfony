<?php
include('./Text.php');

$parameters = array("nom","Rems");
$t_text = new Text($parameters);
$t_text->append("salut");
$param = array("nomsss","Remsssss");
$t_text->append($param);


$n_data = $t_text->readData();
print_r($n_data);

// $fileName = 'test.html';
// $templateName = 'book_description.html';
// $t_engine->createFile($fileName, $templateName, $parameters)
?>