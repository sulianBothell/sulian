<?php
$url = 'https://www.amcharts.com/svg-maps/';
$maps_data = file_get_contents($url);
preg_match_all('/<li><a title="(.*)" href="(.*)">(.*)<\/a><\/li>/', $maps_data, $matches, PREG_SET_ORDER);
foreach ($matches as $val) {
  $href = file_get_contents($val[2]);
  preg_match('/<div class="col-md-6 col-sm-12 right"> <a href="(.*)" download="/U', $href, $mathch_SVG_href);
  $maps_SVG = file_get_contents($mathch_SVG_href[1]);
  $maps_title = $val[1];
  var_dump($maps_SVG);
  //file_put_contents($maps_title.".svg", $maps_SVG, LOCK_EX);
}

/*$idColorArray = array(
  "AL" => "339966",
  "AK" => "0099FF",
  "WI" => "FF4B00",
  "WY" => "A3609B"
);
foreach($idColorArray as $state => $color){
  var_dump($idColorArray);
  $svg = preg_replace(
         '/id="'.$state.'" style="fill:#([0-9a-f]{6})/'
        , 'id="'.$state.'" style="fill:#'.$color
        , $svg);
  }*/

 ?>
