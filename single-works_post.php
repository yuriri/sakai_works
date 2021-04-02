<?php get_header(); ?>

<?php
    if(have_posts()):
        while(have_posts()):
            the_post();
                $title = get_the_title();
                $taxonomy = 'works_post_cat';
                $terms = get_the_terms( $post->ID, $taxonomy );
                $url = get_field('url');
                $duration = get_field('duration');
            ?>

    <!-- .l-works_post -->
    <article class="l-works_post">

        <h2 class="l-works_post_ttl"><span class="ttl_white"><span class="ttl_name"><?php echo $title; ?></span></span></h2>

        <section class="l-works_post_figs">

            <ul class="l-works_post_figs_list">
                <li class="l-works_post_figs_list_item">
                    <figure><img src="" alt=""></figure>
                </li>
            </ul>

        </section>

        <!-- .l-works_post_info -->
        <section class="l-works_post_info">

            <!-- .l-works_post_info_upper -->
            <section class="l-works_post_info_upper">

                <?php if($url): ?>
                    <p class="l-works_post_url">URL:<a href="<?php echo $url; ?>" target="_blank"><?php echo $url; ?></a></p>
                <?php endif; ?>

                <?php if ( !empty( $terms ) ) : ?>
                    <ul class="l-works_post_tags_list">
                        <?php foreach ( $terms as $term ) : ?>
                            <li class="l-works_post_tags_list_item">#<?php echo $term->name; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

            </section>
            <!-- /.l-works_post_info_upper -->            

            <!-- .l-works_post_info_lower -->
            <section class="l-works_post_info_lower">

                <?php if($duration): ?>
                    <p class="l-works_post_duration">制作期間:<?php echo $duration; ?></p>
                <?php endif; ?>

            </section>
            <!-- /.l-works_post_info_lower -->

        </section>
        <!-- /.l-works_post_info -->

    </article>
    <!-- /.l-works_post -->

    <p class="l-works_post_totop"><a href="<?php echo esc_url( home_url('/') ); ?>"><span class="ttl_white"><span class="ttl_name">TOPに戻る</span></span></a></p>

<?php endwhile; endif; ?>

<?php get_footer(); ?>