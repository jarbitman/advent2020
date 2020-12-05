<?php
$myfile = fopen("data", "r") or die("Unable to open file!");
$data = fread($myfile, filesize("data"));
$lines = explode("\n\n", $data);
$valid = 0;
$required = array("ecl", "pid", "eyr", "hcl", "byr", "iyr", "hgt");
foreach ($lines as $line) {
    $line = str_replace("\n", " ", $line);
    $count = 0;
    $headers = array();
    $sections = explode(" ", $line);
    foreach ($sections as $s) {
        $field = explode(":", $s);
        if (in_array($field[0], $required)) {
            if ($field[0] === 'pid') {
                if(strlen($field[1]) === 9) {
                    $count++;
                }else{
                  echo  $field[1] . "\n";
                }
            }
            if ($field[0] === 'byr') {
                if(strlen($field[1]) === 4 && $field[1] >= 1920 && $field[1] <= 2002) {
                    $count++;
                }else{
                    echo  $field[1] . "\n";
                }
            }
            if ($field[0] === 'iyr') {
                if(strlen($field[1]) === 4 && $field[1] >= 2010 && $field[1] <= 2020) {
                    $count++;
                }else{
                    echo  $field[1] . "\n";
                }
            }
            if ($field[0] === 'eyr') {
                if(strlen($field[1]) === 4 && $field[1] >= 2020 && $field[1] <= 2030) {
                    $count++;
                }else{
                    echo  $field[1] . "\n";
                }
            }
            if ($field[0] === 'hcl') {
                if (preg_match('/^#[a-f0-9]{6}$/i', $field[1])) {
                    $count++;
                }else{
                    echo  $field[1] . "\n";
                }
            }
            if ($field[0] === 'ecl') {
                if(in_array($field[1], ["amb", "blu", "brn", "gry", "grn", "hzl", "oth"])) {
                    $count++;
                }else{
                    echo  $field[1] . "\n";
                }
            }
            if ($field[0] === 'hgt') {
                $hgt = substr($field[1], -2);
                $num = str_replace($hgt, "", $field[1]);
                if (($hgt === "cm" && $num >= 150 && $num <= 193) || ($hgt === "in" && $num >= 50 && $num <= 76)) {
                    $count++;
                }else{
                    echo  $field[1] . "\n";
                }
            }
        }
    }
    if ($count === 7) {
        $valid++;
    }else{
        echo $line;
    }
}

echo "\n\n" . $valid . "\n";
