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
  </div>
</div>

<div class="row">
  <div class="col col-md-6">
    <p id="feedback">
      <span>Ausgewählt:</span> <span id="select-result">none</span>.
    </p>

    <h3>Artikel</h3>
    <ul id="selectableArticles">
      <li class=""><span class="btn"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Anfrage wird bearbeitet...</span></li>
    </ul>
  </div> <!-- /.col -->
  <div class="col col-md-6">
    <h3>Kategorien</h3>
    <ul id="selectableCats">
      <li class=""><span class="btn"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Anfrage wird bearbeitet...</span></li>
    </ul>
  </div> <!-- /.col -->
</div> <!-- /.row -->

