<?php
$url = "https://upload.wikimedia.org/wikipedia/commons/1/1a/Blank_US_Map_%28states_only%29.svg";
$usmap = file_get_contents($url);
file_put_contents("US-map.svg", $maps_SVG, LOCK_EX);
 ?>
