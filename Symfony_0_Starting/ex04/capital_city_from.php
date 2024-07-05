<?php
function capital_city_from($capital) {
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

    if (array_key_exists($capital, $states)) {
        $new_key = $states[$capital];
        if (array_key_exists($new_key, $capitals)) {
            return $capitals[$new_key] . "\n";
        } else {
            return "Unknown\n";
        }
    } else {
        return "Unknown\n";
    }
}
?>