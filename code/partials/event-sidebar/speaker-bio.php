<div class="sidebar-inner group speaker-bio">
    <?php foreach ($presenters as $person) : ?>
        <h3>Speaker Bio</h3>
        <div class="group">
            <div class="sidebar-speaker-image"><?php 
                $speakerImage = get_the_post_thumbnail($person); 
                if ($speakerImage === "") {
                    $speakerImage = "<img src='" . get_bloginfo("template_url") . "/assets/images/photo-unavailable.jpg' />";
                }
                echo $speakerImage;
                ?></div>
            <div class="sidebar-speaker-info">
                <h3><?php echo get_the_title($person); ?></h3>
                <?php 
                $string = get_post_meta($person, 'speaker_bio');
                $string = substr($string[0], 0, strpos(wordwrap($string[0], 150),"\n"));
                ?>
                <p class="sidebar-speaker-meta"><?php echo $string; ?> </p>
                <a class="read-more" href="<?php echo get_permalink($person) ?>">More</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>