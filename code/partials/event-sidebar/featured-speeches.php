<?php 
$posts = getPostsBySpeaker($current_post->presenters, $current_post->ID); 
if ($posts) {
?>
<div class="sidebar-inner group by-speaker">
    <h3>By This Speaker</h3>
    <div>
        <?php foreach ($posts as $post) : ?>
            <div class="speech-brief">
                <a href="<?php echo $post->guid; ?>"><?php echo $post->post_title; ?></a>
                <?php foreach($presenters as $presentor) : ?>
                    <p><?php echo $presenter->post_title; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endforeach;?>
    </div>
</div>
<?php } ?>