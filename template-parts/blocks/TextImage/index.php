<?php 

/**
 * Template Name: Text Image
 */

include (get_stylesheet_directory() . '/template-parts/elements/Button/index.php');
include (get_stylesheet_directory() . '/template-parts/elements/Headline/index.php');

// Create uniqe ids
$id = 'header-intro-' . $block['id'];

// fields
$image_side = get_field('image_side') ?? 'left';
$items_alignment = get_field('items_alignment') ?? 'start';
$headline = get_field('headline');
$headline_tag_selector = get_field('headline_tag_selector') ?? 'h2';
$description = get_field('description');
$button = get_field('button');
$image = get_field('image');
$info = get_field('info');

// classes
$image_side_classes = $image_side === 'right' ? 'md:flex-row-reverse xl:items-' . $items_alignment : ($image_side === 'left' ? 'md:flex-row xl:items-' . $items_alignment : 'flex-col-reverse justify-center text-center');
$headline_classes = 'text-white font-bold z-10 typo-' . $headline_tag_selector;

?>

<section id="<?php echo esc_attr($id); ?>" class="text-image">
    <div class="max-w-screen-xl px-5 mx-auto py-md md:py-lg xl:py-2xl">
        <div class="flex flex-col gap-8 md:gap-16 items-center <?= $image_side_classes; ?>">
            <?php if($image): ?>
                <div class="w-full image <?= $image_side != 'bottom' ? 'md:w-1/2' : 'md:max-w-[760px]' ?>">
                    <?php echo wp_get_attachment_image( $image['ID'], 'large', false, array('class' => 'object-cover mx-auto rounded-[12px]') ); ?>
                </div>
            <?php endif; ?>
            <div class="flex flex-col w-full gap-6 <?= $image_side === 'bottom' ? 'justify-center items-center circle' : 'justify-start' ?> <?= $image_side != 'bottom' ? 'md:w-1/2' : 'md:max-w-[760px]' ?>">
                <?php if($headline) { create_headline($headline, $headline_classes, $headline_tag_selector); } ?>
                <?php if($description) { ?> <?php echo $description; ?> <?php } ?>
                <?php if(isset($button['url']) && isset($button['title'])) { ?>
                   <?php create_button($button, 'a', 'btn-primary'); ?>
                <?php } ?>
                <?php if($info) { ?>
                    <div class="text-small text-image__info">
                        <?= $info; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>