<style type="text/css">
  .glyphicon-refresh-animate {
    -animation: spin .7s infinite linear;
    -webkit-animation: spin2 .7s infinite linear;
  }

  @-webkit-keyframes spin2 {
      from { -webkit-transform: rotate(0deg);}
      to { -webkit-transform: rotate(360deg);}
  }

  @keyframes spin {
      from { transform: scale(1) rotate(0deg);}
      to { transform: scale(1) rotate(360deg);}
  }
</style>

<script type="text/javascript" src="../../../plugins/inquiry/deploy/inquiry.js"></script>
<form id="myForm" class="form-horizontal" role="form">
  <div class="form-group" id="div-company">
    <label for="company" class="col-sm-2 control-label">Firma</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="company" placeholder="Firma">
    </div>
  </div>
  <div class="form-group" id="div-title">
    <label for="title" class="col-sm-2 control-label">Anrede *</label>
    <div class="col-sm-10">
      <input type="radio" name="title" value="Frau"> Frau&nbsp;&nbsp;
      <input type="radio" name="title" value="Herr"> Herr<br>
    </div>
  </div>
  <div class="form-group" id="div-firstname">
    <label for="firstname" class="col-sm-2 control-label">Vorname *</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="firstname" placeholder="Vorname" required>
    </div>
  </div>
  <div class="form-group" id="div-lastname">
    <label for="lastname" class="col-sm-2 control-label">Nachname *</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname" placeholder="Nachname" required>
    </div>
  </div>
  <div class="form-group" id="div-street">
    <label for="street" class="col-sm-2 control-label">Straße und Hausnummer *</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="street" placeholder="Straße und Hausnummer" required>
    </div>
  </div>
  <div class="form-group" id="div-zip">
    <label for="zip" class="col-sm-2 control-label">PLZ, Stadt *</label>
    <div class="col-sm-3">
      <input type="number" class="form-control" id="zip" placeholder="PLZ" required>
    </div>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="city" placeholder="Stadt" required>
    </div>
  </div>
  <div class="form-group" id="div-phone">
    <label for="phone" class="col-sm-2 control-label">Telefon *</label>
    <div class="col-sm-10">
      <input type="tel" class="form-control" id="phone" placeholder="Telefon" required>
    </div>
  </div>
  <div class="form-group" id="div-email">
    <label for="email" class="col-sm-2 control-label">E-Mail *</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="E-Mail" required>
    </div>
  </div>
  <div class="form-group" id="div-comment">
    <label for="comment" class="col-sm-2 control-label">Bemerkung</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="comment" placeholder="Bemerkung" required></textarea>
    </div>
  </div>

  <!-- Hidden recipient -->
  <input type="hidden" class="form-control" id="recipient" value="<?php echo $var1; ?>">


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="button" id="button" class="btn btn-default" value="Anfrage abschicken">
    </div>
  </div>
</form>

<div id="info"></div>
<div id="loading" style="">
  <span class="btn"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Anfrage wird bearbeitet...</span>
</div>
