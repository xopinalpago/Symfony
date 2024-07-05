<?php
function findElem($str, $findme) {
    $pos = strpos($str, $findme);
    $pos_end = strpos($str, ',', $pos);
    if ($pos_end != false) {
        $length = $pos_end - ($pos + strlen($findme) + 1);
        return trim(substr($str, $pos + strlen($findme) + 1, $length));
    } else {
        $sum = sumNumInStr(trim(substr($str, $pos + strlen($findme) + 1, strlen($str))));
        return $sum;
    }
}

function sumNumInStr($str) {
    $numbers = explode(" ", $str);
    $sum = 0;
    foreach ($numbers as $number) {
        $sum += (int)$number;
    }
    return $sum;
}

$type = array("position", "number", "small", "molar", "electron");
$filename = "ex06.txt";
if (($handle = fopen($filename, "r")) !== FALSE) {

    $content = '<!DOCTYPE html>
    <html lang="eng">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>mendeleiev</title>
        </head>
        <body>
        <label>Mendeleiev Table</label>
        <table>
            ';

    $lines = file($filename, FILE_IGNORE_NEW_LINES);
    // print_r($lines);
    fclose($handle);
    $real_pos = 0;
    foreach ($lines as $str) {
        $elem_array = array_map('trim', explode("=",$str));
        $elem = $elem_array[0];

        $pos_tab = findElem($elem_array[1], 'position');
        $pos_tab = (int)$pos_tab;
        if ($real_pos == 0)
        {
            $content .= '<tr>
                ';
        }

        if ($real_pos < $pos_tab)
        {
            for ($i = $real_pos; $i < $pos_tab; $i++) {
                $content .= '<td></td>
                ';
                $real_pos++;
            }
        }

        if ($real_pos == $pos_tab)
        {
            $content .= '<td style="border: 1px solid black; padding:10px">
                    <h4>' . $elem . '</h4>
                    <ul>
                        <li>No ' . findElem($elem_array[1], 'number') . '</li>
                        <li>' . findElem($elem_array[1], 'small') . '</li>
                        <li>' . findElem($elem_array[1], 'molar') . '</li>
                        <li>' . findElem($elem_array[1], 'electron') . ' electron</li>
                    </ul>
                </td>
                ';
            $real_pos++;
        }

        if ($real_pos == 18)
        {
            $content .= '</tr>
                ';
            $real_pos = 0;
        }

    }



    $content .= '</table>
    </body>
    </html>';

    // if (!file_exists('mendeleiev.html')) { 
    $handle = fopen('./mendeleiev.html','w+');
    fwrite($handle,$content);
    fclose($handle);
    // }
}
?>