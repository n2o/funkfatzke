// create a namespace for plugins
if(typeof plugin == "undefined" || !plugin) {
	var plugin = {};
}

// the type of plugin must match the JS singleton (e.g. articlelist) name
plugin.articlelist = {

	showUpdate:true, // shows/hides the submit button
	pageUniqId:null,
	pluginUniqId:null,

	// initialize plugin
	init:function(pageUniqId, pluginUniqId){

		plugin.articlelist.pageUniqId = pageUniqId;
		plugin.articlelist.pluginUniqId = pluginUniqId;

		$('#articlelist-var1').val($('#'+plugin.articlelist.pluginUniqId).data('var1'));
	},

	// handles the click of the submit button
	update:function(el){
		
		// an easy way to pass data to your plugin is to set data-[var] attributes
		$('#'+plugin.articlelist.pluginUniqId).data('var1', $('#articlelist-var1').val());

		// show a success message when you are done
		message.showMessage('success', 'Plugin updated successfully');

		// returning true will automatically close the dialog
		return true;
	}

}
