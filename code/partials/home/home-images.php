<?php

$nextDevo = array("name" => "Devotional", "image" => "/assets/images/home/devo-home.jpg");
$nextForum = array("name" => "Forum", "image" => "/assets/images/home/forum-home.jpg");

$nextDevo["speech"] = get_post(getUpcoming("devotional", 1)[0]);
$nextDevo["speaker"] = get_post($nextDevo["speech"]->presenters);
$nextDevo["time"] = getUpcomingNaturalTiming($nextDevo["speech"]);

$nextForum["speech"] = get_post(getUpcoming("forum", 1)[0]);
$nextForum["speaker"] = get_post($nextForum["speech"]->presenters);
$nextForum["time"] = getUpcomingNaturalTiming($nextForum["speech"]);

$homeImages = array();

if ($nextDevo["speech"]->event_date < $nextForum["speech"]->event_date) {
    array_push($homeImages, $nextDevo);
    array_push($homeImages, $nextForum);
} else {
    array_push($homeImages, $nextForum);
    array_push($homeImages, $nextDevo);
}

//collapsable images
$homeImagesCollapsable = array(
    array(
        "image-desktop" => "/assets/images/home/prepare-desktop.jpg",
        "image-mobile" => "/assets/images/home/prepare-mobile.jpg",
        "image-alt" => "Prepare for devotional",
        "caption" => "Prepare for Devotional",
        "subcaption" => "Read President Clark's address on preperation",
        "links-to" => "#"
    ),
    array(
        "image-desktop" => "/assets/images/home/volunteer-desktop.jpg",
        "image-mobile" => "/assets/images/home/volunteer-mobile.jpg",
        "image-alt" => "Volunteer at devotional",
        "caption" => "Volunteer",
        "subcaption" => "How to become a devotional usher",
        "links-to" => "#"
    ),
    array(
        "image-desktop" => "/assets/images/home/behind-desktop.jpg",
        "image-mobile" => "/assets/images/home/behind-mobile.jpg",
        "image-alt" => "Behind the Scenes",
        "caption" => "Behind the Scenes",
        "subcaption" => "Read something about with devotional stuff",
        "links-to" => "#"
    )
);

?>
   

<div class="row home-images row">
    
    <?php
        for ($i = 0; $i < 2; $i++) {
            $homeImage = $homeImages[$i];
            include __DIR__."/home-image.php";
        }

        //collapsable
        for ($i = 0; $i < 3; $i++) {
            $homeImage = $homeImagesCollapsable[$i];
            include __DIR__."/home-image__collapsable.php";
        }
    ?>

</div>