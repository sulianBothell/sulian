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
$b = 'China';
$query->bindParam(':country', $b);
$query->execute();
while($row = $query->fetch(PDO::FETCH_ASSOC)) {
  echo $row['map'];
}
 ?>
