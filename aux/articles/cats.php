<script type="text/javascript" src="js/articles/cats.js"></script>
<link rel="stylesheet" type="text/css" href="css/snippets.css">

<div class="row">
  <div class="col col-md-7">
    <h1>Kategorien verwalten</h1>
  </div>
  <div class="col col-md-5">
    <form id="cat-add-form" class="navbar-form navbar-left">
      <div class="form-group">
        <input id="new-cat-name" type="text" class="form-control" placeholder="Handfunkgeräte">
      </div>
      <button id="cat-add" type="button" class="btn btn-default btn-lg">Hinzufügen</button>
    </form>
  </div>
</div>

<div class="row">
  <div class="col col-md-12">
    <p>
      Mehrere Artikel können mit gedrückter STRG /  Taste oder gedrückter linker Maustaste markiert werden.
    </p>
  </div>
</div>

<div class="row">
  <div class="col col-md-6">
    <h3>Artikel</h3>
    <ul class="selectable" id="selectableArticles">
      <li class=""><span class="btn"><span class="glyphicon glyphicon-refresh"></span> Anfrage wird bearbeitet...</span></li>
    </ul>
  </div> <!-- /.col -->
  <div class="col col-md-6">
    <h3>Kategorien</h3>
    <ul class="selectable" id="selectableCats">
      <li class=""><span class="btn"><span class="glyphicon glyphicon-refresh"></span> Anfrage wird bearbeitet...</span></li>
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

<p id="feedback">
  <span>Ausgewählt:</span> <span id="select-result">none</span><br><br>
  <span>Ausgewählt:</span> <span id="select-result-cats">none</span>
</p>
