<footer id="footer" role="contentinfo">
	<?php
    $prefix = fashionable_store_get_prefix();
	$footer_style = esc_attr( get_theme_mod( $prefix . '_footer_layout', '1' ) );
	?>
    <!-- Footer Area -->
    <div id="footer" class="footer-area pad-tb-60">
        <div class="container<?php echo ($footer_style == '1' ? ' grid-xl': ''); ?>">
			<?php
			get_template_part( 'template-parts/footer/footer-style-1');
			?>
        </div>
    </div>
    <!-- Copyright -->
    <div id="copyright" class="copyright-area pad-tb-10">
        <div class="container grid-xl">
			<?php
			$copyright_style = esc_attr( get_theme_mod( $prefix . '_copyright_layout', '1' ) );
			get_template_part( 'template-parts/copyright/copyright-style-' . $copyright_style );
			?>
        </div><!-- .container -->
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
