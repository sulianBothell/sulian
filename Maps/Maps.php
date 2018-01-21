<?php
$url = 'https://www.amcharts.com/svg-maps/';
$maps_data = file_get_contents($url);
//var_dump($maps_data);
//<li><a title="Afghanistan" href="https://www.amcharts.com/svg-maps/?map=afghanistan">Afghanistan</a></li>
preg_match_all('/<li><a title="(.*)" href="(.*)">(.*)<\/a><\/li>/', $maps_data, $matches, PREG_SET_ORDER);
//var_dump($matches)
foreach ($matches as $val) {
  //echo "title = " . $val[1] . "\n";
  //echo "href = " . $val[2] . "\n";
  $href = file_get_contents($val[2]);
  preg_match('/<div class="col-md-6 col-sm-12 right"> <a href="(.*)" download="/U', $href, $mathch_SVG_href);
  //var_dump($mathch_SVG_href[1]);
  $maps_SVG = file_get_contents($mathch_SVG_href[1]);
  //$mapsSVG = $mathch_SVG[0];
  $maps_title = $val[1];
  //生成svg文件集
  file_put_contents($maps_title.".svg", $maps_SVG, LOCK_EX);
}

//$svg = file_get_contents("maps.svg");
//$im = new Imagick();
$idColorArray = array(
  "AL" => "339966",
  "AK" => "0099FF",
  "WI" => "FF4B00",
  "WY" => "A3609B"
);
foreach($idColorArray as $state => $color){
  $svg = preg_replace(
         '/id="'.$state.'" style="fill:#([0-9a-f]{6})/'
        , 'id="'.$state.'" style="fill:#'.$color
        , $svg);
  }

  //$im -> readImageBolb($svg);
  //$im->setImageFormat("png24");
  //$im->resizeImage(720, 445, imagick::FILTER_LANCZOS, 1);/*Optional, if you need to resize*/
/*jpeg*/
/*  $im->setImageFormat("jpeg");
  $im->adaptiveResizeImage(720, 445);/*Optional, if you need to resize*/
  //$im->writeImage('/Users/sulian/Desktop/Maps/maps.png');/*(or. jpg)*/
  //$im->clear();
  //$im->destroy();
 ?>
