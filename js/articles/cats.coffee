root = exports ? this

$ ->
    $("#cat-add").click ->
        addCat()
        return

# Init function to be called when tab is active
catsInit = ->
    sqlGetArticles()
    sqlGetCats()

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


# Enabe multiselect to assign categories to articles
$ ->
    $("#selectableArticles").selectable stop: ->
        result = $("#select-result").empty()
        $(".ui-selected", this).each ->
            index = $("#selectableArticles li").index(this)
            result.append " #" + (index + 1)
            return
        return

    $("#selectableCats").selectable stop: ->
        result = $("#select-result-cats").empty()
        $(".ui-selected", this).each ->
            index = $("#selectableCats li").index(this)
            result.append " #" + (index + 1)
            return
        return
    return

    return


# Post AJAX request and create table
sqlGetArticles = ->
    $.ajax
        url: "aux/articles/sql-get-all-articles.php"
        type: "POST"
        data: ""
        dataType: "json"
        success: (response) ->
            articleItem response
            return

# Add all articles to the list of articles
articleItem = (data) ->
    # Remove existing rows
    $("#selectableArticles li").remove()

    # Fill list with article data
    for article in data
        content = "<li class='' data-id='#{article.id}'>#{article.Name}</li>"
        $("#selectableArticles").append content
    return


# Post AJAX request and create table
sqlGetCats = ->
    $.ajax
        url: "aux/articles/sql-get-all-cats.php"
        type: "POST"
        data: ""
        dataType: "json"
        success: (response) ->
            catItem response
        error: ->

# Add all categories to the list of categories
catItem = (data) ->
    # Remove existing rows
    $("#selectableCats li").remove()

    # Fill list with categories
    for cat in data
        content = "<li class='' data-id='#{cat.id}'>#{cat.Name}</li>"
        $("#selectableCats").append content
    return
