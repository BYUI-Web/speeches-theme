<?php
//set the page
$page = get_query_var("page");
$page = ($page == "") ? 1 : $page;

//set the event type
$events = get_query_var("event");
if ($events == "") {
    $events = array("devotional", "forum");
}

//set the topic
$topics = get_query_var("topic");

//set the speakers
$speakers = get_query_var("speaker");


$args = array(
    "post_type" => $events,
    "posts_per_page" => -1,
    "meta_query" => array()
);

//if the topic is not empty then we want to set it
if ($topics != "") {
    $args["tag_slug__in"] = $topics;
}

//if the speaker is not empty then we want to append a meta_query
if ($speakers != "") {
    array_push($args["meta_query"], array(
        "key" => "presenters",
        "value" => $speakers,
        "compare" => "IN"
    ));
}

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