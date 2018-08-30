<?php

/**

 * @package WordPress

 * @subpackage Magazeen_Theme
 */

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>



<head profile="http://gmpg.org/xfn/11">

	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />



	<title><?php wp_title( '&laquo;', true, 'right' ); ?> <?php bloginfo( 'name' ); ?></title>

		

		 <meta name="google-site-verification" content="PT_7guCJL2ZFbEPZ8HMFqtQoq9EOZmtIeCHRPbR3a6A" />



	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />

	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?> Atom Feed" href="<?php bloginfo( 'atom_url' ); ?>" />

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	

	<script src="<?php bloginfo( 'template_directory' ); ?>/js/pngfix.js" defer></script>

	<script src="<?php bloginfo( 'template_directory' ); ?>/js/jquery-latest.js" defer></script>

	<script src="<?php bloginfo( 'template_directory' ); ?>/js/effects.core.js" defer></script>

	<script src="<?php bloginfo( 'template_directory' ); ?>/js/functions.js" defer></script>

		  

		 <script type="text/javascript" defer>

var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");

document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));

</script>

<script type="text/javascript" defer>

try {

var pageTracker = _gat._getTracker("UA-3922564-5");

pageTracker._trackPageview();

} catch(err) {}</script>

<META name="y_key" content="795bd0d7a8435ee6" />

<meta name="verify-postrank" content="ubotqws" />





	

	<?php
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );}
?>



	<?php wp_head(); ?>

</head>

<body>



	<div id="header">

		

		<div class="container clearfix">

		

			<div id="logo">

		

				<h2><?php bloginfo( 'description' ); ?></h2>

				<h1><span></span><a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php echo strtolower( get_settings( 'blogname' ) ); ?></a></h1>

				

			</div><!-- End logo -->

			

			<?php require_once TEMPLATEPATH . '/searchform-header.php'; ?>

		

		</div><!-- End Container -->

		

	</div><!-- End header -->

	

	<div id="navigation">

	

		<div class="container clearfix">



			<?php

			$defaults = array(

				'menu'            => 'header-menu',
				'container'       => '',
				'container_class' => false,

				'menu_class'      => 'pages',

				'echo'            => true,
				'fallback_cb'     => 'display_home',



				'items_wrap'      => '<ul class="pages">%3$s</ul>',
				'depth'           => 0,
			);

			wp_nav_menu( $defaults );

			?>
				

			

			

			<a href="<?php bloginfo( 'rss2_url' ); ?>" class="rss" title="Subscribe to <?php bloginfo( 'name' ); ?> RSS">Subscribe</a>

			

		</div><!-- End container -->

		

	</div><!-- End navigation -->

	

	<div id="latest-dock">

	

		<div class="dock-back container clearfix">

		

			<div class="latest">

				Check out the Latest Articles:

			</div>

		

			<ul id="dock">

				<?php

					$dock = new WP_Query();

					$dock->query( 'showposts=9' );

				while ( $dock->have_posts() ) :
					$dock->the_post();

				?>

				<li>

				<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">

				<?php
				if ( has_post_thumbnail( get_the_ID() ) ) {
					$img_obj = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), array( 69, 54 ) );
					$img     = $img_obj[0];
				} else {
					$img = get_bloginfo( 'template_directory' ) . '/timthumb.php?src=' . get_post_meta( $post->ID, 'image_value', true ) . '&amp;w=69&amp;h=54&amp;zc=1';
				}
					?>
					<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>" width="69px" height="54px" />

					</a>

					<span><?php the_title(); ?></span>

				</li>

				<?php

					endwhile;

				?>

			</ul>

					

		</div><!-- End container -->

	

	</div><!-- End latest-dock -->
