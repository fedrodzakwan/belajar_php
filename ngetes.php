<?php

function bintang_kiri($i , $char) {
    for ($j = 1; $j <= $i; $j++) {
        for ($k = 1; $k <= $j; $k++) {
            echo $char;
        }    
    echo "\n";
    
    }
}


$char = "_";

bintang_kiri(5, $char);




?>