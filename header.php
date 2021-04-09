<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php if(is_home() || is_front_page()): ?>
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<title><?php bloginfo('name'); ?></title>
		<meta property="og:title" content="<?php bloginfo( 'name' ); ?>" />
		<meta property="og:type" content="website" />		
	<?php elseif(is_singular('works_post')): ?>
		<meta name="description" content="<?php the_title(); ?>のページです。｜<?php bloginfo( 'description' ); ?>">
		<title><?php the_title(); ?> ｜ WORKS ｜ <?php bloginfo('name'); ?></title>	
		<meta property="og:title" content="<?php the_title(); ?>のページです。｜<?php bloginfo( 'name' ); ?>" />
		<meta property="og:type" content="website" />		
	<?php endif; ?>
	<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />
	<!-- <meta property="og:image" content="'. esc_url( home_url( '/' ) ) .'ogimg.png" />
	<meta name="thumbnail" content="'. esc_url( home_url( '/' ) ) .'meta-thumb.png" />	 -->
	<!--  Facebook用設定 -->
	<meta property="fb:app_id" content="" />
	<!-- ※ Twitter共通設定 -->
	<meta name="twitter:card" content="summary" />	
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500&family=Questrial&display=swap" rel="stylesheet">	
	<link href="https://fonts.googleapis.com/css2?family=Averia+Sans+Libre:ital,wght@0,300;0,400;0,700;1,700&family=Codystar:wght@300;400&family=Raleway:ital,wght@0,100;1,100;1,200&display=swap" rel="stylesheet">	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- .l-hdr -->
	<header class="l-hdr">

		<section class="l-hdr_inr">
		
			<section class="l-hdr_item">
				<h1 class="l-ttl_01">
					<a href="<?php echo esc_url( home_url('/') ); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/common/logo.svg" alt="<?php echo bloginfo('discription'); ?>">
					</a>
				</h1>
				<p class="l-hdr_mail">yusasabi@gmail.com</p>
			</section>
			<!-- /.l-hdr_item -->

			<section class="l-hdr_item">

				<!-- .l-hdr-nav -->
				<?php wp_nav_menu(
					array(
						'theme_location' => 'top-menu',
						'container'  => 'nav',
						'container_class' => 'l-hdr-nav',
						'items_wrap' => '<ul class="l-hdr-nav__list">%3$s</ul>',
						'menu_class' => 'l-hdr-nav__list__item'
					)
				); ?>   
				<!-- /.l-hdr-nav -->  		

			</section>
			<!-- /.l-hdr_item -->

		</section>
		<!-- /.l-hdr_inr -->

	</header>
	<!-- /.l-hdr -->

    <main>