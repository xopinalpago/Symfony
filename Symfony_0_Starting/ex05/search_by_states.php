<?php
function search_by_states($str)
{
    $states = [
        'Oregon' => 'OR',
        'Alabama' => 'AL',
        'New Jersey' => 'NJ',
        'Colorado' => 'CO',
    ];
    $capitals = [
        'OR' => 'Salem',
        'AL' => 'Montgomery',
        'NJ' => 'trenton',
        'KS' => 'Topeka',
    ];
    
    $country_arr = array_map('trim', explode(",",$str));

    foreach ($country_arr as $element) {
        if (array_key_exists($element, $states)) {
            $new_key = $states[$element];
            if (array_key_exists($new_key, $capitals)) {
                echo $capitals[$new_key] . " is the capital of " . $element . ".\n";
            } else {
                echo $element . " is neither a capital nor a state.\n";
            }
        } else if (in_array($element, $capitals)) {
            $new_key = array_search($element, $capitals);
            if (in_array($new_key, $states)) {
                echo $element . " is the capital of " . array_search($new_key, $states) . ".\n";
            } else {
                echo $element . " is neither a capital nor a state.\n";
            }
        } else {
            echo $element . " is neither a capital nor a state.\n";
        }
    }
}
?>