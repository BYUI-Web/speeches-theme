<?php 
$posts = getRecent(3, $current_post_type);
?>
   

<div class="sidebar-inner other-speeches">
    <h3>Other <?php echo $current_post_type; ?>s</h3>
        <?php foreach($posts as $post) : $post = get_post($post)?>
            <div class="speech-brief">
                <a href="<?php echo $post->guid ?>"><?php echo $post->post_title ?></a>
                <p><?php 
                    $speaker = get_post($post->presenters);
                    echo $speaker->post_title;
                    ?></p>
            </div>
        <?php endforeach; ?>
    <a class="read-more" href="<?php echo $current_post_type; ?>s">View More</a>
</div>