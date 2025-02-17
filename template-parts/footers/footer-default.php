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
    <div class="relative items-center justify-between hidden py-4 border-b lg:flex border-lightBlue mb-xs md:mb-md">
      <?php
          wp_nav_menu(
            array(
              'menu'            => 'footer-above',
              'container_id'    => 'footer-above',
              'container_class' => 'bg-gray-100 mt-0 p-0 bg-transparent block',
              'menu_class'      => 'flex',
              'li_class'        => 'mx-5 text-xs',
              'fallback_cb'     => false,
              )
          );
      ?>
    </div>
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
            <p class="mt-4 mb-6 text-sm"><?php echo $footer_description; ?></p>
        <?php } ?>
        <?php if (have_rows('footer_contacts', 'option')) { ?>
          <ul class="py-6 border-t border-[#939DB810]">
            <?php while(have_rows('footer_contacts', 'option')){ the_row();
              $footer_contact = get_sub_field('footer_contact');
            ?>
              <?php if(isset($footer_contact['url']) && isset($footer_contact['title'])) { ?>
                <li class="pb-2 text-small">
                  <a class="transition-all duration-300 hover:text-white" href="<?php echo $footer_contact['url']; ?>"><?php echo $footer_contact['title']; ?></a>
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
                                'menu'            => $footer_menu,
                                'container_id'    => 'footer-menu-' . $menu_count,
                                'container_class' => 'mt-4 p-4 px-0 lg:mt-0 lg:p-0 block',
                                'menu_class'      => 'lg:flex flex-col footer__nav',
                                'li_class'        => 'py-2 text-small hover:text-white tranistion-all duration-300'
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
    <div class="flex flex-wrap items-center justify-center max-w-screen-xl mx-auto md:justify-between">
      <div class="w-full md:w-1/3">
        <p class="text-xs"><?php echo $copyright_text; ?></p>
      </div>
      <div class="flex w-full md:items-end md:justify-end md:w-2/3">
        <?php
          wp_nav_menu(
            array(
              'menu'            => 'copyright',
              'container_id'    => 'copyright',
              'container_class' => 'bg-gray-100 mt-0 p-0 bg-transparent block',
              'menu_class'      => 'flex',
              'li_class'        => 'first:mx-0 mx-4 text-xs',
              'fallback_cb'     => false,
              )
          );
        ?>
      </div>
    </div>

</div>
</footer>