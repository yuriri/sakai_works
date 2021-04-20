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

                $fig_dkt = get_field('fig_dkt');  
                $size_dkt = 'works_gallery';
                $fig_dkt_src = $fig_dkt['sizes'][$size_dkt];              
                $fig_dkt_width = $fig_dkt['sizes'][$size_dkt. '-width'];              
                $fig_dkt_height = $fig_dkt['sizes'][$size_dkt. '-height'];              
                $fig_dkt_alt = $fig_dkt['alt'];                 

                $fig_sp = get_field('fig_sp');  
                $size_sp = 'works_gallery_sp';
                $fig_sp_src = $fig_sp['sizes'][$size_sp];              
                $fig_sp_width = $fig_sp['sizes'][$size_sp. '-width'];              
                $fig_sp_height = $fig_sp['sizes'][$size_sp. '-height'];              
                $fig_sp_alt = $fig_sp['alt']; 

                $duration = get_field('duration');
                $charge = get_field('charge');
                $team = get_field('team');
                $comment = get_field('comment');
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
        <?php else: ?>
            <p class="l-works_post_progress">urlは準備中です</p>
        <?php endif; ?>        

        <section class="l-works_post_figs">
            <?php if($fig_dkt || $fig_sp): ?>

                <ul class="l-works_post_figs_list">
                    <?php if($fig_dkt): ?>
                        <li class="l-works_post_figs_list_item m-fig_pc<?php if(!$fig_sp): ?> m-wide<?php endif; ?>">
                            <figure class="l-works_post_figs_list_item_fig">
                                <figcaption class="l-works_post_figs_list_item_fig_figcaption"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/common/ico_desktop_01.svg" alt="" width="40" height="38">DESKTOP</figcaption>
                                <div class="l-works_post_figs_list_item_fig_img">
                                    <picture>
                                        <source data-srcset="<?php echo $fig_dkt_src; ?>" />    
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/imgs/common/blank.svg"
                                            data-src="<?php echo $fig_dkt_src; ?>"
                                            alt="<?php echo $fig_dkt_alt; ?>"
                                            width="<?php echo $fig_dkt_width; ?>"
                                            height="<?php echo $fig_dkt_height; ?>"
                                            class="lazyload"
                                            loading="lazy"      
                                        >
                                    </picture>
                                </div>
                            </figure>
                        </li>
                    <?php endif; ?>
                    <?php if($fig_sp): ?>
                        <li class="l-works_post_figs_list_item m-fig_sp<?php if(!$fig_dkt): ?> m-wide<?php endif; ?>">
                            <figure class="l-works_post_figs_list_item_fig">
                                <figcaption class="l-works_post_figs_list_item_fig_figcaption"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/common/ico_mobile_01.svg" alt="" width="24" height="38">MOBILE</figcaption>
                                <div class="l-works_post_figs_list_item_fig_img">
                                    <picture>
                                        <source data-srcset="<?php echo $fig_sp_src; ?>" />                                 
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
                                </div>
                            </figure>
                        </li>                
                    <?php endif; ?>
                </ul>
            <?php else: ?>
                <p class="l-works_post_progress">画像は準備中です</p>
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
                    <ul class="l-works_post_info_lower">

                        <?php if($duration): ?>
                            <li class="l-works_post_info_lower_item l-works_post_duration">
                                <p class="l-works_post_info_lower_lead">制作期間</p>
                                <p class="l-works_post_info_lower_cont"><?php echo $duration; ?></p>
                            </li>
                        <?php endif; ?>
                        <?php if($charge): ?>
                            <li class="l-works_post_info_lower_item l-works_post_charge">
                                <p class="l-works_post_info_lower_lead">担当箇所</p>
                                <p class="l-works_post_info_lower_cont"><?php echo $charge; ?></p>
                            </li>
                        <?php endif; ?>                                
                        <?php if($team): ?>
                            <li class="l-works_post_info_lower_item l-works_post_team">
                                <p class="l-works_post_info_lower_lead">チーム構成</p>
                                <p class="l-works_post_info_lower_cont"><?php echo $team; ?></p>
                            </li>
                        <?php endif; ?>
                        <?php if($comment): ?>
                            <li class="l-works_post_info_lower_item l-works_post_comment">
                                <p class="l-works_post_info_lower_lead">コメント</p>
                                <p class="l-works_post_info_lower_cont"><?php echo $comment; ?></p>
                            </li>
                        <?php endif; ?>

                    </ul>
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