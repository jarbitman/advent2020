<?php
$file = file("data");
foreach($file as $first){
    foreach($file as $second){
        foreach($file as $thrid){
            if(((int)$first + (int)$second + (int)$thrid) === 2020){
                echo $first . "\n" . $second . "\n" . $thrid . "\n\n" . ((int)$first * (int)$second * (int)$thrid);
                exit;
            }
        }
    }
}
/*
foreach($file as $f){
    $answer=2020-(int)$f;
//    echo $answer . "\n";
    if(in_array($answer, $file)){
        echo $f . "," . $answer;
        exit;
    }
}
*/