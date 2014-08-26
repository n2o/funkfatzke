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
        <label for="category" class="col-sm-2 control-label">Kategorie</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="category" placeholder="Kategorie">
        </div>
      </div>
      <div class="form-group">
        <label for="subcategory" class="col-sm-2 control-label">Unterkategorie</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="subcategory" placeholder="Unterkategorie">
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

      <div id="info" style="padding-bottom: 1em;"></div><br>

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

    <script>
      $(function() {
        // Initial picture if image is available
        var photoUrl = $('#photo').val();
        
        if(photoUrl) {
          $('#show-photo img').attr('src', 'sites/funk/files/t-'+photoUrl);
          $('#show-photo a').attr('href', 'sites/funk/files/'+photoUrl);
        };

        // Listener to open dialog on button click    
        $('#open-dialog').click(function() {
          $('#dialog-message').dialog('open');
          return false;
        });

        // Define the dialog
        $("#dialog-message").dialog({
          height: 600,
          width: 800,
          autoOpen: false,
          resizable: true,
          modal: true,
        });
      });

      // What to do if an item from the dialog was clicked
      function dialogClickEvent(event) {
        var clicked = event.target.innerHTML;
        $('#photo').val(clicked);
        $('#dialog-message').dialog('close');
        $('#show-photo img').attr('src', 'sites/funk/files/t-'+clicked);
        $('#show-photo a').attr('href', 'sites/funk/files/'+clicked);
      }
    </script>

    <!-- Generate Dialog -->
    <div id="dialog-message" class="" data-bind="foreach: files">
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

<script type="text/javascript">
   $(document).ready(function(){
      $("#button").click(function(){

        // Get values from form
        var name = $("#name").val();
        var description = $("#description").val();
        var transmission = $("#transmission").val();
        var category = $("#category").val();
        var subcategory = $("#subcategory").val();
        var photo = $("#photo").val();       
        var weight = $("#weight").val();
        var channel = $("#channel").val();
        var price = $("#price").val();
        price = price.replace(/,/g, '.');
        var quantity = $("#quantity").val();

        if(name == "" || description == "") {
          $('#info').attr('class', 'alert alert-danger');
          $('#info').html("Bitte alle benötigten Felder ausfüllen.");
        } else {
          // Pass it to the database
          $.ajax({
              type:"post",
              url:"aux/articles/todb.php",
              data:"name="+name+"&description="+description+"&transmission="+transmission+"&category="+category+"&subcategory="+subcategory+"&photo="+photo+"&weight="+weight+"&channel="+channel+"&price="+price+"&quantity="+quantity,
          });
          $('form').trigger('reset');
          $('#info').attr('class', 'alert alert-success');
          $('#info').html("Artikel erfolgreich hinzugefügt.");
        }
    });
   });
</script>
