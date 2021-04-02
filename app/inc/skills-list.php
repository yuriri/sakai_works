
<!-- /.l-wrap_01 .m-skills -->
<article class="l-wrap_01 m-skills">

    <h2 class="l-ttl_02 ttl-skills"><span class="ttl_white"><span class="ttl_name">SKILSS</span></span></h2>

    <?php 
        $args = array(
            'pad_counts' => true,
            'hide_empty' => true,
            'parent' => 0        
        );
        $terms = get_terms( 'skills_post_cat', $args );
        foreach ( $terms as $term ) :    
            
            $args = array(
                'post_status' => 'publish',
                'post_type' =>  'skills_post',
                'posts_per_page' => -1,                             
                'tax_query' => array(
                    array(
                        'taxonomy' => 'skills_post_cat',
                        'field' => 'slug',
                        'terms' => $term,
                    ),
                ),             
            );  

            $my_query = new WP_Query($args);
            if ($my_query->have_posts()):            
    ?>

        <h3 class="l-skills_term"><span><?php echo $term->name; ?></span></h3>

        <ul class="l-skills_list">

            <?php while ($my_query->have_posts()) : $my_query->the_post();
                $title = get_the_title();
                $level = get_field('level');
                $years = get_field('years');
            ?>

                <li class="l-skills_list_item">
                    <h4 class="l-skills_list_item_name"><?php echo $title; ?></h4>
                    <p class="l-skills_list_item_level"><?php echo $level; ?></p>
                    <p class="l-skills_list_item_years"><?php echo $years; ?></p>
                </li>
                
            <?php
                endwhile;
            endif;
        wp_reset_postdata();
        ?>  

        </ul>

    <?php endforeach; ?> 
            
</article>
<!-- /.l-wrap_01 .m-skills -->