// create a namespace for plugins
if(typeof plugin == "undefined" || !plugin) {
	var plugin = {};
}

// the type of plugin must match the JS singleton (e.g. articleequip) name
plugin.articleequip = {

	showUpdate:true, // shows/hides the submit button
	pageUniqId:null,
	pluginUniqId:null,

	// initialize plugin
	init:function(pageUniqId, pluginUniqId){

		plugin.articleequip.pageUniqId = pageUniqId;
		plugin.articleequip.pluginUniqId = pluginUniqId;

		$('#articleequip-var1').val($('#'+plugin.articleequip.pluginUniqId).data('var1'));
	},

	// handles the click of the submit button
	update:function(el){

		// an easy way to pass data to your plugin is to set data-[var] attributes
		$('#'+plugin.articleequip.pluginUniqId).data('var1', $('#articleequip-var1').val());

		// show a success message when you are done
		message.showMessage('success', 'Plugin updated successfully');

		// returning true will automatically close the dialog
		return true;
	}

}
