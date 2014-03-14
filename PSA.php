<?php /* Template Name: PSA Template */ ?>

<?php get_header(); ?>
<p><a href="http://www.byuidahoradio.org/submit-psa/">Click here to submit a Public Service Announcement</a></p>
<p><a href="http://www.byuidahoradio.org/submit-news-story/">Click here to submit a new News Story</a></p>

<?php $my_query = new WP_Query('category_name=psat&posts_per_page=10'); ?>

<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

	<div class="post" id="post-<?php the_ID(); ?>">

		<h2><?php the_title(); ?></h2>

		<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

		<div class="entry">

			<?php the_content(); ?>

			<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

		</div>

		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

	</div>

	<?php // comments_template(); ?>
<?php endwhile; ?>

<?php get_footer(); ?>