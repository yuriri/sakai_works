<?php get_header(); ?>

<h3 class="l-ttl_02 l-works_ttl">WORKS</h3>

<?php
    if(have_posts()):
        while(have_posts()):
            the_post();
                $title = get_the_title();
                $taxonomy = 'works_post_cat';
                $terms = get_the_terms( $post->ID, $taxonomy );
                $url = get_field('url');
                $size = 'works_gallery';
                $thumb = get_the_post_thumbnail($page->ID, $size);

                $duration = get_field('duration');
                $charge = get_field('charge');
                $team = get_field('team');
            ?>

    <!-- .l-works_post_wrap -->
    <article class="l-works_post_wrap">

        <h2 class="l-works_post_ttl"><?php echo $title; ?></h2>

        <?php if ( !empty( $terms ) ) : ?>
            <ul class="l-works_post_tags_list">
                <?php foreach ( $terms as $term ) : 
                    $term_link = get_term_link( $term );
                    ?>
                    <li class="l-works_post_tags_list_item">
                        <a href="<?php echo esc_url( $term_link ); ?>">
                            #<?php echo $term->name; ?></li>
                        </a>    
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>    
        
        <?php if($url): ?>
            <p class="l-works_post_url">URL:<a href="<?php echo $url; ?>" target="_blank"><?php echo $url; ?></a></p>
        <?php endif; ?>        

        <section class="l-works_post_figs">

            <ul class="l-works_post_figs_list">
                <li class="l-works_post_figs_list_item">
                    <figure>
                        <?php if($thumb): ?>
                            <?php echo $thumb; ?>
                        <?php else: ?>
                                <img src="" alt="">
                        <?php endif; ?>
                    </figure>
                </li>
            </ul>

        </section>

        <?php if(get_the_content() || $duration || $charge || $team ): ?>
            <!-- .l-works_post_info -->
            <section class="l-works_post_info">


                <?php if(get_the_content()): ?>
                    <div class="l-works_post_info_lead"><?php echo the_content(); ?></div>
                <?php endif; ?>
                <?php if($duration || $charge || $team ): ?>

                    <!-- .l-works_post_info_lower -->
                    <section class="l-works_post_info_lower">

                        <?php if($duration): ?>
                            <p class="l-works_post_duration">制作期間：<?php echo $duration; ?></p>
                        <?php endif; ?>
                        <?php if($charge): ?>
                            <p class="l-works_post_charge">担当箇所制作期間：<?php echo $charge; ?></p>
                        <?php endif; ?>                                
                        <?php if($team): ?>
                            <p class="l-works_post_team">チーム構成制作期間：<?php echo $team; ?></p>
                        <?php endif; ?>

                    </section>
                    <!-- /.l-works_post_info_lower -->

                <?php endif; ?>

            </section>
            <!-- /.l-works_post_info -->
        <?php endif; ?>

    </article>
    <!-- /.l-works_post_wrap -->

    <?php get_template_part('app/inc/parts','pager');?>

    <p class="l-works_post_totop"><a href="<?php echo esc_url( home_url('/') ); ?>"><span class="ttl_white"><span class="ttl_name">TOPに戻る</span></span></a></p>

<?php endwhile; endif; ?>

<?php get_footer(); ?>