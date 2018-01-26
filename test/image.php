<?php
header('Content-type: image/svg+xml');
$usmap = file_get_contents('USA.svg');
$color =$_REQUEST['color'];
$new_usmap = preg_replace('/fill: #CCCCCC/','fill: #'. $color,$usmap);
echo $new_usmap;
//$_REQUEST['color'];
 ?>
