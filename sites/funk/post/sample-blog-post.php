<?php 
$rootPrefix="../";
$formPublicId="";
$pageUrl="post/sample-blog-post";
$isSecure=false;
$siteUniqId="53ec8db6e654f";
$siteFriendlyId="funk";
$pageUniqId="53ec8db7086a7";
$pageFriendlyId="sample-blog-post";
$pageTypeUniqId="53ec8db708399";
$language="de";
include '../../../libs/Utilities.php';
include '../libs/SiteAuthUser.php';
include '../site.php';
?><!doctype html>

<html lang="<?php print $language; ?>">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Funkfatzke - Sample Blog Post</title>
<meta name="description" content="<?php print _("A sample blog post to get you started"); ?>">
<meta name="keywords" content="">
<meta name="callout" content="">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
  
<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">  

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

<!-- css -->
<link href="../css/content.css?v=2.11.3" type="text/css" rel="stylesheet" media="screen">
<link href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css" type="text/css" rel="stylesheet" media="screen">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="../css/prettify.css?v=2.11.3" type="text/css" rel="stylesheet" media="screen">

    
</head>

<body data-siteuniqid="53ec8db6e654f" data-sitefriendlyid="funk" data-domain="n2o.local/funkfatzke/sites/funk" data-pageuniqid="53ec8db7086a7" data-pagefriendlyid="sample-blog-post" data-pagetypeuniqid="53ec8db708399" data-api="http://n2o.local/funkfatzke" id="sample-blog-post">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=534570596627036";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- /#fb-root (comments support) -->	

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



	<ul class="respond-select-language">
		<li><?php print _("Language:"); ?></li>
		<li><a data-lang="en-us">English</a></li>
		<li><a data-lang="es-es">Español</a></li>
	</ul>

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
	    <ul class="nav navbar-nav navbar-right">
			<li><a href="../index">Home</a></li><li><a href="../artikel/alle-funkgeraete">Alle Funkgeräte</a></li><li><a href="../artikel/handfunkgeraete">Handfunkgeräte</a></li><li><a href="../verwaltung/artikel-hinzufuegen">Artikel hinzufügen</a></li>
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
		</div>
		<!-- /.cart-item -->
	
	</div>
	<!-- /.cart-items -->
	
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
		<button 
			class="btn btn-default" 
			data-email="cmeter@googlemail.com"
			data-bind="click:checkoutWithPayPal"><?php print _("Angebot anfragen"); ?></button>
	</div>
	
</section>
<!-- /#cart -->




</header>
  
<div id="content" class="container" role="main">
    <div id="block-1" class="block row">
	<div class="col col-md-12">
		<h1 id="h1-1"><?php print _("Sample Blog Post"); ?></h1>
		<p id="paragraph-1"><?php print _("
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis mollis arcu, eget posuere libero faucibus sit amet. Cras pharetra pellentesque augue, id vestibulum nisi pharetra et. Morbi in dapibus leo. Vivamus vehicula risus vel eros interdum et mattis tortor congue. Sed gravida interdum est, sit amet pretium nisl consectetur at. In hac habitasse platea dictumst. In purus enim, elementum porttitor tincidunt volutpat, fermentum quis ante. Vivamus at est sem, quis ornare lorem. Cras pulvinar est eget nisi iaculis consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis mollis arcu, eget posuere libero faucibus sit amet. Cras pharetra pellentesque augue, id vestibulum nisi pharetra et. Morbi in dapibus leo. Vivamus vehicula risus vel eros interdum et mattis tortor congue. Sed gravida interdum est, sit amet pretium nisl consectetur at. In hac habitasse platea dictumst. In purus enim, elementum porttitor tincidunt volutpat, fermentum quis ante. Vivamus at est sem, quis ornare lorem. Cras pulvinar est eget nisi iaculis consequat.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis mollis arcu, eget posuere libero faucibus sit amet. Cras pharetra pellentesque augue, id vestibulum nisi pharetra et. Morbi in dapibus leo. Vivamus vehicula risus vel eros interdum et mattis tortor congue. Sed gravida interdum est, sit amet pretium nisl consectetur at. In hac habitasse platea dictumst. In purus enim, elementum porttitor tincidunt volutpat, fermentum quis ante. Vivamus at est sem, quis ornare lorem. Cras pulvinar est eget nisi iaculis consequat.
		"); ?></p>
		<blockquote id="quote-2"><?php print _("
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis mollis arcu, eget posuere libero faucibus sit amet. Cras pharetra pellentesque augue, id vestibulum nisi pharetra et. Morbi in dapibus leo. Vivamus vehicula risus vel eros interdum et mattis tortor congue. Sed gravida interdum est, sit amet pretium nisl consectetur at. In hac habitasse platea dictumst. In purus enim, elementum porttitor tincidunt volutpat, fermentum quis ante. Vivamus at est sem, quis ornare lorem. Cras pulvinar est eget nisi iaculis consequat.
		"); ?></blockquote>
		<p id="paragraph-2"><?php print _("
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis mollis arcu, eget posuere libero faucibus sit amet. Cras pharetra pellentesque augue, id vestibulum nisi pharetra et. Morbi in dapibus leo. Vivamus vehicula risus vel eros interdum et mattis tortor congue. Sed gravida interdum est, sit amet pretium nisl consectetur at. In hac habitasse platea dictumst. In purus enim, elementum porttitor tincidunt volutpat, fermentum quis ante. Vivamus at est sem, quis ornare lorem. Cras pulvinar est eget nisi iaculis consequat.
		"); ?></p>
	</div>
</div>
</div>

<div class="container" role="main">  
  <div class="blog-meta">
      <p>
        <span class="photo" style="background-image: url(../files/funk_logo_100px.png)"></span>
        <?php print _("Last modified by"); ?>
        <span class="author">Christian Meter</span>
        <span class="last-modified-date">Thu, Aug 14 14 12:21 pm</span>
      </p>
    </div> 
</div>
  
<div id="comments" class="container">
    <div id="block-1" class="block row">
      <div class="col col-md-12">
        <h3><?php print _("Comments"); ?></h3>
        <div class="fb-comments" data-href="http://n2o.local/funkfatzke/sites/funk/post/sample-blog-post" data-numposts="5"></div>
      </div>
  </div>
</div>   
 
<footer role="contentinfo">
  
  <div class="container">

		<div class="row">
		
          <div class="col-md-6">
            
            <h4><?php print _("Contact"); ?></h4>
            
            <p>
              <?php print _("Call us at (555) 555-5555 or reach out via the website:"); ?> <a href="../page/contact"><?php print _("Contact"); ?></a>
            </p>
            
            <p class="social">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-google-plus"></i></a>
              <a href="#"><i class="fa fa-envelope-o"></i></a>
            </p>
            
          </div>
          <!-- /.col-md-4 -->
          
          <div class="col-md-6">
            
            <h4><?php print _("About"); ?></h4>
            
            <p>
              Funkfatzke <?php print _("powered by"); ?> <a href="http://respondcms.com">Respond</a>. <?php print _("Respond is an open source, responsive content management system that you can use to build responsive sites.  The latest version features Bootstrap 3.0, Bootswatch themes, a complete REST API, and a beautiful UI."); ?>
            </p>
            
          </div>
			<!-- /.col-md-4 -->
			
		</div>
		<!-- /.row -->
    
    	<div class="row">
        
          <div class="col-md-12 menu">
              
              <ul>
                <li><?php print _("Menu:"); ?></li>
                <li><a href="../index">Home</a></li><li><a href="../artikel/alle-funkgeraete">Alle Funkgeräte</a></li><li><a href="../artikel/handfunkgeraete">Handfunkgeräte</a></li><li><a href="../verwaltung/artikel-hinzufuegen">Artikel hinzufügen</a></li>
              </ul>
              
          </div>
          <!-- /.col-md-12 -->
          
    	</div>
		
  	</div>
  	<!-- /.container -->
  
</footer>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.17.5/js/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<link href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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

<script type="text/javascript" src="../js/cartModel.js"></script>

<script type="text/javascript" src="../themes/advanced/resources/advanced.js"></script>



</body>

</html>