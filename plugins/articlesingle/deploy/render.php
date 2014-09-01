<?php
  include("../../../app.php");
  $db = DB::get();
  if (isset($var1) and $var1 != '') {
    # Sanitize input
    $res = $db->prepare('SELECT * FROM `Articles` WHERE id = :id');
    $res->bindParam(':id', $var1, PDO::PARAM_STR, strlen($var1));
    $res->execute();
    $article = $res->fetchAll(PDO::FETCH_ASSOC);
    $article = $article[0];
  } else {
    print("Keinen gültigen Artikel ausgewählt.");
  }
?>

<script src="../../../js/calcPrices.js" type="text/javascript"></script>

<div class="row" style="padding-bottom:1em;">
  <div class="col">
    <div class="col-md-4">
      <p>
        <label for="amount" class="control-label shelf-duration">Anzahl der Miettage:</label>
        <input type="text" id="amount" readonly style="border:0; font-weight:bold;">
      </p>
      <div id="slider"></div>
    </div>
  </div>
</div>

<table id="articles" class="table table-striped table-hover table-condensed">
  <thead>
    <tr>
      <th>Name</th>
      <th>Preis *</th>
      <th>Geräte</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
<?php
  print("<tr class='shelf-item'>");
    print("<td><strong><span class='shelf-sku'>".$article['Name']."</span></strong><br><span class='shelf-description'>".$article['Description']."</span></td>");
    print("<td class='shelf-price' data-currency='€' data-price='".$article['Price']."'>".$article['Price']." €</td>");
    print("<td class='shelf-quantity'><input type='number' class='form-control' min='0' max='100' placeholder='1' value='1'></td>");
    print("<td><span class='shelf-add'><button class='btn btn-default'><i class='fa fa-shopping-cart'></i></button></span></td>");
  print("</tr>");
?>
  </tbody>
</table>

<p>* Alle Preise gelten pro Gerät pro Tag, zzgl. MwSt. und evtl. anfallenden Transportkosten.</p>
