<form class="form-horizontal" role="form" method="post" action="todb.php">
  <div class="form-group">
    <label for="Name" class="col-sm-2 control-label">Name *</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Name" placeholder="Name" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Description" class="col-sm-2 control-label">Beschreibung *</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="Description" placeholder="Beschreibung" required></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Transmission" class="col-sm-2 control-label">Übertragung</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Transmission" placeholder="DMR digital">
    </div>
  </div>
  <div class="form-group">
    <label for="Category" class="col-sm-2 control-label">Kategorie</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Category" placeholder="Kategorie">
    </div>
  </div>
  <div class="form-group">
    <label for="Subcategory" class="col-sm-2 control-label">Unterkategorie</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Subcategory" placeholder="Unterkategorie">
    </div>
  </div>
  <div class="form-group">
    <label for="Weight" class="col-sm-2 control-label">Gewicht</label>
    <div class="col-sm-10">
      <div class="input-group">
        <input type="number" class="form-control" id="Weight" placeholder="290">
        <span class="input-group-addon">g</span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="Channel" class="col-sm-2 control-label">Kanäle, mit Komma getrennt</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Channel" placeholder="136 - 174 MHz, 400 - 527 MHz">
    </div>
  </div>
  <div class="form-group">
    <label for="Price" class="col-sm-2 control-label">Grundpreis</label>
    <div class="col-sm-10">
      <div class="input-group">
        <input type="text" class="form-control" id="Price" placeholder="6,75">
        <span class="input-group-addon">€</span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="Quantity" class="col-sm-2 control-label">Anzahl der Geräte</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Quantity" placeholder="10">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Artikel erstellen</button>
    </div>
  </div>
</form>
