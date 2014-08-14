<div id="block-1" class="block row">
	<div class="col col-md-12">
		<h1 id="h1-1">Contact Us</h1>
		<p id="paragraph-1">Placeholder for the Contact Us page.</p>
		<form id="form-2" role="form" class="respond-form">
	<div class="alert alert-success"><?php print _("Form submitted successfully!"); ?></div><div class="alert alert-danger"><?php print _("You are missing required fields."); ?></div>
			<div class="form-group" data-type="text" data-required="true">
				<label for="first-name"><?php print _("First Name"); ?></label>
				<input id="first-name" type="text" class="form-control">
			</div>
			<div class="form-group" data-type="text" data-required="true">
				<label for="last-name"><?php print _("Last Name"); ?></label>
				<input id="last-name" type="text" class="form-control">
			</div>
			<div class="form-group" data-type="text" data-required="true">
				<label for="email"><?php print _("Email"); ?></label>
				<input id="email" type="text" class="form-control">
			</div>
			<div class="form-group" data-type="radiolist">
				<label for="preferred-contact-method"><?php print _("Preferred Contact Method"); ?></label>
				<span class="list">
					<label class="radio"><input type="radio" value="Email" name="preferred-contact-method"><?php print _("Email"); ?></label>
					<label class="radio"><input type="radio" value="Phone" name="preferred-contact-method"><?php print _("Phone"); ?></label>
				</span>
			</div>
			<div class="form-group" data-type="textarea">
				<label for="additional-information" class="control-label"><?php print _("Additional Information"); ?></label>
				<div class="controls"><textarea id="additional-information" class="form-control"></textarea></div>
			</div>
		<button type="submit" class="btn btn-default btn-lg"><?php print _("Submit"); ?> <i class="fa fa-spinner fa-spin icon-spinner"></i></button></form>


	</div>
</div>  
