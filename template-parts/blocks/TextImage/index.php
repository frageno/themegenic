<?php 

/**
 * Template Name: Text Image
 */

include (get_stylesheet_directory() . '/template-parts/elements/Button/index.php');
include (get_stylesheet_directory() . '/template-parts/elements/Headline/index.php');

// Create uniqe ids
$id = 'header-intro' . $block['id'];


// fields
$background_color = get_field('background_color');
$text_color = get_field('text_color');
$headline = get_field('headline');
$subheadline = get_field('subheadline');
$description = get_field('description');
$button = get_field('button');
$image = get_field('image');

$layout = 'bg-bg-[' . $background_color . '] ' . 'text-[' . $text_color . ']';

?>

<section id="<?php echo esc_attr($id); ?>" class="bg-[#e6f8fe]">
    <div class="max-w-screen-xl px-5 py-32 mx-auto">
        <div class="flex flex-col items-start md:flex-row md:items-center">
            <?php if($image): ?>
                <div class="w-full image md:w-1/2">
                    <?php echo wp_get_attachment_image( $image['ID'], 'large', false, array('class' => 'object-cover') ); ?>
                </div>
            <?php endif; ?>
            <div class="flex flex-col justify-start w-full gap-8 content md:w-1/2">
                <?php if($headline) { create_headline($headline, 'text-secondary font-semibold text-4xl', 'h2'); } ?>
                <?php if($subheadline) { create_headline($subheadline, 'text-secondary font-semibold text-2xl', 'span'); } ?>
                <?php if($description) { ?> <?php echo $description; ?> <?php } ?>
                <?php if(isset($button['url']) && isset($button['title'])) { ?>
                   <?php create_button($button, 'a', 'btn-primary'); ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>