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
        <div class="projects-header flex flex-col md:flex-row gap-y-8 items-start md:items-center justify-between">
            <div class="projects-header__content">
                <?php if($headline) { ?> <h2 class="text-secondary font-bold text-5xl mb-4"><?php echo $headline; ?></h2> <?php } ?>
                <?php if($description) { ?> <p><?php echo $description; ?></p> <?php } ?>
            </div>
            <div class="projects-header__btn">
                <?php if(isset($button['url']) && isset($button['title'])) { ?>
                    <a class="flex-none w-[fit-content] mx-auto px-6 py-3 text-lg font-semibold leading-6 text-white transition-colors duration-200 border border-transparent bg-primary hover:!bg-[#101010] sm:w-auto rounded-xl focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900 focus:outline-none duration-300" target="<?php echo $button['target'] ?>" href="<?php echo $button['url']; ?>"> <?php echo $button['title']; ?></a>
                <?php } ?>
            </div>
        </div>
        <!-- selected projects -->
        <?php if($selected_projects) {
            $args = array(
                'post_type'   => 'portfolio',
                'post__in'    => $selected_projects,
                'post_status' => 'publish',
                'posts_per_page' => 3
            );

            $query = new WP_Query($args);
        } ?>
        <?php if($query->have_posts()){ ?>
            <div class="projects-selected py-16 grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                <?php while($query->have_posts()){
                        $query->the_post();
                        $project_description = get_field('project_description', get_the_ID());
                        $project_link = get_field('project_link', get_the_ID());
                    ?>
                    <div class="single-project">
                        <div class="w-full max-w-[470px] rounded-t-[25px]">
                            <?php echo the_post_thumbnail('large', array('class' => 'w-full')); ?> 
                        </div>
                        <div class="single-project__content flex items-center gap-x-xs bg-white px-4 py-5 box-shadow-md rounded-b-[25px]">
                            <div class="single-project__description">
                                <span class="text-xl text-secondary font-medium"><?php the_title(); ?></span>
                                <?php if($project_description) { ?> <p class="pt-2"><?php echo $project_description; ?></p> <?php } ?>
                            </div>
                            <?php if(isset($project_link['url'])): ?>
                            <div class="single-project__link">
                                  <a target="<?php echo $project_link['target']; ?>" href="<?php echo $project_link['url']; ?>">
                                        <svg class="hover:scale-105" width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="31" cy="31" r="31" fill="#00B0EF" fill-opacity="0.1"/>
                                            <path d="M40.5 23C40.5 22.1716 39.8284 21.5 39 21.5L25.5 21.5C24.6716 21.5 24 22.1716 24 23C24 23.8284 24.6716 24.5 25.5 24.5H37.5V36.5C37.5 37.3284 38.1716 38 39 38C39.8284 38 40.5 37.3284 40.5 36.5L40.5 23ZM24.0607 40.0607L40.0607 24.0607L37.9393 21.9393L21.9393 37.9393L24.0607 40.0607Z" fill="#00B0EF"/>
                                        </svg>
                                  </a>  
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php };
                    wp_reset_query(); ?>
            </div>
        <?php } ?>
    </div>
</section>