$ ->
    $("#loading").hide()

    $("#button").click ->
        error = false

        # Get values from form
        company = $("#company").val()
        title = $("input[name=title]:checked").val()
        firstname = $("#firstname").val()
        lastname = $("#lastname").val()
        street = $("#street").val()
        zip = $("#zip").val()
        city = $("#city").val()
        phone = $("#phone").val()
        email = $("#email").val()
        comment = $("#comment").val()
        storage = JSON.stringify(localStorage)

        # Define required fields
        if title        is undefined then $("#div-title").addClass "has-error"  else $("#div-title").removeClass "has-error"
        if firstname    is "" then $("#div-firstname").addClass "has-error"     else $("#div-firstname").removeClass "has-error"
        if lastname     is "" then $("#div-lastname").addClass "has-error"      else $("#div-lastname").removeClass "has-error"
        if street       is "" then $("#div-street").addClass "has-error"        else $("#div-street").removeClass "has-error"
        if zip          is "" or city is "" then $("#div-zip").addClass "has-error" else $("#div-zip").removeClass "has-error"
        if phone        is "" then $("#div-phone").addClass "has-error"         else $("#div-phone").removeClass "has-error"
        if email        is "" then $("#div-email").addClass "has-error"         else $("#div-email").removeClass "has-error"

        if title is undefined or firstname is "" or lastname is "" or street is "" or zip is "" or phone is "" or email is ""
            error = true
            $("#info").html("<div class='alert alert-warning' role='alert'>Bitte füllen Sie alle notwendigen Felder aus.</div>")

        if not error
            $("#myForm").hide()
            $("#anfragen-paragraph-1").hide()
            $("#info").html("")
            $("#loading").show()
            $.ajax
                type: "post"
                url: "../../../plugins/inquiry/deploy/sendmail.php"
                data: "company=" + company + "&title=" + title + "&firstname=" + firstname + "&lastname=" + lastname + "&street=" + street + "&zip=" + zip + "&city=" + city + "&phone=" + phone + "&email=" + email + "&comment=" + comment + "&localStorage=" + storage
                success: (data) ->
                    $("#loading").hide()
                    $("#info").html("<div class='alert alert-success' role='alert'>Ihre Anfrage wurde erfolgreich verschickt! Wir werden uns schnellstmöglich bei Ihnen melden.</div>")
                    localStorage.removeItem "respond-cart"
                    return
                error: ->
                    $("#loading").hide()
                    $("#info").html("<div class='alert alert-warning' role='alert'>Es ist ein Fehler aufgetreten. Bitte versuchen Sie es später noch einmal oder kontaktieren Sie uns telefonisch.</div>")
                    return

        error = false
        #$("form").trigger "reset"
        return

    return
