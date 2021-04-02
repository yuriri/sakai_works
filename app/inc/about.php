<!-- /.l-wrap_01 -->
<article class="l-wrap_01 m-about">

    <h2 class="l-ttl_02 ttl-about"><span class="ttl_white"><span class="ttl_name">ABOUT</span></span></h2>

    <?php 
        $args = array(
            'post_type' => 'about',
            'post_status' => 'publish',
            'posts_per_page' => -1
        );
        $wp_query = new WP_Query($args);  
        if ( $wp_query -> have_posts() ) :
            while ( $wp_query -> have_posts() ) : $wp_query -> the_post();
    ?>
        <section class="l-about_cont"><?php the_content(); ?></section>
    <?php endwhile; endif; wp_reset_postdata(); ?>

</article>
<!-- /.l-wrap_01 -->