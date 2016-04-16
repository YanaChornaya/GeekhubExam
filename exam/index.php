<?php get_header(); ?>

	<section class="hero-blog"></section>

	<section class="blog">
		<div class="container">
			<h2 class="section-title"><?php _e('Blog Page','exam')?></h2>
			<span class="section-subtitle"><?php _e('Our featured Post','exam')?></span>

			<?php
			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article>
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>
					<div class="main">
						<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h2>
						<p class="post-description">
							<?php _e( 'Posted by ', 'exam' );?>
							<a href="#" class="author"><?php echo get_the_author();?></a>
							<span class="post-date"><?php echo get_the_date('jS F Y');?></span>
						</p>
						<?php if ( has_post_thumbnail() ) {?>
							<?php the_post_thumbnail(); ?>
						<?php } ?>
						<p><?php the_excerpt()?></p>
						<div class="share">
							<span>Share :</span>
							<ul class="social-share">
								<li><a href="#"><span class="fa fa-facebook"></span></a></li>
								<li><a href="#"><span class="fa fa-twitter"></span></a></li>
								<li><a href="#"><span class="fa fa-google"></span></a></li>
							</ul>
						</div>
						<?php echo '<a class="read-more" href="' . get_permalink() . '">Read more</a>'; ?>
					</div>
				</article>

			<?php endwhile;?>

				<?php the_posts_pagination( array(
						'prev_next' => false,
				) ); ?>

			<?php else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</div>
	</section>


<?php get_footer();
