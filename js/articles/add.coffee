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
        transmission = $("#transmission").val()
        category = $("#category").val()
        subcategory = $("#subcategory").val()
        photo = $("#photo").val()
        weight = $("#weight").val()
        channel = $("#channel").val()
        price = $("#price").val()
        price = price.replace(/,/g, ".")
        quantity = $("#quantity").val()
        
        if name is "" or description is ""
            $("#info").attr "class", "alert alert-danger"
            $("#info").html "Bitte alle benötigten Felder ausfüllen."
        else
            # Pass it to the database
            $.ajax
                type: "post"
                url: "aux/articles/todb.php"
                data: "name=" + name + "&description=" + description + "&transmission=" + transmission + "&category=" + category + "&subcategory=" + subcategory + "&photo=" + photo + "&weight=" + weight + "&channel=" + channel + "&price=" + price + "&quantity=" + quantity

            $("form").trigger "reset"
            $("#info").attr "class", "alert alert-success"
            $("#info").html "Artikel erfolgreich hinzugefügt."
        return

    # Initial picture if image is available
    photoUrl = $("#photo").val()
    if photoUrl
        $("#show-photo img").attr "src", "sites/funk/files/t-" + photoUrl
        $("#show-photo a").attr "href", "sites/funk/files/" + photoUrl

    # Listener to open dialog on button click    
    $("#open-dialog").click ->
        $("#dialog-message").dialog "open"
        false
        return

    return