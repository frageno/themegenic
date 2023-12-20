<?php
/**
 * 
 * Header with Topbar Layout
 * 
 */

 $logo = get_field('logo', 'option');
 $display_menu = get_field('display_menu', 'option');
?>


<header>
    <!-- topbar -->
    <div class="topbar hidden md:block w-full py-3 border-b border-[#939DB8]">
        <div class="max-w-screen-xl px-5 mx-auto">
            <div class="flex justify-between">
                <?php
                    wp_nav_menu(
                        array(
                            'container_id'    => 'topbar-menu',
                            'container_class' => 'bg-gray-100 mt-0 p-0 bg-transparent block',
                            'menu_class'      => 'flex',
                            'li_class'        => 'mx-4 text-xs text-body',
                            'fallback_cb'     => false,
                        )
                    );
                ?>
                <a class="text-xs text-body" href="#"><?php _e('Book a demo' , 'themegenic'); ?></a>
            </div>
        </div>
    </div>
    <div class="max-w-screen-xl px-5 mx-auto">
			<div class="py-6 lg:flex lg:justify-between lg:items-center">
				<div class="flex items-center justify-between">
					<div class="logo">
						<?php if ($logo) { 
							echo wp_get_attachment_image( $logo['ID'], 'large', false, array('class' => ''));
						} else { ?>
							<a href="<?php echo get_bloginfo( 'url' ); ?>" class="text-lg font-extrabold uppercase">
								<?php echo get_bloginfo( 'name' ); ?>
							</a>

							<p class="text-sm font-light text-gray-600">
								<?php echo get_bloginfo( 'description' ); ?>
							</p>

						<?php } ?>
					</div>

					<div class="lg:hidden">
						<a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
							<svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
									<g id="icon-shape">
										<path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z"
											  id="Combined-Shape"></path>
									</g>
								</g>
							</svg>
						</a>
					</div>
				</div>

				<?php
				wp_nav_menu(
					array(
						'container_id'    => $display_menu ? $display_menu : 'primary',
						'container_class' => 'hidden bg-gray-100 mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block',
						'menu_class'      => 'lg:flex lg:-mx-4',
						'theme_location'  => 'primary',
						'li_class'        => 'lg:mx-4',
						'fallback_cb'     => false,
					)
				);
				?>
			</div>
		</div>
</header>