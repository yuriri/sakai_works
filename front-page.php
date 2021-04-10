<?php get_header(); ?>

<section class="l-home_hero">

    <h2 class="l-ttl_hero_name">Sakai<br>Yuri</h2>
    <h3 class="l-ttl_hero_job">Web Develper</h3>

</section>
<!-- /.l-home_hero -->

<?php get_template_part('app/inc/about');?>
<?php get_template_part('app/inc/works','list');?>
<?php get_template_part('app/inc/skills','list');?>
<?php get_template_part('app/inc/history','list');?>

<?php get_footer(); ?>