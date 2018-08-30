<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="main-content" class="clearfix">
	
		<div class="container">
	
			<div class="col-580 left">
			
				<?php
				$paged = get_query_var( 'paged' ); // What Page are we calling. If anything.

				/**
				 * Checks if the $paged value exists or if it is empty.
				 * If it exists then we show the below code. (Taken from the archive.php file)
				 * If it does not exist, then it must be the home page of the site, which we show the normal look.
				 */

				if ( isset( $paged ) && ! empty( $paged ) ) {

					/**
					 * Below is the code from the archive.php file.
					 */

				?>
				<?php if ( have_posts() ) : ?>
				
					<div <?php post_class(); ?>>
			
						<div class="post-meta clearfix">
					
							<h3 class="post-title">
							
									<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
									<?php /* If this is a category archive */ if ( is_category() ) { ?>
									Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category
									<?php /* If this is a tag archive */ } elseif ( is_tag() ) { ?>
									Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;
									<?php /* If this is a daily archive */ } elseif ( is_day() ) { ?>
									Archive for <?php the_time( 'F jS, Y' ); ?>
									<?php /* If this is a monthly archive */ } elseif ( is_month() ) { ?>
									Archive for <?php the_time( 'F, Y' ); ?>
									<?php /* If this is a yearly archive */ } elseif ( is_year() ) { ?>
									Archive for <?php the_time( 'Y' ); ?>
									<?php /* If this is an author archive */ } elseif ( is_author() ) { ?>
									Author Archive - <a rel="author" href="https://plus.google.com/108109243710611392513/posts">Aram Zucker-Scharff</a>
									<?php /* If this is a paged archive */ } elseif ( isset( $_GET['paged'] ) && ! empty( $_GET['paged'] ) ) { ?>
									Blog Archives
									<?php } ?>
								
							</h3>
							
							<p class="post-info right">
								<?php bloginfo( 'name' ); ?> Archives
							</p>
							
						</div><!-- End post-meta -->

					 </div>

				<?php

				if ( have_posts() ) :
					$counter = 0;
					while ( have_posts() ) :
						the_post();
						$category = get_the_category();

						if ( $counter % 2 == 0 ) {
							$end = '';
						} else {
							$end = 'last';
						}
				?>
				
				<div <?php post_class( 'single ' . $end ); ?>>
			
				<div class="post-meta clearfix">
				
					<h3 class="post-title left"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						
				</div><!-- End post-meta -->
					
				<div class="post-box">
					
					<div class="post-content">
					
						<div class="comment-count">
							<?php comments_popup_link( __( '0 Comments' ), __( '1 Comment' ), __( '% Comments' ) ); ?>
						</div>
							
						<?php if ( get_post_meta( $post->ID, 'image_value', true ) ) : ?>
							
							<div class="post-image">
								<img src="<?php bloginfo( 'template_directory' ); ?>/timthumb.php?src=<?php echo get_post_meta( $post->ID, 'image_value', true ); ?>&amp;w=235&amp;h=109&amp;zc=1" alt="<?php the_title(); ?>" />
							</div>
							
							<?php endif; ?>
							
						<div class="post-intro">
								
								<div class="social-buttons-archive">

			<div class="social-buttons-fb social-button"><script defer src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php the_permalink(); ?>" show_faces="false" width="220" action="like" data-colorscheme="light" font=""></fb:like></div>
							
			<div class="social-buttons-g social-button"><g:plusone size="medium" href="<?php the_permalink(); ?>"></g:plusone></div>

			<div class="social-buttons-twit social-button"><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-count="horizontal" data-via="Chronotope">Tweet</a><script defer type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>
			
			<div class="social-buttons-su social-button"><su:badge layout="2" location="<?php the_permalink(); ?>"></su:badge></div>
									
								</div>
							
							<?php the_excerpt( '' ); ?>
								
						</div><!-- End post-intro -->
							
					</div><!-- End post-content -->
						
					<div class="post-footer clearfix">
						
						<div class="continue-reading">
							<a href="<?php the_permalink(); ?>#more-<?php the_ID(); ?>" rel="bookmark" title="Continue Reading <?php the_title_attribute(); ?>">Continue Reading</a>
						</div>
																				
					</div><!-- End post-footer -->
					
				</div><!-- End post-box -->
					
				</div><!-- End post -->
				
				<?php
				// Clear the left float to allow for different heights
				if ( $counter % 2 != 0 ) {
					echo '<div style="clear:left;"> </div>';
				}
				?>
				
				<?php
					$counter++;
					endwhile;
					endif;
				?>
			

						<div class="navigation clearfix">
							<div class="alignleft"><?php next_posts_link( '&laquo; Older Entries' ); ?></div>
							<div class="alignright"><?php previous_posts_link( 'Newer Entries &raquo;' ); ?></div>
						</div>
				
				<?php
					 else :
				?>
				
				
	
				<?php
					endif;
						/**
						 * End of the archive.php code.
						 *
						 * Start our else for the normal home page look.
						 */

				} else {
					query_posts( 'showposts=2' );
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							$category = get_the_category();
				?>
			
				<div <?php post_class(); ?>>
			
					<div class="post-meta clearfix">
				
						<h3 class="post-title left"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						
						<p class="post-info right">
							<span>By <?php the_author_posts_link(); ?></span>
							<?php the_time( 'l F j, Y' ); ?>
						</p>
						
					</div><!-- End post-meta -->
					
					<div class="post-box">
					
						<div class="post-content">
					
							<div class="comment-count">
								<?php comments_popup_link( __( '0 Comments' ), __( '1 Comment' ), __( '% Comments' ) ); ?>
							</div>
							
							<?php if ( get_post_meta( $post->ID, 'image_value', true ) ) : ?>
							
							<!--<div class="post-image">
								<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/timthumb.php?src=<?php echo get_post_meta( $post->ID, 'image_value', true ); ?>&amp;w=521&amp;h=246&amp;zc=1" alt="<?php the_title(); ?>" /></a>
							</div>--><div style="height:6px;"></div>

									<div class="social-buttons">

			<div class="social-buttons-fb social-button"><script defer src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php the_permalink(); ?>" show_faces="false" width="349" action="recommend" data-colorscheme="light" font=""></fb:like></div>

			<div class="social-buttons-twit social-button"><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-count="horizontal" data-via="Chronotope">Tweet</a><script defer type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>

			<div class="social-buttons-su social-button"><su:badge layout="2" location="<?php the_permalink(); ?>"></su:badge></div>

									
									</div>
					<div class="social-buttons-upper">			

						<div class="social-buttons-g social-button"><g:plusone size="medium" href="<?php the_permalink(); ?>"></g:plusone></div>
						<div class="social-buttons-ln social-button"><script defer src="//platform.linkedin.com/in.js" type="text/javascript"></script><script defer type="IN/Share" data-url="<?php the_permalink(); ?>" data-counter="right"></script></div>
					</div>
							
							
							<?php endif; ?>
							
							<div class="post-intro">
							
								<?php the_content( '' ); ?>
								
							</div><!-- End post-intro -->
							
						</div><!-- End post-content -->
						
						<div class="post-footer clearfix">
						
							<div class="continue-reading">
								<a href="<?php the_permalink(); ?>#more-<?php the_ID(); ?>" rel="bookmark" title="Continue Reading <?php the_title_attribute(); ?>">Continue Reading</a>
							</div>
							
							<div class="category-menu">
														
								<div class="category clearfix">
									<div><a href="#"><span class="indicator"></span> <?php echo $category[0]->cat_name; ?></a></div>
								</div>
																
								<div class="dropdown">
								
									<ul class="cat-posts">
										<?php
											$posted = get_posts( 'category=' . $category[0]->cat_ID );
										if ( $posted ) :
											foreach ( $posted as $post ) :
												setup_postdata( $posted );
										?>
										<li><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a><span><?php the_time( ' F j, Y' ); ?></span></li>
										<?php
											endforeach;
											endif;
										?>
										<li class="view-more"><a href="<?php echo get_category_link( $category[0]->cat_ID ); ?>" class="view-more">View More &raquo;</a></li>
									</ul>
									
								</div><!-- End dropdown -->
							
							</div><!-- End category -->
													
						</div><!-- End post-footer -->
					
					</div><!-- End post-box -->
					
				</div><!-- End post -->
				
				<?php
						endwhile;
					endif;
				?>
				
				<?php
					query_posts( 'showposts=4&offset=2' );
				if ( have_posts() ) :
					$counter = 0;
					while ( have_posts() ) :
						the_post();
						$category = get_the_category();

						if ( $counter % 2 == 0 ) {
							$end = '';
						} else {
							$end = 'last';
						}
				?>
				
				<div <?php post_class( 'single ' . $end ); ?>>
			
				<div class="post-meta clearfix">
				
					<h3 class="post-title left"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						
				</div><!-- End post-meta -->
					
				<div class="post-box">
					
					<div class="post-content">
					
						<div class="comment-count">
							<?php comments_popup_link( __( '0 Comments' ), __( '1 Comment' ), __( '% Comments' ) ); ?>
						</div>
							
						<?php if ( get_post_meta( $post->ID, 'image_value', true ) ) : ?>
							
							<div class="post-image">
								<img src="<?php bloginfo( 'template_directory' ); ?>/timthumb.php?src=<?php echo get_post_meta( $post->ID, 'image_value', true ); ?>&amp;w=235&amp;h=109&amp;zc=1" alt="<?php the_title(); ?>" />
							</div>
							
							<?php endif; ?>
							
						<div class="post-intro">
								
								<div class="social-buttons-archive">

			<div class="social-buttons-fb social-button"><script defer src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php the_permalink(); ?>" show_faces="false" width="220" action="like" data-colorscheme="light" font=""></fb:like></div>
							
			<div class="social-buttons-g social-button"><g:plusone size="medium" href="<?php the_permalink(); ?>"></g:plusone></div>

			<div class="social-buttons-twit social-button"><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-count="horizontal" data-via="Chronotope">Tweet</a><script defer type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>
			
			<div class="social-buttons-su social-button"><su:badge layout="2" location="<?php the_permalink(); ?>"></su:badge></div>
									
								</div>
							
							<?php the_excerpt( '' ); ?>
								
						</div><!-- End post-intro -->
							
					</div><!-- End post-content -->
						
					<div class="post-footer clearfix">
						
						<div class="continue-reading">
							<a href="<?php the_permalink(); ?>#more-<?php the_ID(); ?>" rel="bookmark" title="Continue Reading <?php the_title_attribute(); ?>">Continue Reading</a>
						</div>
																				
					</div><!-- End post-footer -->
					
				</div><!-- End post-box -->
					
				</div><!-- End post -->
				
				<?php
				// Clear the left float to allow for different heights
				if ( $counter % 2 != 0 ) {
					echo '<div style="clear:left;"> </div>';
				}
				?>
				
				<?php
					$counter++;
					endwhile;
					endif;
				?>
					<br />
				<?php
					query_posts( 'showposts=6&offset=6' );
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						$category = get_the_category();
				?>
				
				<div <?php post_class(); ?>>
			
				<div class="post-meta clearfix">
				
					<h3 class="post-title-small left"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						
					<p class="post-info right">
						<span>By <?php the_author_posts_link(); ?></span>
						<?php the_time( 'l F j, Y' ); ?>
					</p>
						
				</div><!-- End post-meta -->

					
				</div><!-- End archive -->

				
				<?php
				endwhile;
					?>
					<div class="navigation clearfix">
					<div class="alignleft"><?php next_posts_link( '&laquo; Older Entries' ); ?></div>
					<div class="alignright"><?php previous_posts_link( 'Newer Entries &raquo;' ); ?></div>
					</div>
					<?php
					endif;
				} //end else for pagination

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
