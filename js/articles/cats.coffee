root = exports ? this

selectedArticles = []
selectedCats = []

$ ->
    ### Listener ###
    $("#cat-add").click ->
        addCat()

    $("#cat-remove").click ->
        removeCat()

    $("#cat-assign").click ->
        if selectedArticles.length != 0 and selectedCats.length != 0
            assignCats()

    $("#selectableArticles").selectable stop: ->
        updateCatsOnArticleClick()
        selectedArticles = []
        $(".ui-selected", this).each ->
            selectedArticles.push $(this).attr("data-id")

        if selectedArticles.length is 1
            console.log "one"
        else
            console.log "more"

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
    query = "DELETE FROM `Article_Category_Rel` WHERE (Category) IN ("
    queryOther = "DELETE FROM `ArticleCategories` WHERE (id) in ("
    count = 0
    for cat in selectedCats
        query += "(#{cat}),"
        queryOther += "(#{cat}),"
    query = query[..-2] + ");"
    queryOther = queryOther[..-2] + ");"
    sql_query query, "", "", "", false
    sql_query queryOther, "Kategorie erfolgreich gelöscht", "", true
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
        sql_query "DELETE FROM `Article_Category_Rel` WHERE Article = #{article}", "", toggleInfo, false
        count++
        if count == selectedArticles.length
            query = query[..-2] + ";"
            callback = -> sql_query query, "Zuordnung erfolgreich erstellt.", toggleInfo, true
            setTimeout callback, 500


sql_query = (query, message, toggleInfo, toggle) ->
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


updateCatsOnArticleClick = ->
    $("#selectableCats li").each ->
        # Reset selected Categories
        $(this).removeClass "ui-selected"
        selectedCats = []
        #console.log $(this).attr "data-id"


# Post AJAX request and create table
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
        content = "<li class='' data-id='#{cat.id}'>#{cat.Name} <a class='remove' onclick='alert(event);' style='float: right;'><i class='fa fa-minus-circle fa-lg'></i></a></li>"
        $("#selectableCats").append content
