<?php
  include("../../../app.php");
  $db = DB::get();

  # Get all categories and create a map Name => id
  $equips = $db->prepare("SELECT id, Name FROM `Articles` WHERE is_equipment=0");
  $equips->execute();
  $equips = $equips->fetchAll(PDO::FETCH_ASSOC);
  $equipsmap = Array();
  foreach ($equips as $equip) {
    $equipsmap[$equip["Name"]] = $equip["id"];
  }

  if (isset($var1) and $var1 != '') {
    $equipment = $equipsmap[$var1];
    # Sanitize input
    $res = $db->prepare('SELECT * FROM Articles JOIN Article_Equipment_Rel ON Article_Equipment_Rel.Equipment=Articles.id WHERE Article=:equipment');
    $res->bindParam(':equipment', $equipment, PDO::PARAM_STR, strlen($equipment));
    $res->execute();
    $articles = $res->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo "<blink>Es wurde kein Artikel ausgewählt, für den Zubehör angezeigt werden soll.</blink>";
  }

  function seoUrl($string) {
    # Lower case everything
    $string = strtolower($string);
    # Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    # Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    # Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
  }
?>

<script src="../../../js/calcPrices.js" type="text/javascript"></script>

<div class="row" style="padding-bottom:1em;">
  <div class="col">
    <div class="col-md-4">
      <p>
        <label for="amount" class="control-label shelf-duration">Anzahl der Miettage:</label>
        <input type="text" class="amount" readonly style="border:0; font-weight:bold;">
      </p>
      <div class="slider"></div>
    </div>
  </div>
</div>

<table id="articleEquip" class="table table-striped table-hover table-condensed">
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
    $link = seoURL($article['Name']);
    print("<tr class='shelf-item'>");

    if(!empty($article['PhotoURL'])) {
      print("<td class='articlelist'><a href='".$link."'><img class='articlelist' src='../files/t-".$article['PhotoURL']."'></a><span class='shelf-duration' style='display:none;'><input type='number' value='1'></span></td>");
    } else {
      print("<td><span class='shelf-duration' style='display:none;'><input type='number' value='1'></span></td>");
    }
    print("<td><strong><span class='shelf-sku'><a href='".$link."'>".$article['Name']."</a></span></strong><br><span class='shelf-description'>".$article['Description']."</span></td>");
    print("<td class='shelf-price' data-currency='€' data-price='".$article['Price']."'>".$article['Price']." €</td>");
    print("<td class='shelf-quantity'><input type='number' class='form-control' min='0' max='100' placeholder='1' value='1'></td>");
    print("<td><span class='shelf-add'><button class='btn btn-default'><i class='fa fa-shopping-cart'></i></button></span></td>");
    print("</tr>");
  }
?>
  </tbody>
</table>

<p>* Alle Preise gelten pro Gerät pro Tag, zzgl. MwSt. und evtl. anfallenden Transportkosten.</p>
