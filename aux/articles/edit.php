<script type="text/javascript" src="js/articles/edit.js"></script>
<script type="text/javascript">
// What to do if an item from the dialog was clicked
function dialogClickEventEdit(event) {
    var clicked = event.target.innerHTML;
    $('#photo-edit').val(clicked);
    $('#dialog-message-edit').dialog('close');
    $('#show-photo-edit img').attr('src', 'sites/funk/files/t-' + clicked);
    $('#show-photo-edit a').attr('href', 'sites/funk/files/' + clicked);
}
</script>

<div class="row">
  <div class="col col-md-7">
    <!-- Changes in this form affect the JS below and the file todb.php -->
    <h1>Artikel bearbeiten</h1>
    <form id="myForm-edit" class="form-horizontal" role="form">
      <div class="form-group">
        <label for="id-edit" class="col-sm-2 control-label">Id</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="id-edit" placeholder="-1" readonly>
        </div>
      </div>
      <div class="form-group">
        <label for="name-edit" class="col-sm-2 control-label">Name *</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name-edit" placeholder="Name" required>
        </div>
      </div>
      <div class="form-group">
        <label for="description-edit" class="col-sm-2 control-label">Beschreibung *</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="description-edit" placeholder="Beschreibung" required></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="transmission-edit" class="col-sm-2 control-label">Übertragung</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="transmission-edit" placeholder="DMR digital">
        </div>
      </div>
      <div class="form-group">
        <label for="photo-edit" class="col-sm-2 control-label">Foto URL</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="photo-edit" placeholder="krasses_funkgeraet.png">
        </div>
      </div>
      <div class="form-group">
        <label for="weight-edit" class="col-sm-2 control-label">Gewicht</label>
        <div class="col-sm-10">
          <div class="input-group">
            <input type="number" class="form-control" id="weight-edit" placeholder="290">
            <span class="input-group-addon">g</span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="channel-edit" class="col-sm-2 control-label">Kanäle, mit Komma getrennt</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="channel-edit" placeholder="136 - 174 MHz, 400 - 527 MHz">
        </div>
      </div>
      <div class="form-group">
        <label for="price-edit" class="col-sm-2 control-label">Grundpreis</label>
        <div class="col-sm-10">
          <div class="input-group">
            <input type="text" class="form-control" id="price-edit" placeholder="6,75">
            <span class="input-group-addon">€</span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="quantity-edit" class="col-sm-2 control-label">Anzahl der Geräte</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="quantity-edit" placeholder="10">
        </div>
      </div>
      <div class="form-group">
        <label for="created-edit" class="col-sm-2 control-label">Erstellt am</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="created-edit" placeholder="" readonly>
        </div>
      </div>
      <div class="form-group">
        <label for="modified-edit" class="col-sm-2 control-label">Zuletzt geändert am</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="modified-edit" placeholder="" readonly>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="button" id="button-edit" class="btn btn-default" value="Artikel bearbeiten">
        </div>
      </div>
    </form>

  </div> <!-- /col -->
  <div class="col col-md-5">
    <h1>&nbsp;</h1>
    <button id="open-dialog-edit" type="button" class="btn btn-default">Bild auswählen</button>
    <br><br>
    <span id="show-photo-edit"><a href=""><img src=""></a></span>

    <!-- Add new picture -->
    <!--<div id="drop-edit" class="dropzone dark" style="min-height:220px;">
      <span class="dz-message">
        <i class="fa fa-cloud-upload fa-4x"></i> <?php print _("Drag file here or click to upload"); ?></span>
      </span>
    </div>-->

    <!-- Generate Dialog -->
    <div id="dialog-message-edit" data-bind="foreach: files">
      <div class="listItem" data-bind="css: {'has-thumb': isImage==true}">
        <span class="image" data-bind="if: isImage"><img height="75" width="75" data-bind="attr:{'src':thumbUrl}"></span>
        <h2><a id="4" class="photo-url" data-bind="text:filename" onclick="dialogClickEventEdit(event); return false;"></a></h2>
      </div>
    </div> <!-- /.list -->

    <!-- Information if files are loading or can not be accessed -->
    <p data-bind="visible: filesLoading()" class="list-loading"><i class="fa fa-spinner fa fa-spin"></i> <?php print _("Loading..."); ?></p>
    <p data-bind="visible: filesLoading()==false && files().length < 1" class="list-none"><?php print _("No files here. Click Upload File to get started."); ?></p>

  </div>
</div> <!-- /row -->

