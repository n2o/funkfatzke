root = exports ? this

selectedArticlesEquip = []
selectedEquip = []
assignedEquip = []

$ ->
    ### Listener ###
    $("#equip-assign").click ->
        if selectedArticlesEquip.length != 0 and selectedEquip.length != 0
            assignEquip()
        else
            root.growl "So kann ich keine Zuordnung erstellen...", "info"

    $("#selectableArticlesEquip").selectable stop: ->
        selectedArticlesEquip = []
        $(".ui-selected", this).each ->
            selectedArticlesEquip.push $(this).attr("data-id")

        if selectedArticlesEquip.length is 1
            sqlGetAssignedEquip()

    $("#selectableEquip").selectable stop: ->
        selectedEquip = []
        $(".ui-selected", this).each ->
            selectedEquip.push $(this).attr("data-id")


# Init function to be called when tab is active
equipInit = ->
    sqlGetArticlesEquip()
    sqlGetEquip()


assignEquip = ->
    toggleInfo = "#equip-assign-info"
    $(toggleInfo).html "<span class='btn'><span class='glyphicon glyphicon-refresh'></span> Speichere...</span>"
    query = "INSERT INTO `Article_Equipment_Rel` (Article, Equipment) VALUES "
    count = 0
    for article in selectedArticlesEquip
        for equip in selectedEquip
            query += "(#{article},#{equip}),"
        sqlQuery "DELETE FROM `Article_Equipment_Rel` WHERE Article = #{article}", "", toggleInfo, false
        count++
        if count == selectedArticlesEquip.length
            query = query[..-2] + ";"
            callback = -> sqlQuery query, "Zuordnung erfolgreich erstellt.", toggleInfo, true
            setTimeout callback, 500


showAssignmentsEquip = (data) ->
    assigned = []
    for item in data
        assigned.push item.Equipment
    $("#selectableEquip li").each ->
        # Reset selected equipment
        $(this).removeClass "ui-selected"
        selectedEquip = []
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
sqlGetArticlesEquip = ->
    $.ajax
        url: "aux/articles/sql-get-all-articles.php"
        type: "POST"
        data: ""
        dataType: "json"
        success: (response) ->
            articleListEquip response


# Add all articles to the list of articles
articleListEquip = (data) ->
    # Remove existing rows
    $("#selectableArticlesEquip li").remove()

    # Fill list with article data
    for article in data
        content = "<li class='' data-id='#{article.id}'>#{article.Name}</li>"
        $("#selectableArticlesEquip").append content


# Post AJAX request and create list
sqlGetEquip = ->
    $.ajax
        url: "aux/articles/sql-get-all-equip.php"
        type: "POST"
        data: ""
        dataType: "json"
        success: (response) ->
            equipItem response
        error: ->
            root.growl "Zubehör konnte nicht abgerufen werden.", "info"

# Get equipment assigned to Articles
sqlGetAssignedEquip = ->
    $.ajax
        url: "aux/articles/sql-get-assigned-equip.php"
        type: "POST"
        data: "id=" + selectedArticlesEquip[0]
        dataType: "json"
        success: (response) ->
            showAssignmentsEquip response
        error: ->
            root.growl "Zugeordnetes Zubehör konnte nicht abgerufen werden.", "info"


# Add all equipments to the list
equipItem = (data) ->
    # Remove existing rows
    $("#selectableEquip li").remove()

    # Fill list with items
    for equip in data
        content = "<li class='' data-id='#{equip.id}'>#{equip.Name}</li>"
        $("#selectableEquip").append content
