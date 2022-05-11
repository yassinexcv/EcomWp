<?php
$prefix = fashionable_store_get_prefix();
$sectionOnePageID = absint(get_theme_mod($prefix . '_section_one_content', ''));
if ($sectionOnePageID != 0):
    $section_one_page = get_post($sectionOnePageID);
    $sectionOneColor = sanitize_hex_color(get_theme_mod($prefix.'_section_one_bg_color',''));
?>
    <div id="home-section-one" class="home-section-one-wrapper" <?php echo ( !empty($sectionOneColor) ? 'style=background-color:'.$sectionOneColor.';' : ''); ?>>
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
                    <div class="home-section-one-page-content">
                        <?php
                        setup_postdata($section_one_page);
                        the_content();
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>