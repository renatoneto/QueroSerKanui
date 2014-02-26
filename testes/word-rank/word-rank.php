<?php
define('NEW_LINE', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

function wordRank($text) 
{
    
    $er    = '@[a-z\']+@i';
    $text  = str_replace('’', "'", $text);
    $words = array();
    
    if (preg_match_all($er, $text, $matches)) {
        
        foreach ($matches[0] as $word) {
            $word = mb_strtolower($word, 'UTF-8');
            
            if (!isset($words[$word])) {
                $words[$word] = 1;
                continue;
            }
            
            $words[$word]++;
        }
        
        array_multisort(
            array_values($words), SORT_DESC, 
            array_keys($words), SORT_ASC, 
            $words
        );
        
    }
    
    return $words;
}

$words = wordRank(file_get_contents('data.txt'));

foreach ($words as $word => $total) {
    echo $word, ' ', $total, NEW_LINE;  
}