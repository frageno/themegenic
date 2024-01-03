<?php 

/**
 * Template Name: Text Image
 */

include (get_stylesheet_directory() . '/template-parts/elements/Button/index.php');
include (get_stylesheet_directory() . '/template-parts/elements/Headline/index.php');

// Create uniqe ids
$id = 'header-intro' . $block['id'];


// fields
$image_side = get_field('image_side') ?? 'left';
$headline = get_field('headline');
$description = get_field('description');
$button = get_field('button');
$image = get_field('image');

?>

<section id="<?php echo esc_attr($id); ?>">
    <div class="max-w-screen-xl px-5 py-32 mx-auto">
        <div class="flex flex-col gap-8 md:gap-16 items-center xl:items-start <?php echo $image_side === 'right' ? 'md:flex-row-reverse': 'md:flex-row' ?>">
            <?php if($image): ?>
                <div class="w-full image md:w-1/2">
                    <?php echo wp_get_attachment_image( $image['ID'], 'large', false, array('class' => 'object-cover') ); ?>
                </div>
            <?php endif; ?>
            <div class="flex flex-col justify-start w-full gap-6 content md:w-1/2 xl:py-16">
                <?php if($headline) { create_headline($headline, 'text-secondary font-semibold text-5xl', 'h2'); } ?>
                <?php if($description) { ?> <?php echo $description; ?> <?php } ?>
                <?php if(isset($button['url']) && isset($button['title'])) { ?>
                   <?php create_button($button, 'a', 'btn-primary'); ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>