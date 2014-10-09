<?php 
$image = wp_get_attachment_image_src(get_post_thumbnail_id());
if (!$image) {
    $image = get_bloginfo("template_url") . "/assets/images/photo-unavailable.jpg";
} else {
    $image = $image[0];
}
?>
   
<aside class="col-xs-12 col-md-3">
    <div class="speaker-image">
        <img src="<?php echo $image; ?>" alt="<?php echo $speaker->post_title; ?>'s Image" />
    </div>
    <?php include __DIR__. '/speaker_social.php'; ?>
</aside>