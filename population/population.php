<?php
error_reporting(E_ALL & ~E_NOTICE);
date_default_timezone_set('America/Los_Angeles');
//$conn_path = '/home/warehouse/conn/conn.php';
try{
  require_once('/var/www/html/conn/conn.php');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connection successfully!</br>";
  }
catch(PDOException $e){
  echo "Connection failed: ". $e->getMessage();
}

$url = 'https://www.amcharts.com/svg-maps/';
$maps_data = file_get_contents($url);
preg_match_all('/<li><a title="(.*)" href="(.*)">(.*)<\/a><\/li>/', $maps_data, $matches, PREG_SET_ORDER);
foreach ($matches as $val) {
  $href = file_get_contents($val[2]);
  preg_match('/<div class="col-md-6 col-sm-12 right"> <a href="(.*)" download="/U', $href, $mathch_SVG_href);
  $query  = $db->prepare("INSERT INTO `country_map` (`country`, `map`) VALUES (:country, :map)");
  $query->bindParam(':country', $country);
  $query->bindParam(':map', $maps);
  $maps = file_get_contents($mathch_SVG_href[1]);
  $country = $val[1];
  $query->execute();
}

?>
