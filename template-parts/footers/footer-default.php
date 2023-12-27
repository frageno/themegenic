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
 $copyright_text = get_field('copyright_text', 'option');

?>

<footer id="colophon" class="footer" role="contentinfo">
  <div class="max-w-screen-xl px-4 mx-auto">
    <div class="sm:flex sm:flex-wrap md:py-4">
      <div class="mt-4 sm:w-1/2 xl:w-1/6 xl:mx-auto xl:mt-0 xl:!ml-0">
        <?php if($footer_logo) { 
			echo wp_get_attachment_image( $footer_logo['ID'], 'large', false, array('class' => ''));
		} else { ?>
			<a href="<?php echo get_bloginfo( 'url' ); ?>" class="text-lg font-extrabold uppercase">
				<?php echo get_bloginfo( 'name' ); ?>
			</a>
		<?php } ?>
        <?php if($footer_description) { ?> 
            <p class="text-sm mt-4 mb-6"><?php echo $footer_description; ?></p>
        <?php } ?>
        <?php if (have_rows('footer_contacts', 'option')) { ?>
          <ul class="py-6 border-t border-[#939DB810]">
            <?php while(have_rows('footer_contacts', 'option')){ the_row();
              $footer_contact = get_sub_field('footer_contact');
            ?>
              <?php if(isset($footer_contact['url']) && isset($footer_contact['title'])) { ?>
                <li class="text-sm pb-2">
                  <a class="duration-300 transition-all hover:text-white" href="<?php echo $footer_contact['url']; ?>"><?php echo $footer_contact['title']; ?></a>
                </li>
              <?php } ?>
            <?php } ?>
            </ul>
        <?php } ?>
      </div>
            <?php if(have_rows('footer_menus', 'option')){ 
               $menu_count = 0;
              ?>
                <?php while(have_rows('footer_menus', 'option')){ the_row(); 
                    $footer_menu_headline = get_sub_field('footer_menu_headline');
                    $footer_menu = get_sub_field('footer_menu');
                    if ($menu_count < $footer_layout) {
                ?>
                <div class="sm:w-1/2 md:w-1/4 xl:w-1/6">
                    <p class="mb-4 text-base font-bold text-white"><?php echo $footer_menu_headline; ?></p>
                    <?php
                        wp_nav_menu(
                            array(
                                'container_id'    => $footer_menu,
                                'container_class' => 'mt-4 p-4 lg:mt-0 lg:p-0 block',
                                'menu_class'      => 'lg:flex flex-col',
                                'li_class'        => 'py-2 text-[14px] duration-300 transition-all hover:text-white',
                                'theme_location'  => $footer_menu,
                            )
                        );
                    ?>
                </div>
                <?php $menu_count++; }
                      } ?>
            <?php } ?>
    </div>
</div>
<div class="copyright w-ful bg-[#222838] border-t border-[#939DB810] px-4 py-4">
    <div class="flex flex-wrap justify-center items-center max-w-screen-xl mx-auto md:justify-between">
      <div class="w-full md:w-1/3">
        <p class="text-xs"><?php echo $copyright_text; ?></p>
      </div>
      <div class="flex w-full md:items-end md:justify-end md:w-2/3">
        <ul>
            <li>aaa</li>
        </ul>
      </div>
    </div>

</div>
</footer>