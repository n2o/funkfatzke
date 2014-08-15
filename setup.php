<?php

	// DB connection parameters
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'funkfatzke');
	define('DB_USER', 'funkfatzke');
	define('DB_PASSWORD', '5ZSKH5hssK9AcKRKp35wkB9v');
	
	// app URL NOTE: include the subdirectory if applicable, leave off the trailing /
	define('APP_URL', 'https://christian-meter.de/funkfatzke');
	
	// setup default language for the site
	define('DEFAULT_LANGUAGE', 'de');
	
	// site admin
	define('SITE_ADMIN', 'cmeter@googlemail.com');
	
	// passcode
	define('PASSCODE', 'funkfatzkefunkfatzke');
	
	// CORS (optional for external sites)
	define ('CORS', serialize (array (
	    'http://path.torespond.com'
	    )));
	    
	// Google Maps API Key
	define('GOOGLE_MAPS_API_KEY', 'YOUR GOOGLE MAPS API KEY');
	
	// - Stripe
    // - set to the Stripe plan you want the user enrolled in when the site is created
    // - create account and plans at stripe.com (a trial period is recommended)
    define('DEFAULT_STRIPE_PLAN', '');
    
    // set Stripe API keys 
	define('STRIPE_API_KEY', '');
    define('STRIPE_PUB_KEY', '');
    
    // set what emails should be sent out and a reply-to email address
	define('REPLY_TO', '');
	define('REPLY_TO_NAME', '');
	define('SEND_WELCOME_EMAIL', false);
	define('SEND_PAYMENT_SUCCESSFUL_EMAIL', false);
	define('SEND_PAYMENT_FAILED_EMAIL', false);
	
    // start page (sets the default page a user sees after logon)
	define('START_PAGE', 'pages');
	
	// set the default theme (directory name: themes/simple => simple)
	define('DEFAULT_THEME', 'simple');

	// the brand of your app
    define('BRAND', 'Respond CMS');
    define('BRAND_LOGO', 'images/respond-brand.png');
    define('BRAND_ICON', 'images/respond-icon.png');
    define('COPY', '<a href="http://respondcms.com">Respond CMS</a> version '.VERSION.'.  Made by Matthew Smith in Manchester, MO');

?>
