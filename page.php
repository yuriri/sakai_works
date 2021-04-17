<?php get_header(); ?>
<?php if(have_posts()): while(the_post()); ?>
<h2><?php the_title(); ?></h2>
<?php the_content(); ?>
<?php endif; ?>
<?php get_footer(); ?>