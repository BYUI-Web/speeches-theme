<?php 
$facebook = get_post_meta($speaker_id, "facebook", true);
$twitter = get_post_meta($speaker_id, "twitter", true);
$google_plus = get_post_meta($speaker_id, "google_plus", true);
$website = get_post_meta($speaker_id, "website", true);
?>

<div class="speaker-social">
    <?php
        if (!empty($facebook)) {
            echo "<p><a href='$facebook' target='_blank'>Follow on Facebook</a></p>";
        }
        if (!empty($twitter)) {
            echo "<p><a href='$twitter' target='_blank'>Follow on Twitter</a></p>";
        }
        if (!empty($google_plus)) {
            echo "<p><a href='$google_plus' target='_blank'>Follow on Google+</a></p>";
        }
        if (!empty($website)) {
            echo "<p><a href='$website' target='_blank'>My Website</a></p>";
        }
    ?>
</div>