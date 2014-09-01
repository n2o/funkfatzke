<?php 
$rootPrefix="../";
$formPublicId="";
$pageUrl="artikel/funkgeraete";
$isSecure=false;
$siteUniqId="53ec8db6e654f";
$siteFriendlyId="funk";
$pageUniqId="53f7abaf6c773";
$pageFriendlyId="funkgeraete";
$pageTypeUniqId="53ec8ee686b46";
$language="de";
include '../../../libs/Utilities.php';
include '../libs/SiteAuthUser.php';
include '../site.php';
?><!doctype html>

<html lang="<?php print $language; ?>">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Funkfatzke - Funkgeräte</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="callout" content="">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<link href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src=""></script>
<script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/knockout/knockout-2.2.1.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment-with-langs.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.js"></script>
<script type="text/javascript" src="../js/respond.Map.js?v=2.11.3"></script>
<script type="text/javascript" src="../js/respond.Form.js?v=2.11.3"></script>
<script type="text/javascript" src="../js/respond.Calendar.js?v=2.11.3"></script>
<script type="text/javascript" src="../js/respond.List.js?v=2.11.3"></script>
<script type="text/javascript" src="../js/respond.Featured.js?v=2.11.3"></script>
<script type="text/javascript" src="../js/respond.Login.js?v=2.11.3"></script>
<script type="text/javascript" src="../js/respond.Registration.js?v=2.11.3"></script>
<script type="text/javascript" src="../js/respond.Search.js?v=2.11.3"></script>
<script type="text/javascript" src="../js/pageModel.js?v=2.11.3"></script>
<script type="text/javascript" src="../js/prettify.js"></script>

<!-- css -->
<link href="../css/content.css?v=2.11.3" type="text/css" rel="stylesheet" media="screen">
<link href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css" type="text/css" rel="stylesheet" media="screen">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="../css/prettify.css?v=2.11.3" type="text/css" rel="stylesheet" media="screen">

    
</head>

<body data-siteuniqid="53ec8db6e654f" data-sitefriendlyid="funk" data-domain="n2o.local/funkfatzke/sites/funk" data-pageuniqid="53f7abaf6c773" data-pagefriendlyid="funkgeraete" data-pagetypeuniqid="53ec8ee686b46" data-api="http://n2o.local/funkfatzke" id="funkgeraete">

<section class="settings">
	
	<?php
	if(isset($_SESSION[$siteFriendlyId.'.UserId'])){ ?>
<span class="welcome-message">
	<?php print _("Welcome"); ?> <?php print $_SESSION[$siteFriendlyId.'.FirstName']; ?> <?php print $_SESSION[$siteFriendlyId.'.LastName']; ?>
	<a href="<?php print $rootPrefix; ?>logout"><?php print _("Logout"); ?></a>
</span>
<?php	
	}else{ ?>
<span class="welcome-message">
	<a href="<?php print $rootPrefix; ?>login"><?php print _("Sign in"); ?></a>
</span>		
<?php		
	} ?>


	
	<!--<ul class="respond-select-language">
		<li><?php print _("Language:"); ?></li>
		<li><a data-lang="en-us">English</a></li>
		<li><a data-lang="es-es">Español</a></li>
	</ul>-->

</section>
<!-- /.settings -->

<header role="banner">

	<nav class="navbar navbar-default" role="navigation">
	  
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
        
        <a class="navbar-brand" href="//n2o.local/funkfatzke/sites/funk"><img src="../themes/advanced/resources/images/funk_logo_100px.png"></a>
	  </div>
	  <!-- /.navbar-header -->
	
	  
	  <div class="collapse navbar-collapse navbar-ex1-collapse">
	    <ul class="nav navbar-nav navbar-right nav-pills">
			<li><a href="../index">Home</a></li><li class="active"><a href="../artikel/funkgeraete">Funkgeräte</a></li><li><a href="../kontakt">Kontakt</a></li>
          	<li class="nav-search dropdown"> <!-- .open to show -->
	<form class="respond-search" data-for="resultsmenu">
      <div class="input-group">
        <input type="text" class="form-control">
        <button class="input-group-addon"><i class="fa fa-search"></i></button>
      </div>  
    </form>  
  	<ul class="dropdown-menu">
	  	<li class="searching"><i class="fa fa-spinner fa-spin"></i> <?php print _("Searching..."); ?></li>
	  	<li class="no-results"><?php print _("No results found"); ?></li>
  	</ul>
</li>
          	<li><a class="cart-toggle"><i class="fa fa-shopping-cart"></i> <span class="cart-count">0</span></a></li>
          	<li><a class="settings-toggle"><i class="fa fa-cog"></i></a></li>
	    </ul>
	  </div>
	  <!-- /.navbar-collapse -->
      
	</nav>

	<section id="cart" class="panel panel-default"
	data-paypalid="cmeter-facilitator@googlemail.com"
	data-usesandbox="1"
	data-logo=""
	data-currency="EUR"
	data-weightunit="kgs"
	data-taxrate="0.19000"
	data-shippingcalculation="flat-rate"
	data-shippingrate="4.90"
	data-shippingtiers="">

	<div class="panel-heading"><?php print _("Warenkorb"); ?> <span class="badge" data-bind="text:count"></span></div>

	<div class="cart-items" data-bind="foreach:items">

		<div class="cart-item">
            <div class="cart-group1">
                <span class="cart-add" style="float:left;">
					<button class="btn btn-default" data-bind="click: $parent.removeFromCart">
						<i class="fa fa-minus-circle"></i> <span><?php print _(""); ?></span>
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
			data-email="cmeter@googlemail.com"
			data-bind="click:checkoutWithPayPal"><?php #print _("Angebot anfragen"); ?></button>
	</div> -->

</section> <!-- /#cart -->




</header>
  
<div id="content" class="container" role="main">
    <div id="block-1" class="block row container-white" data-nested="not-nested" data-containerid="" data-containercssclass=""><div class="col col-md-12"><h1 id="h1-1408740273"><?php print _("Funkgeräte"); ?></h1><?php $id="p-1408740281";$type="articlelist";$name="Artikelliste";$render="runtime";$config="true";$var1="";include "../plugins/articlelist/render.php"; ?></div></div>
</div>

<footer role="contentinfo">

  <div class="container">

		<div class="row">

          <div class="col-md-6">

            <h4><?php print _("Funkfatzke"); ?></h4>
            
            <p>
              Straße<br>
              PLZ Berlin
            </p>
            <p>
              Telefon: ...
            </p>
            
            <p class="social">
              <a href="#"><i class="fa fa-google-plus"></i></a>
              <a href="../page/kontakt"><i class="fa fa-envelope-o"></i></a>
            </p>

          </div>
          <!-- /.col-md-4 -->

          <div class="col-md-6">

            <h4><?php print _("Allgemeine Informationen"); ?></h4>

            <p>
              	<li><a href="../index">Home</a></li><li><a href="../kontakt">Kontakt</a></li><li><a href="../ueber-uns">Über uns</a></li><li><a href="../impressum">Impressum</a></li>
            </p>
            
            <p>
            	Diese Seite verwendet Google Analytics
            </p>

          </div>
		  <!-- /.col-md-4 -->

		</div>
		<!-- /.row -->

  	</div>
  	<!-- /.container -->

</footer>

<script type="text/javascript" src="../js/cartModel.js"></script>

<script type="text/javascript" src="../themes/advanced/resources/advanced.js"></script>



</body>

</html>