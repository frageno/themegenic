<?php 

/**
 * Template Name: Teaser Cards
 */

include (get_stylesheet_directory() . '/template-parts/elements/Headline/index.php');


// Create uniqe ids
$id = 'teaser-cards-' . $block['id'];

// Get fields
$headline = get_field('headline');
$headline_tag_selector = get_field('headline_tag_selector') ?? 'h2';

?>

<section id="<?php echo esc_attr($id); ?>" class="w-full scroll-section">
    <?php if(have_rows('cards')): ?>
        <div class="max-w-screen-xl px-5 py-32 mx-auto">
            <?php if($headline) { create_headline($headline, 'text-white typo-h2 font-bold mb-md', $headline_tag_selector); } ?>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                <?php while(have_rows('cards')): the_row();
                    $card_image = get_sub_field('card_image');
                    $card_title = get_sub_field('card_title');
                    $card_description = get_sub_field('card_description');
                ?>
                    <div class="flex flex-col transition-all duration-300 gap-sm md:gap-md bg-darkBg p-xs py-sm lg:p-md teaser-card box-shadow rounded-3xl">
                        <?php if($card_image): ?>
                            <div class="image">
                                <?php echo wp_get_attachment_image( $card_image, 'large', false, array('class' => 'object-cover transition-all duration-300 hover:scale-105 rounded-[12px]') ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if($card_title && $card_description){ ?>
                            <div class="flex flex-col content gap-y-xxs">
                                <h4 class="font-bold text-white text-headline-h5"><?php echo $card_title; ?></h4>
                                <p><?php echo $card_description; ?></p>
                            </div>
                        <?php } ?>
                    </div>
                <?php endwhile; 
                      wp_reset_postdata(); ?>
            </div>
        </div>
    <?php endif; ?>
</section>