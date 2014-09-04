<script type="text/javascript" src="js/articles/cats.js"></script>

<style>
/* Modify article list */
#cats > tbody > tr > td.articlelist > img {
  max-width: 100px;
}
#cats > tbody > tr > td.articlelist {
  width: 100px;
}
</style>

<div class="row">
  <div class="col">
    <h1>Kategorien verwalten</h1>
    <form id="cat-add-form" class="navbar-form navbar-left">
      <div class="form-group">
        <input id="new-cat-name" type="text" class="form-control" placeholder="Handfunkgeräte">
      </div>
      <button id="cat-add" type="button" class="btn btn-default btn-lg">Hinzufügen</button>
    </form>
    <!-- <table id="cats" class="table table-striped table-hover table-condensed">
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th>Preis *</th>
          <th>Geräte</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody id="catlist">
      </tbody>
    </table> -->
  </div> <!-- /.col -->
</div> <!-- /.row -->

