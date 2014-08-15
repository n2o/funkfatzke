<div id="block-1" class="block row container-white" data-nested="not-nested" data-containerid="" data-containercssclass=""><div class="col col-md-12"><div id="list1" class="respond-list" data-bind="foreach: list1" 
	data-display="blog" 
	data-label="posts" 
	data-pagetypeid="53ec8db708399" 
	data-length="10" 
	data-orderby="Created" 
	data-category="undefined">
		<div class="content" data-bind="html:content"></div>
        <div class="blog-meta">
			<p>
				<span data-bind="visible:hasPhoto"><span class="photo" data-bind="attr:{'style': 'background-image: url('+photo+')'}"></span></span>
                <?php print _("Last modified by"); ?> <span class="author" data-bind="text:author"></span>
                <span data-bind="text:lastModifiedReadable" class="last-modified-date"></span>
                <a data-bind="attr:{'href':url}"><?php print _("Permanent Link"); ?></a>
			</p>
        </div>
</div>

<p data-bind="visible: list1Loading()" class="list-loading"><i class="fa fa-spinner fa-spin"></i> Loading...</p>

	<div class="page-results">
		<button id="pager-list1" class="btn btn-default" data-id="list1"><?php print _("Older posts"); ?></button>
	</div>
</div></div>