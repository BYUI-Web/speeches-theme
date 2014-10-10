<?php

$page = get_query_var("page");

$args = array(
    "post_type" => array("devotional", "forum"),
    "offset" => 0,
    "posts_per_page" => -1
);

//get the number of posts
$countQuery = new WP_Query();
$countQuery->query($args);
$numPosts = $countQuery->found_posts;
$numPages = ceil($numPosts / 15);

//add to the args the remaining options
$args["posts_per_page"] = 15;

$speeches = get_posts($args);

?>
   

<div class="archive-results">
    <div class="result-count"><?php echo $numPosts; ?> RESULTS FOUND</div>
    <?php foreach($speeches as $speech) : 
            $speaker = get_post($speech->presenters);        
    ?>
        <div class="<?php echo $speech->post_type;?> result">
            <a href="<?php echo $speech->guid; ?>" class="result-header"><span class="result-type"><?php echo ucwords($speech->post_type); ?></span>: <?php echo date("F jS, Y", $speech->event_date); ?></a>
            <div class="result-title"><?php echo $speech->post_title; ?></div>
            <div class="result-presenter"><?php echo $speaker->post_title; ?></div>
            <div class="result-presenter-title"><?php echo $speaker->title; ?></div>
        </div>
    <?php endforeach; ?>
    
    <ul class="pagination">
        <li><a href="#">&laquo;</a></li>
        <?php for($i = 1; $i <= $numPages; $i++) : ?>
        <li><a href="./archive?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php endfor; ?>
        <li><a href="#">&raquo;</a></li>
    </ul>
</div>