<?php get_header(); ?>
<div class="cerceve">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="cercevebaslik"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></div>
		<?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
		if ( has_post_thumbnail() ) { ?>
			<div class="kapionuresim">
				<img src="<?php bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php echo $image_url[0]; ?>&amp;w=120&amp;h=130&amp;zc=1" alt="<?php the_title(); ?>"/><span></span>
			</div>
		<?php } ?>
		<div class="yazialani">
			<?php the_content();?>
		</div>
		<?php comments_template(); ?>
	<?php endwhile; else: ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>