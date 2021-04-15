<!-- /.l-skills -->
<article class="l-skills" id="scr-skills">

    <!-- .l-skills_ttl_wrap -->
    <section class="l-skills_ttl_wrap">
        <h2 class="l-ttl_02 l-skills_ttl">SKILSS</h2>
    </section>
    <!-- /.l-skills_ttl_wrap -->

    <!-- .l-skills_box -->
    <section class="l-skills_box">

        <?php 
            $taxonomy = 'skills_post_cat';
            $args = array(
                'pad_counts' => true,
                'hide_empty' => true,
                'parent' => 0        
            );
            $terms = get_terms( 'skills_post_cat', $args );
            //親タームのみ回す
            foreach ( $terms as $term ) :  
            ?>
    
            <!-- .l-skills_container -->
            <section class="l-skills_container">
    
                <h3 class="l-skills_term"><span><?php echo $term->name; ?></span></h3>
     
                <?php
                    $term_id = $term->term_id;

                    // 子タームを取得する
                    $termchildren = get_term_children( $term_id, $taxonomy );

                    // 子タームがある場合
                    if($termchildren):
                        foreach ( $termchildren as $child ): //その中で子タームを回す
                            $termC = get_term_by( 'id' , $child, $taxonomy );
                            $term_link = get_term_link( $child );
                    
                            if( $termC->count != 0 ):
                            ?>

                                <!-- .l-skills_term-child_block -->
                                <article class="l-skills_term-child_block">

                                    <h4 class="l-skills_term-child_ttl">#<?php echo $termC->name; ?></h4>

                                    <ul class="l-skills_list">
            
                                        <?php
                                            $args = array(
                                                'post_status' => 'publish',
                                                'post_type' =>  'skills_post',
                                                'posts_per_page' => -1,                                                                            
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => $taxonomy,
                                                        'field' => 'slug',
                                                        'terms' => $termC,
                                                    ),
                                                ),             
                                            );  
            
                                            $my_query = new WP_Query($args);                                
                                            if ($my_query->have_posts()):            
                                        
                                                while ($my_query->have_posts()) : $my_query->the_post();
                                                    $title = get_the_title();
                                                    $level = get_field('level');
                                                    $years = get_field('years');    
                                                    $icon = get_field('icon');    
                                                    $note = get_field('note');    
                                                ?>
                
                                                    <li class="l-skills_list_item">
                                                        <h4 class="l-skills_list_item_name"><?php echo $title; ?></h4>
                                                        <p class="l-skills_list_item_icon">
                                                            <?php if($icon): ?>
                                                                <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                                            <?php else: ?>
                                                            <?php endif; ?>
                                                        </p>
                                                        <?php if($level || $years || $note) : ?>                          
                                                            <section class="l-skills_list_item_parts">
                                                                <?php if($level): ?>
                                                                    <p class="l-skills_list_item_level">レベル：<?php echo $level; ?></p>
                                                                <?php endif; ?>
                                                                <?php if($years): ?>
                                                                    <p class="l-skills_list_item_years">年数：<?php echo $years; ?>年</p>
                                                                <?php endif; ?>
                                                                <?php if($note): ?>
                                                                    <p class="l-skills_list_item_note">備考：<?php echo $note; ?></p>
                                                                <?php endif; ?>
                                                            </section>
                                                            <!-- /.l-skills_list_item_parts -->        
                                                        <?php endif; ?>
                                                    </li>
                                                <?php
                                                endwhile;
                                            endif;
                                        wp_reset_postdata();
                                        ?>
                                    </ul>

                                </article>
                                <!-- /.l-skills_term-child_block -->
                            <?php endif; ?>
                        <?php endforeach;
                    else: 
                    // 子タームが無い場合    
                ?>
                <!-- .l-skills_term-child_block -->
                <article class="l-skills_term-child_block">                
                    <ul class="l-skills_list">
                        
                        <?php
                            $args = array(
                                'post_status' => 'publish',
                                'post_type' =>  'skills_post',
                                'posts_per_page' => -1,                                                          
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => $taxonomy,
                                        'field' => 'slug',
                                        'terms' => $term,
                                    ),
                                ),             
                            );  

                            $my_query = new WP_Query($args);                                
                            if ($my_query->have_posts()):            
                        
                                while ($my_query->have_posts()) : $my_query->the_post();
                                    $title = get_the_title();
                                    $level = get_field('level');
                                    $years = get_field('years');    
                                    $icon = get_field('icon');    
                                ?>
                                    <li class="l-skills_list_item">
                                        <h4 class="l-skills_list_item_name"><?php echo $title; ?></h4>
                                        <p class="l-skills_list_item_icon">
                                            <?php if($icon): ?>
                                                <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                            <?php else: ?>
                                            <?php endif; ?>
                                        </p>
                                        <?php if($level || $years || $note) : ?>                          
                                            <section class="l-skills_list_item_parts">
                                                <?php if($level): ?>
                                                    <p class="l-skills_list_item_level">レベル：<?php echo $level; ?></p>
                                                <?php endif; ?>
                                                <?php if($years): ?>
                                                    <p class="l-skills_list_item_years">年数：<?php echo $years; ?>年</p>
                                                <?php endif; ?>
                                                <?php if($note): ?>
                                                    <p class="l-skills_list_item_note">備考：<?php echo $note; ?></p>
                                                <?php endif; ?>
                                            </section>
                                            <!-- /.l-skills_list_item_parts -->        
                                        <?php endif; ?>
                                    </li>                                
                                <?php
                                endwhile;
                            endif;
                        wp_reset_postdata();
                        ?>                                
                    </ul>
                </article>
                <!-- /.l-skills_term-child_block -->                    

                <?php endif; ?>  
    
            </section>
            <!-- /.l-skills_container -->
                    
        <?php endforeach; ?> 

    </section>
    <!-- /.l-skills_box -->
            
</article>
<!-- /.l-skills -->