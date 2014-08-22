<?php 
  include "../../app.php";
  $db = DB::get();
  if (isset($var1) and $var1 != '') {
    # Sanitize input
    $res = $db->prepare('SELECT * FROM `Articles` WHERE `Category` LIKE :category ORDER BY Name');
    $res->bindParam(':category', $var1, PDO::PARAM_STR, strlen($var1));
    $res->execute();
  } else {
    $res = $db->query('SELECT * FROM `Articles` ORDER BY Name');
  }
  $articles = $res->fetchAll(PDO::FETCH_ASSOC);
?>

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
    print("<tr><td colspan='2'>&nbsp;</td></tr>");
  }
?>
  </tbody>
</table>
