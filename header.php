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
		$favicon = get_field('favicon', 'option');
		$font_family = get_field('font_family', 'option');
	?>
	
	<?php if($font_family){ ?>
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=<?php echo $font_family; ?>:wght@400;500;600;700;800;900" rel="stylesheet">
	<?php } ?>

	<?php if($favicon) { ?>
		<link rel="icon" type="image/png" href="<?php echo $favicon; ?>">
	<?php } ?>
</head>

<body <?php body_class( 'bg-[#121826] text-gray-900 antialiased text-body font-primary' ); ?>>

<?php do_action( 'themegenic_site_before' ); ?>

<div id="page" class="flex flex-col">

	<?php do_action( 'themegenic_header' ); ?>

	<?php echo get_template_part('/template-parts/headers/header', 'extend'); ?>

	<div id="content" class="flex-grow site-content">

		<?php do_action( 'themegenic_content_start' ); ?>

		<main>
