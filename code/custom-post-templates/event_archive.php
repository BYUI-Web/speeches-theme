<?php 
ini_set('display_errors',1);  error_reporting(E_ALL);
// Include Model
require_once 'event_model.php';

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
<script src="<?php bloginfo("template_url"); ?>/assets/js/theme/archive.js"></script>
<?php get_footer(); ?>