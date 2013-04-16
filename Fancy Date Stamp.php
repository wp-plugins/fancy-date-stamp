<?php
/**
 * @package Fancy Date Stamp
 * @version 0.3
 */
/*
Plugin Name: Fancy Date Stamp
Description: This provides you with a nice way of displaying the date in your posts. This took a whole day *sigh* amateur hour.
Version: 0.3
Author: Mark Coker
License: None (Open Domain)
*/
add_action( 'init', 'register_shortcodes');

function register_shortcodes(){
	add_shortcode('date-stamp', 'insert_date_stamp');
}

function stylesheet(){
$style="<style type='text/css'>
	@import url(http://fonts.googleapis.com/css?family=Amaranth);

	.entry-title {
		display: none;
		padding-top: 0;
	}
	.entry-meta {
		display: none;
	}
	.post-header{
		clear: both;
		float: left;
		margin-left: 0;
		width: 100%;
		display: block;
	}
	.stamp-container {
		clear: both;
		float: left;
		margin-left: 0;
		width: auto;
		display: block;

		background: transparent url('".	plugins_url( 'images/strips.jpg' , __FILE__ )."') 100% 0 repeat-y;
		width: 25px;
		padding-right:15px;
	}
	.day {	
		font-size: 26px;
		font-family: 'Amaranth', sans-serif;
		color: #DD1870;
		line-height: 18px;
		margin-top: 3px;
	}

	.month {
		color: #000;
		display: block;
		font-size: 13px;
		font-family: 'Amaranth', sans-serif;
	}
	.post-title {
		position: relative;
		left:10px;
		font-family: 'Amaranth', sans-serif;	
		color: #444766;
		font-size:24px;
		line-height: 24px;
	}
	.categories {
		position: relative;
		left:10px;
		color: #000;
		font-size: 10px;
		line-height: 9px;
		font-family: 'Amaranth', sans-serif;
		text-transform: uppercase;
	}	

	.categories a{	
		color: #DD1870;
	}
	.categories a:hover, a:active {
		color: #000;
	}

	</style>";
return $style;
}

function getmonth(){
	$mon = date("m");
	switch ($mon){
		case 1:
			$month = "JAN";
			break;
		case 2:
			$month = "FEB";
			break;
		case 3:
			$month = "MAR";
			break;
			case 4:
			$month = "APR";
			break;
		case 5:
			$month = "MAY";
			break;
		case 6:
			$month = "JUN";
			break;	
		case 7:
			$month = "JUL";
			break;	
		case 8:
			$month = "AUG";
			break;	
		case 9:
			$month = "SEP";
			break;	
		case 10:
			$month = "OCT";
			break;	
		case 11:
			$month = "NOV";
			break;	
		case 12:
			$month = "DEC";
			break;	
		default:
	        $month = "error!";
	}
return $month;
}

function categories(){
	$categories = get_the_category();
	$spacer= ' ';
	$list= '';
	if($categories){
		foreach($categories as $category) {
			$list .= '<a class"categories" href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$spacer;
		}
	$categories_output = trim($list);
	}
return $categories_output;
}

function insert_date_stamp() {
	
	$tday = date("d");
	$return_string .= "".stylesheet()."
		<div class='post-header'>
		<div class='stamp-container'>
			<span class = 'day'>".$tday."</span>
			<span class ='month'>".getmonth()."</span></div>
		<div class = 'post-title'>".get_the_title()."</div>
			<small class = 'categories'>categories: ".categories()."</small>
		</div>";
	 
	return $return_string;

}
	

?>