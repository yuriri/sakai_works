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
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- .l-hdr -->
	<header class="l-hdr">
		<h1 class="l-ttl_main">
			<a href="<?php echo esc_url( home_url('/') ); ?>">
				<span class="ttl_white"><span class="ttl_name"><?php bloginfo(); ?></span></span>
			</a>
		</h1>
	</header>
	<!-- /.l-hdr -->

    <main>