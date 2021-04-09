</main>

<!-- .l-ftr -->
<footer class="l-ftr">

    <section class="l-ftr_inr">

        <h2 class="l-ftr_logo">
            <a href="<?php echo esc_url( home_url('/') ); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/common/logo.svg" alt="<?php echo bloginfo('discription'); ?>">
            </a>
        </h2>
        <!-- /.l-ftr_logo -->
        
        <section class="l-ftr_item">
        
            <h2 class="l-ftr_name">
                Sakai Yuri
                <span>Web Developer</span>
            </h2>

            <p class="l-ftr_mail">yusasabi@gmail.com</p>

            <ul class="l-ftr_sns_list">
                <li class="l-ftr_sns_list_item"><a href="">sns_item</a></li>
            </ul>
            <!-- /.l-ftr_sns_list -->
        
        </section>
        <!-- /.l-ftr_item -->

        <section class="l-ftr_item">
            <!-- .l-ftr-nav -->
            <?php wp_nav_menu(
                array(
                    'theme_location' => 'top-menu',
                    'container'  => 'nav',
                    'container_class' => 'l-ftr-nav',
                    'items_wrap' => '<ul class="l-ftr-nav__list">%3$s</ul>',
                    // 'menu_class' => 'l-ftr-nav__list__item'
                )
            ); ?>   
            <!-- /.l-ftr-nav -->     
        </section>
        <!-- /.l-ftr_item -->             

    </section>
    <!-- /.l-ftr_inr -->

</footer>
<!-- /.l-ftr -->

<?php wp_footer(); ?>
</body>
</html>