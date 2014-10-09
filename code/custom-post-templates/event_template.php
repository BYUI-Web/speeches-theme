<?php
ini_set('display_errors',1);  error_reporting(E_ALL);
// Include Model
require_once 'event_model.php';

$current_post = get_post(get_the_ID());
$current_post_type = get_post_type();


//initialize all meta variables
$meta = get_post_meta(get_the_ID());
//loop through meta and create variables with the name of the key
foreach($meta as $key => $value) { ${$key} = $value[0]; }

$presenters = array_map("get_post",explode(",", $presenters));

?>

<?php get_header(); ?>
<div class="row">
    <div class="col-xs-12 col-sm-8">
        <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <?php include_once(__DIR__.'/../partials/event_media.php'); ?>
            <?php include_once(__DIR__.'/../partials/transcript_discuss.php'); ?>
        </div>
    </div>
    <aside class="col-xs-12 col-sm-4 event-sidebar">
        <div class="aside-holder">
            <?php include __DIR__."/../partials/event-sidebar/event-details.php"; ?>
            <?php include __DIR__."/../partials/event-sidebar/speaker-bio.php"; ?>
            <?php include __DIR__."/../partials/event-sidebar/featured-speeches.php"; ?>
            <?php include __DIR__."/../partials/event-sidebar/on-topic.php"; ?>
            <?php include __DIR__."/../partials/event-sidebar/other-speeches.php"; ?>
        </div>
    </aside>
</div>
<script src="<?php bloginfo('template_url') ?>/assets/js/theme/mediaDisplay.js"></script>
<?php get_footer(); ?>