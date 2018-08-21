<?php get_header(); ?>
<div class="r">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="cercevebaslik"><a href="<?php the_permalink() ?>" rel="bookmark" style="color: #158800; font-size: 2rem;"><?php the_title(); ?></a></div>		<div class="cercevetarih"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' önce'; ?> paylaşıldı.</div>
		<?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
		if ( has_post_thumbnail() ) { ?>
			<div class="kapionuresim">
				<img src="<?php bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php echo $image_url[0]; ?>&amp;w=125&amp;h=135&amp;zc=1" alt="<?php the_title(); ?>"/><span></span>
			</div>
		<?php } ?>
		<div class="yazialani">		
			<?php the_content();?>
		</div>
		<?php if (get_option('etiketler')=='yes') { ?>
			<div class="ace"></div>			
			<div class="etiyiyenkediler">
				<strong>Etiketler:</strong> <?php the_tags(''); ?>
			</div>
			<?php } else { ?>
			<div class="persil"></div>
			<?php } ?>
		
	<?php endwhile; else: ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>