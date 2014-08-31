<!-- Changes in this form affect the JS below and the file todb.php -->
<form id="myForm" class="form-horizontal" role="form">
  <div class="form-group">
    <label for="company" class="col-sm-2 control-label">Firma</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="company" placeholder="Firma">
    </div>
  </div>
  <div class="form-group">
    <label for="title" class="col-sm-2 control-label">Anrede *</label>
    <div class="col-sm-10">
      <input type="radio" name="title" value="woman"> Frau&nbsp;&nbsp;
      <input type="radio" name="title" value="man"> Herr<br>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">Vorname *</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="firstname" placeholder="Vorname" required>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">Nachname *</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname" placeholder="Nachname" required>
    </div>
  </div>
  <div class="form-group">
    <label for="street" class="col-sm-2 control-label">Straße und Hausnummer *</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="street" placeholder="Straße und Hausnummer" required>
    </div>
  </div>
  <div class="form-group">
    <label for="zip" class="col-sm-2 control-label">PLZ, Stadt *</label>
    <div class="col-sm-3">
      <input type="number" class="form-control" id="zip" placeholder="PLZ" required>
    </div>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="zip" placeholder="Stadt" required>
    </div>
  </div>
  <div class="form-group">
    <label for="phone" class="col-sm-2 control-label">Telefon *</label>
    <div class="col-sm-10">
      <input type="tel" class="form-control" id="phone" placeholder="Telefon" required>
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">E-Mail *</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="E-Mail" required>
    </div>
  </div>
  <div class="form-group">
    <label for="comment" class="col-sm-2 control-label">Bemerkung</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="comment" placeholder="Bemerkung" required></textarea>
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
