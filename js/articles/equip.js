// Generated by CoffeeScript 1.8.0
var articleListEquip, assignEquip, assignedEquip, equipInit, equipItem, root, selectedArticlesEquip, selectedEquip, showAssignmentsEquip, sqlGetArticlesEquip, sqlGetAssignedEquip, sqlGetEquip, sqlQuery,
  __indexOf = [].indexOf || function(item) { for (var i = 0, l = this.length; i < l; i++) { if (i in this && this[i] === item) return i; } return -1; };

root = typeof exports !== "undefined" && exports !== null ? exports : this;

selectedArticlesEquip = [];

selectedEquip = [];

assignedEquip = [];

$(function() {

  /* Listener */
  $("#equip-assign").click(function() {
    if (selectedArticlesEquip.length !== 0 && selectedEquip.length !== 0) {
      return assignEquip();
    } else {
      return root.growl("So kann ich keine Zuordnung erstellen...", "info");
    }
  });
  $("#selectableArticles").selectable({
    stop: function() {
      selectedArticlesEquip = [];
      $(".ui-selected", this).each(function() {
        return selectedArticlesEquip.push($(this).attr("data-id"));
      });
      if (selectedArticlesEquip.length === 1) {
        return sqlGetAssignedEquip();
      }
    }
  });
  return $("#selectableEquip").selectable({
    stop: function() {
      selectedEquip = [];
      return $(".ui-selected", this).each(function() {
        return selectedEquip.push($(this).attr("data-id"));
      });
    }
  });
});

equipInit = function() {
  sqlGetArticlesEquip();
  return sqlGetEquip();
};

assignEquip = function() {
  var article, callback, count, equip, query, toggleInfo, _i, _j, _len, _len1, _results;
  toggleInfo = "#equip-assign-info";
  $(toggleInfo).html("<span class='btn'><span class='glyphicon glyphicon-refresh'></span> Speichere...</span>");
  query = "INSERT INTO `Article_Equipment_Rel` (Article, Equipment) VALUES ";
  count = 0;
  _results = [];
  for (_i = 0, _len = selectedArticlesEquip.length; _i < _len; _i++) {
    article = selectedArticlesEquip[_i];
    for (_j = 0, _len1 = selectedEquip.length; _j < _len1; _j++) {
      equip = selectedEquip[_j];
      query += "(" + article + "," + equip + "),";
    }
    sqlQuery("DELETE FROM `Article_Equipment_Rel` WHERE Article = " + article, "", toggleInfo, false);
    count++;
    if (count === selectedArticlesEquip.length) {
      query = query.slice(0, -1) + ";";
      callback = function() {
        return sqlQuery(query, "Zuordnung erfolgreich erstellt.", toggleInfo, true);
      };
      _results.push(setTimeout(callback, 500));
    } else {
      _results.push(void 0);
    }
  }
  return _results;
};

showAssignmentsEquip = function(data) {
  var assigned, item, _i, _len;
  assigned = [];
  for (_i = 0, _len = data.length; _i < _len; _i++) {
    item = data[_i];
    assigned.push(item.Equipment);
  }
  return $("#selectableEquip li").each(function() {
    var _ref;
    $(this).removeClass("ui-selected");
    selectedEquip = [];
    if (_ref = $(this).attr("data-id"), __indexOf.call(assigned, _ref) >= 0) {
      return $(this).addClass("ui-selected");
    }
  });
};

sqlQuery = function(query, message, toggleInfo, toggle) {
  return $.ajax({
    type: "post",
    url: "aux/articles/sql-query.php",
    data: "query=" + query,
    success: function() {
      if (toggle) {
        root.growl(message, "success");
        return $(toggleInfo).html("");
      }
    },
    error: function() {
      root.growl("Es ist etwas schiefgegangen...", "info");
      return $(toggleInfo).html("");
    }
  });
};

sqlGetArticlesEquip = function() {
  return $.ajax({
    url: "aux/articles/sql-get-all-articles.php",
    type: "POST",
    data: "",
    dataType: "json",
    success: function(response) {
      return articleListEquip(response);
    }
  });
};

articleListEquip = function(data) {
  var article, content, _i, _len, _results;
  $("#selectableArticlesEquip li").remove();
  _results = [];
  for (_i = 0, _len = data.length; _i < _len; _i++) {
    article = data[_i];
    content = "<li class='' data-id='" + article.id + "'>" + article.Name + "</li>";
    _results.push($("#selectableArticlesEquip").append(content));
  }
  return _results;
};

sqlGetEquip = function() {
  return $.ajax({
    url: "aux/articles/sql-get-all-equip.php",
    type: "POST",
    data: "",
    dataType: "json",
    success: function(response) {
      return equipItem(response);
    },
    error: function() {
      return root.growl("Zubehör konnte nicht abgerufen werden.", "info");
    }
  });
};

sqlGetAssignedEquip = function() {
  return $.ajax({
    url: "aux/articles/sql-get-assigned-equip.php",
    type: "POST",
    data: "id=" + selectedArticlesEquip[0],
    dataType: "json",
    success: function(response) {
      return showAssignments(response);
    },
    error: function() {
      return root.growl("Zugeordnetes Zubehör konnte nicht abgerufen werden.", "info");
    }
  });
};

equipItem = function(data) {
  var content, equip, _i, _len, _results;
  $("#selectableEquip li").remove();
  _results = [];
  for (_i = 0, _len = data.length; _i < _len; _i++) {
    equip = data[_i];
    content = "<li class='' data-id='" + equip.id + "'>" + equip.Name + "</li>";
    _results.push($("#selectableEquip").append(content));
  }
  return _results;
};
