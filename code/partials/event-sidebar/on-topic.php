<?php 
    $sameTopicPosts = getPostsByTopic($current_post->ID);
?>
   
<?php if ($sameTopicPosts) { ?>
    <div class="sidebar-inner topic-speeches">
        <h3>On this Topic</h3>
        <?php
            foreach ($sameTopicPosts as $post) : ?>
            <div class="speech-brief">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <p>
                    <?php
                    $presenter = get_post($post->presenters);
                    echo $presenter->post_title; 
                    ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
<?php } ?>