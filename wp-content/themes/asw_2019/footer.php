<!-- FOOTER.PHP ++++++++++++++++++++++ -->
<div id="footer-wrap">
    <footer>
        <div class="footer-container">
            <?php wp_nav_menu( array( 'theme_location' => 'nav2' ) ); ?>
            <div class="copywrite">
                &copy; <?php  the_date('Y'); ?> A Subtle Web.<br/>
                18 Livingston St, Kingston NY 12401
            </div>
        </div>
    </footer>
</div>

</div><!-- END #site-wrap -->

<?php get_template_part('assets/scripts'); ?>

<?php /* Include this so the admin bar is visible. */ wp_footer(); ?>

</body>
</html>