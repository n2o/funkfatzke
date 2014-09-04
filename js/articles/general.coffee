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

    if photo isnt null and photo isnt "" and photo isnt undefined
        $("#show-photo-edit img").attr "src", "sites/funk/files/t-" + photo
        $("#show-photo-edit a").attr "href", "sites/funk/files/" + photo
    else
        $("#show-photo-edit img").attr "src", ""
        $("#show-photo-edit a").attr "href", ""


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

        row = $("<tr>")
        $("tbody#list").append row

        if photo isnt "" && photo isnt undefined && photo isnt null
            row.append "<td class='articlelist'><img class='articlelist' src='sites/funk/files/t-#{photo}'></td>"
        else
            row.append "<td></td>"

        row.append "<td><strong>#{article.Name}</strong><br>#{article.Description}</td>"
        row.append "<td>#{article.Price} €</td>"
        row.append "<td>#{article.Quantity}</td>"
        row.append "<td>
            <a class='edit' onclick='editSelectedArticle(event); return false;'><i class='fa fa-pencil fa-lg'></i><span style='display:none;'>#{article.id}</span></a>
            <a class='remove' onclick='removeArticle(event);'><i class='fa fa-minus-circle fa-lg'></i><span style='display:none;'>#{article.id}</span></a>
            </td>"
    return


$ ->
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

        # Create List of Articles
        if newIndex is 0
            root.getList()

        return
    return
