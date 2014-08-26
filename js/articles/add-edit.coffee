$(document).ready ->
    
    # Get values from form
    
    # Pass it to the database
    
    # Initial picture if image is available
    
    # Listener to open dialog on button click    
    
    # Define the dialog
    
    # What to do if an item from the dialog was clicked
    $("#button").click ->
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
            $.ajax
                type: "post"
                url: "aux/articles/todb.php"
                data: "name=" + name + "&description=" + description + "&transmission=" + transmission + "&category=" + category + "&subcategory=" + subcategory + "&photo=" + photo + "&weight=" + weight + "&channel=" + channel + "&price=" + price + "&quantity=" + quantity

            $("form").trigger "reset"
            $("#info").attr "class", "alert alert-success"
            $("#info").html "Artikel erfolgreich hinzugefügt."
        return

    photoUrl = $("#photo").val()
    if photoUrl
        $("#show-photo img").attr "src", "sites/funk/files/t-" + photoUrl
        $("#show-photo a").attr "href", "sites/funk/files/" + photoUrl
    $("#open-dialog").click ->
        $("#dialog-message").dialog "open"
        false

    $("#dialog-message").dialog
        height: 600
        width: 800
        autoOpen: false
        resizable: true
        modal: true

    return

#$(document).ready(function() {
#    $("#button").click(function() {
#        // Get values from form
#        var name = $("#name").val();
#        var description = $("#description").val();
#        var transmission = $("#transmission").val();
#        var category = $("#category").val();
#        var subcategory = $("#subcategory").val();
#        var photo = $("#photo").val();
#        var weight = $("#weight").val();
#        var channel = $("#channel").val();
#        var price = $("#price").val();
#        price = price.replace(/,/g, '.');
#        var quantity = $("#quantity").val();
#
#        if (name == "" || description == "") {
#            $('#info').attr('class', 'alert alert-danger');
#            $('#info').html("Bitte alle benötigten Felder ausfüllen.");
#        } else {
#            // Pass it to the database
#            $.ajax({
#                type: "post",
#                url: "aux/articles/todb.php",
#                data: "name=" + name + "&description=" + description + "&transmission=" + transmission + "&category=" + category + "&subcategory=" + subcategory + "&photo=" + photo + "&weight=" + weight + "&channel=" + channel + "&price=" + price + "&quantity=" + quantity,
#            });
#            $('form').trigger('reset');
#            $('#info').attr('class', 'alert alert-success');
#            $('#info').html("Artikel erfolgreich hinzugefügt.");
#        }
#    });
#
#    // Initial picture if image is available
#    var photoUrl = $('#photo').val();
#
#    if (photoUrl) {
#        $('#show-photo img').attr('src', 'sites/funk/files/t-' + photoUrl);
#        $('#show-photo a').attr('href', 'sites/funk/files/' + photoUrl);
#    };
#
#    // Listener to open dialog on button click    
#    $('#open-dialog').click(function() {
#        $('#dialog-message').dialog('open');
#        return false;
#    });
#
#    // Define the dialog
#    $("#dialog-message").dialog({
#        height: 600,
#        width: 800,
#        autoOpen: false,
#        resizable: true,
#        modal: true,
#    });
#    // What to do if an item from the dialog was clicked
#    function dialogClickEvent(event) {
#        var clicked = event.target.innerHTML;
#        $('#photo').val(clicked);
#        $('#dialog-message').dialog('close');
#        $('#show-photo img').attr('src', 'sites/funk/files/t-' + clicked);
#        $('#show-photo a').attr('href', 'sites/funk/files/' + clicked);
#    }
#});

