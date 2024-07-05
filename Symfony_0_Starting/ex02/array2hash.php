<?php
function array2hash($array) {
    $hash = array();
    foreach ($array as $element) {
        // Assigner le nom et l'âge aux variables respectives
        list($name, $age) = $element;
        // Ajouter l'élément au tableau associatif
        $hash[$age] = $name;
    }
    return $hash;
}
?>