<?php
# Get variables
$id = $_POST['id'];

# Include app.php for DB connection
include("../../app.php");

$db = DB::get();
$res = $db->query("SELECT `Category` FROM `Article_Category_Rel` WHERE Article = ".$id);
$article = $res->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($article);
?>
