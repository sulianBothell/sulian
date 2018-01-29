<?php
header('Content-type: image/svg+xml');
try{
  require_once('/var/www/html/conn/conn.php');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connection successfully!</br>";
  }
catch(PDOException $e){
  //echo "Connection failed: ". $e->getMessage();
}
$query  = $db->prepare("SELECT * FROM `country_map` WHERE `country` = :country");
$country = $_REQUEST['country'];
$query->bindParam(':country', $country);
$query->execute();
while($row = $query->fetch(PDO::FETCH_ASSOC)) {
  echo $row['map'];
}
 ?>
