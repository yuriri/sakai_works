<!-- .l-single__pager -->
<div class="l-single__pager">   
    <?php 
        // $terms = get_the_terms($post->ID);
        // foreach( $terms as $term ) {
        //     $term->name;
        // }
    ?>
    
    <!-- .l-single__pager__list -->
    <ul class="l-single__pager__list">
        <li class="l-single__pager__list__item l-single__pager__list__item__link m_next">
            <?php previous_post_link('%link', '<span>新しい作品</span>%title'); ?>
        </li>
        <li class="l-single__pager__list__item l-single__pager__list__item__link m_prev">
            <?php next_post_link('%link', '<span>過去の作品</span>%title'); ?>
        </li>
    </ul>
    <!-- .l-single__pager__list -->        
    
    <p class="l-btn_viewall">
        <a href="<?php echo get_post_type_archive_link( 'works_post' ); ?>">VIEW ALL WORKS
        </a>
    </p>

</div>
<!-- /.l-single__pager -->