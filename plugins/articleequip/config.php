<?php
    include "../../app.php";
    $db = DB::get();
    $res = $db->query('SELECT `Name` FROM `Articles` WHERE is_equipment=0 ORDER BY `Name`');
    $res = $res->fetchAll(PDO::FETCH_ASSOC);

    $articles = array();

    # Get all articles
    foreach ($res as $article) {
        array_push($articles, $article);
    }
?>

<div class="form-group">
    <label for="articleequip-var1" class="control-label">Artikel auswählen, für den Zubehör angezeigt werden soll:</label>
    <select id="articleequip-var1" class="form-control">
<?php
    foreach($articles as $article) {
        echo '<option>'. $article["Name"] .'</option>';
    }
?>
    </select>
</div>
