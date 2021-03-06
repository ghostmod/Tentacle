<? load::view('admin/templates/template-login-header', array('title' => 'Login', 'assets' => 'marketing'));?>
<div id="login-header">
	<a href="<?=BASE_URL;?>">← Back to site name</a>
</div>
<?php if( $note = note::get('sent_message') ): ?>
	<div class="alert alert-success">
		<h3 class="<?= $note['type']; ?>"><?= $note['content'];?></h3>
	</div>
<?php endif; ?>
<div id="login-content">
	<div id="login-logo">
		<a href="<?=BASE_URL;?>"><img src="<?=BASE_URL;?>tentacle/admin/images/tentacle_logo_large.png" width="258" height="63" alt="Tentacle" /></a>
	</div>
	<form action="<?= BASE_URL ?>action/login/" method="post">
		<dl>
			<dd>
				<input type='text' id='username' name='username' placeholder='Username' />
			</dd>
			<dd>
				<input type='password' id='password' name='password' placeholder='Password' />
			</dd>
			<dd>
				<a href="<?= BASE_URL ?>admin/lost/" class="pull-left forgot secondary">Lost password</a><input type="submit" value="Sign in" class="btn btn-primary btn-large pull-right" />
			</dd>
		</dl>
		<?php if($note = note::get('session')): ?>
			<input type='hidden' name='history' value="<?= $note['content'];?> " />
		<?php endif;?>
	</form>
</div>
<!-- #login-content -->
</div> <!-- #login-content -->
<? load::view('admin/templates/template-login-footer');?>