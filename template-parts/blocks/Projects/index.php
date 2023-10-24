<?php
/**
 * Template Name: Projects
 */

 // Create uniqe ids
 $id = 'header-intro' . $block['id'];

 // fields
 $headline = get_field('headline');
 $description = get_field('description');
 $button = get_field('button');
 $selected_projects = get_field('select_projects');
 ?>

<section id="<?php echo esc_attr($id); ?>">
    <div class="max-w-screen-xl px-5 py-32 mx-auto">
        <div class="projects-header flex items-center justify-between">
            <div class="projects-header__content">
                <?php if($headline) { ?> <h2 class="text-secondary font-bold text-5xl mb-4"><?php echo $headline; ?></h2> <?php } ?>
                <?php if($description) { ?> <p><?php echo $description; ?></p> <?php } ?>
            </div>
            <div class="projects-header__btn">
                <?php if(isset($button['url']) && isset($button['title'])) { ?>
                    <a class="flex-none w-[fit-content] mx-auto px-6 py-3 text-lg font-semibold leading-6 text-white transition-colors duration-200 border border-transparent bg-primary sm:w-auto rounded-xl focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900 focus:outline-none" target="<?php echo $button['target'] ?>" href="<?php echo $button['url']; ?>"> <?php echo $button['title']; ?></a>
                <?php } ?>
            </div>
        </div>
        <!-- selected projects -->
        <?php if($selected_projects) {
            $args = array(
                'post_type'   => 'portfolio',
                'post__in'    => $selected_projects,
                'post_status' => 'publish'
            );

            $query = new WP_Query($args);
        } ?>
        <?php if($query->have_posts()){ ?>
            <div class="projects-selected py-16 grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                <?php while($query->have_posts()){
                        $query->the_post();
                    ?>
                    <div class="single-project">
                        <div class="w-full max-w-[470px] h-full">
                            <?php echo the_post_thumbnail(get_the_ID(), 'large'); ?> 
                        </div>
                        <div class="single-project__content">
                            <span><?php the_title(); ?></span>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    </div>
                <?php };
                    wp_reset_query(); ?>
            </div>
        <?php } ?>
    </div>
</section>