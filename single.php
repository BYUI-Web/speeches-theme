<?php get_header(); ?>
<div class="row">
	<div class="col-xs-12 col-md-8">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php
		$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		if ($feat_image):
			echo '<meta property="og:image" content="'.$feat_image.'" itemprop="facebookImage"/>';
		else:
			echo '<meta property="og:image" content="http://www.byuidahoradio.org/logo.png" itemprop="facebookImage"/>';
		endif;
		?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<h2><?php the_title(); ?></h2>
			
			<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

			<div class="entry">
				
				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				
				<?php the_tags( 'Tags: ', ', ', ''); ?>

			</div>
			
			<?php edit_post_link('Edit this entry','','.'); ?>
			
		</div>

		<?php comments_template(); ?>

	<?php endwhile; endif; ?>
</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>