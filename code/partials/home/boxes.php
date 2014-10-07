<?php 
//get the most popular speeches
$args = array("post_type" => array("devotional", "forum"), 
    "orderby" => "views", 
    'meta_key' => 'pageviews',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'posts_per_page' => 1,
    'meta_query' => array(
        array(
            'key' => 'event_date',
            'value' => strtotime("now"),
            'compare' => '<',
            'type' => 'NUMERIC'
            )
        )
    );

$popularLoop = new WP_Query( $args );
    
    
while ($popularLoop->have_posts()) {
    $popularLoop->the_post();
    $popular = get_post();
}

$popularSpeaker = get_post($popular->presenters);

//get most recent
$recent = getRecent(2, array("devotional", "forum"));

//get upcoming
$upcoming = getUpcoming(array("devotional", "forum"), 3);

?>


<div class="boxes">
    <div class="box">
        <h4 class="header">Popular</h4>
        <a href="<?php echo $popular->guid; ?>" class="speech-link">
            <img class="speaker-image hidden-xs hidden-sm" src="<?php bloginfo('template_url') ?><?php echo get_the_post_thumbnail($popular->presenters); ?>" />
            <p class="when"><?php echo date('d F Y', $popular->event_date); ?></p>
            <p class="title"><?php echo $popular->post_title; ?></p>
            <p class="who"><?php echo $popularSpeaker->post_title; ?></p>
            <p class="position"><?php echo $popularSpeaker->title; ?></p>
        </a>
    </div>
    <div class="box">
        <h4 class="header">Recent</h4>
        <?php for($i = 0; $i < 2; $i++) :
                $speech = get_post($recent[$i]);
                $speaker = get_post($speech->presenters);
            ?>
            <a href="<?php echo $speech->guid; ?>" class="speech-link">
                <p class="when"><?php echo date("d F Y", $speech->event_date); ?></p>
                <p class="title"><?php echo $speech->post_title; ?></p>
                <p class="who"><?php echo $speaker->post_title; ?></p>
                <p class="position"><?php echo $speaker->title; ?></p>
            </a>
        <?php endfor ?>
        <a href="/archive" class="box-link">Archive</a>
    </div>
    <div class="box">
        <h4 class="header">Upcoming</h4>
        <?php for ($i = 0; $i < 3; $i++) :
                $speech = get_post($upcoming[$i]);
                $speaker = get_post($speech->presenters);
                ?>
        <a href="<?php echo $speech->guid; ?>" class="speech-link">
            <p class="when"><?php echo date("d F Y", $speech->event_date); ?></p>
            <p class="who"><?php echo $speaker->post_title; ?></p>
            <p class="position"><?php echo $speaker->title; ?></p>
        </a>
        <?php endfor ?>
        <a href="/calendar" class="box-link">Calendar</a>
    </div>
</div>