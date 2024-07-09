<?php

// Inclure les fichiers de classes
require_once 'TemplateEngine.php';
require_once 'HotBeverage.php';
require_once 'Coffee.php';
require_once 'Tea.php';

// Créer des instances des classes Coffee et Tea
$coffee = new Coffee();
$tea = new Tea();

// Créer une instance de la classe TemplateEngine
$templateEngine = new TemplateEngine();

// Appeler la méthode createFile pour générer les fichiers HTML
$templateEngine->createFile($coffee);
$templateEngine->createFile($tea);

?>