<?php
# Get variables
$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$transmission = $_POST['transmission'];
$photo = $_POST['photo'];
$weight = $_POST['weight'];
$channel = $_POST['channel'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

# Include app.php for DB connection
include("../../app.php");

$db = DB::get();

$res = $db->prepare("UPDATE `Articles`
    SET Name=:name, Description=:description, Transmission=:transmission, PhotoURL=:photo, Weight=:weight, Channel=:channel, Price=:price, Quantity=:quantity
    WHERE
    id=".$id);
$res->bindParam(':name', $name, PDO::PARAM_STR, strlen($name));
$res->bindParam(':description', $description, PDO::PARAM_STR, strlen($description));
$res->bindParam(':transmission', $transmissions, PDO::PARAM_STR, strlen($transmission));
$res->bindParam(':photo', $photo, PDO::PARAM_STR, strlen($photo));
$res->bindParam(':weight', $weight, PDO::PARAM_INT);
$res->bindParam(':channel', $channel, PDO::PARAM_STR, strlen($channel));
$res->bindParam(':price', $price, PDO::PARAM_STR, strlen($price));
$res->bindParam(':quantity', $quantity, PDO::PARAM_STR, strlen($quantity));
$res->execute();
?>

