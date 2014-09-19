<?php
# Get variables
$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$photo = $_POST['photo'];
$weight = $_POST['weight'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$is_equipment = $_POST['is_equipment'];

if ($weight == "") {
    $weight = 0;
}
if ($price == "") {
    $price = 0;
}
if ($quantity == "") {
    $quantity = 0;
}

# Include app.php for DB connection
include("../../app.php");

$db = DB::get();

$res = $db->prepare("UPDATE `Articles`
    SET Name=:name, Description=:description, PhotoURL=:photo, Weight=:weight, Price=:price, Quantity=:quantity, is_equipment=:is_equipment
    WHERE
    id=".$id);
$res->bindParam(':name', $name, PDO::PARAM_STR, strlen($name));
$res->bindParam(':description', $description, PDO::PARAM_STR, strlen($description));
$res->bindParam(':photo', $photo, PDO::PARAM_STR, strlen($photo));
$res->bindParam(':weight', $weight, PDO::PARAM_INT);
$res->bindParam(':price', $price, PDO::PARAM_STR, strlen($price));
$res->bindParam(':quantity', $quantity, PDO::PARAM_STR, strlen($quantity));
$res->bindParam(':is_equipment', $is_equipment, PDO::PARAM_INT);
$res->execute();
?>

