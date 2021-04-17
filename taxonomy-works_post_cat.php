<?php get_header(); ?>

<?php 
    $paged = get_query_var('paged') ? get_query_var('paged') : 1 ;

    // タクソノミー名
    $taxonomy = get_query_var('taxonomy');
    // ポストタイプ
    $tax_posttype = get_taxonomy($taxonomy)->object_type[0];
    $tax_taxonomyname = $tax_posttype.'_cat';
    
    $wp_obj = $wp_obj ?: get_queried_object();
    // タクソノミー タームスラッグ
    $term_slug_02 = $wp_obj->slug;
    // タクソノミー ターム名
    $term_slug_02_name = $wp_obj->name;
?>


<h3 class="l-ttl_02 l-works_ttl">WORKS</h3>
<h4 class="l-works_category">#<?php echo $term_slug_02_name; ?></h4>

<!-- .l-works_post_wrap -->
<article class="l-works_post_wrap">

    <?php 
        $args = array(
            'post_type' => 'works_post',
            'post_status' => 'publish',
            'posts_per_page' => 15,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'paged' => $paged,
            'tax_query' => array(
                array(
                    'taxonomy' => $tax_taxonomyname,
                    'field' => 'slug',
                    'terms' => $term_slug_02,
                ),
            )                         
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
                $thumbnail_id = get_post_thumbnail_id($post->ID); 
                $image = wp_get_attachment_image_src( $thumbnail_id, $size ); 
                $src = $image[0];
                $width = $image[1];
                $height = $image[2];
                $url = get_field('url');
                $taxonomy = 'works_post_cat';
                $terms = get_the_terms( $post->ID, $taxonomy );
        ?>
            <li class="l-works_list_item"> 
                <a href="<?php echo the_permalink(); ?>">
                    <h3 class="l-works_list_item_ttl"><?php echo $title; ?></h3>
                    <?php if($thumb): ?>
                        <figure class="l-works_list_item_fig">
                            <picture>
                                <source data-srcset="<?php echo $src; ?>" />                                
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/imgs/common/blank.svg"
                                    data-src="<?php echo $src; ?>"
                                    alt="<?php echo $title; ?>のサムネイル画像"
                                    width="<?php echo $width; ?>"
                                    height="<?php echo $height; ?>"
                                    class="lazyload"
                                    loading="lazy"
                                >
                            </picture>
                        </figure>
                    <?php else: ?>
                        <figure class="l-works_list_item_fig fig_blank">
                            <img
                                src="<?php echo get_template_directory_uri(); ?>/assets/imgs/common/blank.svg" alt="画像はありません" width="50" height="50"
                            >
                        </figure>
                    <?php endif; ?>

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