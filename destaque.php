<!-- destaques noticias-->
<div id="blocoDestaques">
	<a class="faixa" href="#" title=""><!-- --></a>
	<ul>
		<?php					
			$loop = new WP_Query( array( 'post_type' => 'post','posts_per_page' => 3,'orderby' => 'date', 'order' => 'DESC',
			'category_name'=>'destaque' ));
			while ( $loop->have_posts() ) : $loop->the_post();?>
		<li>
	
			<a href="http://example.org" title="link cego">
			<img src="<?php bloginfo('template_directory'); ?>/includes/timthumb.php?src=<?php get_thumbnail($post->ID, 'full'); ?>&amp;h=206&amp;w=313&amp;zc=1" alt="<?php the_title(); ?>" />
			</a><
<div class="fundo"><!--  --></div>
			<p><a href="<?php the_permalink() ?>" rel="bookmark"></a><?php the_title(); ?></p>			
		</li>
		<?php endwhile; ?> 
		
	</ul>
</div>
<!-- fim destaques noticias -->
