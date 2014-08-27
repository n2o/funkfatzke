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
    $('#category-edit').val(data.Category)
    $('#subcategory-edit').val(data.Subcategory)
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

$ ->
    $("#tabs").tabs show:
        effect: "fade"
        
    # Deactivate Edit function until an article was selected
    $("#tabs").tabs "option", "disabled", [2]

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
        return
    return
