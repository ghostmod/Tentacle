<? load::view('admin/templates/template-header',array('title'=>'Canonical Links','assets'=>'application')); ?>
<? load::view('admin/templates/template-sidebar'); ?>
<div id="wrap">
	<div class="full-content">
		<div id="post-body">
			<div id="post-body-content">
			    <div class="one-full">
			     <h1><img src="<?=ADMIN_URL; ?>images/icons/icon_pages_32.png" alt="" /> Canonical Links</h1>
					<div class="one-half">
						<div class="table">
							<input type="checkbox" checked="checked" value="1" id="link_rel_canonical" name="link_rel_canonical"> Generate <code>&lt;link rel="canonical" /&gt;</code> tags.<br />
							<input type="checkbox" checked="checked" value="1" id="remove_nonexistent_pagination" name="remove_nonexistent_pagination"> Redirect requests for nonexistent pagination.<br />
						</div>
					</div>
					<div class="one-half">
						<div class="table">
							<p>&nbsp;</p>
						</div>
					</div>
				</div>
			</div><!-- .post-body-content -->
		</div><!-- #post-body -->
	</div><!-- .full-content -->
</div><!-- #wrap -->
<? load::view('admin/templates/template-footer'); ?>