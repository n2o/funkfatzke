<?php 
  include("../../../app.php");
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

<script src="../../../js/calcPrices.js" type="text/javascript"></script>

<div class="row">
  <div class="col">
    <div class="col-md-4">
      <p>
        <label for="amount" class="control-label shelf-duration">Anzahl der Miettage:</label>
        <input type="text" id="amount" readonly class0"form-control" style="border:0; font-weight:bold;">
      </p>
      <div id="slider-range-max"></div>
    </div>
  </div>
</div>

<table id="articles" class="table table-striped table-hover table-condensed">
  <thead>
    <tr>
      <th></th>
      <th>Name</th>
      <th>Preis *</th>
      <th>Geräte</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
<?php
  foreach($articles as $article) {
    print("<tr class='shelf-item'>");

    if(!empty($article['PhotoURL'])) {
      print("<td class='articlelist'><img class='articlelist' src='../files/t-".$article['PhotoURL']."'><span class='shelf-duration' style='display:none;'><input type='number' value='1'></span></td>");
    } else {
      print("<td><span class='shelf-duration' style='display:none;'><input type='number' value='1'></span></td>");
    }
    print("<td><strong><span class='shelf-sku'>".$article['Name']."</span></strong><br><span class='shelf-description'>".$article['Description']."</span></td>");
    print("<td class='shelf-price' data-currency='€' data-price='".$article['Price']."'>".$article['Price']." €</td>");
    print("<td class='shelf-quantity'><input type='number' class='form-control' min='0' max='100' placeholder='1' value='1'></td>");
    print("<td><span class='shelf-add'><button class='btn btn-default'><i class='fa fa-shopping-cart'></i></button></span></td>");
    print("</tr>");
  }
?>
  </tbody>
</table>

<p>* Alle Preise gelten pro Gerät pro Tag, zzgl. MwSt. und evtl. anfallenden Transportkosten.</p>
