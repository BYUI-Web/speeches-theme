<aside class="col-xs-12 col-sm-4">
    <div class="aside-holder">
        <div class="sidebar-inner home">
            <h2>Upcoming Speeches</h2>
            <div class="divider">
                <h3>Devotionals</h3>
                <p class="sub-text">Held most Tuesdays in the BYU-Idaho Center at 2:10 p.m.</p>
                <?php
                $counter = 0;
                $loop = new WP_Query( array( 'post_type' => 'devotional') );
                while ( $loop->have_posts() && $counter < 3) : $loop->the_post(); 
                $meta = get_post_meta(get_the_ID());
                date_default_timezone_set('America/Denver');
                $now = strtotime('now');
                $post_start_time = strtotime(get_post_meta(get_the_ID(), 'event_date')[0] . ' ' . get_post_meta(get_the_ID(), 'event_start_time')[0]);
                $post_end_time = strtotime(get_post_meta(get_the_ID(), 'event_date')[0] . ' ' . get_post_meta(get_the_ID(), 'event_end_time')[0]);
                if ($post_end_time > $now) : ?>
                <div>
                    <?php if ($post_start_time <= $now) : ?>
                        <a href="<?php the_permalink(); ?>">
                        <?php endif; ?>
                        <h4><?php echo date('F j', strtotime($meta['event_date'][0])); ?></h4>
                        <?php if ($post_start_time <= $now) : ?>
                        </a>
                    <?php endif; ?>
                    <p><?php echo get_the_title($meta['presenters'][0]); ?></p>
                    <p class="meta"><?php echo get_post_meta($meta['presenters'][0], 'title')[0]; ?></p>
                </div>
                <?php 
                endif;
                $counter++;
                endwhile; 
                ?>
            </div>
            <div class="divider">
                <h3>University Forums</h3>
                <p class="sub-text">Held in the Taylor Chapel at 2p.m.<br/>A question-and-answer session is held at 3 p.m.</p>
                <?php
                $counter = 0;
                $loop = new WP_Query( array( 'post_type' => 'forum') );
                while ( $loop->have_posts() && $counter < 3) : $loop->the_post(); 
                $meta = get_post_meta(get_the_ID());
                date_default_timezone_set('America/Denver');
                $now = strtotime('now');
                $post_start_time = strtotime(get_post_meta(get_the_ID(), 'event_date')[0] . ' ' . get_post_meta(get_the_ID(), 'event_start_time')[0]);
                $post_end_time = strtotime(get_post_meta(get_the_ID(), 'event_date')[0] . ' ' . get_post_meta(get_the_ID(), 'event_end_time')[0]);
                if ($post_end_time > $now) : ?>
                <div>
                    <?php if ($post_start_time <= $now) : ?>
                        <a href="<?php the_permalink(); ?>">
                        <?php endif; ?>
                        <h4><?php echo date('F j', strtotime($meta['event_date'][0])); ?></h4>
                        <?php if ($post_start_time <= $now) : ?>
                        </a>
                    <?php endif; ?>
                    <p><?php echo get_the_title($meta['presenters'][0]); ?></p>
                    <p class="meta"><?php echo get_post_meta($meta['presenters'][0], 'title')[0]; ?></p>
                </div>
                <?php 
                $counter++;
                endif;
                endwhile; 
                ?>
            </div>
        </div>
    </div>
</aside>
<aside class="col-xs-12 col-sm-4 second">
    <div class="aside-holder">
        <div class="sidebar-inner home">
            <h2>BYU-Idaho Radio</h2>
            <p class="sub-text">Visit <a href="http://byuidahoradio.org">www.byuidahoradio.org</a> to listen live, hear rebroadcasts, or download podcasts of devotional.</p>
        </div>
    </div>
</aside>