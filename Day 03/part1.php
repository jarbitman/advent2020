<?php
$file = file("data");
$valid=array(1=>0,3=>0,5=>0,7=>0,2=>0);
$i=0;
$totaLines=count($file);
foreach ([1,3,5,7] as $multiply) {
    echo $multiply . "\n";
    foreach ($file as $line) {
        if ($i > 30) {
            $i -= 31;
        }
        if ($line[($i)] === "#") {
            $valid[$multiply]++;
        }
        $i += $multiply;
    }
    $i=0;
}
$s=0;
for ($i=0; $i <= $totaLines; $i+=2){
    if(!empty($file[$i])) {
        if ($s > 30) {
            $s -= 31;
        }
        if ($file[$i][($s)] === "#") {
            $valid[2]++;
        }
        $s ++;
    }
}
$i=0;
/*foreach ($file as $line) {
    if($totalines % 2 == 0 || $totalines==0) {
        if ($i > 30) {
            $i -= 31;
        }
        if ($line[($i)] === "#") {
            $valid[2]++;
            echo $line[($i)] . "\n";
        }
        $i ++;
    }
    $totalines++;
}
*/
print_r($valid);

echo "\n\n" . ($valid[1] * $valid[3] * $valid[5] * $valid[7] * $valid[2]) . "\n";
