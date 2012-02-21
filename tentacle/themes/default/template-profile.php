<?
 /*
Name: Profile
URI: http://tcms.me/
Description: This is the Tentacle default theme.
Author: Tentacle
Version: 1.0
License: GNU General Public License
License URI: license.txt
*/

//@todo have help text (can be hidden in the admin area)
$scaffold_data = array(
	'display' => 'admin',
	'paged' => 'paged',
	'posts_per_page' => 2,
	'name' => array(				
		'name' => 'Name',
		#'label_name' => 'first_name', // Humanixe the name
		'input' => 'input',
		'type' => 'text',
		'notes' => 'This is a note'
		),
	'country' => array(
		'name' => 'Country',
		#'label_name' => 'first_name', // Humanixe the name
		'input' => 'input',
		'type' => 'text',
		'notes' => 'This is a note'
		),
	'twitter' => array(
		'name' => 'Twitter',
		#'label_name' => 'first_name', // Humanixe the name
		'input' => 'input',
		'type' => 'text',
		'notes' => 'This is a note'
		),
	);
// If SCAFFOLD is not set then display the theme content. 
// If SCAFFOLD is set then the admin side will render the $scaffold_data array
if( !defined( 'SCAFFOLD' ) ): ?>
	<? load_part('header',array('title'=>$data->title, 'assets'=>'default'));?>
<div class="row-fluid">
	<div class="span3">
		<div class="well sidebar-nav">
			<? load_part( 'sidebar' ); ?>
		</div><!--/.well -->
	</div><!--/span3-->
	<div class="span9">
		<div class="hero-unit">
			<h1><?= $data->title; ?></h1>
			<h2><?= $get_page_meta->name ?></h2>
			<h3>From <?= $get_page_meta->country ?></h3>
			<?= stripslashes( $data->content ); ?>
			<p>Follow me <a href="http://www.twitter.com<?= $get_page_meta->twitter ?>">@<?= $get_page_meta->twitter ?></a></p>
		</div><!-- /hero-unit -->
	</div><!--/span9-->
</div><!--/row-->
<? load_part('footer'); ?> 
<? endif; ?>