<!DOCTYPE html>
<html>
<head>
  <title>Maps</title>
  <style type = "text/css">
  select{
    font-family: Arial;
    font-size: 80%;
  }
  .select-boxes{width:280px; text-align:center;}

  </style>
</head>
<body>
  <?php
  //header('Content-type: image/svg+xml');
  try{
    include('/var/www/html/conn/conn.php');
    //require_once('/var/www/html/conn/conn.php');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connection successfully!</br>";
    }
  catch(PDOException $e){
    //echo "Connection failed: ". $e->getMessage();
  }
  $query  = $db->query("SELECT * FROM `country_map`");
  $rowCount = $query->rowCount();
  ?>
  <form method="post" action="<?php echo     $_SERVER['PHP_SELF'];?>">
  <label>Country： </lable>
  <select onchange="document.getElementById('maps').data = 'http://chunying.id.au/select.php?country='+this.value">
    <option>---Select Country---</option>
    <?php
    if($rowCount > 0){
      while($row = $query->fetch(PDO::FETCH_ASSOC)){
        echo '<option value="'. $row['country'] . '">' . $row['country'] . '</option>';
            }
    }else{
      echo '<option value="">Country not avaliable</option>';
    }
    ?>

    </select>
    <object id="maps" type="image/svg+xml" data="" width=1000 height=1000>
            Your browser does not support SVG.
    </object>
    </form>
</body>
</html>
