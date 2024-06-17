<?php 

/**
 * Template Name: Logos
 */

include (get_stylesheet_directory() . '/template-parts/elements/Headline/index.php');


// Create uniqe ids
$id = 'logos-' . $block['id'];

// Get fields
$headline = get_field('headline');
$headline_tag_selector = get_field('headline_tag_selector') ?? 'h2';
$description = get_field('description');

?>

<section id="<?php echo esc_attr($id); ?>" class="w-full scroll-section">
    <div class="max-w-screen-xl px-5 mx-auto py-md md:py-lg xl:py-2xl">
        <div class="w-full md:max-w-[600px] mx-auto flex flex-col items-center justify-center text-center">
            <?php if($headline) { create_headline($headline, 'text-white text-headline-h4 font-bold mb-4' , $headline_tag_selector); } ?>
            <?php if($description) { ?> <p><?= $description; ?></p> <?php } ?>
        </div>
        <?php if(have_rows('logos')): ?>
            <div class="grid grid-cols-2 grid-row-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-8 lg:grid-rows-2 gap-md my-xs md:my-md">
                <?php while(have_rows('logos')): the_row();
                    $logo_image = get_sub_field('logo_image');
                    $logo_link = get_sub_field('logo_link');
                    $row_index = get_row_index();
                ?>
                    <?php if(isset($logo_link['url'])); { ?> 
                        <a class="<?php echo $row_index > 6 ? 'lg:row-start-2' : 'lg:col-start-' . $row_index + 1; ?> flex items-center justify-center mx-auto w-full h-full lg:w-[84px] lg:h-[84px] p-2 bg-darkBg rounded-[12px] border border-border" href="<?= $logo_link['url']; ?>">
                            <?php echo wp_get_attachment_image( $logo_image, 'thumbnail', false, array('class' => '')); ?>
                        </a>
                    <?php } ?>
                <?php endwhile;
                      wp_reset_postdata();
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>