<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="s" class="assistive-text screen-reader-text"><?php echo esc_html__( 'Search', 'fashionable-store' ); ?></label>
    <div class="input-group d-flex">
        <input type="text" class="form-input field" name="s" placeholder="<?php echo esc_attr( 'Search Item', 'fashionable-store' ); ?>">
        <input class="btn btn-primary input-group-btn" type="submit" name="submit" id="searchsubmit" value="<?php echo esc_attr('Search','fashionable-store'); ?>">
    </div>
</form>