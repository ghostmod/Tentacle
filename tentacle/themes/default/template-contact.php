<?
 /*
Name: Contact
URI: http://tcms.me/
Description: This is the Tentacle default theme.
Author: Tentacle
Version: 1.0
License: GNU General Public License
License URI: license.txt
*/
$scaffold_data = array(	'display' => 'front' );

if( !defined( 'SCAFFOLD' ) ):

	// Send an email to the admin contact.
	if ( $_POST ) {
		$messageBody 		= ''; 
		$subject 			= $_POST['subject'];

		$name 				= $_POST['name'];
		$email	 			= $_POST['email'];
		$message		 	= $_POST['message'];
	
		$to 				= get_option('admin_email');
	
		$messageBody .= 	"<h4>From:</h4> ".$name ." @ <a href='$email'>$email</a>";

	    $messageBody .= 	"<br /><br />";
	    $messageBody .= 	"<h3>Message:</h3>";
	    $messageBody .= 	$message;
	
		// Release the hounds!
		$mail = new email( );
		$mail->to( $to );
		$mail->from( $name .'<'.$email.'>' );
		$mail->subject( $subject  );
		$mail->content( $messageBody );
		$mail->send( );

		note::set( 'success','sent_message','Thanks!' );
	}

load_part('header',array('title'=>$data->title, 'assets'=>'default')); ?>
<?php if( $note = note::get('sent_message') ): ?>
	<div class="alert alert-success">
		<h3 class="<?= $note['type']; ?>"><?= $note['content'];?></h3>
	</div>
<?php endif; ?>
<div class="row-fluid">
	<div class="span3">
		<div class="well sidebar-nav">
			<? load_part( 'sidebar' ); ?>
		</div><!--/.well -->
	</div><!--/span3-->
	<div class="span9">
		<div class="hero-unit">
			
			<h1><?= $data->title; ?></h1>
			<?= stripslashes( $data->content ); ?>
			<form action="<?= HISTORY  ?>" method="post" accept-charset="utf-8" class="form-horizontal" name="contact">
				<input type="hidden" name="history" value="<?= HISTORY  ?>"/>
				<fieldset>
					<hr />
		          <div class="control-group">
		            <label class="control-label" for="name">Full Name</label>
		            <div class="controls">
		              <input type="text" class="input-xlarge" id="name" name="name" required />
		            </div>
		          </div>
		          <div class="control-group">
		            <label class="control-label" for="email">Email</label>
		            <div class="controls">
		              <input type="email" class="input-xlarge" id="email" name="email" required />
		            </div>
		          </div>
		          <div class="control-group">
		            <label class="control-label" for="subject">Subject</label>
		            <div class="controls">
		              <input type="text" class="input-xlarge" id="subject" name="subject" required />
		            </div>
		          </div>
		          <div class="control-group">
		            <label class="control-label" for="message">Message</label>
		            <div class="controls">
		              <textarea class="input-xlarge" id="message" name="message" rows="3" required></textarea>
		            </div>
		          </div>
		          <div class="form-actions">
		            <button type="submit" class="btn btn-primary">Send!</button>
		          </div>
		        </fieldset>
			</form>
		</div><!-- /hero-unit -->
	</div><!--/span9-->
</div><!--/row-->

<? load_part('footer'); ?> 

<? endif; ?>