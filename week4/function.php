<?php

function area_vol($val1, $val2, $val3) {
    $area = $val1 * $val2;
    $volume = $val1 * $val2 * $val3;
    return array($area, $volume);
}

list($area_result, $volume_result) = area_vol(2,3,4);
echo "Area: " .$area_result. "<br>";
echo "Volume: " .$volume_result. "<br>" ;

?>