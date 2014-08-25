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
        return

    $("#slider-range-max").slider
        range: "max"
        min: 1
        max: 30
        value: 1
        slide: (event, ui) -> # on change do:
            if ui.value is 1
                $("#amount").val ui.value + " Tag"
            else
                $("#amount").val ui.value + " Tage"

            $(".shelf-price").each (index) ->
                price = discountValues[index][ui.value - 1]
                $(this).html price + " €"
                $(this).attr "data-price", price
                return

            $(".shelf-duration").each (index) ->
                $(this).find("input").val(ui.value)

            return

    $("#amount").val $("#slider-range-max").slider("value") + " Tag" # write initial value
    return

