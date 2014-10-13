<?php
//set the page
$page = get_query_var("page");
$page = ($page === 0) ? 1 : $page;

//set the event type
$events = get_query_var("event");
if ($events == "") {
    $events = array("devotional", "forum");
}



$args = array(
    "post_type" => $events,
    "posts_per_page" => -1
);

//get the number of posts
$countQuery = new WP_Query();
$countQuery->query($args);
$numPosts = $countQuery->found_posts;
$numPages = ceil($numPosts / 15);

//add to the args the remaining options
$args["posts_per_page"] = 15;
$args["offset"] = ($page - 1) * 15;

$speeches = get_posts($args);
?>