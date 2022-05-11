<?php
$prefix = fashionable_store_get_prefix();
$sectionOnePageID = absint(get_theme_mod($prefix . '_section_three_content', ''));
if ($sectionOnePageID != 0):
    $section_three_page = get_post($sectionOnePageID);
    $sectionThreeColor = sanitize_hex_color(get_theme_mod($prefix.'_section_three_bg_color',''));
    ?>
    <div id="home-section-three" class="home-section-three-wrapper" <?php echo ( !empty($sectionThreeColor) ? 'style=background-color:'.$sectionThreeColor.';' : ''); ?>>
        <div class="container grid-xl">
            <?php if ($sectionOnePageID != 0): ?>
                <div class="fs-section-titles">
                    <h3 class="section-title"><?php echo esc_html(get_the_title($sectionOnePageID)); ?></h3>
	                <?php
	                $hasExcerpt = get_the_excerpt($sectionOnePageID);
	                if (!empty($hasExcerpt)): ?>
                        <h4 class="section-subtitle"><?php echo esc_html($hasExcerpt); ?></h4>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="colums">
                <div class="column col-12">
                    <div class="home-section-three-page-content">
                        <?php
                        setup_postdata($section_three_page);
                        the_content();
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>