// Generated by CoffeeScript 1.7.1
(function() {
  $(function() {
    var photoUrl;
    $("#dialog-message-edit").dialog({
      height: 600,
      width: 800,
      autoOpen: false,
      resizable: true,
      modal: true
    });
    $("#button-edit").click(function() {
      var category, channel, description, id, name, photo, price, quantity, subcategory, transmission, weight;
      id = $("#id-edit").val();
      name = $("#name-edit").val();
      description = $("#description-edit").val();
      transmission = $("#transmission-edit").val();
      category = $("#category-edit").val();
      subcategory = $("#subcategory-edit").val();
      photo = $("#photo-edit").val();
      weight = $("#weight-edit").val();
      channel = $("#channel-edit").val();
      price = $("#price-edit").val();
      price = price.replace(/,/g, ".");
      quantity = $("#quantity-edit").val();
      if (name === "" || description === "") {
        $("#info-edit").attr("class", "alert alert-danger");
        $("#info-edit").html("Bitte alle benötigten Felder ausfüllen.");
      } else {
        $.ajax({
          type: "post",
          url: "aux/articles/sql-update.php",
          data: "id=" + id + "&name=" + name + "&description=" + description + "&transmission=" + transmission + "&category=" + category + "&subcategory=" + subcategory + "&photo=" + photo + "&weight=" + weight + "&channel=" + channel + "&price=" + price + "&quantity=" + quantity,
          success: function() {
            $("#myForm-edit").trigger("reset");
            $("#info-edit").attr("class", "alert alert-success");
            return $("#info-edit").html("Artikel erfolgreich bearbeitet.");
          }
        });
      }
    });
    photoUrl = $("#photo-edit").val();
    if (photoUrl) {
      $("#show-photo-edit img").attr("src", "sites/funk/files/t-" + photoUrl);
      $("#show-photo-edit a").attr("href", "sites/funk/files/" + photoUrl);
    }
    $("#open-dialog-edit").click(function() {
      $("#dialog-message-edit").dialog("open");
      false;
    });
  });

}).call(this);