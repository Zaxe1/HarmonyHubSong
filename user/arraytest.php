<?php 

$aa = array();
$aa['p']=10;
$aa['q']=20;
$aa['r']=30;
$aa['s']=40;
foreach($aa as $i)
{
    if (in_array($i,$aa))
    echo "found";
    else
    echo "not found";
}

print_r($aa);





?>