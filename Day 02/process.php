<?php
$file = file("data");
$valid=0;
foreach($file as $line){
    $sections=explode(" ",$line);
    $required = str_replace(":","",$sections[1]);
    $count = explode("-",$sections[0]);
    if($sections[2][$count[0]-1] == $required || $sections[2][$count[1]-1] == $required){
        if($sections[2][$count[0]-1] == $required && $sections[2][$count[1]-1] == $required){
            continue;
        }else {
            echo $line . "\n";
            echo "true\n";
            $valid++;
        }
    }
}
echo $valid . "\n";
