<?php
var_dump($_POST);
print(getcwd());
# Get variables
$name = $_POST['name'];
$description = $_POST['description'];
$transmission = $_POST['transmission'];
$category = $_POST['category'];
$subcategory = $_POST['subcategory'];
$weight = $_POST['weight'];
$channel = $_POST['channel'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

# Include app.php for DB connection
include("../../../app.php");

$db = DB::get();

$res = $db->prepare("INSERT INTO `Articles` 
  ('Name', 'Description', 'Transmission', 'Category', 'Subcategory', 'Weight', 'Channel', 'Price', 'Quantity')
  VALUES
  (:name, :description, :transmission, :category, :subcategory, :weight, :channel, :price, :quantity)");
$res->bindParam(':name', $name, PDO::PARAM_STR, strlen($name));
$res->bindParam(':description', $description, PDO::PARAM_STR, strlen($description));
$res->bindParam(':transmission', $transmissions, PDO::PARAM_STR, strlen($transmission));
$res->bindParam(':category', $category, PDO::PARAM_STR, strlen($category));
$res->bindParam(':subcategory', $subcategory, PDO::PARAM_STR, strlen($subcategory));
$res->bindParam(':weight', $weight, PDO::PARAM_INT);
$res->bindParam(':channel', $channel, PDO::PARAM_STR, strlen($channel));
$res->bindParam(':price', $price, PDO::PARAM_STR, strlen($price));
$res->bindParam(':quantity', $quantity, PDO::PARAM_STR, strlen($quantity));
$res->execute();
?>
