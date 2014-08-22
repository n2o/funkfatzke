<?php
    include "../../app.php";
    $db = DB::get();
    $res = $db->query('SELECT `Category` FROM `Articles`');
    $res = $res->fetchAll(PDO::FETCH_ASSOC);

    $categories = array();

    # Get all categories
    foreach ($res as $cats) {
        foreach ($cats as $cat => $val)
            array_push($categories, $val);
    }

    # Make them unique
    $categories = array_unique($categories);

?>

<div class="form-group">
    <label for="articlelist-var1" class="control-label">Kategorie:</label>
    <select id="articlelist-var1" class="form-control">
        <option value="">Ohne Einschränkung</option>
<?php 
    foreach($categories as $category) {
       echo '<option value="'. $category .'">'. $category .'</option>';
    }
?>
    </select>
</div>