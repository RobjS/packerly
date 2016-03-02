<?php

class PackerlyPosts  
{
	public function __construct() 
	{
		add_action('init', array($this, 'create_clothing_posttype'));
	}
	
	public function create_clothing_posttype() 
	{
		register_post_type('Clothing',
		// CPT Options
			array(
				'labels' => array(
					'name' => __('Clothing'),
					'singular_name' => __('Clothing')
				),
				'public' => true,
				'has_archive' => false,
				'rewrite' => array('slug' => 'clothing')
			)
		);
	}
}

$packerlyPosts = new PackerlyPosts();

?>