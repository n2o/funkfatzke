<?php
# Include app.php for DB connection
include("../../app.php");

$db = DB::get();
$res = $db->query('SELECT * FROM `Articles` WHERE is_equipment = 0 ORDER BY Name');
$article = $res->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($article);
?>
