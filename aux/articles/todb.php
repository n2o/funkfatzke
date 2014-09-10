<?php
# Get variables
$name = $_POST['name'];
$description = $_POST['description'];
$photo = $_POST['photo'];
$weight = $_POST['weight'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$is_equipment = $_POST['is_equipment'];

# Include app.php for DB connection
include("../../app.php");

$db = DB::get();

$res = $db->prepare("INSERT INTO `Articles`
  (Name, Description, PhotoURL, Weight, Price, Quantity, is_equipment)
  VALUES
  (:name, :description, :photo, :weight, :price, :quantity, :is_equipment)");
$res->bindParam(':name', $name, PDO::PARAM_STR, strlen($name));
$res->bindParam(':description', $description, PDO::PARAM_STR, strlen($description));
$res->bindParam(':photo', $photo, PDO::PARAM_STR, strlen($photo));
$res->bindParam(':weight', $weight, PDO::PARAM_INT);
$res->bindParam(':price', $price, PDO::PARAM_STR, strlen($price));
$res->bindParam(':quantity', $quantity, PDO::PARAM_STR, strlen($quantity));
$res->bindParam(':is_equipment', $is_equipment, PDO::PARAM_STR, strlen($is_equipment));
$res->execute();
?>
