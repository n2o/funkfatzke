// Generated by CoffeeScript 1.8.0
var root;

root = typeof exports !== "undefined" && exports !== null ? exports : this;

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
    var description, id, is_equipment, name, photo, price, quantity, weight;
    id = $("#id-edit").val();
    name = $("#name-edit").val();
    description = $("#description-edit").val();
    photo = $("#photo-edit").val();
    weight = $("#weight").val();
    price = $("#price-edit").val();
    price = price.replace(/,/g, ".");
    quantity = $("#quantity-edit").val();
    if ($("#is-equipment-edit").is(":checked")) {
      is_equipment = 1;
    } else {
      is_equipment = 0;
    }
    if (name === "" || description === "") {
      root.growl("Bitte alle erforderlichen Felder ausfüllen.", "info");
    } else {
      $.ajax({
        type: "post",
        url: "aux/articles/sql-update.php",
        data: "id=" + id + "&name=" + name + "&description=" + description + "&photo=" + photo + "&weight=" + weight + "&price=" + price + "&quantity=" + quantity + "&is_equipment=" + is_equipment,
        success: function() {
          root.growl("Artikel erfolgreich bearbeitet.", "success");
          return root.getList();
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
