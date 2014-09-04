<script type="text/javascript" src="js/articles/add.js"></script>
<script type="text/javascript">
// What to do if an item from the dialog was clicked
function dialogClickEvent(event) {
    var clicked = event.target.innerHTML;
    $('#photo').val(clicked);
    $('#dialog-message').dialog('close');
    $('#show-photo img').attr('src', 'sites/funk/files/t-' + clicked);
    $('#show-photo a').attr('href', 'sites/funk/files/' + clicked);
}
</script>

<div class="row">
  <div class="col col-md-7">
    <!-- Changes in this form affect the JS below and the file todb.php -->
    <h1>Artikel hinzufügen</h1>
    <form id="myForm" class="form-horizontal" role="form">
      <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name *</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" placeholder="Name" required>
        </div>
      </div>
      <div class="form-group">
        <label for="description" class="col-sm-2 control-label">Beschreibung *</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="description" placeholder="Beschreibung" required></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="transmission" class="col-sm-2 control-label">Übertragung</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="transmission" placeholder="DMR digital">
        </div>
      </div>
      <div class="form-group">
        <label for="photo" class="col-sm-2 control-label">Foto URL</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="photo" placeholder="krasses_funkgeraet.png">
        </div>
      </div>
      <div class="form-group">
        <label for="weight" class="col-sm-2 control-label">Gewicht</label>
        <div class="col-sm-10">
          <div class="input-group">
            <input type="number" class="form-control" id="weight" placeholder="290">
            <span class="input-group-addon">g</span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="channel" class="col-sm-2 control-label">Kanäle, mit Komma getrennt</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="channel" placeholder="136 - 174 MHz, 400 - 527 MHz">
        </div>
      </div>
      <div class="form-group">
        <label for="price" class="col-sm-2 control-label">Grundpreis</label>
        <div class="col-sm-10">
          <div class="input-group">
            <input type="text" class="form-control" id="price" placeholder="6,75">
            <span class="input-group-addon">€</span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="quantity" class="col-sm-2 control-label">Anzahl der Geräte</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="quantity" placeholder="10">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="button" id="button" class="btn btn-default" value="Artikel hinzufügen">
        </div>
      </div>
    </form>

  </div> <!-- /col -->
  <div class="col col-md-5">
    <h1>&nbsp;</h1>
    <button id="open-dialog" type="button" class="btn btn-default">Bild auswählen</button>
    <br><br>
    <span id="show-photo"><a href=""><img src=""></a></span>

    <!-- Add new picture -->
    <div id="drop" class="dropzone dark" style="min-height:220px;">
      <span class="dz-message">
        <i class="fa fa-cloud-upload fa-4x"></i> <?php print _("Drag file here or click to upload"); ?></span>
      </span>
    </div>

    <!-- Generate Dialog -->
    <div id="dialog-message" data-bind="foreach: files">
      <div class="listItem" data-bind="css: {'has-thumb': isImage==true}">
        <span class="image" data-bind="if: isImage"><img height="75" width="75" data-bind="attr:{'src':thumbUrl}"></span>
        <h2><a id="4" class="photo-url" data-bind="text:filename" onclick="dialogClickEvent(event); return false;"></a></h2>
      </div>
      <!-- /.listItem -->
    </div>
    <!-- /.list -->

    <!-- Information if files are loading or can not be accessed -->
    <p data-bind="visible: filesLoading()" class="list-loading"><i class="fa fa-spinner fa fa-spin"></i> <?php print _("Loading..."); ?></p>
    <p data-bind="visible: filesLoading()==false && files().length < 1" class="list-none"><?php print _("No files here. Click Upload File to get started."); ?></p>

  </div>
</div> <!-- /row -->
