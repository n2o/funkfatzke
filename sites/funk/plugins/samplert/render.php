<h3>Sample Plugin (rendered when published)</h3>

<?php 
    include "../../app.php";
    $db = DB::get();
    $res = $db->query('SELECT * FROM `Articles`');
    $articles = $res->fetchAll(PDO::FETCH_ASSOC);
?>

<h4>Here are some passed variables:</h4>

<table class="table table-striped table-bordered">
    <tbody>
<?php
    foreach ($articles as $article) {
        foreach ($article as $key => $value) {
            print("<tr>");
            print("<td>" . $key . "</td>");
            print("<td>" . $value . "</td>");
            print("</tr>");
        }
    }
?>
	</tbody>
</table>
