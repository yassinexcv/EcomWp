<?php
$id = get_queried_object_id();
?>
<section class="single-major-title major-title">
    <div class="container grid-xl">
        <div class="columns">
            <div class="column col-12">
                <h1 class="no-margin"><?php echo get_the_title(); ?></h1>
                <?php if (has_excerpt()):
                    the_excerpt();
                endif; ?>
            </div>
        </div>
    </div>
</section>
