<?php
$idColorArray = array(
  "AL" => "339966",
  "AK" => "0099FF",
  "WI" => "FF4B00",
  "WY" => "A3609B"
);

foreach($idColorArray as $state => $color){
  var_dump($state);
  var_dump($color);
  /*$svg = preg_replace(
         '/id="'.$state.'" style="fill:#([0-9a-f]{6})/'
        , 'id="'.$state.'" style="fill:#'.$color
        , $svg);*/
  }


 ?>
