$ ->
    # Define the dialog
    $("#dialog-message-edit").dialog
        height: 600
        width: 800
        autoOpen: false
        resizable: true
        modal: true

    $("#button-edit").click ->
        # Get values from form
        name = $("#name-edit").val()
        description = $("#description-edit").val()
        transmission = $("#transmission-edit").val()
        category = $("#category-edit").val()
        subcategory = $("#subcategory-edit").val()
        photo = $("#photo-edit").val()
        weight = $("#weight-edit").val()
        channel = $("#channel-edit").val()
        price = $("#price-edit").val()
        price = price.replace(/,/g, ".")
        quantity = $("#quantity-edit").val()
        
        if name is "" or description is ""
            $("#info-edit").attr "class", "alert alert-danger"
            $("#info-edit").html "Bitte alle benötigten Felder ausfüllen."
        else
            # Pass it to the database
            $.ajax
                type: "post"
                url: "aux/articles/update.php"
                data: "name=" + name + "&description=" + description + "&transmission=" + transmission + "&category=" + category + "&subcategory=" + subcategory + "&photo=" + photo + "&weight=" + weight + "&channel=" + channel + "&price=" + price + "&quantity=" + quantity

            $("#myForm-edit").trigger "reset"
            $("#info-edit").attr "class", "alert alert-success"
            $("#info-edit").html "Artikel erfolgreich hinzugefügt."
        return

    # Initial picture if image is available
    photoUrl = $("#photo-edit").val()
    if photoUrl
        $("#show-photo-edit img").attr "src", "sites/funk/files/t-" + photoUrl
        $("#show-photo-edit a").attr "href", "sites/funk/files/" + photoUrl

    # Listener to open dialog on button click    
    $("#open-dialog-edit").click ->
        $("#dialog-message-edit").dialog "open"
        false
    return

return

