<?php
$facebook = $speaker->facebook;
$twitter = $speaker->twitter;
$google_plus = $speaker->google_plus;
$website = $speaker->website;
?>

<?php if (!empty($facebook) || !empty($twitter) || !empty($google_plus) || !empty($website)) : ?>
    <div class="connect speech-box">
        <h3>Connect</h3>
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
    </div>
<?php endif; ?>