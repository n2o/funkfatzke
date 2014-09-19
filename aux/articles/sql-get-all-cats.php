<?php
# Include app.php for DB connection
include("../../app.php");

$db = DB::get();
$res = $db->query('SELECT * FROM `ArticleCategories` ORDER BY Name');
$cats = $res->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($cats);
?>
