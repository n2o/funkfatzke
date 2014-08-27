makeAjaxRequest = ->
    $.ajax
        url: "../../aux/articles/sql-get.php"
        type: "get"
        data:
            id: root.selected
        success: (response) ->
            console.log response
            return
return
