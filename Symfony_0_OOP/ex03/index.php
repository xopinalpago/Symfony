<?php
include('./Elem.php');
include('./TemplateEngine.php');

$elem = new Elem('html');
$body = new Elem('body');
$body->pushElement(new Elem('p', 'Lorem ipsum'));
$body->pushElement(new Elem('img'));
$body->pushElement(new Elem('h1', 'titre'));
$elem->pushElement($body);
// echo $elem->getHTML();

$fileName = 'test.html';
$t_engine = new TemplateEngine($elem);
$t_engine->createFile($fileName);


?>