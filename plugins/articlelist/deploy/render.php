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

<div class="row">
  <div class="col">
    <div class="col-md-4">
      <p>
        <label for="amount" class="control-label">Anzahl der Miettage:</label>
        <input type="text" id="amount" readonly class0"form-control" style="border:0; font-weight:bold;">
      </p>
      <div id="slider-range-max"></div>
    </div>
  </div>
</div>

<table id="articles" class="table table-striped table-hover table-condensed tablesorter">
  <thead>
    <tr>
      <th></th>
      <th>Name</th>
      <th>Kanäle</th>
      <th>Preis</th>
      <th>Anzahl</th>
    </tr>
  </thead>
  <tbody>
<?php
  foreach ($articles as $article) {
    print("<tr>");
    
    if (!empty($article['PhotoURL'])) {
      print("<td class='articlelist'><img class='articlelist' src='../files/t-".$article['PhotoURL']."'></td>");
    } else {
      print("<td></td>");
    }
    print("<td><strong>".$article['Name']."</strong><br>".$article['Description']."</td>");
    print("<td>".$article['Channel']."</td>");
    print("<td>".$article['Price']." €</td>");
    print("<td>".$article['Quantity']."</td>");
    print("</tr>");
  }
?>
  </tbody>
</table>

<!-- Make tables sortable -->
<script>
$(document).ready(function() { 
  $("#articles").tablesorter(); 
} 
); 
</script>

<!-- Configure Slider -->
<script>
  $(function() {
    $( "#slider-range-max" ).slider({
      range: "max",
      min: 1,
      max: 30,
      value: 1,
      slide: function( event, ui ) {
        $( "#amount" ).val( ui.value );
      }
    });
    $( "#amount" ).val( $( "#slider-range-max" ).slider( "value" ) );
  });
</script>

