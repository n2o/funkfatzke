root = exports ? this

# Selected article<D-1>
root.selected = -1

# When editting an article, the form needs to be upgraded
updateForm = (data) ->
    photo = data.PhotoURL
    $('#id-edit').val(data.id)
    $('#name-edit').val(data.Name)
    $('#description-edit').val(data.Description)
    $('#transmission-edit').val(data.Transmission)
    $('#photo-edit').val(photo)
    $('#weight-edit').val(data.Weight)
    $('#channel-edit').val(data.Channel)
    $('#price-edit').val(data.Price)
    $('#quantity-edit').val(data.Quantity)
    $('#created-edit').val(data.Created)
    $('#modified-edit').val(data.Modified)
    if data.is_equipment == "1" or data.is_equipment == 1
        $('input[name="is-equipment-edit"]').attr "checked", true
    else
        $('input[name="is-equipment-edit"]').attr "checked", false

    if photo isnt null and photo isnt "" and photo isnt undefined
        $("#show-photo-edit img").attr "src", "sites/funk/files/t-" + photo
        $("#show-photo-edit a").attr "href", "sites/funk/files/" + photo
    else
        $("#show-photo-edit img").attr "src", ""
        $("#show-photo-edit a").attr "href", ""

# Show save text while processing
root.save_info = (spanid) ->
    $(spanid).html "<span class='btn'><span class='glyphicon glyphicon-refresh'></span> Speichere...</span>"

root.save_info_clear = (spanid) ->
    $(spanid).html ""

# OnScreen Notifications
root.growl = (message, type) ->
    $.bootstrapGrowl message,
        ele: "body" # which element to append to
        type: type # (null, 'info', 'error', 'success')
        offset: # 'top', or 'bottom'
            from: "bottom"
            amount: 20
        align: "center" # ('left', 'right', or 'center')
        width: "auto" # (integer, or 'auto')
        delay: 4000
        allow_dismiss: true
        stackup_spacing: 10 # spacing between consecutively stacked growls.
    return


# Post AJAX request and create table
root.getList = ->
    $.ajax
        url: "aux/articles/sql-get-all-articles.php"
        type: "POST"
        data: ""
        dataType: "json"
        success: (response) ->
            createArticleList response
            return


createArticleList = (data) ->
    # Remove existing rows
    $("tbody#list tr").remove()

    # Fill table with article data
    for article in data
        photo = article.PhotoURL

        row = $("<tr class='row-header'>")

        if photo isnt "" && photo isnt undefined && photo isnt null
            row.append "<td class='articlelist'><img class='articlelist' src='sites/funk/files/t-#{photo}'></td>"
        else
            row.append "<td></td>"

        #row.append "<td><strong>#{article.Name}</strong><br>#{article.Description}</td>"
        row.append "<td><strong>#{article.Name}</strong></td>"
        row.append "<td>#{article.Price} €</td>"
        row.append "<td>#{article.Quantity}</td>"
        row.append "<td>
            <a class='edit' onclick='editSelectedArticle(event); return false;'><i class='fa fa-pencil fa-lg'></i><span style='display:none;'>#{article.id}</span></a>
            <a class='remove' onclick='removeArticle(event);'><i class='fa fa-minus-circle fa-lg'></i><span style='display:none;'>#{article.id}</span></a>
            </td>"

        rowData = $("<tr class='row-data'>")
        rowData.append "<td class='active'>&nbsp;</td><td class='active' colspan='4'>#{article.Description}</td>"

        rowData.hide()

        row.click ->
            $(this).nextUntil("tr.row-header").slideToggle 0

        $("tbody#list").append row
        $("tbody#list").append rowData
    return


$ ->
    $("#list > tr.row-header").click ->
        console.log "foo"

    $("#tabs").tabs show:
        effect: "fade"

    # Deactivate Edit function until an article was selected
    $("#tabs").tabs "option", "disabled", [2]

    # Create initial Article list
    root.getList()

    # Listen on tab change
    $("#tabs").on "tabsactivate", (event, ui) ->
        newIndex = ui.newTab.index()

        # if the user selected an article, get it from the db
        if newIndex is 2 and root.selected isnt -1
            $.ajax
                url: "aux/articles/sql-get.php"
                type: "POST"
                data:
                    id: root.selected
                dataType: "json"
                success: (response) ->
                    updateForm response[0]
                    return

        # On Tab 0: Create List of Articles
        if newIndex is 0
            root.getList()

        # On Tab 3: Init Categories
        if newIndex is 3
            root.catsInit()

        # On Tab 4: Init Equipment
        if newIndex is 4
            root.equipInit()

        return
    return
