<div>
    <h3>Other <?php echo $current_post_type; ?>s</h3>
    <?php
    $loop = new WP_Query( array( 'post_type' => $current_post_type, "orderby" => "views") );
    while ( $loop->have_posts() ) : $loop->the_post(); 
        $meta = get_post_meta(get_the_ID());
        if (get_the_ID() == $current_post)
            continue;
        ?>
        <div>
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
            <p><?php echo getSpeaker(get_the_ID()); ?></p>
            <p class="meta"><?php echo getSpeakerTitle(get_the_ID()); ?></p>
        </div>
    <?php endwhile; ?>
</div>