skuDialog =
  dialog: null
  shelfId: -1
  product: null
  toBeEdited: null
  currency: "EUR" # default for now (will be set at site level)
  init: ->
    skuDialog.dialog = $("#skuDialog")
    $("#add-sku").click ->
      currency = $("#skuDialog").attr("data-currency")
      
      # validate currency
      skuDialog.currency = currency  if currency isnt "" and currency?
      pageUniqId = contentModel.pageUniqId()
      itemId = "shelf-item-" + $(".shelf-item").length
      sku = $("#sku").val()
      desc = $("#sku-desc").val()
      price = $("#sku-price").val()
      shippingType = $("#sku-shippingType").val()
      weight = $("#sku-weight").val()
      unit = $("#sku-unit").val()
      
      # get readable
      priceReadable = price + " " + skuDialog.currency
      priceReadable = "$" + priceReadable  if skuDialog.currency is "USD"
      item = "<div id=\"" + itemId + "\" class=\"shelf-item\">" + respond.defaults.elementMenuShelf + "<div class=\"shelf-group1\">" + "<span class=\"shelf-description\">" + desc + "</span>" + "<span class=\"shelf-sku\">" + sku + "</span>" + "<span class=\"shelf-quantity\"><label for=\"quantity\">Anzahl: </label><input type=\"number\" value=\"1\" class=\"form-control\" size=\"5\"></span>" + "</div>" + "<div class=\"shelf-group2\">" + "<span class=\"shelf-price\" data-currency=\"" + skuDialog.currency + "\" data-price=\"" + price + "\">" + priceReadable + "</span>" + "<span class=\"shelf-shipping\" data-type=\"" + shippingType + "\" data-weight=\"" + weight + "\" data-unit=\"" + unit + "\">" + shippingType + "</span>" + "<span class=\"shelf-duration\"><label for=\"duration\">Tage: </label><input type=\"number\" value=\"1\" class=\"form-control\" size=\"5\"></span>" + "</div>" + "<div class=\"shelf-group3\">" + "<span class=\"shelf-add\"><button class=\"btn btn-default\"><i class=\"fa fa-shopping-cart\"></i> <span>In den Warenkorb</span></button></span>" + "</div></div>"
      $("#" + skuDialog.shelfId).find(".shelf-items").append item
      $("#skuDialog").modal "hide"
      false

    $("#update-sku").click ->
      sku = $("#sku").val()
      desc = $("#sku-desc").val()
      price = $("#sku-price").val()
      shippingType = $("#sku-shippingType").val()
      weight = $("#sku-weight").val()
      unit = $("#sku-unit").val()
      
      # get readable
      priceReadable = price + " " + skuDialog.currency
      priceReadable = "$" + priceReadable  if skuDialog.currency is "USD"
      
      # update
      $(skuDialog.toBeEdited).find(".shelf-sku").text sku
      $(skuDialog.toBeEdited).find(".shelf-description").text desc
      $(skuDialog.toBeEdited).find(".shelf-price").attr "data-price", price
      $(skuDialog.toBeEdited).find(".shelf-price").text priceReadable
      $(skuDialog.toBeEdited).find(".shelf-shipping").text shippingType
      $(skuDialog.toBeEdited).find(".shelf-shipping").attr "data-type", shippingType
      $(skuDialog.toBeEdited).find(".shelf-shipping").attr "data-weight", weight
      $(skuDialog.toBeEdited).find(".shelf-shipping").attr "data-unit", unit
      $("#skuDialog").modal "hide"
      false

    
    # hide/show shipping information
    $("#sku-shippingType").on "change", ->
      shippingType = $("#sku-shippingType").val()
      if shippingType is "shipped"
        $(".shipped").show()
      else
        $(".shipped").hide()
      return

    $("body").on "click", ".config-shelf", ->
      item = $(@parentNode.parentNode)
      skuDialog.toBeEdited = item
      skuDialog.shelfId = $(item).id
      $("#skuDialog h3").text "Update SKU"
      $("#add-sku").hide()
      $("#update-sku").show()
      sku = $(item).find(".shelf-sku").text()
      description = $(item).find(".shelf-description").text()
      price = $(item).find(".shelf-price").attr("data-price")
      shippingType = $(item).find(".shelf-shipping").attr("data-type")
      weight = $(item).find(".shelf-shipping").attr("data-weight")
      unit = $(item).find(".shelf-shipping").attr("data-unit")
      
      # set shipping
      if shippingType is "shipped"
        $(".shipped").show()
      else
        $(".shipped").hide()
      
      # populate fields
      $("#sku").val sku
      $("#sku-desc").val description
      $("#sku-price").val price
      $("#sku-shippingType").val shippingType
      $("#sku-weight").val weight
      $("#sku-unit").val unit
      $("#skuDialog").modal "show"
      return

    return

  show: (shelfId) -> # shows the dialog
    skuDialog.shelfId = shelfId
    skuDialog.product = null
    $("#skuDialog h3").text "Add SKU"
    $("#add-sku").show()
    $("#update-sku").hide()
    $("#sku-show-ship").show()
    $("#sku").val ""
    $("#sku-desc").val ""
    $("#sku-price").val ""
    $("#sku-shippingType").val "Nicht versendet"
    $("#sku-shippingWeight").val ""
    $("#sku-shippingUnit").val "kgs"
    $(".shipped").hide()
    $("#skuDialog").modal "show"
    return

$(document).ready ->
  skuDialog.init()
  return

