<?php 

/**
 * Template Name: Teaser Cards
 */

// Create uniqe ids
$id = 'header-intro' . $block['id'];

?>

<section id="<?php echo esc_attr($id); ?>" class="scroll-section w-full">
    <?php if(have_rows('cards')): ?>
        <div class="max-w-screen-xl px-5 py-32 mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-md">
                <?php while(have_rows('cards')): the_row();
                    $image = get_sub_field('image');
                    $headline = get_sub_field('headline');
                    $description = get_sub_field('description');
                ?>
                    <div class="p-md teaser-card bg-white box-shadow border-b-2 border-transparent hover:border-b-2 hover:border-primary flex flex-col items-center justify-center text-center rounded-3xl transition-all duration-300">
                        <?php if($image): ?>
                            <div class="image">
                                <?php echo wp_get_attachment_image( $image['ID'], 'large', false, array('class' => 'object-cover') ); ?>
                            </div>
                        <?php endif; ?>
                        <div class="content flex flex-col gap-y-xs">
                            <h4 class="font-semibold text-secondary text-3xl"><?php echo $headline; ?></h4>
                            <p><?php echo $description; ?></p>
                        </div>
                    </div>
                <?php endwhile; 
                      wp_reset_postdata(); ?>
            </div>
        </div>
    <?php endif; ?>
</section>