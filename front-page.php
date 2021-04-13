<?php get_header(); ?>

<!-- .l-fullPageScroll -->
<div class="l-fullPageScroll">

    <section class="l-home_hero">
    
        <section class="l-home_hero_inr">
            <h2 class="l-home_hero_name">Sakai<br>Yuri</h2>
            <h3 class="l-home_hero_job">Web Developer</h3>
            <button class="l-btn_scroll"><span>SCROLL</span><svg xmlns="http://www.w3.org/2000/svg" width="11.413" height="79.677"><path d="M.25 0v79.07l10.986-11.092" fill="none" stroke="#000" stroke-width=".5"/></svg></button>
        </section>
        <!-- /.l-home_hero_inr -->
    
    </section>
    <!-- /.l-home_hero -->

    <?php get_template_part('app/inc/about');?>

</div>
<!-- /.l-fullPageScroll -->

<?php get_template_part('app/inc/works','list');?>
<?php get_template_part('app/inc/skills','list');?>
<?php get_template_part('app/inc/history','list');?>

<?php get_footer(); ?>