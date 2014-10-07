<?php 

//get the most popular speeches
$args = array("post_type" => array("devotional", "forum"), 
    "orderby" => "views", 
    'meta_key' => 'pageviews',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'posts_per_page' => 1);

$popularLoop = new WP_Query( $args );

?>


<div class="boxes">
        <div class="box">
            <h4 class="header">Popular</h4>
            <img class="speaker-image hidden-xs hidden-sm" src="<?php bloginfo('template_url') ?>/assets/images/home/dallin-h-oaks-large.jpg" />
            <a href="#" class="speech-link">
                <p class="when">25 February 2014</p>
                <p class="title">Witnesses of God</p>
                <p class="who">Elder Dallin H. Oaks</p>
                <p class="position">Quorum of the Twelve Apostles</p>
            </a>
        </div>
        <div class="box">
            <h4 class="header">Recent</h4>
            <a href="#" class="speech-link">
                <p class="when">12 August 2014</p>
                <p class="title">Expanding the Abundant Life</p>
                <p class="who">Brother Leon Anderson</p>
                <p class="position">Some position on campus</p>
            </a>
            <a href="#" class="speech-link">
                <p class="when">12 August 2014</p>
                <p class="title">Expanding the Abundant Life</p>
                <p class="who">Brother Leon Anderson</p>
                <p class="position">Some position on campus</p>
            </a>
            <a href="/archive" class="box-link">Archive</a>
        </div>
        <div class="box">
            <h4 class="header">Upcoming</h4>
            <a href="#" class="speech-link">
                <p class="when">19 August 2014</p>
                <p class="who">Brother Garth Nelson</p>
                <p class="position">Manager on Campus</p>
            </a>
            <a href="#" class="speech-link">
                <p class="when">19 August 2014</p>
                <p class="who">Brother Garth Nelson</p>
                <p class="position">Manager on Campus</p>
            </a>
            <a href="#" class="speech-link">
                <p class="when">19 August 2014</p>
                <p class="who">Brother Garth Nelson</p>
                <p class="position">Manager on Campus</p>
            </a>
            <a href="/calendar" class="box-link">Calendar</a>
        </div>
    </div>