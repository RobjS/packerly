<?php

class PackerlySearch 
{
	public function __construct() {
		add_action('get_footer', array($this, 'register_and_enqueue_scripts'));
		add_action('get_footer', array($this, 'get_terms_and_pass_to_script'));
	}
	
	public function register_and_enqueue_scripts() {
		wp_register_script('jQuery', plugin_dir_url( __FILE__ ).'scripts/jquery-1.12.1.js');
		wp_register_script('packerly-search', plugin_dir_url( __FILE__ ).'scripts/packerly-search.js','jQuery');		
		wp_enqueue_script('jQuery');
		wp_enqueue_script('packerly-search');
	}
	
	public function get_terms_and_pass_to_script() {
		$parent_climate_budget_terms = self::get_top_level_terms_by_termset('climate-budget');
		self::pass_termsets_to_scripts($parent_climate_budget_terms, 'climates');
		foreach ($parent_climate_budget_terms as $parent_term) {
			$terms_list = self::get_child_terms($parent_term);
			self::pass_termsets_to_scripts($terms_list, $parent_term->slug);
		}
		$gender_terms = self::get_top_level_terms_by_termset('gender');
		self::pass_termsets_to_scripts($gender_terms,'gender');
	}
	
	public function get_top_level_terms_by_termset($termSet) {
		$args = array(
			hide_empty => 0,
			parent     => 0,
		);
		$top_level_term_list = get_terms($termSet, $args);
		return $top_level_term_list;
	}
	
	public function get_child_terms($term) {
		$args = array(
			child_of   => $term->term_id,
			hide_empty => 0
		);
		$terms_list = get_terms($term->taxonomy, $args);
		return $terms_list;
	}
	
	public function pass_termsets_to_scripts($term_set_obj, $obj_name_for_js) {
		wp_localize_script('packerly-search', $obj_name_for_js, $term_set_obj);
	}
	
}

$packerlySearch = new PackerlySearch();

?>