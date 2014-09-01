$ ->
    $("#show-after-post").hide()

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

        if not error
            $.ajax
                type: "post"
                url: "../../../plugins/inquiry/deploy/sendmail.php"

                data: "company=" + company + "&title=" + title + "&firstname=" + firstname + "&lastname=" + lastname + "&street=" + street + "&zip=" + zip + "&city=" + city + "&phone=" + phone + "&email=" + email + "&comment=" + comment + "&localStorage=" + storage
                success: (data) ->
                    $("#myForm").hide()
                    $("#hide-after-post").hide()
                    $("#show-after-post").show()
                    localStorage.removeItem "respond-cart"
                    return

        error = false
        #$("form").trigger "reset"
        return

    return
