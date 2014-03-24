<?php get_header(); ?>

<div class="row">
    <div class="col-xs-12 col-sm-8">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <?php 
            $loop = new WP_Query(array(
                    'post_type' => 'devotional',
                    "meta_query" => array(
                        "key" => "even_date",
                        "value" => strtotime('now'),
                        "compare" => ">",
                        "type" => "DATE"
                    )
                ));
            ?>
            <ol class="carousel-indicators">
                <?php
                $counter = 0;
                while($loop->have_posts()) :
                    $loop->the_post();
                    $active = ($counter == 0) ? "class='active'" : "";
                    ?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $counter; ?>" <?php echo $active; ?>></li>
                    <?php
                    $counter++;
                endwhile;
                ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php
                $counter = 0;
                while ($loop->have_posts()) :
                    $loop->the_post();
                    $meta = get_post_meta(get_the_ID());

                    $active = ($counter == 0) ? "active" : "";
                    $url = get_permalink();
                    $date = date('F j, Y', strtotime($meta['event_date'][0]));
                    $speakerId = explode(", ", $meta['presenters'][0]);
                    $speakerName = get_the_title($speakerId[0]);
                    $speakerTitle = get_post_meta($speakerId, "title");
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($speakerId));
                    ?>
                    <div class="item <?php echo $active ?>">
                        <div class="home-carousel group">
                            <img class="carousel-image" src="<?php echo $image[0]; ?>" />
                            <div class="carousel-info">
                                <p class="carousel-speaker-name"><?php echo $speakerName; ?></p>
                                <p class="carousel-speaker-title"><?php echo $speakerTitle[0]; ?></p>
                                <p class="carousel-date"><?php echo $date; ?></p>
                                <a class="carousel-link" href="<?php echo $url; ?>">How To Prepare</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    $counter++;
                endwhile;
                ?>
            </div>
        </div>
        <div class="recent-speeches">
            <h2>Recent Speeches</h2>
            <?php
            $counter = 0;
            $loop = new WP_Query(array('post_type' => 'devotional'));
            while ($loop->have_posts() && $counter < 4) : $loop->the_post();
                $meta = get_post_meta(get_the_ID());
                date_default_timezone_set('America/Denver');
                $now = strtotime('now');
                $post_end_time = get_post_meta(get_the_ID(), 'event_end_time');
                if ($now > $post_end_time[0]) :
                    ?>

                    <div class="recent-speech group">
                        <div class="speaker-pic">
                            <?php echo get_the_post_thumbnail($meta['presenters'][0]); ?>
                        </div>
                        <div class="speaker-info">
                            <a href="<?php the_permalink(); ?>">
                                <h4>"<?php the_title(); ?>"</h4>
                            </a>
                            <p><?php echo get_the_title($meta['presenters'][0]); ?></p>
                            <span class="post-date"><?php echo date('F jS, Y', strtotime($meta['event_date'][0])); ?></span>
                        </div>
                    </div>
                    <?php
                    $counter++;
                endif;
            endwhile;
            ?>
            <div class="center">
                <a class="speeches-button">View All Speeches</a>
            </div>
        </div>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>