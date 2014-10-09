<?php

$speaker_posts = getPostsBySpeaker($speaker->ID);
?>

<section class="speaker-speeches">
    <div class="speech-box">
        <h3>FROM THIS SPEAKER</h3>
        <?php if ($speaker_posts) : ?>
            <ul class="speaker-speeches-list">

                <?php foreach ($speaker_posts as $speech) : ?>
                    <?php   
                    $transcript_snippet = substr($speech->transcript, 0, 150);
                    ?>
                    <li class="row">
                        <div class="col-xs-10">
                            <a href="<?php echo $speech->guid; ?>" class="speaker-post-title"><?php echo $speech->post_title; ?></a>
                            <p class="event-date"><?php echo date("F d, Y", $speech->event_date); ?></p>
                        </div>
                    </li>
                <?php endforeach; ?>

            </ul>
        <?php else: ?>
            <?php echo "No speeches found."; ?>
        <?php endif; ?>
    </div>
</section>