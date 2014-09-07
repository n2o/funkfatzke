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
    <div class="row">
      <div class="col col-md-6">
        <h3>Kategorien</h3>
      </div>
      <div class="col col-md-6">
        <h3>foo</h3>
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
    <form id="cat-add-form" class="navbar-form navbar-left" style="padding-left: 0; margin-left: 0;">
      <div class="form-group">
        <input id="new-cat-name" type="text" class="form-control" placeholder="Handfunkgeräte">
      </div>
      <button id="cat-add" type="button" class="btn btn-default btn-lg">Hinzufügen</button>
    </form>
  </div>
</div>
