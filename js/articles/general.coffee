root = exports ? this
root.selected = -1

updateForm = (data) ->
    $('#id-edit').val(data.id)
    $('#name-edit').val(data.Name)
    $('#description-edit').val(data.Description)
    $('#transmission-edit').val(data.Transmission)
    $('#category-edit').val(data.Category)
    $('#subcategory-edit').val(data.Subcategory)
    $('#photo-edit').val(data.PhotoURL)
    $('#weight-edit').val(data.Weight)
    $('#channel-edit').val(data.Channel)
    $('#price-edit').val(data.Price)
    $('#quantity-edit').val(data.Quantity)
    $('#created-edit').val(data.Created)
    $('#modified-edit').val(data.Modified)
    console.log data.PhotoURL
    if data.PhotoURL isnt null
        $("#show-photo-edit img").attr "src", "sites/funk/files/t-" + data.PhotoURL
        $("#show-photo-edit a").attr "href", "sites/funk/files/" + data.PhotoURL

$ ->
    $("#tabs").tabs show:
        effect: "fade"

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
