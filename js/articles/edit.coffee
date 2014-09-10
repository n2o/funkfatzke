root = exports ? this

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
        id = $("#id-edit").val()
        name = $("#name-edit").val()
        description = $("#description-edit").val()
        photo = $("#photo-edit").val()
        weight = $("#weight").val()
        price = $("#price-edit").val()
        price = price.replace(/,/g, ".")
        quantity = $("#quantity-edit").val()
        if $("#is-equipment-edit").is ":checked"
            is_equipment = 1
        else
            is_equipment = 0

        if name is "" or description is ""
            root.growl "Bitte alle erforderlichen Felder ausfüllen.", "info"
        else
            # Pass it to the database
            $.ajax
                type: "post"
                url: "aux/articles/sql-update.php"
                data: "id=" + id + "&name=" + name + "&description=" + description + "&photo=" + photo + "&weight=" + weight + "&price=" + price + "&quantity=" + quantity + "&is_equipment=" + is_equipment
                success: ->
                    root.growl "Artikel erfolgreich bearbeitet.", "success"
                    root.getList()
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

