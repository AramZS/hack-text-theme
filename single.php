<?php

/**

 * @package WordPress

 * @subpackage Magazeen_Theme
 */



get_header();

?>



	<div id="main-content" class="clearfix">

	

		<div class="container">

	

			<div class="col-580 left">

			

				<?php

				if ( have_posts() ) :

					while ( have_posts() ) :
						the_post();
						$category = get_the_category();

				?>

							

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			

				<div class="post-meta clearfix">

				

					<h3 class="post-title left"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

					<p class="post-info right">

						<span>By <a href="<?php get_site_url(); ?>/author/<?php the_author_meta( 'user_login' ); ?>/" rel="author" alt="<?php the_author(); ?>" title="<?php the_author(); ?>"><?php the_author(); ?></a></span>

						<?php the_time( 'l F j, Y' ); ?>

					</p>

						

				</div><!-- End post-meta -->

					

				<div class="post-box">

					

					<div class="page-content clearfix">

						

						<div class="clearfix">

								

							<?php if ( get_post_meta( $post->ID, 'image_value', true ) ) : ?>

									<p class="post-subtitle left">                                    
										<?php
										$subtitle = get_post_meta( $post->ID, 'subtitle', $single = true );
										if ( $subtitle ) {
											echo $subtitle;
										} else {
											echo "In which I don't bother to asssign a subtitle.";
										}
										?>
																	   
									</p>


									<div class="social-buttons-single">

			<div class="social-buttons-fb social-button"><script defer src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php the_permalink(); ?>" show_faces="false" width="349" action="recommend" data-colorscheme="light" font=""></fb:like></div>

			<div class="social-buttons-twit social-button"><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-count="horizontal" data-via="Chronotope">Tweet</a><script defer type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>

			<div class="social-buttons-su social-button"><su:badge layout="2" location="<?php the_permalink(); ?>"></su:badge></div>

									
									</div>
					<div class="social-buttons-upper-single">			

						<div class="social-buttons-g social-button"><g:plusone size="medium" href="<?php the_permalink(); ?>"></g:plusone></div>
						<div class="social-buttons-ln social-button"><script defer src="//platform.linkedin.com/in.js" type="text/javascript"></script><script defer type="IN/Share" data-url="<?php the_permalink(); ?>" data-counter="right"></script></div>
					</div>
<div class="clearfix"></div>
								

									<!--<div class="post-image-inner right">

										<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/timthumb.php?src=<?php echo get_post_meta( $post->ID, 'image_value', true ); ?>&amp;w=225&amp;h=246&amp;zc=1" alt="<?php the_title(); ?>" /></a>

									</div>-->

								

								<?php endif; ?>

						

								<?php the_content( '' ); ?>

								

								<?php
								wp_link_pages(
									array(
										'before'         => '<p><strong>Pages:</strong> ',
										'after'          => '</p>',
										'next_or_number' => 'number',
									)
								);
?>

															

									<br />

								

							</div>

																				

						</div><!-- End post-content -->

																	

					</div><!-- End post-box -->

					

				</div><!-- End post -->				



				<?php comments_template(); ?>

								

				<?php

					endwhile;

					endif;

				?>

				

			</div><!-- End col-580 (Left Column) -->

			

			<div class="col-340 right">

			

				<ul id="sidebar">

				

					<?php get_sidebar(); ?>

					

				</ul><!-- End sidebar -->   

								

			</div><!-- End col-340 (Right Column) -->

			

		</div><!-- End container -->

		

	</div><!-- End main-content -->



<?php get_footer(); ?>
