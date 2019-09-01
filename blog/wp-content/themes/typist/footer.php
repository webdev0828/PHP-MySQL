<div id="footer">

    <div class="sidebar">
            <?php dynamic_sidebar( 'Footer' ); ?>
    </div>

	<div class="copy"><?php printf( __( '&copy; %s', 'typist' ), date_i18n('Y') ) ?> - Sublime Revenue</div>

</div>
</div><!--.tlo-->

<?php wp_footer(); /* this is used by many Wordpress features and for plugins to work properly */ ?>
    <script src="https://use.fontawesome.com/fc6a809c72.js"></script>
    <script src="https://sublimerevenue.com/js/jquery-3.2.1.min.js"></script>
    <script src="https://sublimerevenue.com/js/plugins.js"></script>
    <script src="https://sublimerevenue.com/js/main.js"></script>
</body>
</html>