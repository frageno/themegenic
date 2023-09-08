<?php

/**
 * Template Name: Header Intro
 */

 // Create uniqe ids
 $id = 'header-intro' . $block['id'];

 // Load values and handle them
 $headline = get_field('headline');
 $highlighted_word = get_field('highlighted_word');
 $description = get_field('description');
 $button = get_field('button');
 $show_arrow = get_field('show_arrow') ?? 'yes';
 ?>


 <div id="<?php echo esc_attr($id); ?>" class="relative">
	<div class="max-w-screen-xl px-5 py-32 mx-auto rounded-xl">
        <div class="max-w-screen-md mx-auto text-center">
            <?php if($headline): ?>
                <h1 class="relative z-10 px-10 text-4xl font-semibold tracking-tight lg:text-6xl <?php echo $description ? 'mb-6' : 'mb-12' ?>">
                    <?php echo $headline; ?> <?php if($highlighted_word) { ?> <span class="text-primary"><?php echo $highlighted_word; ?></span> <?php } ?>
                    <span class="hidden lg:block absolute top-0 right-0 z-[-1]">
                        <svg width="171" height="152" viewBox="0 0 171 152" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="85" cy="102" r="50" fill="#00B0EF"/>
                            <circle cx="121" cy="50" r="50" fill="#00B0EF" fill-opacity="0.1"/>
                            <circle cx="50" cy="52" r="50" fill="#00B0EF" fill-opacity="0.25"/>
                        </svg>
                    </span>
                </h1>
            <?php endif; ?>
            <?php if($description): ?>
                <p class="my-12 text-lg text-gray-600"><?php echo $description; ?></p>
            <?php endif; ?>
            <?php if(isset($button['url']) && isset($button['title'])): ?>
                <a href="<?php echo $button['url']; ?>" class="flex-none w-full px-6 py-3 text-lg font-semibold leading-6 text-white transition-colors duration-200 border border-transparent bg-primary sm:w-auto rounded-xl focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900 focus:outline-none"><?php echo $button['title']; ?></a>
            <?php endif; ?>
        
            <svg class="absolute left-0 -translate-y-1/2 top-1/2" width="96" height="308" viewBox="0 0 96 308" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="-58" cy="154" r="154" fill="#00B0EF" fill-opacity="0.1"/>
            </svg>

            <?php if($show_arrow): ?>
                <!-- arrow -->
                <svg class="absolute bottom-0 -translate-x-1/2 left-1/2 animate-bounce" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 1C7.716 1 1 7.716 1 16C1 24.284 7.716 31 16 31C24.284 31 31 24.284 31 16C31 7.716 24.284 1 16 1ZM16 24.5L8 16.8475H13.4285V7.5H18.571V16.8475H24L16 24.5Z" fill="#101010"/>
                </svg>
            <?php endif; ?>


        </div>
    </div>
</div>
