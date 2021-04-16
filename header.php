<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />	
	<?php if(is_singular('works_post')): ?>
		<title><?php the_title(); ?> ｜ WORKS ｜ <?php bloginfo('name'); ?></title>	
		<meta name="description" content="<?php bloginfo('name'); ?>、作品一覧、<?php the_title(); ?>のページです。">
		<meta property="og:title" content="<?php bloginfo( 'name' ); ?>、作品一覧、<?php the_title(); ?>のページです。" />
		<meta property="og:type" content="website" />	
	<?php elseif( is_tax() ): ?>
		<title><?php echo single_term_title(); ?> ｜ WORKS ｜ <?php bloginfo('name'); ?></title>	
		<meta name="description" content="<?php bloginfo('name'); ?>、WORKS、<?php echo single_term_title(); ?>のページです。">
		<meta property="og:title" content="<?php bloginfo('name'); ?>、WORKS、<?php echo single_term_title(); ?>のページです。" />
	<?php elseif(is_archive()): ?>
		<title>WORKS ｜ <?php bloginfo('name'); ?></title>	
		<meta name="description" content="<?php bloginfo('name'); ?>、WORKSのページです。">
		<meta property="og:title" content="<?php bloginfo('name'); ?>、WORKSのページです。" />
	<?php else: ?>	
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<title><?php bloginfo('name'); ?></title>
		<meta property="og:title" content="<?php bloginfo( 'name' ); ?>" />
		<meta property="og:type" content="website" />			
	<?php endif; ?>
	<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />
	<meta property="og:image" content="<?php echo esc_url( home_url( '/' ) ); ?>ogimg.png" />
	<meta name="thumbnail" content="<?php echo esc_url( home_url( '/' ) ); ?>meta-thumb.png" />	
	<!--  Facebook用設定 -->
	<meta property="fb:app_id" content="" />
	<!-- ※ Twitter共通設定 -->
	<meta name="twitter:card" content="summary" />	
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Averia+Sans+Libre:ital,wght@0,300;0,400;0,700;1,700&family=Codystar:wght@400&family=Raleway:ital,wght@0,100..900;1,700&family=Noto+Sans+JP:wght@300;400;500&display=swap" rel="stylesheet">	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- .l-hdr -->
	<header class="l-hdr" id="js-hdr">

		<section class="l-hdr_inr">
		
			<section class="l-hdr_item l-hdr_item_logo">
				<h1 class="l-ttl_01">
					<a href="<?php echo esc_url( home_url('/') ); ?>">
						<svg xmlns="http://www.w3.org/2000/svg">
							<title>Sakai Yuri Portfolio ロゴ</title>
							<desc>クリックするとトップページへもどる</desc>
							<defs>
								<radialGradient id="g0">
									<stop offset="0" stop-color="#1ceef7"/>
									<stop offset="1" stop-color="#f854c6"/>
								</radialGradient>
							</defs>
						<g data-name="グループ 1" fill="none" stroke="#000" stroke-width="2"><g data-name="楕円形 1"><circle cx="54.5" cy="54.5" r="54.5" stroke="none"/><circle cx="54.5" cy="54.5" r="53.5"/></g><path data-name="線 1" stroke-linecap="round" d="M70.5 38.5l-32 32"/></g><path d="M27.816 47.742a1.794 1.794 0 01-.562-1.28 1.483 1.483 0 01.429-1.117 1.181 1.181 0 01.717-.415 11.642 11.642 0 012.207.837 8.9 8.9 0 003.522.833q3.318 0 3.332-2.334a2.519 2.519 0 00-1.139-2.193 20.717 20.717 0 00-3.543-1.6 11.109 11.109 0 01-3.957-2.284 4.533 4.533 0 01-1.216-3.311A5 5 0 0131.4 29.7a9.092 9.092 0 012.84-.45h.492a9.291 9.291 0 013.691.78q1.821.78 1.821 1.835a2.13 2.13 0 01-.288 1.1.905.905 0 01-.822.492 21.4 21.4 0 01-2.179-.858 8.087 8.087 0 00-3.093-.492 3.027 3.027 0 00-1.968.661 1.925 1.925 0 00-.815 1.518 2.575 2.575 0 001.2 2.193 21.209 21.209 0 003.178 1.386 12.373 12.373 0 013.747 2 5.389 5.389 0 011.448 1.905 5.083 5.083 0 01.366 1.891v.478a4.9 4.9 0 01-1.842 3.993 7.225 7.225 0 01-4.724 1.5 12.077 12.077 0 01-4.478-.661 6.829 6.829 0 01-2.158-1.229zM65.903 65.012q0-.689 2.012-.689a2.274 2.274 0 011.856.989 26.474 26.474 0 011.561 2.356q1.027 1.681 1.547 2.722l.45.985a3.912 3.912 0 00.478.872q.253 0 1.393-2t1.8-3.355a12.694 12.694 0 011.057-1.88 2.637 2.637 0 012.23-1.013q1.456 0 1.456.478 0 .563-2.645 5.543-.366.689-.746 1.365l-.38.675a37.762 37.762 0 00-2.236 4.352 12.49 12.49 0 00-.408 3.833l-.028.667v1a3.409 3.409 0 01-.239 1.614q-.239.352-1.456.352t-1.442-.289a3.286 3.286 0 01-.225-1.6l.2-4.375a5.823 5.823 0 00-.647-2.687q-1.284-2.542-3.436-6.165t-2.152-3.75z"/></svg>
					</a>
				</h1>
				<p class="l-hdr_mail">yusasabi@gmail.com</p>
			</section>
			<!-- /.l-hdr_item -->

			<section class="l-hdr_item l-hdr_item_nav">
				<button class="l-tab-only" id="js-hdr-btn" aria-expanded="false" aria-controls="js-hdr_nav" aria-label="メニューを開く">
					<span class="m-txt">MENU</span>
					<span class="m-mark"></span>
					<span class="m-mark"></span>
					<span class="m-mark"></span>
				</button>
				<!-- .l-hdr-nav -->
				<?php wp_nav_menu(
					array(
						'theme_location' => 'top-menu',
						'container'  => 'nav',
						'container_class' => 'l-hdr_nav',
						'container_id' => 'js-hdr_nav',
						'items_wrap' => '<ul class="l-hdr_nav_list">%3$s</ul>',
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