<?php get_header(); ?>

<div class="row">
	<div class="col-xs-12 col-sm-8">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<div class="home-carousel group">
						<?php
						$counter = 0;
						$loop = new WP_Query( array( 'post_type' => 'devotional') );
						while ( $loop->have_posts() && $counter < 1) : $loop->the_post(); 
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
				<div class="item">
					<div class="home-carousel group">
						<?php
						$counter = 0;
						$loop = new WP_Query( array( 'post_type' => 'devotional') );
						while ( $loop->have_posts() && $counter < 1) : $loop->the_post(); 
						$meta = get_post_meta(get_the_ID());
						date_default_timezone_set('America/Denver');
						$now = strtotime('now');
						$post_start_time = strtotime(get_post_meta(get_the_ID(), 'event_date')[0] . ' ' . get_post_meta(get_the_ID(), 'event_start_time')[0]);
						$post_end_time = strtotime(get_post_meta(get_the_ID(), 'event_date')[0] . ' ' . get_post_meta(get_the_ID(), 'event_end_time')[0]);
						if ($now > $post_end_time) : ?>
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

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div>
		<div class="recent-speeches">
			<h2>Recent Speeches</h2>
			<?php
			$counter = 0;
			$loop = new WP_Query( array( 'post_type' => 'devotional') );
			while ( $loop->have_posts() && $counter < 4) : $loop->the_post(); 
			$meta = get_post_meta(get_the_ID()); 
			date_default_timezone_set('America/Denver');
			$now = strtotime('now');
			$post_start_time = strtotime(get_post_meta(get_the_ID(), 'event_date')[0] . ' ' . get_post_meta(get_the_ID(), 'event_start_time')[0]);
			$post_end_time = strtotime(get_post_meta(get_the_ID(), 'event_date')[0] . ' ' . get_post_meta(get_the_ID(), 'event_end_time')[0]);
			if ($now > $post_end_time) : ?>

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
			<?php $counter++; endif; endwhile; ?>
			<div class="center">
				<a class="speeches-button">View All Speeches</a>
			</div>
		</div>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>