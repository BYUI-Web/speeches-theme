<?php get_header(); ?>

<?php
/*
 * Variables for this post
 */

$id = get_the_ID();
$speaker_id = $id;
$speakerName = get_the_title();
$image = wp_get_attachment_image_src(get_post_thumbnail_id());
if (!$image) {
    $image = get_bloginfo("template_url") . "/assets/images/photo-unavailable.jpg";
}
$bio = wpautop(get_post_meta($id, "speaker_bio", true));
$speaker_posts = getPostsBySpeaker($id);
?>
<div class="container">
<div class="row speaker-wrapper">
    <div class="col-xs-12 col-md-3">
        <div class="speaker-image">
            <img src="<?php echo $image; ?>" alt="<?php echo $speakerName; ?>'s Image"/>
        </div>
        <?php require_once __DIR__.'/../partials/speaker_social.php'; ?>
    </div>
    <div class="col-xs-12 col-md-9 speaker-bio-wrapper">
        <div class="speaker-name">
            <h2>
                <?php echo $speakerName; ?>
            </h2>
        </div>
        <div class="speaker-bio">
            <?php echo $bio; ?>
        </div>
        <section class="speaker-speeches">
            <div class="speech-box">
                <h3>FROM THIS SPEAKER</h3>
                <?php if (is_array($speaker_posts)) : ?>
                    <ul class="speaker-speeches-list">

                        <?php foreach ($speaker_posts as $post) : ?>
                            <?php
                            $post_title = get_the_title($post);
                            $post_date = get_post_meta($post, "event_date");
                            $post_date = $post_date[0];
                            $url = get_permalink($post);
                            $transcript = get_post_meta($post, "transcript");
                            $transcript_snippet = substr($transcript[0], 0, 150);
                            ?>
                            <li class="row">
                                <div class="speaker-post-date col-xs-2">
                                    <p class="speaker-post-day"><?php echo date("d", $post_date); ?></p>
                                    <p class="speaker-post-my"><?php echo date("M Y", $post_date); ?></p>
                                </div>
                                <div class="col-xs-10">
                                    <a href="<?php echo $url; ?>" class="speaker-post-title"><?php echo $post_title; ?></a>
                                    <blockquote class="speaker-post-snip"><?php echo $transcript_snippet; ?>...</blockquote>
                                </div>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                <?php else: ?>
                    <?php echo $speaker_posts; ?>
                <?php endif; ?>
            </div>
        </section>
    </div>
</div>
</div>
<?php get_footer(); ?>
