<script type="text/javascript" src="js/articles/cats.js"></script>
<link rel="stylesheet" type="text/css" href="css/snippets.css">

<div class="row">
  <div class="col">
    <h1>Kategorien verwalten</h1>
    <form id="cat-add-form" class="navbar-form navbar-left">
      <div class="form-group">
        <input id="new-cat-name" type="text" class="form-control" placeholder="Handfunkgeräte">
      </div>
      <button id="cat-add" type="button" class="btn btn-default btn-lg">Hinzufügen</button>
    </form>

    <p id="feedback">
      <span>Ausgewählt:</span> <span id="select-result">none</span><br>
      <span>Ausgewählt:</span> <span id="select-result-cats">none</span>
    </p>

  </div>
</div>

<div class="row">
  <div class="col">
    <p>
      Wähle einen oder mehrere Artikel aus. Dann wähle beliebig viele Kategorien aus der Liste aus.
      Um die Zuordnung zu speichern, muss der entsprechende Button geklickt werden. Alte Zuordnungen
      der ausgewählten Artikel werden dadurch ersetzt.<br>
      Mehrere Artikel können mit gedrückter STRG /  Taste oder gedrückter linker Maustaste markiert werden.
    </p>
  </div>
</div>

<div class="row">
  <div class="col col-md-6">
    <h3>Artikel</h3>
    <ul class="selectable" id="selectableArticles">
      <li class=""><span class="btn"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Anfrage wird bearbeitet...</span></li>
    </ul>
  </div> <!-- /.col -->
  <div class="col col-md-6">
    <h3>Kategorien</h3>
    <ul class="selectable" id="selectableCats">
      <li class=""><span class="btn"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Anfrage wird bearbeitet...</span></li>
    </ul>
  </div> <!-- /.col -->
</div> <!-- /.row -->

<div class="row">
  <div class="col">
    <form id="cat-assign-form" class="navbar-form navbar-left">
      <button id="cat-assign" type="button" class="btn btn-default btn-lg">Zuordnung speichern</button>
    </form>
  </div>
</div>

