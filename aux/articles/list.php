<?php
# Establish connection and get all articles
$db = DB::get();
$res = $db->query('SELECT * FROM `Articles` ORDER BY Name');
$articles = $res->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
/* Modify article list */
#articles > tbody > tr > td.articlelist > img {
  max-width: 100px;
}
#articles > tbody > tr > td.articlelist {
  width: 100px;
}
</style>

<div class="row">
  <div class="col">
    <h1>Artikelliste</h1>
    <table id="articles" class="table table-striped table-hover table-condensed">
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th>Preis *</th>
          <th>Geräte</th>
        </tr>
      </thead>
      <tbody>
<?php
  foreach($articles as $article) {
    print("<tr class='shelf-item'>");

    if(!empty($article['PhotoURL'])) {
      print("<td class='articlelist'><img class='articlelist' src='sites/funk/files/t-".$article['PhotoURL']."'><span class='shelf-duration' style='display:none;'><input type='number' value='1'></span></td>");
    } else {
      print("<td><span class='shelf-duration' style='display:none;'><input type='number' value='1'></span></td>");
    }
    print("<td><strong><span class='shelf-sku'>".$article['Name']."</span></strong><br><span class='shelf-description'>".$article['Description']."</span></td>");
    print("<td class='shelf-price' data-currency='€' data-price='".$article['Price']."'>".$article['Price']." €</td>");
    print("<td class='shelf-quantity'>".$article['Quantity']."</td>");
    print("</tr>");
  }
?>
      </tbody>
    </table>
  </div> <!-- /.col -->
</div> <!-- /.row -->
