<?php
function array2hash_sorted($array) {
    $hash = array();
    foreach ($array as $element) {
        list($name, $age) = $element;
        $age = (int)$age;
        $hash[$name] = $age;
    }
    krsort($hash, SORT_DESC);
    return $hash;
}
?>