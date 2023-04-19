</main>
</div>
<footer id="footer" role="contentinfo">
<?php get_sidebar(); ?>
<div id="copyright">
&copy; <?php echo esc_html( date_i18n( __( 'Y', 'generic' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>