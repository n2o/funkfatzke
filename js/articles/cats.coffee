root = exports ? this

selectedArticles = []
selectedCats = []
assignedCats = []

$ ->
    ### Listener ###
    $("#cat-add").click ->
        addCat()

    $("#cat-remove").click ->
        if selectedCats.length != 0
            removeCat()
        else
            root.growl "Bitte zuerst mindestens eine Kategorie auswählen.", "info"

    $("#cat-assign").click ->
        if selectedArticles.length != 0 and selectedCats.length != 0
            assignCats()
        else
            root.growl "So kann ich keine Zuordnung erstellen...", "info"

    $("#selectableArticles").selectable stop: ->
        selectedArticles = []
        $(".ui-selected", this).each ->
            selectedArticles.push $(this).attr("data-id")

        if selectedArticles.length is 1
            sqlGetAssignedCats()

    $("#selectableCats").selectable stop: ->
        selectedCats = []
        $(".ui-selected", this).each ->
            selectedCats.push $(this).attr("data-id")


# Init function to be called when tab is active
catsInit = ->
    sqlGetArticles()
    sqlGetCats()


# remove article on click
removeCat = (event) ->
    if confirm "Wirklich die gewählte Kategorie(n) löschen?"
        query = "DELETE FROM `Article_Category_Rel` WHERE (Category) IN ("
        queryOther = "DELETE FROM `ArticleCategories` WHERE (id) in ("
        for cat in selectedCats
            query += "(#{cat}),"
            queryOther += "(#{cat}),"
        query = query[..-2] + ");"
        queryOther = queryOther[..-2] + ");"
        sqlQuery query, "", "", "", false
        sqlQuery queryOther, "Kategorie erfolgreich gelöscht.", "", true
        sqlGetCats()


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
                sqlGetCats()


assignCats = ->
    toggleInfo = "#assign-info"
    $(toggleInfo).html "<span class='btn'><span class='glyphicon glyphicon-refresh'></span> Speichere...</span>"
    query = "INSERT INTO `Article_Category_Rel` (Article, Category) VALUES "
    count = 0
    for article in selectedArticles
        for cat in selectedCats
            query += "(#{article},#{cat}),"
        sqlQuery "DELETE FROM `Article_Category_Rel` WHERE Article = #{article}", "", toggleInfo, false
        count++
        if count == selectedArticles.length
            query = query[..-2] + ";"
            callback = -> sqlQuery query, "Zuordnung erfolgreich erstellt.", toggleInfo, true
            setTimeout callback, 500


showAssignments = (data) ->
    assigned = []
    for item in data
        assigned.push item.Category
    $("#selectableCats li").each ->
        # Reset selected Categories
        $(this).removeClass "ui-selected"
        selectedCats = []
        if $(this).attr("data-id") in assigned
            $(this).addClass "ui-selected"


# Submit your query as a string
sqlQuery = (query, message, toggleInfo, toggle) ->
    $.ajax
        type: "post"
        url: "aux/articles/sql-query.php"
        data: "query=" + query
        success: ->
            if toggle
                root.growl message, "success"
                $(toggleInfo).html ""
        error: ->
            root.growl "Es ist etwas schiefgegangen...", "info"
            $(toggleInfo).html ""


# Post AJAX request and create list
sqlGetArticles = ->
    $.ajax
        url: "aux/articles/sql-get-all-articles.php"
        type: "POST"
        data: ""
        dataType: "json"
        success: (response) ->
            articleItem response


# Add all articles to the list of articles
articleItem = (data) ->
    # Remove existing rows
    $("#selectableArticles li").remove()

    # Fill list with article data
    for article in data
        content = "<li class='' data-id='#{article.id}'>#{article.Name}</li>"
        $("#selectableArticles").append content


# Post AJAX request and create list
sqlGetCats = ->
    $.ajax
        url: "aux/articles/sql-get-all-cats.php"
        type: "POST"
        data: ""
        dataType: "json"
        success: (response) ->
            catItem response
        error: ->
            root.growl "Kategorien konnten nicht abgerufen werden.", "info"

# Get Categories assigned to Articles
sqlGetAssignedCats = ->
    $.ajax
        url: "aux/articles/sql-get-assigned-cats.php"
        type: "POST"
        data: "id=" + selectedArticles[0]
        dataType: "json"
        success: (response) ->
            showAssignments response
        error: ->
            root.growl "Zugeordnete Kategorien konnten nicht abgerufen werden.", "info"


# Add all categories to the list of categories
catItem = (data) ->
    # Remove existing rows
    $("#selectableCats li").remove()

    # Fill list with categories
    for cat in data
        content = "<li class='' data-id='#{cat.id}'>#{cat.Name}</li>"
        $("#selectableCats").append content
