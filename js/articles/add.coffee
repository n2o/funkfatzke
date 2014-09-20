root = exports ? this

$ ->
    # Define the dialog
    $("#dialog-message").dialog
        height: 600
        width: 800
        autoOpen: false
        resizable: true
        modal: true

    $("#button").click ->
        # Get values from form
        name = $("#name").val()
        description = $("#description").val()
        photo = $("#photo").val()
        weight = $("#weight").val()
        price = $("#price").val()
        price = price.replace(/,/g, ".")
        quantity = $("#quantity").val()
        if $("#is-equipment").is ":checked"
            is_equipment = 1
        else
            is_equipment = 0

        if name is "" or description is ""
            root.growl "Bitte alle erforderlichen Felder ausfüllen.", "info"
        else
            $("#button").html "<span class='btn'><span class='glyphicon glyphicon-refresh'></span> Anfrage wird bearbeitet...</span>"
            # Pass it to the database
            $.ajax
                type: "post"
                url: "aux/articles/todb.php"
                data: "name=" + name + "&description=" + description + "&photo=" + photo + "&weight=" + weight + "&price=" + price + "&quantity=" + quantity + "&is_equipment=" + is_equipment
                success: ->
                    $("form").trigger "reset"
                    root.growl "Artikel erfolgreich hinzugefügt.", "success"
                    root.getList()
                    $("#button").html "Artikel hinzufügen"
                error: ->
                    $("#button").html "Artikel hinzufügen"

    # Initial picture if image is available
    photoUrl = $("#photo").val()
    if photoUrl
        $("#show-photo img").attr "src", "sites/funk/files/t-" + photoUrl
        $("#show-photo a").attr "href", "sites/funk/files/" + photoUrl

    # Listener to open dialog on button click
    $("#open-dialog").click ->
        $("#dialog-message").dialog "open"
        false
