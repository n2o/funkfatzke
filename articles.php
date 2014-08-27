<?php	
	include 'app.php'; // import php files
	
	$authUser = new AuthUser(); // get auth user
	$authUser->Authenticate('All');
	
	Utilities::SetLanguage($authUser->Language); // set language
?>
<!DOCTYPE html>
<html lang="<?php print str_replace('_', '-', $authUser->Language) ?>">

<head>
	
<title><?php print("Artikel"); ?>&mdash;<?php print $authUser->SiteName; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<!-- include css -->
<?php include 'modules/css.php'; ?>
<link type="text/css" href="css/dialog.css?v=<?php print VERSION; ?>" rel="stylesheet">
<link type="text/css" href="css/dropzone.css?v=<?php print VERSION; ?>" rel="stylesheet">

<?php include 'modules/js.php'; ?>
<script type="text/javascript" src="js/articles/general.js"></script>

<style type="text/css">
/* Color of placeholder text */
.form-control::-moz-placeholder {
    color: lightgrey;
}
.form-control:-ms-input-placeholder {
    color: lightgrey;
}
.form-control::-webkit-input-placeholder {
	color: lightgrey;
}
</style>

</head>

<body id="profile-page" data-currpage="profile" data-sitefriendlyid="<?php print $authUser->SiteFriendlyId; ?>">
	
<?php include 'modules/menu.php'; ?>

<section class="main">
    <nav>
        <a class="show-menu"><i class="fa fa-bars fa-lg"></i></a>
        <ul>
            <li class="static active"><a><?php print("Artikel"); ?></a></li>
        </ul>
    </nav>
    <!-- /nav -->
    
    <div id="tabs">
      <ul>
        <li><a href="#add">Hinzufügen</a></li>
        <li><a href="#list">Anzeigen</a></li>
        <li><a href="#edit">Bearbeiten</a></li>
      </ul>

      <div id="add">
        <?php include('aux/articles/add.php'); ?>
      </div><!-- /tabs-1 -->
      
      <div id="list">
        <?php include('aux/articles/list.php'); ?>
      </div> <!-- /tabs-2 -->

      <div id="edit">
        <?php include('aux/articles/edit.php'); ?>
      </div> <!-- /tabs-3 --> 
    </div>

</section>
<!-- /.main -->

<!-- include js -->
<script type="text/javascript" src="js/helper/dropzone.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/viewModels/models.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/viewModels/filesModel.js?v=<?php print VERSION; ?>"></script>
</body>

</html>

