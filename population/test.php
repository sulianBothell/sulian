<?php
try{
  require_once('conn.php');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connection successfully!";
  }
catch(PDOException $e){
  echo "Connection failed: ". $e->getMessage();
}

$query  = $db->prepare("INSERT INTO `usapopulation` (`state`, 'year', 'population', 'yearly change (%)') VALUES (?, ?, ?, ?)");


$query->bindParam(':test', $a);
$query->execute();


 ?>
