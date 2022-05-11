<?php
$prefix         = fashionable_store_get_prefix();
$sectionOnePageID = absint( get_theme_mod( $prefix . '_section_two_content', '' ) );
if ( $sectionOnePageID != 0 ):
    $section_two_page = get_post($sectionOnePageID);
	$sectionTwoColor = sanitize_hex_color(get_theme_mod($prefix.'_section_two_bg_color',''));
    ?>
    <div id="home-section-two" class="home-section-two-wrapper"  <?php echo ( !empty($sectionTwoColor) ? 'style=background-color:'.$sectionTwoColor.';' : ''); ?>>
        <div class="container grid-xl">
            <?php if ( $sectionOnePageID != 0 ): ?>
            <div class="fs-section-titles">
                <h3 class="section-title"><?php echo esc_html( get_the_title( $sectionOnePageID ) ); ?></h3>
	            <?php
	            $hasExcerpt = get_the_excerpt($sectionOnePageID);
	            if (!empty($hasExcerpt)): ?>
                    <h4 class="section-subtitle"><?php echo esc_html($hasExcerpt); ?></h4>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <div class="colums">
                <div class="column col-12">
                    <div class="home-section-two-page-content">
                        <?php
                        setup_postdata( $section_two_page );
                        the_content();
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>