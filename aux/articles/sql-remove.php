<?php
# Get variables
$id = $_POST['id'];

# Include app.php for DB connection
include("../../app.php");

$db = DB::get();
$res = $db->query('DELETE FROM `Articles` WHERE id = '.$id);
$article = $res->fetchAll(PDO::FETCH_ASSOC);
?>

