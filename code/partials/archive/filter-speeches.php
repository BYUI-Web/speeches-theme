<?php
$args = array(
    "posts_per_page" => -1,
    "meta_query" => array()
);

//set the page
$page = get_query_var("page");
$page = ($page == "") ? 1 : $page;

//set the event type
$events = get_query_var("event");
if ($events == "") {
    $events = array("devotional", "forum");
}
$args["post_type"] = $events;


//set the topic
$topics = get_query_var("topic");
//if the topic is not empty then we want to set it
if ($topics != "") {
    $args["tag_slug__in"] = $topics;
}

//set the speakers
$speakers = get_query_var("speaker");
//if the speaker is not empty then we want to append a meta_query
if ($speakers != "") {
    array_push($args["meta_query"], array(
        "key" => "presenters",
        "value" => $speakers,
        "compare" => "IN"
    ));
}

//set the dates
$startMonth = get_query_var("start_month");
$startYear = get_query_var("start_year");
$endMonth = get_query_var("end_month");
$endYear = get_query_var("end_year");

//if the year is set but the month isn't then we need to check for that
if ($startYear != "" && $startMonth == "") {
    $startMonth = "jan";
}

//if the month is set but the year isn't then we need to check for that
if ($startMonth != "" && $startYear == "") {
    $startYear = $dates[0];
}

//if the year is set and the month is not then we need to check for that
if ($endYear != "" && $endMonth == "") {
    $endMonth = "dec";
}

//if the month is set but the year is not then we need to check for that
if ($endMonth != "" && $endYear == "") {
    $endYear = $dates[1];
}

if ($startMonth != "" && $startYear != "") {
    $startDate = strtotime("last day of " . $startMonth . " " . $startYear);
    array_push($args["meta_query"], array(
        "key" => "event_date",
        "value" => $startDate,
        "compare" => ">="
    ));
}

if ($endMonth != "" && $endYear != "") {
    $endDate = strtotime("last day of " . $endMonth . " " . $endYear);
    array_push($args["meta_query"], array(
        "key" => "event_end_time",
        "value" => $endDate,
        "compare" => "<="
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