<!-- /.l-wrap_01 -->
<article class="l-wrap_01 m-history">

    <h2 class="l-ttl_02 ttl-history">HISTORY</h2>

    <article class="m-history_timeline">

        <!-- .m-history_timeline_list -->
        <ul class="m-history_timeline_list">

            <?php 
                $args = array(
                    'post_type' => 'history_post',
                    'post_status' => 'publish',
                    'posts_per_page' => -1
                );
                $wp_query = new WP_Query($args);  

                if ( $wp_query -> have_posts() ) :
                    while ( $wp_query -> have_posts() ) : $wp_query -> the_post();

                        if( have_rows('history_dt') ): 
                            while ( have_rows('history_dt') ) : the_row();

                                if( get_row_layout() == 'history_dt_wrap' ): ?>

                                    <li class="m-history_timeline_list_item">

                                        <h3 class="m-history_timeline_year"><?php the_sub_field('history_year'); ?></h3>

                                    <?php if( have_rows('history_cont_wrap') ): 
                                        while ( have_rows('history_cont_wrap') ) : the_row();
                                        ?>
                                        <p class="m-history_timeline_cont"><?php the_sub_field('history_cont'); ?></p>
                                    <?php endwhile; endif; ?>

                                    </li>
                                <?php endif; ?>

                            <?php endwhile;  endif; ?>

            <?php endwhile; endif; wp_reset_postdata(); ?>

        </ul>
        <!-- /.m-history_timeline_list -->
        
    </article>
    <!-- /.m-history_timeline -->

</article>
<!-- /.l-wrap_01 -->