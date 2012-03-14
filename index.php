<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php get_header(); ?>

<section class="line">
	<img style="margin-top:1em;border:7px solid #333;" src="http://placehold.it/100x50" alt="<##>" />
</section>

<section id="content">
	<!-- Question buhkets. Wherez ma buhket!? -->
	<section class="line buckets">
		<article class="unit size1of3">
			<?php 
				$page_id = 73; // 123 should be replaced with a specific Page's id from your site, which you can find by mousing over the link to edit that Page on the Manage Pages admin page. The id will be embedded in the query string of the URL, e.g. page.php?action=edit&post=123.
				$page_data = get_page( $page_id ); // You must pass in a variable to the get_page function. If you pass in a value (e.g. get_page ( 123 ); ), WordPress will generate an error. 
			
				$content = apply_filters('the_content', $page_data->post_content); // Get Content and retain Wordpress filters such as paragraph tags. Origin from: http://wordpress.org/support/topic/get_pagepost-and-no-paragraphs-problem
				$title = $page_data->post_title; // Get title
			?>
			<h3><?php echo $title; // Output title?></h3>
			<?php echo $content; // Output Content ?>
		</article>
		<article class="unit size1of3">
			<?php 
				$page_id = 76; // 123 should be replaced with a specific Page's id from your site, which you can find by mousing over the link to edit that Page on the Manage Pages admin page. The id will be embedded in the query string of the URL, e.g. page.php?action=edit&post=123.
				$page_data = get_page( $page_id ); // You must pass in a variable to the get_page function. If you pass in a value (e.g. get_page ( 123 ); ), WordPress will generate an error. 
			
				$content = apply_filters('the_content', $page_data->post_content); // Get Content and retain Wordpress filters such as paragraph tags. Origin from: http://wordpress.org/support/topic/get_pagepost-and-no-paragraphs-problem
				$title = $page_data->post_title; // Get title
			?>
			<h3><?php echo $title; // Output title?></h3>
			<?php echo $content; // Output Content ?>
		</article>
		<article class="unit size1of3">
			<?php 
				$page_id = 79; // 123 should be replaced with a specific Page's id from your site, which you can find by mousing over the link to edit that Page on the Manage Pages admin page. The id will be embedded in the query string of the URL, e.g. page.php?action=edit&post=123.
				$page_data = get_page( $page_id ); // You must pass in a variable to the get_page function. If you pass in a value (e.g. get_page ( 123 ); ), WordPress will generate an error. 
			
				$content = apply_filters('the_content', $page_data->post_content); // Get Content and retain Wordpress filters such as paragraph tags. Origin from: http://wordpress.org/support/topic/get_pagepost-and-no-paragraphs-problem
				$title = $page_data->post_title; // Get title
			?>
			<h3><?php echo $title; // Output title?></h3>
			<?php echo $content; // Output Content ?>
		</article>
	</section>
<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<p class="published" title="<?php the_time('c') ?>"><?php the_date() ?></p>

		<?php if(!has_post_format('aside') && !has_post_format('image')) { ?>
			<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to “<?php the_title_attribute(); ?>”"><?php the_title(); ?></a></h2>

		<?php }
			the_content();
			if(!has_post_format('aside') && !has_post_format('image')) {
		?>

			<p>This item was posted by <span class="vcard author"><cite class="fn"><a class="url" href="<?php the_author_meta('user_url') ?>" title="Visit the author’s site"><?php the_author_meta('display_name'); ?></a></cite></span>.</p>
			<?php if (has_tag()) echo '<p>Tags:</p>'; the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
			<p>Categories:</p>
			<ul>
				<li><?php the_category('</li><li>') ?></li>
			</ul>

			<p><a href="<?php the_permalink(); ?>#comment" title="View or contribute to the discussion"><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></a></p>

		<?php } ?>
			
			<?php edit_post_link('Edit', '<p>', '</p>'); ?>
		</article>

	<?php endwhile; ?>

	<p><?php next_posts_link('Older'); delim_posts_link(); previous_posts_link('Newer') ?></p>

<?php else : ?>

	<h2>Not found.</h2>
	<p>Sorry, you seem to be looking for something that simply isn’t here.</p>

<?php endif; ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>