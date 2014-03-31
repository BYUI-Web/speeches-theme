<?php
//get the most popular speeches
$popularLoop = new WP_Query(array("post_type" => array("devotional", "forum"), "orderby" => "views", "posts_per_page" => "5"));
?>

<?php get_header(); ?>

<div class="row">
    <div class="col-xs-12 home-carousel">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img class="carousel-image" src="<?php bloginfo('template_url'); ?>/images/home/homepage-1.jpg" />
                    <div class="carousel-caption pull-right">
                        <h2>Come to devotional prepared to learn, Tuesdays at 2:10 p.m. in the I-Center.</h2>
                    </div>
                </div>
                <div class="item">
                    <img class="carousel-image" src="<?php bloginfo('template_url'); ?>/images/home/homepage-2.jpg" />
                    <div class="carousel-caption pull-right">
                        <h2>Volunteer to be a Devotional usher. Click here to learn more.</h2>
                    </div>
                </div>
                <div class="item">
                    <img class="carousel-image" src="<?php bloginfo('template_url'); ?>/images/home/homepage-3.jpg" />
                    <div class="carousel-caption pull-right">
                        <h2>Attend University Forums to learn more about special topics.</h2>
                    </div>
                </div>
                <div class="item">
                    <img class="carousel-image" src="<?php bloginfo('template_url'); ?>/images/home/homepage-4.jpg" />
                    <div class="carousel-caption pull-right">
                        <h2>Q & A Sessions follow University Forums. Come ask your questions.</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-4">
        <div class="featured-topic speech-box">
            <h3>Featured Topic</h3>
            <div>
                <p class="featured-topic-text">Faith</p>
                <p class="featured-topic-description">This month we are highlighting past speeches on faith. Consider reading, watching, or listening to these talks for your personal study.</p>
                <div class="popular-speech">
                    <a href="#">
                        <p class="featured-title">The Title</p>
                        <p class="featured-speaker">Speaker Name</p>
                    </a>
                </div>
                <div class="featured-speech">
                    <a href="#">
                        <p class="featured-title">The Title</p>
                        <p class="featured-speaker">Speaker Name</p>
                    </a>
                </div>
                <div class="featured-speech">
                    <a href="#">
                        <p class="featured-title">The Title</p>
                        <p class="featured-speaker">Speaker Name</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="popular-speeches speech-box">
            <h3>Popular Speeches</h3>
            <div>
                <?php
                while ($popularLoop->have_posts()) :
                    $popularLoop->the_post();
                    $speakers = explode(", ", get_post_meta(get_the_ID(), "presenters", true));
                    $speaker_text = "";
                    $numSpeakers = count($speakers);
                    for ($i = 0; $i < $numSpeakers; $i++) {
                        if ($i != 0 && $numSpeakers > 2) {
                            $speaker_text .= ",";
                        }
                        if ($i + 1 == $numSpeakers && $numSpeakers > 1) {
                            $speaker_text .= " and";
                        }
                        $speaker_text .= get_the_title($speakers[$i]);
                    }
                    ?>
                    <div class="popular-speech">
                        <a href="<?php echo the_permalink(); ?>">
                            <p class="popular-title"><?php echo get_the_title(); ?></p>
                            <p class="popular-speaker"><?php echo $speaker_text; ?></p>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="home-page-links">
            <a href="/devotionals" class="devotionals-link">Devotional Home ></a>
            <a href="/forums" class="forums-link">University Forums Home ></a>
            <a href="/archive" class="archive-link">Speeches Archive ></a>
        </div>
    </div>
</div>
<?php get_footer(); ?>