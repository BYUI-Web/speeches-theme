<?php 
ini_set('display_errors',1);  error_reporting(E_ALL);
// Include Model
require_once 'event_model.php';

get_header();
?>
<section class="archive">
    <div class="archive-header group">
        <div class="archive-header-banner">
            <h1>Speeches Archive</h1>
        </div>
    </div>

    <div class="row">
        <?php include __DIR__."/../partials/archive/filters.php"; ?>
        <div class="col-xs-12 col-sm-8">
            <?php include __DIR__."/../partials/archive/results.php"; ?>
        </div>
    </div>
    <script src="<?php bloginfo("template_url"); ?>/assets/js/theme/archive.js"></script>
</section>
<?php get_footer(); ?>