<?php 
define('NEW_LINE', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

for ($i = 1; $i <= 100; $i++) {

    $print = null;

    if ($i % 5 == 0) {
        $print = 'Ka';
    }

    if ($i % 7 == 0) {
        $print .= 'Nois';
    }

    if (!$print) {
        $print = $i;
    }

    echo $print, NEW_LINE;
    
}