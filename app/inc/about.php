<!-- /.l-about -->
<article class="l-about" id="js-about">

    <section class="l-about_inr">

        <h2 class="l-ttl_02 l-about_ttl">
            <span class="l-about_ttl_about">ABOUT</span>
            <span class="l-about_ttl_me">me...</span>
        </h2>
    
        <?php 
            $args = array(
                'post_type' => 'about',
                'post_status' => 'publish',
                'posts_per_page' => 1
            );
            $wp_query = new WP_Query($args);  
            if ( $wp_query -> have_posts() ) :while ( $wp_query -> have_posts() ) : $wp_query -> the_post();
        ?>
            <div class="l-about_text"><?php the_content(); ?></div>
        <?php endwhile;endif; ?>

        <p class="l-btn_scroll">
            <a href="<?php echo home_url('/'); ?>#js-works">
                <span>SCROLL</span><svg xmlns="http://www.w3.org/2000/svg" width="11.413" height="79.677"><path d="M.25 0v79.07l10.986-11.092" fill="none" stroke="#000" stroke-width=".5"/></svg>
            </a>
        </p>

    </section>
    <!-- /.l-about_inr -->
    

</article>
<!-- /.l-about -->