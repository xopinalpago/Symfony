<?php
include('./Elem.php');
include('./TemplateEngine.php');

function testValidPageGood() {
	$elem = new Elem('html');
	// $elem->pushElement(new Elem('head'));
	$head = new Elem('head');
	$head->pushElement(new Elem('title', 'Page Title'));
	$head->pushElement(new Elem('meta', '', ['charset' => 'UTF-8']));
	$elem->pushElement($head);
	
	
	$body = new Elem('body');
	$body->pushElement(new Elem('p', 'Lorem ipsum'));
	$ul = new Elem('ul');
	$ul->pushElement(new Elem('li', 'Item 1'));
	$ul->pushElement(new Elem('li', 'Item 2'));
	$body->pushElement($ul);
	$ol = new Elem('ol');
	$ol->pushElement(new Elem('li', 'Item 1'));
	$ol->pushElement(new Elem('li', 'Item 2'));
	$body->pushElement($ol);
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
	
	return $elem->validPage();
}


function testValidPageWrong() {
	$elem = new Elem('html');

	$head = new Elem('head');
	$head->pushElement(new Elem('title', 'Page Title'));
	// $head->pushElement(new Elem('title', 'Page Title'));
	$head->pushElement(new Elem('meta', '', ['charset' => 'UTF-8']));
	// $head->pushElement(new Elem('meta', '', ['charset' => 'UTF-8']));
	$elem->pushElement($head);
	


	$body = new Elem('body');
	$p = new Elem('p');
	// $p->pushElement(new Elem('li', 'Lorem ipsum'));
	$body->pushElement($p);
	$ul = new Elem('ul');
	$ul->pushElement(new Elem('li', 'Item 1'));
	$ul->pushElement(new Elem('li', 'Item 2'));
	// $ul->pushElement(new Elem('p', 'Item 3'));
	$body->pushElement($ul);
	$ol = new Elem('ol');
	$ol->pushElement(new Elem('li', 'Item 1'));
	$ol->pushElement(new Elem('li', 'Item 2'));
	// $ol->pushElement(new Elem('p', 'Item 3'));
	$body->pushElement($ol);
	$table = new Elem('table');
	$tr = new Elem('tr');
	$tr->pushElement(new Elem('th', 'Header 1'));
	$tr->pushElement(new Elem('th', 'Header 2'));
	// $tr->pushElement(new Elem('li', 'Item 3'));
	$table->pushElement($tr);
	$trBis = new Elem('tr');
	$trBis->pushElement(new Elem('td', 'Value 1'));
	$trBis->pushElement(new Elem('td', 'Value 2'));
	// $trBis->pushElement(new Elem('li', 'Item 3'));
	$table->pushElement($trBis);
	$body->pushElement($table);
	
	// $head2 = new Elem('head');
	// $elem->pushElement($head2);
	// $body2 = new Elem('body');
	// $elem->pushElement($body2);

	$elem->pushElement($body);
	$fileName = 'test.html';
	$t_engine = new TemplateEngine($elem);
	$t_engine->createFile($fileName);	
	return $elem->validPage();
}

echo testValidPageGood() ? "true\n" : "false\n";
echo testValidPageWrong() ? "true\n" : "false\n";

// $fileName = 'test.html';
// $t_engine = new TemplateEngine($elem);
// $t_engine->createFile($fileName);


?>