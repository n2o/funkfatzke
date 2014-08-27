root = exports ? this
root.selected = -1

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
    
    if photo isnt null and photo isnt ""
        $("#show-photo-edit img").attr "src", "sites/funk/files/t-" + photo
        $("#show-photo-edit a").attr "href", "sites/funk/files/" + photo

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
