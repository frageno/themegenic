<?php

/**
 * 
 * 
 * Breadcrumbs Layout
 * 
 */

 $breadcrumb_background_image = get_field('breadcrumb_background_image', 'option');
 $breadcrumb_background_image_overlay = get_field('breadcrumb_background_image_overlay', 'option');

 ?>

<div class="relative h-auto py-32 breadcrumb <?php if(isset($breadcrumb_background_image['url']) ? 'breadcrumb-image' : '')?>">
    <div class="absolute top-0 left-0 z-0 w-full h-full breadcrumb-overlay" style="background: <?php echo isset($breadcrumb_background_image['url']) ? $breadcrumb_background_image_overlay : ''; ?>"></div>
    <div class="relative z-10 max-w-screen-lg px-5 mx-auto">
        <div class="flex flex-col items-center justify-center text-center text-white page-title">
            <h1 class="font-bold text-h1"><?php the_title(); ?></h1>
            <ul class="flex items-center breadcrumb-wrap">
                <li class="breadcrumb-item">
                    <a href="<?php esc_url(  home_url( '/')) ; ?>">
                        <?php _e('Home', 'themegenic'); ?>
                    </a>
                </li>
                <li class="">
                    <span> <?php the_title(); ?> </span>
                </li>
            </ul>
        </div>
    </div>
</div>