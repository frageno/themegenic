<?php
/**
 * 
 * Footer Default Layout
 * 
 */

 // footer options
 $footer_layout = get_field('footer_layout', 'option');
 $footer_logo = get_field('footer_logo', 'option');
 $footer_description = get_field('footer_description', 'option');
 $footer_background_color = get_field('footer_background_color', 'option');
 $footer_text_color = get_field('footer_text_color', 'option');
 $footer_copyright_background_color = get_field('footer_copyright_background_color', 'option');
 $footer_copyright_text_color = get_field('footer_copyright_text_color', 'option');


?>

<footer id="colophon" class="footer" role="contentinfo">
  <div class="max-w-screen-xl px-4 mx-auto">
    <div class="sm:flex sm:flex-wrap md:py-4">
      <div class="mt-4 sm:w-1/3 xl:w-1/6 sm:mx-auto xl:mt-0 xl:!ml-0">
        <?php if ($footer_logo) { 
			echo wp_get_attachment_image( $footer_logo['ID'], 'large', false, array('class' => ''));
		} else { ?>
			<a href="<?php echo get_bloginfo( 'url' ); ?>" class="text-lg font-extrabold uppercase">
				<?php echo get_bloginfo( 'name' ); ?>
			</a>
		<?php } ?>
        <?php if ($footer_description) { ?> 
            <p><?php echo $footer_description; ?></p>
        <?php } ?>
       </div>
            <?php if(have_rows('footer_menus', 'option')){ ?>
                <?php while(have_rows('footer_menus', 'option')){ the_row(); 
                    $footer_menu_headline = get_sub_field('footer_menu_headline');
                    $footer_menu = get_sub_field('footer_menu');
                ?>
                <div class="sm:w-1/2 md:w-1/4 xl:w-1/6">
                    <p class="mb-6 text-xl font-bold"><?php echo $footer_menu_headline; ?></p>
                    <?php
                        wp_nav_menu(
                            array(
                                'container_id'    => $footer_menu,
                                'container_class' => 'hidden bg-gray-100 mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block',
                                'menu_class'      => 'lg:flex lg:-mx-4',
                                'li_class'        => 'lg:mx-4',
                                'theme_location'  => $footer_menu,
                            )
                        );
                    ?>
                </div>
                <?php } ?>
            <?php } ?>
    </div>
</div>
<div class="copyright w-ful bg-[#222838] px-4 py-4">
    <div class="flex flex-wrap justify-center max-w-screen-xl mx-auto md:justify-between">
      <div class="w-full md:w-1/3">
        Copyright
      </div>
      <div class="flex w-full md:items-end md:justify-end md:w-2/3">
        <ul>
            <li>aaa</li>
        </ul>
      </div>
    </div>

</div>
</footer>