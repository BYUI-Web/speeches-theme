<?php
ini_set('display_errors',1);  error_reporting(E_ALL);

require_once 'custom-post-templates/event_model.php';

?>

<?php get_header(); ?>

<?php 

require_once('custom-post-templates/home.php');

?>

<?php get_footer(); ?>