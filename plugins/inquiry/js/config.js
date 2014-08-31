// create a namespace for plugins
if(typeof plugin == "undefined" || !plugin) {
	var plugin = {};
}

// the type of plugin must match the JS singleton (e.g. articleadd) name
plugin.articleadd = {

	showUpdate:true, // shows/hides the submit button
	pageUniqId:null,
	pluginUniqId:null,

	// initialize plugin
	init:function(pageUniqId, pluginUniqId){

		plugin.articleadd.pageUniqId = pageUniqId;
		plugin.articleadd.pluginUniqId = pluginUniqId;

		$('#articleadd-var1').val($('#'+plugin.articleadd.pluginUniqId).data('var1'));
	},

	// handles the click of the submit button
	update:function(el){
		
		// an easy way to pass data to your plugin is to set data-[var] attributes
		$('#'+plugin.articleadd.pluginUniqId).data('var1', $('#articleadd-var1').val());

		// show a success message when you are done
		message.showMessage('success', 'Plugin updated successfully');

		// returning true will automatically close the dialog
		return true;
	}

}
