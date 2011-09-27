<?php
class action_controller {
	
	# All actions should return True of False and be treated accordingly.
	
	public function index ()
	{	
		echo 'No direct access';
	}
	
	public function login ()
	{
		$username = input::post ( 'username' );
	    $password = input::post ( 'password' );
	
		$history = input::post ( 'history' );

	    user::login($username, $password);

	    if(user::valid()) {
	        
			if ($history != '') {
				url::redirect($history);
			} else {
				url::redirect('admin/dashboard');
			}
			
	    } else {
	       note::set("error","login",NOTE_PASSWORD);
	       url::redirect('admin/index'); 
	    }
	}
	

	public function lost(){
 
    	$username = input::post('username');

	    $users_table = db('users');               
	    $user = $users_table->select('*')
	                    ->where('email','=',$username)
	                    ->execute();
            
	    if ( isset($user[0]->email)) {
	        // Generate a Hash from the users IP
       
	        $ip = $_SERVER['REMOTE_ADDR'];

	        $hashed_ip = sha1($ip.time());
       
	        $users_table->update(array(
	            'forgot_password'=>$hashed_ip
	            ))
	            ->where('email','=',$username)
	            ->execute();
       
	        // Attach that Hash to the users email address.
	        $mail = new email();
	        $mail->to($username);
	        $hash_address = BASE_URL.'user/reset/'.$hashed_ip;
	        // @todo get install admings email address
	        $mail->from('Tentacle');
	        $mail->subject('Missing Password');
	        $mail->content('<strong>Click the link to reset your password.</strong><br />'.$hash_address);
	        $mail->send();

	        note::set("error","forgot",NOTE_LOST);
       
	        url::redirect('/'); 
       
	    } else {
	        // @todo set lost password error message for not match
	        echo 'No match, Set an error message';
	    }

	} // END Function Action Login


	/*
	 * 
	 * 
	 * 
	 * ========================= Pages
	 * 
	 * 
	 * 
	 * 
	 */
 	public function add_page ()
 	{
		tentacle::valid_user();

		$page = load::model( 'page' );
		$page_single = $page->add( );
		
		$history = input::post ( 'history' );
		url::redirect($history); 
		
		// Should post back to edit page
	}
	
	/*
	 * 
	 * 
	 * 
	 * ========================= Posts
	 * 
	 * 
	 * 
	 * 
	 */
 	public function add_post ()
 	{
		// @todo: deal with an array for categorie values.
	
		tentacle::valid_user();
			
		$post = load::model( 'post' );
		$post_single = $post->add( );
		// we need the page ID before we can add any meta to the DB.
		$post_meta = $post->add_meta( $post_id );
		
		$history = input::post ( 'history' );
		//url::redirect($history); 
		
		// Should post back to edit page
	}	
	
	/*
	 * 
	 * 
	 * 
	 * ========================= Users
	 * 
	 * 
	 * 
	 * 
	 */
	public function add_user ()
	{
		tentacle::valid_user();
				
		$user = load::model( 'user' );
		$user_single = $user->add();

		$history = input::post ( 'history' );

		// Check for return True.
		// Log error

		url::redirect($history); 

	}
	
	public function update_user ( )
	{
		tentacle::valid_user();

		$user = load::model('user');
		$user_single = $user->update();
		
		$history = input::post ( 'history' );

		url::redirect($history); 
	}
	

	public function delete_user ( $id = '' )
	{
		tentacle::valid_user();
		
		$user = load::model( 'user' );
		$user_delete = $user->delete( $id );
		
		url::redirect('admin/users_manage/');
	}
	
	
	/*
	 * 
	 * 
	 * 
	 * ========================= Snippets
	 * 
	 * 
	 * 
	 * 
	 */
	public function add_snippet ()
	{	
		tentacle::valid_user();
			
		$snippet = load::model('snippet');
		$snippet_single = $snippet->add( );

		//$history = input::post ( 'history' );
		url::redirect('admin/snippets_manage/'); 
	}
	
	public function update_snippet ( $id )
	{
		tentacle::valid_user();
		
		$snippet = load::model('snippet');
		$snippet_single = $snippet->update( $id  );

		url::redirect('admin/snippets_manage/');
	}
	
	public function delete_snippet ( $id = '' )
	{
		tentacle::valid_user();
		
		$snippet = load::model('snippet');
		$snippet_delete = $snippet->delete( $id );
		
		url::redirect('admin/snippets_manage/');
	}
	
	
	/*
	 * 
	 * 
	 * 
	 * ========================= Categories
	 * 
	 * 
	 * 
	 * 
	 */
 	public function add_category ()
 	{	
		tentacle::valid_user()
		;	
 		$category = load::model( 'category' );
 		$category_single = $category->add( );
 
 		//$history = input::post ( 'history' );
 		url::redirect('admin/content_manage_categories/'); 
 	}
 	
 	public function update_category ( $id ) 
 	{
		tentacle::valid_user();
	
		$category = load::model( 'category' );
		$category_single = $category->update( $id  );

		url::redirect('admin/content_manage_categories/'); 
 	}
 	
 	public function delete_category ( $id ) 
 	{
		tentacle::valid_user()
		;
 		$category = load::model( 'category' );
 		$category_delete = $category->delete( $id );
 		
 		url::redirect('admin/content_manage_categories/'); 
  	}
	 
}