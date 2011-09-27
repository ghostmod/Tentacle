<?php
class admin_controller {

	public function __construct() 
	{  
		//	echo "string";
	}
	
	public function index ()
	{
		if(user::valid()) { url::redirect('admin/dashboard'); }
		load::view ('admin/login');
	}
	
	
	public function logout ()
	{
		user::logout();
		url::redirect('admin/index');
	}


	public function lost(){
		load::view ('admin/lost');
	}


	public function dashboard ()
	{
		tentacle::valid_user();
		
		load::view ('admin/dashboard');
	}

	/*
	 * 
	 * 
	 * 
	 * ========================= Conent
	 * 
	 * 
	 * 
	 * 
	 */

	public function content_add_page ()
	{
		tentacle::valid_user();
		
		$category = load::model( 'category' );
		$categories = $category->get( );
		
		load::view ('admin/content/content_add_page');
	}

	public function content_manage_pages ()
	{
		tentacle::valid_user();
		
		$page = load::model( 'page' );
		$pages = $page->get( );
		
		$user = load::model('user'); 
		
		load::view ('admin/content/content_manage_pages', array( 'pages'=>$pages, 'user'=>$user ) );	
	}

	public function content_add_post ()
	{
		tentacle::valid_user();
		
		$category = load::model( 'category' );
		$categories = $category->get( );
		
		load::view ('admin/content/content_add_post', array( 'categories'=>$categories ) );
	}

	public function content_manage_posts ()
	{
		tentacle::valid_user();
				
		$post = load::model( 'post' );
		$posts = $post->get( );
		
		$category = load::model( 'category' );
		
		$user = load::model('user'); 
		
		load::view ('admin/content/content_manage_posts', array( 'posts'=>$posts, 'user'=>$user, 'category'=>$category ) );
	}

	public function content_manage_comments ()
	{
		tentacle::valid_user();
		
		load::view ('admin/content/content_manage_comments');
	}

	public function content_manage_categories ()
	{
		tentacle::valid_user();
		
		$category = load::model( 'category' );
		$categories = $category->get( );
		
		load::view ('admin/content/content_manage_categories', array( 'categories'=>$categories ) );	
	}
	
	public function content_category_edit ( $id = '' )
	{
		tentacle::valid_user();
		
		$category = load::model( 'category' );
		$category_single = $category->get( $id );
		
		load::view ('admin/content/content_category_edit', array( 'category'=>$category_single, 'id'=>$id ) );	
	}
	
	public function content_category_delete ( $id = '' )
	{
		tentacle::valid_user();
		
		$category = load::model( 'category' );
		$category_single = $category->get( $id );
		
		load::view ('admin/content/content_category_delete', array( 'category'=>$category_single, 'id'=>$id ) );	
	}
	
	/*
	 * 
	 * 
	 * 
	 * ========================= Menu
	 * 
	 * 
	 * 
	 * 
	 */

	public function menu_add ()
	{
		tentacle::valid_user();
		
		load::view ('admin/menu/menu_add');
	}

	public function menu_manage ()
	{
		tentacle::valid_user();
		
		load::view ('admin/menu/menu_manage');
	}

	/*
	 * 
	 * 
	 * 
	 * ========================= Media
	 * 
	 * 
	 * 
	 * 
	 */

	public function media_add ()
	{
		tentacle::valid_user();
		
		load::view ('admin/media/media_add');
	}

	public function media_manage ()
	{
		tentacle::valid_user();
		
		load::view ('admin/media/media_manage');
	}

	public function media_downloads ()
	{
		tentacle::valid_user();
		
		load::view ('admin/media/media_downloads');
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

	public function snippets_add ()
	{
		tentacle::valid_user();
		
		load::view ('admin/snippets/snippets_add');
	}

	public function snippets_manage ()
	{
		tentacle::valid_user();
		
		$snippet = load::model( 'snippet' );
		$snippets = $snippet->get( );
		
		load::view ('admin/snippets/snippets_manage', array( 'snippets'=>$snippets ) );	
	}
	
	public function snippets_edit ( $id = '' )
	{
		tentacle::valid_user();
		
		$snippet = load::model( 'snippet' );
		$snippet_single = $snippet->get( $id );
		
		load::view ('admin/snippets/snippets_edit', array( 'snippet'=>$snippet_single ) );
	}
	
	public function snippets_delete ( $id )
	{
		tentacle::valid_user();
		
		$snippet = load::model( 'snippet' );
		$snippet_single = $snippet->get( $id );

		load::view ('admin/snippets/snippets_delete', array( 'snippet'=>$snippet_single, 'id'=>$id ) );
	}
	
	/*
	 * 
	 * 
	 * 
	 * ========================= Addons
	 * 
	 * 
	 * 
	 * 
	 */

	public function addons_install ()
	{
		tentacle::valid_user();
		
		load::view ('admin/addons_install');
	}

	/*
	 * 
	 * 
	 * 
	 * ========================= Settings
	 * 
	 * 
	 * 
	 * 
	 */

	public function settings_appearance ()
	{
		tentacle::valid_user();

		$theme = load::helper ('theme');
		
		load::view ('admin/settings/settings_appearance', array('theme'=>$theme ));
	}

	public function settings_comments ()
	{
		tentacle::valid_user();

		load::view ('admin/settings/settings_comments');
	}

	public function settings_export ()
	{
		tentacle::valid_user();

		load::view ('admin/settings/settings_export');
	}

	public function settings_general ()
	{
		tentacle::valid_user();

		load::view ('admin/settings/settings_general');
	}

	public function settings_seo ()
	{
		tentacle::valid_user();

		load::view ('admin/settings/settings_seo');
	}

	public function settings_seo_404 ()
	{
		tentacle::valid_user();

		load::view ('admin/settings/settings_seo_404');
	}

	public function settings_import ()
	{
		tentacle::valid_user();

		load::view ('admin/settings/settings_import');
	}

	public function settings_media ()
	{
		tentacle::valid_user();

		load::view ('admin/settings/settings_media');
	}

	public function settings_privacy ()
	{		
		tentacle::valid_user();

		load::view ('admin/settings/settings_privacy');
	}

	public function settings_reading ()
	{
		tentacle::valid_user();

		load::view ('admin/settings/settings_reading');
	}

	public function settings_writing ()
	{
		tentacle::valid_user();
	
		load::view ('admin/settings/settings_writing');
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

	public function users_add ()
	{
		tentacle::valid_user();

		load::view ('admin/users/users_add');
	}
	
	public function users_edit ( $id='' )
	{
		tentacle::valid_user();
		
		$user = load::model('user');
		$user_single = $user->get($id);
		$user_meta = $user->get_meta($id);

		load::view ( 'admin/users/users_edit', array( 'user'=>$user_single, 'user_meta'=>$user_meta ) );
	}

	public function users_manage ( )
	{
		tentacle::valid_user( );
		
		$user = load::model( 'user' );
		$users = $user->get( );
		
		load::view ( 'admin/users/users_manage', array( 'users'=>$users ) );
	}

	public function users_profile ( )
	{
		tentacle::valid_user( );

		$id = user::id( );

		$user = load::model( 'user' );
		$user_single = $user->get( $id );
		$user_meta = $user->get_meta( $id );

		load::view ( 'admin/users/users_profile', array( 'user'=>$user_single, 'user_meta'=>$user_meta ) );
	}
	
	public function users_delete ( $id )
	{
		tentacle::valid_user();
		
		$user = load::model( 'user' );
		$user_meta = $user->get_meta( $id );

		load::view ('admin/users/users_delete', array( 'user_meta'=>$user_meta, 'id'=>$id ) );
	}

	/*
	 * 
	 * 
	 * 
	 * ========================= SEO
	 * 
	 * 
	 * 
	 * 
	 */
	public function seo_webmaster_tools()
	{
		tentacle::valid_user();

		load::view ('admin/seo/seo_webmaster');
	}
	
	public function seo_analytics()
	{
		tentacle::valid_user();
		
		load::view ('admin/seo/seo_analytics');
	}
	
	public function seo_404 ()
	{
		tentacle::valid_user();
		
		load::view ('admin/seo/seo_404');
	}

	public function seo_canonical ()
	{
		tentacle::valid_user();
		
		load::view ('admin/seo/seo_canonical');
	}

	public function seo_meta_description ()
	{
		tentacle::valid_user();
		
		load::view ('admin/seo/seo_meta_description');
	}

	public function seo_meta_keywords ()
	{
		tentacle::valid_user();
		
		load::view ('admin/seo/seo_meta_keywords');
	}

	public function seo_robot ()
	{
		tentacle::valid_user();
		
		load::view ('admin/seo/seo_robot');
	}

	/*
	 * 
	 * 
	 * 
	 * ========================= About
	 * 
	 * 
	 * 
	 * 
	 */

	public function about_system_details ()
	{
		tentacle::valid_user();
		
		load::view ('admin/about_system_details');
	}

} // END Class main_controller