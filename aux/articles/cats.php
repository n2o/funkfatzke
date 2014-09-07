<script type="text/javascript" src="js/articles/cats.js"></script>
<link rel="stylesheet" type="text/css" href="css/snippets.css">

<div class="row">
  <div class="col col-md-12">
    <h1>Kategorien verwalten</h1>
  </div>
</div>

<div class="row">
  <div class="col col-md-12">
    <p>
      Mehrere Artikel und Kategorien können mit gedrückter STRG /  Taste oder gedrückter linker Maustaste markiert werden.
      Eine zuvor erstellte Zuordnung wird beim markierten Artikel überschrieben.
    </p>
    <p>
      Wird nur ein Artikel ausgewählt, wird seine Zuordnung auf der rechten Seite angezeigt.
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
    <div class="row">
      <div class="col col-md-6">
        <h3>Kategorien</h3>
      </div>
    </div>
    <ul class="selectable" id="selectableCats">
      <li class=""><span class="btn"><span class="glyphicon glyphicon-refresh"></span> Anfrage wird bearbeitet...</span></li>
    </ul>
  </div> <!-- /.col -->
</div> <!-- /.row -->

<div class="row">
  <div class="col col-md-12" style="padding: 1em;">
    <button id="cat-assign" type="button" class="btn btn-default btn-lg">Zuordnung speichern</button>
    <span id="assign-info"></span>
  </div>
</div>

<div class="row">
  <div class="col col-md-6">
    <h3>Kategorien hinzufügen</h3>
    <form id="cat-add-form" class="navbar-form navbar-left" style="padding-left: 0; margin-left: 0;">
      <div class="form-group">
        <input id="new-cat-name" type="text" class="form-control" placeholder="Handfunkgeräte">
      </div>
      <button id="cat-add" type="button" class="btn btn-default btn-lg">Hinzufügen</button>
    </form>
  </div>
  <div class="col col-md-6">
    <h3>Kategorien löschen</h3>
    <p>
      Die markierten Kategorien werden beim Klick auf den Button gelöscht.
    </p>
    <button id="cat-remove" type="button" class="btn btn-default btn-lg">Löschen</button>
  </div>
</div>
