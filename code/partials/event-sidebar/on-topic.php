<div>
    <h3>On this Topic</h3>
    <?php
    $sameTopicPosts = getPostsByTopic($current_post);
        foreach ($sameTopicPosts as $post) : ?>
        <div>
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
            <p>
                <?php
                $presenter_id = get_post_meta($post, 'presenters', true);
                echo get_the_title($presenter_id); 
                ?>
            </p>
            <p class="meta"><?php echo get_post_meta($presenter_id, 'title', true); ?></p>
        </div>
    <?php endforeach; ?>
</div>