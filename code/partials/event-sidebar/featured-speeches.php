<div class="sidebar-inner group sidebar-featured-speeches">
    <h3>Related Speeches</h3>
    <div>
        <h3>Other By this Speaker</h3>
        <?php 
        $posts = getPostsBySpeaker($current_post); 
        if (is_array($posts)) :
            foreach ($posts as $post) : ?>
        <div>
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
            <p><?php echo getSpeaker($post); ?></p>
            <p class="meta"><?php echo getSpeakerTitle($post); ?>
            </p>
        </div>
    <?php endforeach; else: echo $posts; endif;?>
</div>