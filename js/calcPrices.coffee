$ ->
    discount = 5 # give x % discount on values

    # Initial calc prices of articles
    discountValues = new Array()
    $(".shelf-price").each (index) ->
        current = parseFloat($(this).text().slice(0, -2)).toFixed(2)
        $(this).html current + " €"

        discountValues[index] = new Array()
        discountValues[index][0] = current
        temp = 0
        i = 1

        while i < 30
            discount = discount / 1.5 if i is 5
            temp = discountValues[index][i - 1] * (1 - discount / 100)
            discountValues[index][i] = temp.toFixed(2)
            i++

    updatePrice = (duration) ->
        $(".shelf-price").each (index) ->
            price = discountValues[index][duration - 1]
            $(this).html price + " €"
            $(this).attr "data-price", price

        $(".shelf-duration").each (index) ->
            $(this).find("input").val(duration)


    # Get duration from localstorage
    if not localStorage.duration
        storageDuration = 1
    else
        storageDuration = localStorage.duration

    if storageDuration > 1
        $(".amount").val storageDuration + " Tage"
    else
        $(".amount").val storageDuration + " Tag"

    # Update prices
    updatePrice storageDuration

    $(".slider").each ->
        $(this).slider
            range: "max"
            width: 200
            min: 1
            max: 30
            value: storageDuration
            slide: (event, ui) -> # on change do:
                if ui.value is 1
                    $(".amount").val ui.value + " Tag"
                else
                    $(".amount").val ui.value + " Tage"

                # Write to localstorage
                localStorage.setItem "duration", ui.value

                updatePrice ui.value

                $(".slider").each ->
                    $(this).slider "option", "value", ui.value
