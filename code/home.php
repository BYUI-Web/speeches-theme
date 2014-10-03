<?php

require_once 'custom-post-templates/event_model.php';
$multiversion_testing_key = htmlspecialchars($_GET["v"]);

//get the most popular speeches
$args = array("post_type" => array("devotional", "forum"), 
    "orderby" => "views", 
    'meta_key' => 'pageviews',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'posts_per_page' => 3);

$popularLoop = new WP_Query( $args );

$upcoming_events = getUpcoming(array("devotional", "forum"));

//get the most recent speeches
$args = array(
    'post_type' => array("devotional", "forum"),
    'meta_key' => 'event_end_time',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'meta_query' => array(
        array(
            'key' => 'event_end_time',
            'value' => strtotime('now'),
            'compare' => '<',
            'type' => 'NUMERIC'
            )
        ),
    ); 

$recentLoop = new WP_Query( $args );
?>

<?php get_header(); ?>

<?php 
// A/B Testing Functionality
$homepage_version = "";

switch ($multiversion_testing_key) {
    case 1:
        $homepage_version = "version_1.php";
        break;
    case 2:
        $homepage_version = "version_2.php";
        break;
    default:
        $homepage_version = "old.php";
        break;
}

require_once('partials/homepage_partials/'.$homepage_version);

?>

<?php get_footer(); ?>