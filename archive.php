<?php get_header(); ?>

<h3 class="l-ttl_02 l-works_ttl">WORKS</h3>

<!-- .l-works_post_wrap -->
<article class="l-works_post_wrap">

    <?php 
        $paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
        $args = array(
            'post_type' => 'works_post',
            'post_status' => 'publish',
            'posts_per_page' => 15,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'paged' => $paged                
        );
        $wp_query = new WP_Query($args);  
        if ( $wp_query -> have_posts() ) :
    ?>

    <!-- .l-works_list -->
    <ul class="l-works_list">

        <?php
            while ( $wp_query -> have_posts() ) : $wp_query -> the_post();
                $title = get_the_title();
                $size = 'works_thumb';
                $thumb = get_the_post_thumbnail($post->ID, $size);
                $url = get_field('url');
                $taxonomy = 'works_post_cat';
                $terms = get_the_terms( $post->ID, $taxonomy );
        ?>
            <li class="l-works_list_item"> 
                <a href="<?php echo the_permalink(); ?>">
                    <h3 class="l-works_list_item_ttl"><?php echo $title; ?></h3>
                    <figure class="l-works_list_item_fig">
                        <?php if($thumb): ?>
                            <?php echo $thumb; ?>
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/common/blank_fig.png" alt="">
                        <?php endif; ?>
                    </figure>

                    <?php if ( !empty( $terms ) ) : ?>
                        <ul class="l-works_list_item_tags_list">
                            <?php foreach ( $terms as $term ) : ?>
                                <li class="l-works_list_item_tags_list_item">#<?php echo $term->name; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <button class="l-btn_detail">DETAIL<svg xmlns="http://www.w3.org/2000/svg" width="80.285" height="11.841"><path d="M0 11.341h79.07L67.978.355" fill="none" stroke="#132efc"/></svg></button>
                </a>
            </li>

        <?php endwhile; ?>
    </ul>
    <!-- /.l-works_list --> 

    <?php endif; wp_reset_postdata(); ?>

    <?php
        if ( function_exists( 'pagination' ) ) :
            pagination( $wp_query->max_num_pages, $paged );
        endif;  
    ?>

</article>
<!-- /.l-works_post_wrap -->
 
<?php get_footer(); ?>        