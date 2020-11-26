<?php

$name = $_GET['FoodName'];
$price = $_GET['FoodPrice']; 
$quantity = $_GET['FoodQuantity'];
$calorie = $_GET['FoodCalorie'];

$servername = "localhost";
$username = "root";
$passworddb = "";
$dbname = "foodorder";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passworddb);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO orders(FoodID, FoodName, FoodPrice, FoodQuantity, FoodCalorie)
  VALUES ('', '$name', '$price', '$quantity', '$calorie')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Your data has been recorded in database!";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
  echo "Wrong Data!";
}

$conn = null;

?>