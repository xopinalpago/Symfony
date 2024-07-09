<?php
include('./Elem.php');
include('./TemplateEngine.php');

try {
	$elem = new Elem('html');
	$body = new Elem('body');
	$ul = new Elem('ul');
	$ul->pushElement(new Elem('li', 'Item 1'));
	$ul->pushElement(new Elem('li', 'Item 2'));
	$body->pushElement($ul);
	$table = new Elem('table');
	$tr = new Elem('tr');
	$tr->pushElement(new Elem('th', 'Header 1'));
	$tr->pushElement(new Elem('th', 'Header 2'));
	$table->pushElement($tr);
	$trBis = new Elem('tr');
	$trBis->pushElement(new Elem('td', 'Value 1'));
	$trBis->pushElement(new Elem('td', 'Value 2'));
	$table->pushElement($trBis);
	$body->pushElement($table);
	$elem->pushElement($body);

	$fileName = 'test.html';
	$t_engine = new TemplateEngine($elem);
	$t_engine->createFile($fileName);

	
} catch (Exception $e) {
    echo 'Exceptio : ',  $e->getMessage(), "\n";
}

try {
	$elem = new Elem('html');
	$body = new Elem('body');
	$body->pushElement(new Elem('p', 'Lorem ipsum', ['class' => 'text-muted']));
	$elem->pushElement($body);

	$fileName = 'test2.html';
	$t_engine = new TemplateEngine($elem);
	$t_engine->createFile($fileName);

	
} catch (Exception $e) {
    echo 'Exceptio : ',  $e->getMessage(), "\n";
}

?>