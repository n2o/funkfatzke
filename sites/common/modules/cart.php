<section id="cart" class="panel panel-default"
	data-paypalid="{{payPalId}}"
	data-usesandbox="{{payPalUseSandbox}}"
	data-logo="{{payPalLogoUrl}}"
	data-currency="{{currency}}"
	data-weightunit="{{weightUnit}}"
	data-taxrate="{{taxRate}}"
	data-shippingcalculation="{{shippingCalculation}}"
	data-shippingrate="{{shippingRate}}"
	data-shippingtiers="{{shippingTiers}}">

	<div class="panel-heading"><?php print _("Warenkorb"); ?> <span class="badge" data-bind="text:count"></span></div>

	<div class="cart-items" data-bind="foreach:items">

		<div class="cart-item">
            <div class="cart-group1">
                <span class="cart-add" style="float:left;">
					<button class="btn btn-default" data-bind="click: $parent.removeFromCart">
						<i class="fa fa-minus-circle"></i></span>
					</button>
				</span>
                <span class="cart-sku" data-bind="text:sku"></span>
				<span class="cart-description" data-bind="text:description"></span>
   			</div><div class="cart-group2">
				<span class="cart-price" data-bind="text:priceFriendly, attr:{'data-price':price}"></span>
				<span class="cart-shipping" data-bind="attr:{'data-type':shippingType}, visible: shippingType()=='shipped'">
					<i class="fa fa-truck"></i> <?php print _("Versand"); ?>
				</span>
			</div><div class="cart-group3">
				<span class="cart-quantity"><label for="quantity">Anzahl: &nbsp;</label><input type="number" class="form-control" data-bind="value: quantity, event:{change: $parent.updateQuantity}"></span>
				<span class="cart-duration"><label for="duration">Tage: &nbsp;</label><input type="number" class="form-control" data-bind="value: duration" style="border:0;background:0;" readonly></span>
            </div><div class="cart-group4">
				<span class="cart-subtotal" data-bind="text:totalFriendly"></span>
			</div>
		</div> <!-- /.cart-item -->

	</div> <!-- /.cart-items -->

	<div class="subtotal">
		<label><?php print _("Zwischensumme:"); ?></label>
		<strong data-bind="text:subtotalFriendly"></strong>
	</div>

	<div class="weight" data-bind="visible: totalWeight() > 0">
		<label><?php print _("Gesamtgewicht:"); ?></label>
		<strong data-bind="text:totalWeightFriendly"></strong>
	</div>

	<div class="shipping" data-bind="visible: shipping() > 0">
		<label><?php print _("Versandkosten:"); ?></label>
		<strong data-bind="text:shippingFriendly"></strong>
	</div>

	<div class="tax" data-bind="visible: tax() > 0">
		<label><?php print _("MwSt.:"); ?></label>
		<strong data-bind="text:taxFriendly"></strong>
	</div>

	<div class="total">
		<label><?php print _("Gesamtsumme inkl. MwSt.:"); ?></label>
		<strong data-bind="text:totalFriendly"></strong>
	</div>

	<div class="checkout">
		<a href="anfragen"><button class="btn btn-default"><?php print _("Angebot anfragen"); ?></button></a>
	</div>
	<!-- <div class="checkout">
		<button
			class="btn btn-default"
			data-email="{{email}}"
			data-bind="click:checkoutWithPayPal"><?php #print _("Angebot anfragen"); ?></button>
	</div> -->

</section> <!-- /#cart -->


