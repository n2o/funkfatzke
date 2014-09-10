// Generated by CoffeeScript 1.8.0
var createArticleList, root, updateForm;

root = typeof exports !== "undefined" && exports !== null ? exports : this;

root.selected = -1;

updateForm = function(data) {
  var photo;
  photo = data.PhotoURL;
  $('#id-edit').val(data.id);
  $('#name-edit').val(data.Name);
  $('#description-edit').val(data.Description);
  $('#transmission-edit').val(data.Transmission);
  $('#photo-edit').val(photo);
  $('#weight-edit').val(data.Weight);
  $('#channel-edit').val(data.Channel);
  $('#price-edit').val(data.Price);
  $('#quantity-edit').val(data.Quantity);
  $('#created-edit').val(data.Created);
  $('#modified-edit').val(data.Modified);
  if (data.is_equipment === "1") {
    $('input[name=is_equipment-edit]').attr("checked", true);
  } else {
    $('input[name=is_equipment-edit]').attr("checked", false);
  }
  if (photo !== null && photo !== "" && photo !== void 0) {
    $("#show-photo-edit img").attr("src", "sites/funk/files/t-" + photo);
    return $("#show-photo-edit a").attr("href", "sites/funk/files/" + photo);
  } else {
    $("#show-photo-edit img").attr("src", "");
    return $("#show-photo-edit a").attr("href", "");
  }
};

root.growl = function(message, type) {
  $.bootstrapGrowl(message, {
    ele: "body",
    type: type,
    offset: {
      from: "bottom",
      amount: 20
    },
    align: "center",
    width: "auto",
    delay: 4000,
    allow_dismiss: true,
    stackup_spacing: 10
  });
};

root.getList = function() {
  return $.ajax({
    url: "aux/articles/sql-get-all-articles.php",
    type: "POST",
    data: "",
    dataType: "json",
    success: function(response) {
      createArticleList(response);
    }
  });
};

createArticleList = function(data) {
  var article, photo, row, _i, _len;
  $("tbody#list tr").remove();
  for (_i = 0, _len = data.length; _i < _len; _i++) {
    article = data[_i];
    photo = article.PhotoURL;
    row = $("<tr>");
    $("tbody#list").append(row);
    if (photo !== "" &&  photo !== void 0 && photo !== null) {
      row.append("<td class='articlelist'><img class='articlelist' src='sites/funk/files/t-" + photo + "'></td>");
    } else {
      row.append("<td></td>");
    }
    row.append("<td><strong>" + article.Name + "</strong><br>" + article.Description + "</td>");
    row.append("<td>" + article.Price + " €</td>");
    row.append("<td>" + article.Quantity + "</td>");
    row.append("<td> <a class='edit' onclick='editSelectedArticle(event); return false;'><i class='fa fa-pencil fa-lg'></i><span style='display:none;'>" + article.id + "</span></a> <a class='remove' onclick='removeArticle(event);'><i class='fa fa-minus-circle fa-lg'></i><span style='display:none;'>" + article.id + "</span></a> </td>");
  }
};

$(function() {
  $("#tabs").tabs({
    show: {
      effect: "fade"
    }
  });
  $("#tabs").tabs("option", "disabled", [2]);
  root.getList();
  $("#tabs").on("tabsactivate", function(event, ui) {
    var newIndex;
    newIndex = ui.newTab.index();
    if (newIndex === 2 && root.selected !== -1) {
      $.ajax({
        url: "aux/articles/sql-get.php",
        type: "POST",
        data: {
          id: root.selected
        },
        dataType: "json",
        success: function(response) {
          updateForm(response[0]);
        }
      });
    }
    if (newIndex === 0) {
      root.getList();
    }
    if (newIndex === 3) {
      root.catsInit();
    }
    if (newIndex === 4) {
      root.equipInit();
    }
  });
});
