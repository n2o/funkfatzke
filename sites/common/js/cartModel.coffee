# models a cart item
CartItem = (description, sku, price, shippingType, weight, quantity, duration) ->
    self = this
    self.description = ko.observable(description)
    self.sku = ko.observable(sku)
    self.price = ko.observable(price)
    self.shippingType = ko.observable(shippingType)
    self.weight = ko.observable(weight)
    self.quantity = ko.observable(quantity)
    self.duration = ko.observable(duration)
    self.priceFriendly = ko.computed(->
        p = self.price() + " " + cartModel.currency
        p = "$" + p    if cartModel.currency is "USD"
        p
    )
    
    # total weight for line item
    self.totalWeight = ko.computed(->
        weight = parseFloat(self.weight()) * parseInt(self.quantity())
        Number weight
    )
    
    # total price for line item
    self.total = ko.computed(->
        total = parseFloat(self.price()) * parseInt(self.quantity()) * parseInt(self.duration())
        Number total
    )
    
    # total price for line item (formatted)
    self.totalFriendly = ko.computed(->
        total = parseFloat(self.price()) * parseInt(self.quantity()) * parseInt(self.duration())
        p = Number(total).toFixed(2) + " " + cartModel.currency
        p = "$" + p    if cartModel.currency is "USD"
        p
    )
    return


# models the cart
cartModel =
    payPalId: ""
    logo: ""
    useSandbox: false
    currency: "EUR"
    weightUnit: "kg"
    taxRate: 0
    returnUrl: "return"
    calculation: "free"
    flatRate: 0
    tiers: []
    items: ko.observableArray([])
    init: ->
        payPalId = $("#cart").attr("data-paypalid")
        logo = $("#cart").attr("data-logo")
        useSandbox = $("#cart").attr("data-usesandbox")
        currency = $("#cart").attr("data-currency")
        weightUnit = $("#cart").attr("data-weightunit")
        calculation = $("#cart").attr("data-shippingcalculation")
        flatRate = Number($("#cart").attr("data-shippingrate"))
        tiers = $("#cart").attr("data-shippingtiers")
        taxRate = $("#cart").attr("data-taxrate")
        
        # validate payPalId
        cartModel.payPalId = payPalId    if payPalId isnt "" and payPalId?
        
        # validate logo
        cartModel.logo = logo    if logo isnt "" and logo?
        
        # set use sandbox
        cartModel.useSandbox = true    if useSandbox is "1"
        
        # validate currency
        cartModel.currency = currency    if currency isnt "" and currency?
        
        # validate weightUnit
        cartModel.weightUnit = weightUnit    if weightUnit isnt "" and weightUnit?
        
        # validate calculation
        cartModel.calculation = calculation    if calculation isnt "" and calculation?
        
        # validate flatrate
        cartModel.flatRate = flatRate    if not isNaN(flatRate) and flatRate?
        
        # validate and parse tiers
        cartModel.tiers = JSON.parse(decodeURI(tiers))    if cartModel.tiers isnt "" and cartModel.tiers?
        
        # validate and parse taxrate
        if not isNaN(taxRate) and taxRate?
            taxRate = Number(taxRate.replace(/[^0-9\.]+/g, ""))
            cartModel.taxRate = taxRate
        
        # set return url
        url = "http://" + $("body").attr("data-domain") + "/"
        cartModel.returnUrl = url
        
        # setup events used by the cart
        cartModel.setupEvents()
        
        # grab cart from localStorage
        cartModel.updateCart()
        console.log $("#cart").get(0)
        
        # apply bindings
        ko.applyBindings cartModel, $("#cart").get(0)
        return

    
    # setup events
    setupEvents: ->
        
        # toggles the cart
        $(".cart-toggle").on "click", ->
            $("#cart").toggleClass "active"
            $("body").toggleClass "show-cart"
            return

        
        # handle add to cart
        $(".shelf-add button").on "click", ->
            shelfItem = $(this).parents(".shelf-item")
            description = $(shelfItem).find(".shelf-description").text()
            sku = $(shelfItem).find(".shelf-sku").text()
            
            # get price
            price = Number($(shelfItem).find(".shelf-price").attr("data-price"))
            
            # handle error
            throw ("cartModel.js: pricing error")    if isNaN(price)
            type = $(shelfItem).find(".shelf-shipping").attr("data-type")
            
            # get weight
            weight = Number($(shelfItem).find(".shelf-shipping").attr("data-weight"))
            
            # handle error (set default weight to 0)
            weight = 0    if isNaN(weight)
            
            # get quantity
            quantity = Number($(shelfItem).find(".shelf-quantity input").val())
            
            # get duration
            duration = Number($(shelfItem).find(".shelf-duration input").val())
            
            # handle error (set default quantity and duration to 1)
            quantity = 1    if isNaN(quantity)
            duration = 1    if isNaN(duration)
            
            # create new cart item
            item = new CartItem(description, sku, price, type, weight, quantity, duration)
            
            # check for match
            match = false
            match = ko.utils.arrayFirst(cartModel.items(), (curr) ->
                if curr.sku().toUpperCase() is item.sku().toUpperCase()
                    
                    # get new quantity 
                    q = parseInt(curr.quantity()) + parseInt(quantity)
                    
                    # update quantity 
                    curr.quantity q
                    true
            )
            
            # if match is not found, push item to the cart, or else +1 to quantity of existing item
            cartModel.items.push item    unless match
            
            # update external references and save the cart
            cartModel.updateExternal()
            cartModel.saveCart()
            return

        return

    
    # updates cart from local storage
    updateCart: ->
        
        # check for hash to clear cart
        localStorage.removeItem "respond-cart"    if location.hash is "#clear-cart"
        
        # get cart from local storage
        if localStorage["respond-cart"]
            str = localStorage["respond-cart"]
            storedItems = eval(str)
            x = 0
            while x < storedItems.length
                console.log storedItems[x]
                description = storedItems[x].description
                sku = storedItems[x].sku
                price = Number(storedItems[x].price)
                type = storedItems[x].shippingType
                weight = Number(storedItems[x].weight)
                quantity = Number(storedItems[x].quantity)
                duration = Number(storedItems[x].duration)
                
                # create new cart item
                item = new CartItem(description, sku, price, type, weight, quantity, duration)
                
                # push item to model
                cartModel.items.push item
                x++
        
        # update external elements
        cartModel.updateExternal()
        return

    
    # save cart
    saveCart: ->
        json = ko.toJSON(cartModel.items())
        localStorage["respond-cart"] = json
        return

    
    # updates external references to the cart
    updateExternal: ->
        $(".cart-count").text cartModel.count()
        $(".cart-total").text cartModel.subtotalFriendly()
        return

    
    # updates the cart quantity
    updateQuantity: (o, e) ->
        q = parseInt($(e.target).val())
        if q <= 0
            cartModel.items.remove o
        else
            o.quantity q
        
        # update external references and save the cart
        cartModel.updateExternal()
        cartModel.saveCart()
        return

    
    # Update duration in cart
    updateDuration: (o, e) ->
        q = parseInt($(e.target).val())
        if q <= 0
            cartModel.items.remove o
        else
            o.duration q
        
        # update external references and save the cart
        cartModel.updateExternal()
        cartModel.saveCart()
        return

    
    # removes an item from a cart
    removeFromCart: (o, e) ->
        cartModel.items.remove o
        
        # update external references and save the cart
        cartModel.updateExternal()
        cartModel.saveCart()
        return

    
    # checkout using PayPal
    checkoutWithPayPal: (o, e) ->
        email = cartModel.payPalId
        
        # data setup
        # #ref tutorial: https://developer.paypal.com/webapps/developer/docs/classic/paypal-payments-standard/integration-guide/cart_upload/
        # #ref: form: https://developer.paypal.com/webapps/developer/docs/classic/paypal-payments-standard/integration-guide/Appx_websitestandard_htmlvariables/#id08A6HF00TZS
        # #ref: notify: https://developer.paypal.com/docs/classic/ipn/integration-guide/IPNIntro/
        data =
            email: email
            cmd: "_cart"
            upload: "1"
            currency_code: cartModel.currency
            business: email
            rm: "0"
            charset: "utf-8"
            return: cartModel.returnUrl + "thank-you#clear-cart"
            cancel_return: cartModel.returnUrl + "cancel"
            notify_url: cartModel.returnUrl + "api/transaction/paypal"
            custom: $("body").attr("data-siteuniqid")

        noshipping = 1
        
        # set logo
        data["image_url"] = cartModel.logo    unless cartModel.logo is ""
        
        # add cart items
        x = 0
        while x < cartModel.items().length
            c = x + 1
            item = cartModel.items()[x]
            data["item_name_" + c] = item.description()
            data["quantity_" + c] = item.quantity()
            data["duration_" + c] = item.duration()
            data["amount_" + c] = item.price().toFixed(2)
            data["item_number_" + c] = item.sku() + "-" + item.shippingType().toUpperCase()
            noshipping = 2    if item.shippingType() is "shipped"
            x++
        data["no_shipping"] = noshipping # 1 = do not prompt, 2 = prompt for address and require it
        data["weight_unit"] = cartModel.weightUnit
        data["handling_cart"] = cartModel.shipping().toFixed(2)
        data["tax_cart"] = cartModel.tax().toFixed(2)
        
        # live url
        url = "https://www.paypal.com/cgi-bin/webscr"
        
        # set to sandbox if specified
        url = "https://www.sandbox.paypal.com/cgi-bin/webscr"    if cartModel.useSandbox
        
        # create form with data values
        form = $("<form id=\"paypal-form\" action=\"" + url + "\" method=\"POST\"></form")
        for x of data
            form.append "<input type=\"hidden\" name=\"" + x + "\" value=\"" + data[x] + "\" />"
        
        # append form
        $("body").append form
        
        # submit form
        $("#paypal-form").submit()
        return


# total count calculation
cartModel.count = ko.computed(->
    count = 0
    ko.utils.arrayForEach @items(), (item) ->
        count += item.quantity()
        return

    count
, cartModel)

# total count of shipped items
cartModel.countShipped = ko.computed(->
    count = 0
    ko.utils.arrayForEach @items(), (item) ->
        count += item.quantity()    if item.shippingType() is "shipped"
        return

    count
, cartModel)

# subtotal calculation (line item total)
cartModel.subtotal = ko.computed(->
    total = 0
    ko.utils.arrayForEach @items(), (item) ->
        total += item.total()
        return

    total
, cartModel)

# subtotal calculation for shipped items (line item total)
cartModel.subtotalShipped = ko.computed(->
    total = 0
    ko.utils.arrayForEach @items(), (item) ->
        total += item.total()    if item.shippingType() is "shipped"
        return

    total
, cartModel)

# subtotal display
cartModel.subtotalFriendly = ko.computed(->
    p = cartModel.subtotal().toFixed(2) + " " + cartModel.currency
    p = "$" + p    if cartModel.currency is "USD"
    p
, cartModel)

# tax calculation (subtotal * rate)
cartModel.tax = ko.computed(->
    cartModel.subtotal() * cartModel.taxRate
, cartModel)

# tax display
cartModel.taxFriendly = ko.computed(->
    p = cartModel.tax().toFixed(2) + " " + cartModel.currency
    p = "$" + p    if cartModel.currency is "USD"
    p = "(" + cartModel.taxRate + "%) " + p
    p
, cartModel)

# total weight calculation
cartModel.totalWeight = ko.computed(->
    total = 0
    ko.utils.arrayForEach @items(), (item) ->
        total += item.totalWeight()    if item.shippingType() is "shipped"
        return

    total
, cartModel)

# total weight display
cartModel.totalWeightFriendly = ko.computed(->
    cartModel.totalWeight() + " " + @weightUnit
, cartModel)

# shipping calculation (based on settings)
cartModel.shipping = ko.computed(->
    stop = 0
    
    # get totals (this also makes sure the model is up-to-date)
    subtotal = cartModel.subtotalShipped()
    totalWeight = cartModel.totalWeight()
    
    # get params
    calculation = cartModel.calculation
    flatRate = cartModel.flatRate
    tiers = cartModel.tiers
    if calculation is "free"
        return 0
    else if calculation is "flat-rate"
        if cartModel.countShipped() > 0
            return flatRate
        else
            return 0
    else if calculation is "amount"
        stop = subtotal
    else if calculation is "weight"
        stop = totalWeight
    else
        return 0
    
    # walk through tiers
    x = 0
    while x < tiers.length
        from = tiers[x].from
        to = tiers[x].to
        
        # determine if rate falls between to and from
        if stop > from and stop <= to
            rate = Number(tiers[x].rate)
            console.log "rate=" + rate
            
            # return rate
            return rate    unless isNaN(rate)
        x++
    
    # easy default
    0
, cartModel)

# shipping display
cartModel.shippingFriendly = ko.computed(->
    p = cartModel.shipping().toFixed(2) + " " + @currency
    p = "$" + p    if @currency is "USD"
    p
, cartModel)

# total calculation (subtotal + shipping + tax)
cartModel.total = ko.computed(->
    total = cartModel.subtotal() + cartModel.shipping() + cartModel.tax()
    total
, cartModel)

# total display
cartModel.totalFriendly = ko.computed(->
    p = cartModel.total().toFixed(2) + " " + @currency
    p = "$" + p    if @currency is "USD"
    p
, cartModel)

# init model
$(document).ready ->
    cartModel.init()
    return

