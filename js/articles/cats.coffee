$ ->
    $("#cat-add").click ->
        addCat()
        return

# remove article on click
removeCat = (event) ->
    id = event.target.nextSibling.innerText if confirm("Kategorie wirklich löschen?")
    $.ajax
        type: "post"
        url: "aux/articles/sql-remove-cat.php"
        data: "id=" + id
        success: ->
            root.growl "Kategorie erfolgreich gelöscht.", "success"
            root.getList()


# Add new category
addCat = (event) ->
    name = $("#new-cat-name").val()
    if name is "" or name is undefined
        root.growl "Bitte einen Namen hinzufügen.", "info"
    else
        $.ajax
            type: "post"
            url: "aux/articles/sql-add-cat.php"
            data: "name=" + name
            success: ->
                root.growl "Kategorie erfolgreich erstellt.", "success"
                $("#cat-add-form").trigger("reset")
