<?php

class PackerlyPosts  
{
	public function __construct() 
	{
		add_action('init', array($this, 'create_clothing_posttype'));
		add_action('init', array($this, 'create_electrical_items_posttype'));
		add_action('init', array($this, 'create_care_items_posttype'));
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
	
	public function create_electrical_items_posttype() 
	{
		register_post_type('Electrical items',
		// CPT Options
			array(
				'labels' => array(
					'name' => __('Electrical items'),
					'singular_name' => __('Electrical item')
				),
				'public' => true,
				'has_archive' => false,
				'rewrite' => array('slug' => 'electrical-items')
			)
		);
	}
	
	public function create_care_items_posttype() 
	{
		register_post_type('Care items',
		// CPT Options
			array(
				'labels' => array(
					'name' => __('Care items'),
					'singular_name' => __('Care item')
				),
				'public' => true,
				'has_archive' => false,
				'rewrite' => array('slug' => 'care-items')
			)
		);
	}	
}

$packerlyPosts = new PackerlyPosts();

?>