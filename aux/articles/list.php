<script type="text/javascript" src="js/articles/list.js"></script>

<style>
/* Modify article list */
#articles > tbody > tr > td.articlelist > img {
  max-width: 100px;
}
#articles > tbody > tr > td.articlelist {
  width: 100px;
}
</style>

<div class="row">
  <div class="col">
    <h1>Artikelliste</h1>
    <table id="articles" class="table table-striped table-hover table-condensed">
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th>Preis *</th>
          <th>Geräte</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody id="list">
      </tbody>
    </table>
  </div> <!-- /.col -->
</div> <!-- /.row -->
