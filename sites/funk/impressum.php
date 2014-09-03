<?php 
$rootPrefix="";
$formPublicId="";
$pageUrl="impressum";
$isSecure=false;
$siteUniqId="53ec8db6e654f";
$siteFriendlyId="funk";
$pageUniqId="5404758ea2065";
$pageFriendlyId="impressum";
$pageTypeUniqId="-1";
$language="de";
include '../../libs/Utilities.php';
include 'libs/SiteAuthUser.php';
include 'site.php';
?><!doctype html>

<html lang="<?php print $language; ?>">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Funkfatzke - Impressum</title>
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
<script type="text/javascript" src="js/respond.Map.js?v=2.11.3"></script>
<script type="text/javascript" src="js/respond.Form.js?v=2.11.3"></script>
<script type="text/javascript" src="js/respond.Calendar.js?v=2.11.3"></script>
<script type="text/javascript" src="js/respond.List.js?v=2.11.3"></script>
<script type="text/javascript" src="js/respond.Featured.js?v=2.11.3"></script>
<script type="text/javascript" src="js/respond.Login.js?v=2.11.3"></script>
<script type="text/javascript" src="js/respond.Registration.js?v=2.11.3"></script>
<script type="text/javascript" src="js/respond.Search.js?v=2.11.3"></script>
<script type="text/javascript" src="js/pageModel.js?v=2.11.3"></script>
<script type="text/javascript" src="js/prettify.js"></script>

<!-- css -->
<link href="css/content.css?v=2.11.3" type="text/css" rel="stylesheet" media="screen">
<link href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css" type="text/css" rel="stylesheet" media="screen">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/prettify.css?v=2.11.3" type="text/css" rel="stylesheet" media="screen">

    
</head>

<body data-siteuniqid="53ec8db6e654f" data-sitefriendlyid="funk" data-domain="n2o.local/funkfatzke/sites/funk" data-pageuniqid="5404758ea2065" data-pagefriendlyid="impressum" data-pagetypeuniqid="-1" data-api="http://n2o.local/funkfatzke" id="impressum">

<header role="banner">

	<nav class="navbar navbar-default" role="navigation">
	  
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
        
        <a class="navbar-brand" href="//n2o.local/funkfatzke/sites/funk"><img src="themes/advanced/resources/images/funk_logo_100px.png"></a>
	  </div>
	  <!-- /.navbar-header -->
	
	  
	  <div class="collapse navbar-collapse navbar-ex1-collapse">
	    <ul class="nav navbar-nav navbar-right nav-pills">
			<li><a href="index">Home</a></li><li><a href="artikel/funkgeraete">Funkgeräte</a></li><li><a href="kontakt">Kontakt</a></li>
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
    <div id="block-1" class="block row container-white" data-nested="not-nested" data-containerid="" data-containercssclass=""><div class="col col-md-12"><h1 id="h1-1409578385"><?php print _("Impressum"); ?></h1><h3 id="impressum-h3-1"><?php print _("Angaben gemäß § 5 TMG:"); ?></h3><p id="1409578856"><?php print _("Gerald<br>Straße<br>Zusatz<br>PLZ Berlin"); ?></p><h3 id="impressum-h3-2"><?php print _("Kontakt:"); ?></h3><p id="1409578856"><?php print _("Telefon:<br>E-Mail: gblauel@gmx.de"); ?></p><h3 id="impressum-h3-3"><?php print _("Quellenangaben für die verwendeten Bilder und Grafiken:"); ?></h3><p id="1409578856"><?php print _("[Namen der Agenturen und der jeweiligen Fotografen]"); ?></p><h2 id="impressum-h2-1"><?php print _("Haftungsausschluss (Disclaimer)"); ?></h2><h3 id="impressum-h3-7"><?php print _("Haftung für Inhalte"); ?></h3><p id="1409578856"><?php print _("Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen oder nach Umständen zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen. Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den allgemeinen Gesetzen bleiben hiervon unberührt. Eine diesbezügliche Haftung ist jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung möglich. Bei Bekanntwerden von entsprechenden Rechtsverletzungen werden wir diese Inhalte umgehend entfernen."); ?></p><h3 id="impressum-h3-6"><?php print _("Haftung für Links"); ?></h3><p id="1409578856"><?php print _("Unser Angebot enthält Links zu externen Webseiten Dritter, auf deren Inhalte wir keinen Einfluss haben. Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen. Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich. Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf mögliche Rechtsverstöße überprüft. Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar. Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Links umgehend entfernen."); ?></p><h3 id="impressum-h3-5"><?php print _("Urheberrecht"); ?></h3><p id="1409578856"><?php print _("Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers. Downloads und Kopien dieser Seite sind nur für den privaten, nicht kommerziellen Gebrauch gestattet. Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter als solche gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden, bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Inhalte umgehend entfernen."); ?></p><h2 id="impressum-h2-2"><?php print _("Datenschutzerklärung:"); ?></h2><h3 id="impressum-h3-4"><?php print _("Datenschutz"); ?></h3><p id="1409578856"><?php print _("Die Nutzung unserer Webseite ist in der Regel ohne Angabe personenbezogener Daten möglich. Soweit auf unseren Seiten personenbezogene Daten (beispielsweise Name, Anschrift oder eMail-Adressen) erhoben werden, erfolgt dies, soweit möglich, stets auf freiwilliger Basis. Diese Daten werden ohne Ihre ausdrückliche Zustimmung nicht an Dritte weitergegeben.Wir weisen darauf hin, dass die Datenübertragung im Internet (z.B. bei der Kommunikation per E-Mail) Sicherheitslücken aufweisen kann. Ein lückenloser Schutz der Daten vor dem Zugriff durch Dritte ist nicht möglich.<br>Der Nutzung von im Rahmen der Impressumspflicht veröffentlichten Kontaktdaten durch Dritte zur Übersendung von nicht ausdrücklich angeforderter Werbung und Informationsmaterialien wird hiermit ausdrücklich widersprochen. Die Betreiber der Seiten behalten sich ausdrücklich rechtliche Schritte im Falle der unverlangten Zusendung von Werbeinformationen, etwa durch Spam-Mails, vor."); ?></p><h3 id="impressum-h3-8"><?php print _("Datenschutzerklärung für die Nutzung von Facebook-Plugins (Like-Button)"); ?></h3><p id="1409578856"><?php print _("Auf unseren Seiten sind Plugins des sozialen Netzwerks Facebook (Facebook Inc., 1601 Willow Road, Menlo Park, California, 94025, USA) integriert. Die Facebook-Plugins erkennen Sie an dem Facebook-Logo oder dem \"Like-Button\" (\"Gefällt mir\") auf unserer Seite. Eine Übersicht über die Facebook-Plugins finden Sie hier: http://developers.facebook.com/docs/plugins/.Wenn Sie unsere Seiten besuchen, wird über das Plugin eine direkte Verbindung zwischen Ihrem Browser und dem Facebook-Server hergestellt. Facebook erhält dadurch die Information, dass Sie mit Ihrer IP-Adresse unsere Seite besucht haben. Wenn Sie den Facebook \"Like-Button\" anklicken während Sie in Ihrem Facebook-Account eingeloggt sind, können Sie die Inhalte unserer Seiten auf Ihrem Facebook-Profil verlinken. Dadurch kann Facebook den Besuch unserer Seiten Ihrem Benutzerkonto zuordnen. Wir weisen darauf hin, dass wir als Anbieter der Seiten keine Kenntnis vom Inhalt der übermittelten Daten sowie deren Nutzung durch Facebook erhalten. Weitere Informationen hierzu finden Sie in der Datenschutzerklärung von facebook unter <a href=\"http://de-de.facebook.com/policy.php\" target=\"_blank\" style=\"color: rgb(153, 0, 0);\">http://de-de.facebook.com/policy.php</a><br>Wenn Sie nicht wünschen, dass Facebook den Besuch unserer Seiten Ihrem Facebook-Nutzerkonto zuordnen kann, loggen Sie sich bitte aus Ihrem Facebook-Benutzerkonto aus."); ?></p><h3 id="impressum-h3-9"><?php print _("Datenschutzerklärung für die Nutzung von Google Analytics"); ?></h3><p id="1409578856"><?php print _("Diese Website benutzt Google Analytics, einen Webanalysedienst der Google Inc. (\"Google\"). Google Analytics verwendet sog. \"Cookies\", Textdateien, die auf Ihrem Computer gespeichert werden und die eine Analyse der Benutzung der Website durch Sie ermöglichen. Die durch den Cookie erzeugten Informationen über Ihre Benutzung dieser Website werden in der Regel an einen Server von Google in den USA übertragen und dort gespeichert. Im Falle der Aktivierung der IP-Anonymisierung auf dieser Webseite wird Ihre IP-Adresse von Google jedoch innerhalb von Mitgliedstaaten der Europäischen Union oder in anderen Vertragsstaaten des Abkommens über den Europäischen Wirtschaftsraum zuvor gekürzt.<br>Nur in Ausnahmefällen wird die volle IP-Adresse an einen Server von Google in den USA übertragen und dort gekürzt. Im Auftrag des Betreibers dieser Website wird Google diese Informationen benutzen, um Ihre Nutzung der Website auszuwerten, um Reports über die Websiteaktivitäten zusammenzustellen und um weitere mit der Websitenutzung und der Internetnutzung verbundene Dienstleistungen gegenüber dem Websitebetreiber zu erbringen. Die im Rahmen von Google Analytics von Ihrem Browser übermittelte IP-Adresse wird nicht mit anderen Daten von Google zusammengeführt.<br>Sie können die Speicherung der Cookies durch eine entsprechende Einstellung Ihrer Browser-Software verhindern; wir weisen Sie jedoch darauf hin, dass Sie in diesem Fall gegebenenfalls nicht sämtliche Funktionen dieser Website vollumfänglich werden nutzen können. Sie können darüber hinaus die Erfassung der durch das Cookie erzeugten und auf Ihre Nutzung der Website bezogenen Daten (inkl. Ihrer IP-Adresse) an Google sowie die Verarbeitung dieser Daten durch Google verhindern, indem sie das unter dem folgenden Link verfügbare Browser-Plugin herunterladen und installieren: http://tools.google.com/dlpage/gaoptout?hl=de."); ?></p><h3 id="impressum-h3-10"><?php print _("Datenschutzerklärung für die Nutzung von Google +1"); ?></h3><p id="1409578856"><?php print _("<i style=\"color: rgb(81, 87, 86); font-family: Arial, sans-serif; font-size: 13px; line-height: 20.4799995422363px;\">Erfassung und Weitergabe von Informationen:</i>"); ?></p><p id="1409578856"><?php print _("Mithilfe der Google +1-Schaltfläche können Sie Informationen weltweit veröffentlichen. Über die Google +1-Schaltfläche erhalten Sie und andere Nutzer personalisierte Inhalte von Google und unseren Partnern. Google speichert sowohl die Information, dass Sie für einen Inhalt +1 gegeben haben, als auch Informationen über die Seite, die Sie beim Klicken auf +1 angesehen haben. Ihre +1 können als Hinweise zusammen mit Ihrem Profilnamen und Ihrem Foto in Google-Diensten, wie etwa in Suchergebnissen oder in Ihrem Google-Profil, oder an anderen Stellen auf Websites und Anzeigen im Internet eingeblendet werden.<br>Google zeichnet Informationen über Ihre +1-Aktivitäten auf, um die Google-Dienste für Sie und andere zu verbessern. Um die Google +1-Schaltfläche verwenden zu können, benötigen Sie ein weltweit sichtbares, öffentliches Google-Profil, das zumindest den für das Profil gewählten Namen enthalten muss. Dieser Name wird in allen Google-Diensten verwendet. In manchen Fällen kann dieser Name auch einen anderen Namen ersetzen, den Sie beim Teilen von Inhalten über Ihr Google-Konto verwendet haben. Die Identität Ihres Google-Profils kann Nutzern angezeigt werden, die Ihre E-Mail-Adresse kennen oder über andere identifizierende Informationen von Ihnen verfügen."); ?></p><p id="1409578856"><?php print _("<i style=\"color: rgb(81, 87, 86); font-family: Arial, sans-serif; font-size: 13px; line-height: 20.4799995422363px;\">Verwendung der erfassten Informationen:</i>"); ?></p><p id="1409578856"><?php print _("Neben den oben erläuterten Verwendungszwecken werden die von Ihnen bereitgestellten Informationen gemäß den geltenden Google-Datenschutzbestimmungen genutzt. Google veröffentlicht möglicherweise zusammengefasste Statistiken über die +1-Aktivitäten der Nutzer bzw. gibt diese an Nutzer und Partner weiter, wie etwa Publisher, Inserenten oder verbundene Websites."); ?></p><h3 id="impressum-h3-11"><?php print _("Datenschutzerklärung für die Nutzung von Twitter"); ?></h3><p id="1409578856"><?php print _("Auf unseren Seiten sind Funktionen des Dienstes Twitter eingebunden. Diese Funktionen werden angeboten durch die Twitter Inc., Twitter, Inc. 1355 Market St, Suite 900, San Francisco, CA 94103, USA. Durch das Benutzen von Twitter und der Funktion \"Re-Tweet\" werden die von Ihnen besuchten Webseiten mit Ihrem Twitter-Account verknüpft und anderen Nutzern bekannt gegeben. Dabei werden auch Daten an Twitter übertragen.<br>Wir weisen darauf hin, dass wir als Anbieter der Seiten keine Kenntnis vom Inhalt der übermittelten Daten sowie deren Nutzung durch Twitter erhalten. Weitere Informationen hierzu finden Sie in der Datenschutzerklärung von Twitter unter http://twitter.com/privacy.Ihre Datenschutzeinstellungen bei Twitter können Sie in den Konto-Einstellungen unter<a href=\"http://twitter.com/account/settings\" target=\"_blank\" style=\"color: rgb(153, 0, 0);\">http://twitter.com/account/settings</a> ändern."); ?></p><p id="1409578856"><?php print _("Quellen: eRecht24, <a rel=\"nofollow\" href=\"http://www.e-recht24.de/artikel/datenschutz/6590-facebook-like-button-datenschutz-disclaimer.html\" target=\"_blank\" style=\"color: rgb(153, 0, 0);\">eRecht24 Datenschutzerklärung für Facebook</a>, <a rel=\"nofollow\" href=\"http://www.google.com/intl/de/analytics/learn/privacy.html\" target=\"_blank\" style=\"color: rgb(153, 0, 0);\">Datenschutzerklärung für Google Analytics</a>, <a rel=\"nofollow\" href=\"http://www.e-recht24.de/artikel/datenschutz/6635-datenschutz-rechtliche-risiken-bei-der-nutzung-von-google-analytics-und-googleadsense.html\" target=\"_blank\" style=\"color: rgb(153, 0, 0);\">eRecht24 Datenschutzerklärung Google Adsense</a>, <a rel=\"nofollow\" href=\"http://www.google.com/intl/de/+/policy/+1button.html\" target=\"_blank\" style=\"color: rgb(153, 0, 0);\">Google +1 Datenschutzerklärung</a>, <a rel=\"nofollow\" href=\"http://twitter.com/privacy\" target=\"_blank\" style=\"color: rgb(153, 0, 0);\">Twitter Bedingungen</a>"); ?></p></div></div>
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
              <a href="page/kontakt"><i class="fa fa-envelope-o"></i></a>
            </p>

          </div>
          <!-- /.col-md-4 -->

          <div class="col-md-6">

            <h4><?php print _("Allgemeine Informationen"); ?></h4>

            <p>
              	<li><a href="index">Home</a></li><li><a href="kontakt">Kontakt</a></li><li><a href="ueber-uns">Über uns</a></li><li class="active"><a href="impressum">Impressum</a></li>
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

<script type="text/javascript" src="js/cartModel.js"></script>

<script type="text/javascript" src="themes/advanced/resources/advanced.js"></script>



</body>

</html>