<!-- /.l-wrap_01 .m-works -->
<article class="l-wrap_01 m-works">

    <h2 class="l-ttl_02 ttl-works">WORKS</h2>

    <p class="l-btn_viewall"><a href="">VIEW ALL</a></p>

    <?php 
        $args = array(
            'post_type' => 'works_post',
            'post_status' => 'publish',
            'posts_per_page' => -1
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
                    <h3 class="l-works_ttl"><?php echo $title; ?></h3>
                    <figure class="l-works_fig">
                        <?php if($thumb): ?>
                            <?php echo $thumb; ?>
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/common/blank_fig.png" alt="">
                        <?php endif; ?>
                    </figure>

                    <?php if ( !empty( $terms ) ) : ?>
                        <ul class="l-works_tags_list">
                            <?php foreach ( $terms as $term ) : ?>
                                <li class="l-works_tags_list_item">#<?php echo $term->name; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </a>
            </li>

        <?php endwhile; ?>
    </ul>
    <?php endif; wp_reset_postdata(); ?>
    <!-- /.l-works_list -->

    <p class="l-btn_viewall"><a href="">VIEW ALL</a></p>

</article>
<!-- /.l-wrap_01 .m-works -->
