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
    <br>
    <!--
    <div class="filters">
        <label for="">Browse by: </label>
        <a href="javascript:void(0)" onclick="dispDate()" id="dispDate">Date</a>
        <a href="javascript:void(0)" onclick="dispSpeaker()" id="dispSpeaker">Speaker</a>
        <a href="javascript:void(0)" onclick="dispTopic()" id="dispTopic">Topic</a>
    </div>-->
</div>
<script type="text/javascript">
    posts = [];
    <?php
    foreach ($speechesarchive as $id)
        echo 'posts.push({ "id":'.$id.', "postType":"'. get_post_type( $id ) .'", "month":"'. date( 'F', get_post_meta($id, 'event_date', true)) .'", "year":"'.date( 'Y', get_post_meta($id, 'event_date', true)).'"});';
    ?>
    function updateDateList() {
        var toShow = jQuery.grep(posts, function( a ) {
            var postType = (document.getElementById('post_type').value == 'all') ? true : false;
            return ( (document.getElementById('post_type').value == a.postType || postType) );
        });
        for (i in posts) {
            document.getElementById('post-' + posts[i].id).style.display="none";
        }
        for (i in toShow) {
            document.getElementById('post-' + toShow[i].id).style.display="block";
        }
    }
    function speechesFilter() {
        var toShow = jQuery.grep(posts, function( a ) {
            var postType = (document.getElementById('post_type').value == 'all') ? true : false;
            return ( (document.getElementById('post_type').value == a.postType || postType) );
        });
        for (i in posts) {
            document.getElementById('post-' + posts[i].id).style.display="none";
        }
        for (i in toShow) {
            document.getElementById('post-' + toShow[i].id).style.display="block";
        }
    }
</script>

<div class="row">
    
    <div class="col-xs-12 col-sm-8">
        <div class="running-filter"><a href="#" class="remove-filter-x"></a> <span class="temp-caption">Devotionals</span></div>
        <div class="running-filter"><a href="#" class="remove-filter-x"></a> <span class="temp-caption">Book of Mormon</span></div>
        <div class="running-filter"><a href="#" class="remove-filter-x"></a> <span class="temp-caption">Clark, Kim B.</span></div>
        <div class="running-filter"><a href="#" class="remove-filter-x"></a> <span class="temp-caption">Eager, Drew</span></div>
        <div class="running-filter"><a href="#" class="remove-filter-x"></a> <span class="temp-caption">January 2012 to April 2014</span></div>

        <div class="archive-results">
            <div class="result-count">2 RESULTS FOUND</div>
            <div class="devotional result">
                <a href="#" class="result-header"><span class="result-type">Devotional</span>: March 14th, 2014</a>
                <div class="result-title">The Book of Mormon</div>
                <div class="result-presenter">Drew Eager</div>
                <div class="result-presenter-title">Business Management Faculty</div>
            </div>
            <div class="forum result">
                <a href="#" class="result-header"><span class="result-type">University Forum</span>: January 5th, 2013</a>
                <div class="result-title">Scripture Study</div>
                <div class="result-presenter">Kim B. Clark</div>
                <div class="result-presenter-title">President of BYU-Idaho</div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.onload = dispDate();
    window.onload = updateDateList();
</script>
<?php get_footer(); ?>