<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<?php 
		wp_head();

		// theme options
		$logo = get_field('logo', 'option');
		$favicon = get_field('favicon', 'option');
		$font_family = get_field('font_family', 'option');
		$body_font_size = get_field('body_font_size', 'option');
	?>
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=<?php echo $font_family ? $font_family : 'Poppins'?>:wght@400;500;600;700;800;900" rel="stylesheet">
	<style>
		body { font-family: '<?php echo $font_family ? $font_family : 'Poppins'; ?>'; font-size: <?php echo $body_font_size ? $body_font_size : 16 ?>px; }
	</style>
	<?php if($favicon) { ?>
		<link rel="icon" type="image/png" href="<?php echo $favicon; ?>">
	<?php } ?>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?>>

<?php do_action( 'themegenic_site_before' ); ?>

<div id="page" class="flex flex-col min-h-screen">

	<?php do_action( 'themegenic_header' ); ?>

	<header>

		<div class="max-w-screen-xl px-5 mx-auto">
			<div class="py-6 border-b lg:flex lg:justify-between lg:items-center">
				<div class="flex items-center justify-between">
					<div class="logo">
						<?php if ( has_custom_logo() ) { 
                            the_custom_logo();
							echo 'das';
						} elseif ($logo) { 
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
						'container_id'    => 'primary-menu',
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

	<div id="content" class="flex-grow site-content" style="background:<?php echo DEFAULT_BACKGROUND_COLOR ? DEFAULT_BACKGROUND_COLOR : '#FFFFFF'; ?>; color:<?php echo DEFAULT_TEXT_COLOR ? DEFAULT_TEXT_COLOR : '#000000'; ?>">

		<?php do_action( 'themegenic_content_start' ); ?>

		<main>
