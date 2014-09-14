<?php
    include "../../app.php";
    $db = DB::get();
    $res = $db->query('SELECT `id`, `Name` FROM `ArticleCategories`');
    $res = $res->fetchAll(PDO::FETCH_ASSOC);

    $categories = array();

    # Get all categories
    foreach ($res as $cats) {
        array_push($categories, $cats);
    }

    # Make them unique
    #$categories = array_unique($categories);

?>

<div class="form-group">
    <label for="articlelist-var1" class="control-label">Kategorie:</label>
    <select id="articlelist-var1" class="form-control">
        <option value="">Ohne Einschränkung</option>
<?php
    foreach($categories as $cat) {
       echo '<option value="'. $cat["id"] .'">'. $cat["Name"] .'</option>';
    }
?>
    </select>
</div>
