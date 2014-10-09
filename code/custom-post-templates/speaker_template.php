<?php get_header(); ?>

<?php
/*
 * Variables for this post
 */
ini_set('display_errors',1);  error_reporting(E_ALL);

$speaker = get_post();

$bio = wpautop($speaker->speaker_bio);
?>
<div class="row speaker-wrapper">
   <?php include __DIR__."/../partials/speaker/speaker-left-aside.php"; ?>
    <div class="col-xs-12 col-md-9 speaker-bio-wrapper">
        <div class="speaker-name">
            <h2>
                <?php echo $speaker->post_title; ?>
            </h2>
        </div>
        <div class="speaker-bio">
            <?php echo $bio; ?>
        </div>
        <?php include __DIR__."/../partials/speaker/from-this-speaker.php"; ?>
    </div>
</div>
<?php get_footer(); ?>
