<?php
for($outer = 1; $outer <= 5; $outer++) {
    for ($inner = 1; $inner <= $outer; $inner++) {
        echo "*";
        if($inner < $outer) {
            echo " ";
        }       
    }
    echo "<br>";
}
