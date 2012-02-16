<?php

class page_controller {
	
    public function index( $uri = "" ){

		load::library ('file');
		$scaffold = new Scaffold ();
		
		$uri = trailingslashit( $uri );
		
		if ( URI == '' || $uri == 'home'):
			$uri = 'home/';
		else:
			$uri = trailingslashit( URI );
		endif;
		
		require_once( PATH_URI.'/functions.php' );
		
		$page = load::model ( 'page' );
		$content = $page->get_by_uri( $uri );

		tentacle::render ( $content->template, array ( 'data' => $content ) );
		
		if(user::valid()) load::helper ('adminbar');
		
        }// END index
    
} // END Class page

?> 