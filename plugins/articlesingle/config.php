<?php
    include "../../app.php";
    $db = DB::get();
    $res = $db->query('SELECT `Name`, `id` FROM `Articles` ORDER BY `Name`');
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="form-group">
    <label for="articlesingle-var1" class="control-label">Artikel:</label>
    <select id="articlesingle-var1" class="form-control">
<?php
    foreach($res as $article) {
       echo '<option value="'. $article["id"] .'">'. $article["Name"] .'</option>';
    }
?>
    </select>
</div>
