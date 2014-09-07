<?php
# Get variables
$query = $_POST['query'];

# Include app.php for DB connection
include("../../app.php");

$db = DB::get();

$res = $db->query($query);
$res->fetchAll(PDO::FETCH_ASSOC);

$res = $db->prepare(":query");
$res->bindParam(':query', $query, PDO::PARAM_STR, strlen($query));
$res->execute();
?>

