<?php get_header(); ?>	  	  <div class="jumbotron">        <h1 class="display-3">bu temayı kullan</h1>        <p class="lead">Merhaba, şuan gördüğün tasarımı kendi sitende kullanmak ister misin?</p>        <p><a class="btn btn-lg btn-success" href="/ozellestirilebilir-kisisel-blog-temasi/" role="button">gözat</a></p>      </div>	  	<div class="row marketing">
		<?php $i=1; if (have_posts()) : while (have_posts($i<=get_option('posts_per_page'))) : the_post(); ?>
			<div class="col-lg-12 yaziti">
				<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>			</div>
		<?php $i++; endwhile; else: ?>
		<?php endif; ?>	</div>	
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
	<div class="right"><?php next_posts_link('Sonraki Sayfa &raquo;') ?></div>
	<div class="left"><?php previous_posts_link('&laquo; Önceki Sayfa') ?></div>
<?php } ?>
<?php get_footer(); ?>