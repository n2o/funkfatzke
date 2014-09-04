<?php
# Get variables
$name = $_POST['name'];

# Include app.php for DB connection
include("../../app.php");

$db = DB::get();

$res = $db->prepare("INSERT INTO `ArticleCategories`
  (Name)
  VALUES
  (:name)");
$res->bindParam(':name', $name, PDO::PARAM_STR, strlen($name));
$res->execute();
?>


