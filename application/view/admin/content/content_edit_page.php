<? load::view('admin/template-header', array('title' => 'Edit '.$get_page->title, 'assets' => 'application'));?>
<? load::view('admin/template-sidebar');?>
<div id="wrap">
	<!--
	<script type="text/javascript">
		$(function(){
			$('form#edit_page').sisyphus({
				//onSaveCallback: function() {},
				//onRestoreCallback: function() {},
				//onReleaseDataCallback: function() {}
			});
		}); 
	</script>
	-->
	<form action="<?= BASE_URL ?>action/update_page/<?= $get_page->id ?>" method="post" class="form-stacked" id='edit_page'>
		<input type="hidden" name="page-or-post" value='page' />
		<input type='hidden' name='page_template' value='<?= $get_page->template?>' />
		<div class="has-right-sidebar">
			<div class="contet-sidebar has-tabs">
				<div class="table-heading">
					<h3 class="regular">Page Settings</h3>
					<input type="button" value="Preview" class="btn small primary alignright" />
				</div>
				<div class="table-content">
					<fieldset>
						<dl>
							<dt>
								<label for="status">Status</label>
							</dt>
							<dd>
								<select name="status" id="status" size="1">
									<option value="draft" <? selected( $get_page->status, 'draft' ); ?>>Draft</option>
									<option value="published" <? selected( $get_page->status, 'published' ); ?>>Published</option>
								</select>
							</dd>
							<dt>
								<label for="parent_page">Parent page</label>
							</dt>
							<dd>
								<select id="parent_page" name="parent_page">
									<option value="0">None</option>
									<? foreach ($pages as $page_array): 
										$page = (object)$page_array; ?>
										<option value="<?= $page->id?>" <? selected( $page->id, $get_page->parent  ); ?>><?= offset($page->level, 'list').$page->title;?></option>
									<? endforeach;?>
								</select>
							</dd>
							<!--
							@todo Figure out a way to change templates after one has been saved.
							<dt>
								<label for="page_template">Page template</label>
							</dt>
							<dd>
								<select id="page_template" name="page_template" onchange="location = this.options[this.selectedIndex].value;">
									<option value="<?= BASE_URL ?>action/render_admin/update_page/default/<?= $get_page->id ?>" <? if ($get_page->template == 'default') echo 'selected' ?>>Default</option>
									<? $templates = get_templates( get_option( 'appearance' ) ); 
									foreach ( $templates as $template ):
									?>
										<option value="<?= BASE_URL ?>action/render_admin/update_page/<?= $template->template_id ?>/<?= $get_page->id ?>" <? selected( $get_page->template, $template->template_id ); ?>><?= $template->template_name ?></option>
									<? endforeach; ?>
								</select>
							</dd>-->
						</dl>
					</fieldset>
					<input type="hidden" value="admin/content_update_page/<?= $get_page->id ?>" name="history">
					<div class="textleft actions">
						<button type="submit" class="btn large primary">Save</button>
						<a class="red button-secondary" href="<?= BASE_URL ?>action/trash_page/<?= $get_page->id;?>">Move to trash</a><!--<a href="#review">Save for Review</a>-->
					</div>
				</div>
			</div>
			<div id="post-body">
				<div id="post-body-content">
					<?php if( $note = note::get('page_add') or $note = note::get('page_update')): ?>
						<script type="text/javascript">
							$(document).ready(function() {
								jQuery.noticeAdd({
									text : '<?= $note['content'];?>',
									stay : false,
									type : '<?= $note['type']; ?>'
								});
							});
						</script>
					<?php endif; ?>
					<h1><img src="<?=ADMIN_URL;?>images/icons/icon_pages_32.png" alt="" /> Update <small><?= $get_page->title ?></small></h1>
					<ul class="tabs" data-tabs="tabs" >
						<li class="active"><a href="#content">Content</a></li>
						<li class=""><a href="#options">Options</a></li>
					</ul>
					<div class="tab-content tab-body" id="my-tab-content">
						<div id="content" class="active tab-pane">
							<? //clean_out($get_page_meta ) ?>
							<input type="text" name="title" placeholder='Title' value='<?= $get_page->title ?>' class='xlarge' required='required' />
							<!--<p>Permalink: http://www.sitename/com/path/ <a href="#">Edit</a></p>-->
							<? if(user_editor() == 'wysiwyg'):?>
								<script type="text/javascript" src="<?=TENTACLE_JS; ?>tiny_mce/jquery.tinymce.js"></script>

								<p class="wysiwyg">
									<textarea id="Content" name="content" rows="15" cols="80" class="tinymce"><?= stripslashes( $get_page->content ) ?></textarea>
								</p>
                              
								<a class="fancybox fancybox.iframe" id="insert-media" href="<?= BASE_URL ?>admin/media_insert" title="Insert Media" data-width="600" data-height="825">[ Insert Media ]</a>
							
							<? else: ?>
								<link rel="stylesheet" href="<?=TENTACLE_JS; ?>CodeMirror-2.22/lib/codemirror.css">
								<script src="<?=TENTACLE_JS; ?>CodeMirror-2.22/lib/codemirror.js"></script>
								<script src="<?=TENTACLE_JS; ?>CodeMirror-2.22/mode/xml/xml.js"></script>
								<script src="<?=TENTACLE_JS; ?>CodeMirror-2.22/mode/css/css.js"></script>
								<script src="<?=TENTACLE_JS; ?>CodeMirror-2.22/mode/javascript/javascript.js"></script>
								<script src="<?=TENTACLE_JS; ?>CodeMirror-2.22/mode/clike/clike.js"></script>
								<script src="<?=TENTACLE_JS; ?>CodeMirror-2.22/mode/php/php.js"></script>
								<script src="<?=TENTACLE_JS; ?>CodeMirror-2.22/mode/htmlmixed/htmlmixed.js"></script>

								<p>
									<textarea id="code" name="content" cols="40" rows="5" placeholder='Content' class='CodeMirror-scroll'><?= stripslashes($get_page->content) ?></textarea>
								</p>

								<script>
									var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
										lineNumbers: true,
										theme: "default",
										mode: "text/html",
										onCursorActivity: function() {
											editor.setLineClass(hlLine, null);
											hlLine = editor.setLineClass(editor.getCursor().line, "activeline");
										},
							 			onKeyEvent: function(cm, e) {
											// Hook into ctrl-space
											if (e.keyCode == 32 && (e.ctrlKey || e.metaKey) && !e.altKey) {
												e.stop();
												return CodeMirror.simpleHint(cm, CodeMirror.javascriptHint);
											}
										}
									});
									var hlLine = editor.setLineClass(0, "activeline");
								</script>
							<? endif; ?>
							<div class="clear"></div>
							<div id="scaffold">
								<?
								define( 'SCAFFOLD' , 'TRUE' );

								if ( $get_page->template != '' && $get_page->template != 'default' ) {

									// Load the saved template, then if the user changes override the saved template.
									include(THEMES_DIR.'/default/'.$get_page->template.'.php');

									//load::library ( 'file' );

									$scaffold = new Scaffold ();
									$scaffold->populateThis( $scaffold_data, $get_page_meta );
								}
								?>
								<div class="clear"></div>
							</div>
						</div>
						<div id="options" class="tab-pane">
							<fieldset>
								<div class="clearfix">
									<label>Breadcrumb title</label>
									<div class="input">
										<input type="text" placeholder="Edit title" name='bread_crumb' value='<?= $get_page_meta->bread_crumb ?>' />
										<span class="help-block">This title will appear in the breadcrumb trail.</span>
									</div>
								</div>
								<div class="clearfix">
									<label>Meta Keywords</label>
									<div class="input">
										<input type="text" placeholder="Keywords" name='meta_keywords' value='<?= $get_page_meta->meta_keywords ?>' />
										<span class="help-block">Separate each keyword with a comma ( , )</span>
									</div>
								</div>
								<div class="clearfix">
									<label>Meta Description</label>
									<div class="input">
										<textarea name="meta_description" cols="40" rows="5" placeholder='Enter your comments here...'><?= $get_page_meta->meta_description ?></textarea>
										<span class="help-block">A short summary of the page's content</span>
									</div>
								</div>
								<div class="clearfix">
									<label>Tags</label>
									<div class="input">
										<input type="text" class="tags" name="tags" id="tags" value='<?= $tag_relations ?>' />
										<span class="help-block">Separate each keyword with a comma ( , )</span>
									</div>
								</div>
<? /*
								<div class="clearfix">
									<label>Meta Robot Tags</label>
									<div class="input">
										<ul class="inputs-list">
											<li>
												<label>
													<input type="checkbox" name='meta_robot[]' value='no_index'>
													Noindex: Tell search engines not to index this webpage.</label>
											</li>
											<li>
												<label>
													<input type="checkbox" name='meta_robot[]' value='no_follow'>
													Nofollow: Tell search engines not to spider this webpage.</label>
											</li>
										</ul>
									</div>
								</div>
								<div class="clearfix">
									<label>Discussion</label>
									<div class="input">
										<ul class="inputs-list">
											<li>
												<label>
													<input type="checkbox" name='discussion[]' value='discussion'>
													Allow comments</label>
											</li>
											<li>
												<label>
													<input type="checkbox" name='discussion[]' value='trackback'>
													Allow trackbacks and pingbacks on this page.</label>
											</li>
										</ul>
									</div>
								</div>
*/ ?>
							</fieldset>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<!-- #wrap -->
<? load::view('admin/template-footer');?>