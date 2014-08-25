<!-- Changes in this form affect the JS below and the file todb.php -->
<form id="myForm" class="form-horizontal" role="form">
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name *</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" placeholder="Name" required>
    </div>
  </div>
  <div class="form-group">
    <label for="description" class="col-sm-2 control-label">Beschreibung *</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="description" placeholder="Beschreibung" required></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="transmission" class="col-sm-2 control-label">Übertragung</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="transmission" placeholder="DMR digital">
    </div>
  </div>
  <div class="form-group">
    <label for="category" class="col-sm-2 control-label">Kategorie</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="category" placeholder="Kategorie">
    </div>
  </div>
  <div class="form-group">
    <label for="subcategory" class="col-sm-2 control-label">Unterkategorie</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="subcategory" placeholder="Unterkategorie">
    </div>
  </div>
  <div class="form-group">
    <label for="photo" class="col-sm-2 control-label">Foto URL</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="photo" placeholder="krasses_funkgeraet.png">
    </div>
  </div>
  <div class="form-group">
    <label for="weight" class="col-sm-2 control-label">Gewicht</label>
    <div class="col-sm-10">
      <div class="input-group">
        <input type="number" class="form-control" id="weight" placeholder="290">
        <span class="input-group-addon">g</span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="channel" class="col-sm-2 control-label">Kanäle, mit Komma getrennt</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="channel" placeholder="136 - 174 MHz, 400 - 527 MHz">
    </div>
  </div>
  <div class="form-group">
    <label for="price" class="col-sm-2 control-label">Grundpreis</label>
    <div class="col-sm-10">
      <div class="input-group">
        <input type="text" class="form-control" id="price" placeholder="6,75">
        <span class="input-group-addon">€</span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="quantity" class="col-sm-2 control-label">Anzahl der Geräte</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="quantity" placeholder="10">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="button" id="button" class="btn btn-default" value="Artikel hinzufügen">
    </div>
  </div>
</form>

<div id="info"></div>

<script type="text/javascript">
   $(document).ready(function(){
      $("#button").click(function(){

        // Get values from form
        var name = $("#name").val();
        var description = $("#description").val();
        var transmission = $("#transmission").val();
        var category = $("#category").val();
        var subcategory = $("#subcategory").val();
        var photo = $("#photo").val();       
        var weight = $("#weight").val();
        var channel = $("#channel").val();
        var price = $("#price").val();
        var quantity = $("#quantity").val();

        $.ajax({
            type:"post",
            url:"../../plugins/articleadd/deploy/todb.php",
            data:"name="+name+"&description="+description+"&transmission="+transmission+"&category="+category+"&subcategory="+subcategory+"&photo="+photo+"&weight="+weight+"&channel="+channel+"&price="+price+"&quantity="+quantity,
            success:function(data){
               $("#info").html(data);
            }
        });
        $('form').trigger('reset');
    });
   });
</script>
