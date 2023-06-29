<?php

/*
Plugin Name: Mekatron Random Expressions
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: Producing and showing random expressions
Version: 1.0
Author: Muhammmad Reza Heidary
Author URI: https://mekatronik.ir/
License: MIT
*/

// Security check for users with different access levels
defined('ABSPATH') || exit;

define('MEKATRON_RANDOM_EXPRESSIONS_LIBS', plugin_dir_path(__FILE__).'libs/');

include(MEKATRON_RANDOM_EXPRESSIONS_LIBS.'expressions.php');

function mekatron_random_expression_style() {
//    ?><!--<style>--><?php //include(MEKATRON_RANDOM_EXPRESSIONS_LIBS.'styles.css');?><!--</style>--><?php
    wp_enqueue_style( 'mekatron-random-expressions-styles', plugins_url( 'libs/styles.css', __FILE__ ), false, '1.0', 'all' );
}
function mekatron_random_expression_content() {
    global $mekatron_random_expressions;
    $mekatron_random_chosen_expression = $mekatron_random_expressions[rand(0, count($mekatron_random_expressions) - 1)];
    include(MEKATRON_RANDOM_EXPRESSIONS_LIBS.'body.html');
}

add_action('wp_head', 'mekatron_random_expression_style');
add_action('wp_footer', 'mekatron_random_expression_content');