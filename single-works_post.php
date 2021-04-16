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

                $thumb = get_the_post_thumbnail($post->ID, $size);
                $thumbnail_id = get_post_thumbnail_id($post->ID); 
                $image = wp_get_attachment_image_src( $thumbnail_id, $size ); 
                $src = $image[0];
                $width = $image[1];
                $height = $image[2];

                $fig_sp = get_field('fig_sp');  
                $size_sp = 'works_gallery_sp';
                $fig_sp_src = $fig_sp['sizes'][$size_sp];              
                $fig_sp_width = $fig_sp['sizes'][$size_sp. '-width'];              
                $fig_sp_height = $fig_sp['sizes'][$size_sp. '-height'];              
                $fig_sp_alt = $fig_sp['alt'];              

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
                            #<?php echo $term->name; ?>
                        </a>   
                    </li>                         
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>    
        
        <?php if($url): ?>
            <p class="l-works_post_url">URL:<a href="<?php echo $url; ?>" target="_blank"><?php echo $url; ?></a></p>
        <?php endif; ?>        

        <section class="l-works_post_figs">
            <?php if($thumb || $fig_sp): ?>

                <ul class="l-works_post_figs_list">
                    <?php if($thumb): ?>
                        <li class="l-works_post_figs_list_item m-fig_pc<?php if(!$fig_sp): ?> m-wide<?php endif; ?>">
                            <p class="l-works_post_figs_list_item_lead"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/common/ico_desktop_01.svg" alt="" width="40" height="38">DESKTOP</p>
                            <figure>
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
                        </li>
                    <?php endif; ?>
                    <?php if($fig_sp): ?>
                        <li class="l-works_post_figs_list_item m-fig_sp<?php if(!$thumb): ?> m-wide<?php endif; ?>">
                            <p class="l-works_post_figs_list_item_lead"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/common/ico_mobile_01.svg" alt="" width="24" height="38">MOBILE</p>
                            <figure>
                                <picture>
                                    <source data-srcset="<?php echo $src; ?>" />                                 
                                    <img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/imgs/common/blank.svg"
                                        data-src="<?php echo $fig_sp_src; ?>"
                                        alt="<?php echo $fig_sp_alt; ?>"
                                        width="<?php echo $fig_sp_width; ?>"
                                        height="<?php echo $fig_sp_height; ?>"
                                        class="lazyload"
                                        loading="lazy"                                        
                                    >
                                </picture>
                            </figure>
                        </li>                
                    <?php endif; ?>
                </ul>
            <?php else: ?>
                <p>画像準備中です</p>
            <?php endif; ?>
        </section>

        <!-- .l-works_post_info -->
        <section class="l-works_post_info">
            <?php if(get_the_content() || $duration || $charge || $team ): ?>

                <?php if(get_the_content()): ?>
                    <div class="l-works_post_info_lead"><?php echo the_content(); ?></div>
                <?php endif; ?>
                <?php if($duration || $charge || $team ): ?>

                    <!-- .l-works_post_info_lower -->
                    <section class="l-works_post_info_lower">

                        <?php if($duration): ?>
                            <p class="l-works_post_duration">制作期間 ー <?php echo $duration; ?></p>
                        <?php endif; ?>
                        <?php if($charge): ?>
                            <p class="l-works_post_charge">担当箇所 ー <?php echo $charge; ?></p>
                        <?php endif; ?>                                
                        <?php if($team): ?>
                            <p class="l-works_post_team">チーム構成 ー <?php echo $team; ?></p>
                        <?php endif; ?>

                    </section>
                    <!-- /.l-works_post_info_lower -->

                <?php endif; ?>

            <?php else: ?>
                <p>情報はありません</p>
            <?php endif; ?>
        </section>
        <!-- /.l-works_post_info -->

    </article>
    <!-- /.l-works_post_wrap -->

    <?php get_template_part('app/inc/parts','pager');?>

    <p class="l-works_post_totop"><a href="<?php echo esc_url( home_url('/') ); ?>"><span>TOPに戻る</span></a></p>

<?php endwhile; endif; ?>

<?php get_footer(); ?>