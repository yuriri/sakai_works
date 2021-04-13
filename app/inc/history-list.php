<!-- /.l-wrap_01 l-history -->
<article class="l-wrap_01 l-history" id="scr-history">

    <h2 class="l-ttl_02 l-history_ttl"><span>HISTORY</span></h2>

    <article class="l-history_timeline">

        <!-- .l-history_timeline_list -->
        <ul class="l-history_timeline_list">

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

                                    <li class="l-history_timeline_list_item">
                                        <div class="l-history_timeline_list_item_wrap">

                                            <h3 class="l-history_timeline_year"><?php the_sub_field('history_year'); ?></h3>

                                            <?php if( have_rows('history_cont_wrap') ): 

                                                echo '<ul class="l-history_timeline_cont_list">';
                                                while ( have_rows('history_cont_wrap') ) : the_row();
                                                ?>

                                                    <li class="l-history_timeline_cont_list_item"><?php the_sub_field('history_cont'); ?></li>
                                                
                                                <?php endwhile;
                                                echo '</ul>';
                                            endif; ?>
                                            
                                        </div>
                                        <!-- /.l-history_timeline_list_item_wrap -->
                                    </li>
                                <?php endif; ?>

                            <?php endwhile;  endif; ?>

            <?php endwhile; endif; wp_reset_postdata(); ?>

        </ul>
        <!-- /.l-history_timeline_list -->

    </article>
    <!-- /.l-history_timeline -->

</article>
<!-- /.l-wrap_01 -->