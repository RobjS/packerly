<?php
class PackerlyTaxonomies 
{	
	public function __construct() 
	{
		add_action('init', array($this, 'create_climate_budget_taxonomy'));
		add_action('init', array($this, 'create_gender_taxonomy'));
	}
		 	
	public function create_climate_budget_taxonomy() 
	{
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'              => _x('Climate/budget', 'taxonomy general name'),
			'singular_name'     => _x('Climate/budget', 'taxonomy singular name'),
			'search_items'      => __('Search Climate/budget'),
			'all_items'         => __('All Climate/budgets'),
			'parent_item'       => __('Parent Climate/bidget'),
			'parent_item_colon' => __('Parent Climate/bidget:'),
			'edit_item'         => __('Edit Climate/budget'),
			'update_item'       => __('Update Climate/budget'),
			'add_new_item'      => __('Add New Climate/budget'),
			'new_item_name'     => __('New Climate/budget Name'),
			'menu_name'         => __('Climate/budget'),
		);		
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'climate-budget'),
		);
		register_taxonomy('climate-budget', array('clothing'), $args);
	}
	
	public function create_gender_taxonomy() 
	{
		$labels = array(
			'name'              => _x('Gender', 'taxonomy general name'),
			'singular_name'     => _x('Gender', 'taxonomy singular name'),
			'all_items'         => __('All Genders'),
			'edit_item'         => __('Edit Gender'),
			'update_item'       => __('Update Gender'),
			'add_new_item'      => __('Add New Gender'),
			'new_item_name'     => __('New Gender'),
			'menu_name'         => __('Gender'),
		);	
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'gender'),
		);
		register_taxonomy('gender', array('clothing'), $args);
	}
}
 
$packerlyTaxonomies = new PackerlyTaxonomies();

?>
