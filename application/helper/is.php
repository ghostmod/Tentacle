<?
/**
* File: Is
*/

	
	/**
	* Function: is_blog_installed
	*	Simply checks to see if the blog is installed.
	*
	* Returns:
	*	Bool
	*/
	function is_blog_installed() {
		if ( get_option( 'is_blog_installed' ) ) {
			return true;
		} else {
			return false;
		}
	}
	
	
	/**
	* Function: is_agree
	*	Has the owner agreed to the terms and services.
	*
	* Returns:
	*	Bool
	*/
	function is_agree() {
		if ( get_option( 'is_agree' ) ) {
			return true;
		} else {
			return false;
		}
	}
	
	
	/**
	* Function: is_mobile
	*	Is the page being viewed with a mobile device?
	*
	* Returns:
	*	Bool
	*/
	function is_mobile() 
	{
		$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
		$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
		$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
		$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
		$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");

		if ($iphone || $android || $palmpre || $ipod || $berry == true) 
		{ 
			return true;
		} else {
			return false;
		}
	}
	
	
	function is_rtl() {}
	function is_front_page() {}
	function is_home() {}
	function is_date() {}
	function is_search() {}
	function is_paged() {}
	function is_page() {}
	function is_page_template() {}
	function is_404() {}
	function is_error() {}
	function is_single() {}
	function is_archive() {}
	function is_post_type_archive() {}
	function is_author() {}
	function is_user_logged_in() {}
	function is_category() {}
	function is_tag() {}
	function is_tax() {}
	function is_admin_bar_showing() {}