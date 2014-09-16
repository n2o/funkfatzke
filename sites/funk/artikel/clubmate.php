<?php 
$rootPrefix="../";
$formPublicId="";
$pageUrl="artikel/clubmate";
$isSecure=false;
$siteUniqId="53ec8db6e654f";
$siteFriendlyId="funk";
$pageUniqId="53fb70bdf293b";
$pageFriendlyId="clubmate";
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
<title>Funkfatzke - Clubmate</title>
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

<body data-siteuniqid="53ec8db6e654f" data-sitefriendlyid="funk" data-domain="n2o.local/funkfatzke/sites/funk" data-pageuniqid="53fb70bdf293b" data-pagefriendlyid="clubmate" data-pagetypeuniqid="53ec8ee686b46" data-api="https://christian-meter.de/funkfatzke" id="clubmate">

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
			<li><a href="../index">Home</a></li><li><a href="../artikel/funkgeraete">Funkgeräte</a></li><li><a href="../artikel/handfunkgeraete">Handfunkgeräte</a></li><li><a href="../kontakt">Kontakt</a></li>
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
			data-email="cmeter@googlemail.com"
			data-bind="click:checkoutWithPayPal"><?php #print _("Angebot anfragen"); ?></button>
	</div> -->

</section> <!-- /#cart -->




</header>
  
<div id="content" class="container" role="main">
    <div id="block-1" class="block row container-white-top" data-nested="not-nested" data-containerid="" data-containercssclass=""><div class="col col-md-12"><h1 id="h1-1409568834"><?php print _("Clubmate"); ?></h1></div></div><div id="clubmate-block-2" class="block row container-white-bottom" data-nested="not-nested" data-containerid="" data-containercssclass=""><div class="col col-md-9"><p id="clubmate-paragraph-1"><?php print _("Club-Mate [ˈklʊp ˌmaːtə] ist ein koffeinhaltiges, alkoholfreies Erfrischungsgetränk der Brauerei Loscher aus <a href=\"https://de.wikipedia.org/wiki/M%C3%BCnchsteinach\" title=\"Münchsteinach\" style=\"color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-color: rgb(255, 255, 255); background-position: initial;\">Münchsteinach</a>. Club-Mate basiert auf der Pflanze <a href=\"https://de.wikipedia.org/wiki/Mate\" title=\"Mate\" class=\"mw-redirect\" style=\"color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-color: rgb(255, 255, 255); background-position: initial;\">Mate</a> und hat einen Koffeingehalt von 20 Milligramm pro 100 Milliliter."); ?></p><h2 id="clubmate-h2-1"><?php print _("Name"); ?></h2><p id="1409568966"><?php print _("Der Name geht zurück auf Yerba Mate. Er hat nichts mit dem englischen Begriff „mate“ ['meɪt] (dt. <i style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;\">Kamerad</i> oder <i style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;\">Kumpel</i>) zu tun. Das Getränk ist auch als <i style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;\">Hackerbrause</i> bekannt und gilt als Kultgetränk unter anderem in <a href=\"https://de.wikipedia.org/wiki/Hacker\" title=\"Hacker\" style=\"color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-color: rgb(255, 255, 255); background-position: initial;\">Hackerkreisen</a>. Durch den Kultstatus, den Club-Mate in der deutschen <a href=\"https://de.wikipedia.org/wiki/Hackerszene\" title=\"Hackerszene\" class=\"mw-redirect\" style=\"color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-color: rgb(255, 255, 255); background-position: initial;\">Hackerszene</a> erreicht hat, wird sie nun auch in großen Mengen auf ausländische Hackerveranstaltungen exportiert."); ?></p><?php $id="p-1410794591";$var1="5";$type="articlesingle";$name="Einzelner Artikel";$render="runtime";$config="true";include "../plugins/articlesingle/render.php"; ?></div><div class="col col-md-3"><div id="imagecontainer1" class="o-image"><img id="image1" src="../files/clubmate.jpg"></div></div></div><div id="clubmate-block-3" class="block row container-white" data-nested="not-nested" data-containerid="" data-containercssclass=""><div class="col col-md-12"><h2 id="clubmate-h2-2"><?php print _("Geschichte"); ?></h2><p id="1409568966"><?php print _("Der ursprüngliche Name des Getränks lautete Sekt-Bronte, welches seit 1924 produziert wurde, allerdings nur regional bekannt war. In den 1950er Jahren wurde das Getränk in Club-Mate umbenannt. Auch 2013 ist jedoch „Bronte“ regional noch als Begriff für das Getränk im aktiven Wortschatz. Das Rezept für Club-Mate kam mit dem Kauf der Limonadenfabrik <i style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;\">Geola Getränke</i> in Dietenhofen 1994 in den Besitz der Firma Loscher. Mit der Übernahme wurde begonnen, es überregional zu vertreiben. Da es nie große Werbekampagnen für Club-Mate gab, stieg der Bekanntheitsgrad der Marke nur langsam. Nach der Hackerszene wurde Club-Mate in den 2000er Jahren in der Party- und Festivalszene bekannter. Während Club-Mate in vielen Gebieten Deutschlands weitgehend unbekannt ist, gehört sie in einigen Städten, beispielsweise <a href=\"https://de.wikipedia.org/wiki/Berlin\" title=\"Berlin\" style=\"color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-color: rgb(255, 255, 255); background-position: initial;\">Berlin</a>, inzwischen zum Standardsortiment von <a href=\"https://de.wikipedia.org/wiki/Trinkhalle_(Verkaufsstelle)\" title=\"Trinkhalle (Verkaufsstelle)\" style=\"color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-color: rgb(255, 255, 255); background-position: initial;\">Trinkhallen</a> und einigen Supermarktketten (<a href=\"https://de.wikipedia.org/wiki/Rewe_Group\" title=\"Rewe Group\" style=\"color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-color: rgb(255, 255, 255); background-position: initial;\">Rewe</a>, <a href=\"https://de.wikipedia.org/wiki/Edeka\" title=\"Edeka\" style=\"color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-color: rgb(255, 255, 255); background-position: initial;\">Edeka</a>, <a href=\"https://de.wikipedia.org/wiki/Kaiser%E2%80%99s_Tengelmann\" title=\"Kaiser’s Tengelmann\" style=\"color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-color: rgb(255, 255, 255); background-position: initial;\">Kaiser’s Tengelmann</a>) sowie <a href=\"https://de.wikipedia.org/wiki/Diskothek\" title=\"Diskothek\" style=\"color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-color: rgb(255, 255, 255); background-position: initial;\">Diskotheken</a>. 2011 kam es zu einem Lieferengpass seitens der Brauerei Loscher, da nicht genügend Pfandflaschen zurückgegeben wurden. Daraufhin wurde bei <a href=\"https://de.wikipedia.org/wiki/Facebook\" title=\"Facebook\" style=\"color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-color: rgb(255, 255, 255); background-position: initial;\">Facebook</a> die Selbsthilfegruppe <i style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;\">Matecalypse now</i> gegründet, die dazu aufrief leere Pfandflaschen abzugeben."); ?></p><p id="1409568966"><?php print _("Im Dezember 2007 wurde eine Club-Mate-Winter-Edition mit Gewürzen auf den Markt gebracht, die seitdem zu jedem Winter für kurze Zeit im Handel erhältlich ist. Seit 2009 ist eine Cola unter dem Markennamen erhältlich und auch eine Eisteevariante ist seit einiger Zeit unter dem Namen ICE-T-Kraftstoff zu erwerben. Bei dieser Version wurde der Koffeingehalt auf 22 mg pro 100 ml erhöht und auch der Zuckergehalt ist weitaus höher, als es beim ursprünglichen Mate-Produkt der Fall ist. Seit 2013 wird mit<i style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;\">Club-Mate Granat</i> in den Sommermonaten eine Granatapfelvariante vertrieben."); ?></p></div></div><div id="clubmate-block-4" class="block row container-white" data-nested="not-nested" data-containerid="" data-containercssclass=""><div class="col col-md-12"><h2 id="clubmate-h2-3"><?php print _("Zubehör"); ?></h2><?php $id="p-1410794350";$type="articleequip";$name="Zubehör für Artikel";$render="runtime";$config="true";$var1="ClubMate";include "../plugins/articleequip/render.php"; ?></div></div>
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