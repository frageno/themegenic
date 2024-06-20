<?php 

/**
 * Template Name: Text
 */


include (get_stylesheet_directory() . '/template-parts/elements/Button/index.php');
include (get_stylesheet_directory() . '/template-parts/elements/Headline/index.php');

// Create uniqe ids
$id = 'text-' . $block['id'];

// Get fields
$subtitle = get_field('subtitle');
$headline = get_field('headline');
$headline_tag_selector = get_field('headline_tag_selector') ?? 'h2';
$description = get_field('description');
$shortcode = get_field('shortcode');
$info = get_field('info');

?>

<section id="<?php echo esc_attr($id); ?>" class="w-full scroll-section text">
    <div class="max-w-screen-xl px-5 mx-auto py-md md:py-lg xl:py-2xl">
        <div class="circle w-full md:max-w-[600px] mx-auto flex flex-col items-center justify-center text-center gap-4">
            <?php if($subtitle) { ?> <span class="font-semibold uppercase text-secondaryBlue text-small"><?= $subtitle; ?></span> <?php } ?>
            <?php if($headline) { create_headline($headline, 'text-white typo-h3 font-bold', $headline_tag_selector); } ?>
            <?php if($description) { ?> <p><?= $description; ?></p> <?php } ?>
            <?php if($shortcode) { echo do_shortcode( $shortcode ); } ?>
            <?php if($info) { ?>
                <div class="text-small text-image__info">
                    <?= $info; ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>