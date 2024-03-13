<?php 
session_start();
require_once 'index.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    evwjdsid
    bensf
    fbjsc

<form method= "POST" action="index.php" >
  <label for="fname">product name:</label><br>
  <input type="text"  name="product_name" ><br>
  <label for="lname">product price:</label><br>
  <input type="text"  name="product_price" ><br><br>
  <input type="hidden"  name="token" value="<?= $_SESSION['token'] ?>"><br><br>
  
  <input type="submit" value="Submit">
</form> 
    
</body>
</html>