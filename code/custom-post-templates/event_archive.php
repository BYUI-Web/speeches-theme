<?php 

// Include Model
require_once 'event_model.php';
$speechesarchive = array();
$speakersarchive = array();
$now = strtotime('now');
$speeches_args = array(
	'post_type' => 'devotional',
	'meta_key' => 'event_date',
	'orderby' => 'meta_value_num',
	'order' => 'ASC'
	); 
$speakers_args = array(
	'post_type' => 'speaker',
	'meta_key' => 'last_name',
	'orderby' => 'meta_value',
	'order' => 'ASC'
	); 
$loop = new WP_Query( $speeches_args );
if ($loop->have_posts()) {
	while ($loop->have_posts()) { 
		$loop->the_post();
		array_push($speechesarchive, get_the_ID());
	}
}

$loop = new WP_Query( $speakers_args );
if ($loop->have_posts()) {
	while ($loop->have_posts()) { 
		$loop->the_post();
		array_push($speakersarchive, get_the_ID());
	}
}
get_header();
?>
<div class="archive-header group">
    <div class="archive-header-banner">
        <h1>Speeches Archive</h1>
    </div>
</div>

<div class="row">
    <?php include __DIR__."/../partials/archive/filters.php"; ?>
    <div class="col-xs-12 col-sm-8">
        <div class="running-filter"><a href="#" class="remove-filter-x"></a> <span class="temp-caption">Devotionals</span></div>
        <div class="running-filter"><a href="#" class="remove-filter-x"></a> <span class="temp-caption">Book of Mormon</span></div>
        <div class="running-filter"><a href="#" class="remove-filter-x"></a> <span class="temp-caption">Clark, Kim B.</span></div>
        <div class="running-filter"><a href="#" class="remove-filter-x"></a> <span class="temp-caption">Eager, Drew</span></div>
        <div class="running-filter"><a href="#" class="remove-filter-x"></a> <span class="temp-caption">January 2012 to April 2014</span></div>

        <?php include __DIR__."/../partials/archive/results.php"; ?>
    </div>
</div>
<?php get_footer(); ?>