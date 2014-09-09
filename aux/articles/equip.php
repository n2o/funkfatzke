<script type="text/javascript" src="js/articles/cats.js"></script>
<link rel="stylesheet" type="text/css" href="css/snippets.css">

<div class="row">
  <div class="col col-md-12">
    <h1>Zubehör verwalten</h1>
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
    <ul class="selectable" id="selectableArticlesEquip">
      <li class=""><span class="btn"><span class="glyphicon glyphicon-refresh"></span> Anfrage wird bearbeitet...</span></li>
    </ul>
  </div> <!-- /.col -->
  <div class="col col-md-6">
    <div class="row">
      <div class="col col-md-6">
        <h3>Zubehör</h3>
      </div>
    </div>
    <ul class="selectable" id="selectableCatsEquip">
      <li class=""><span class="btn"><span class="glyphicon glyphicon-refresh"></span> Anfrage wird bearbeitet...</span></li>
    </ul>
  </div> <!-- /.col -->
</div> <!-- /.row -->

<div class="row">
  <div class="col col-md-12" style="padding: 1em;">
    <button id="equip-assign" type="button" class="btn btn-default btn-lg">Zuordnung speichern</button>
    <span id="equip-assign-info"></span>
  </div>
</div>
