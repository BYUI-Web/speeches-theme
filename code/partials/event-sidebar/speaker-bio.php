<div class="sidebar-inner group speaker-bio">
    <?php foreach ($presenters as $person) : ?>
        <h3>Speaker Bio</h3>
        <div class="group">
            <div class="sidebar-speaker-image"><?php 
                $speakerImage = get_the_post_thumbnail($person->post_id); 
                if ($speakerImage === "") {
                    $speakerImage = "<img src='" . get_bloginfo("template_url") . "/assets/images/photo-unavailable.jpg' />";
                }
                echo $speakerImage;
                ?></div>
            <div class="sidebar-speaker-info">
                <p class="sidebar-speaker__name"><?php echo $person->post_title; ?></p>
                <?php 
                $bio = substr($person->speaker_bio, 0, strpos(wordwrap($person->speaker_bio, 150),"\n"));
                ?>
                <p class="sidebar-speaker-meta"><?php echo $bio; ?> </p>
                <a class="read-more" href="<?php echo $person->guid; ?>">View More</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>