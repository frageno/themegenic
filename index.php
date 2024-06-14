<?php get_header();

$enable_breadcrumbs = get_field('enable_breadcrumbs', 'option');

?>

<div class="mx-auto text-body">

	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<?php if($enable_breadcrumbs && !is_front_page()) {
				echo get_template_part('/template-parts/elements/Breadcrumbs/index');
			} ?>
			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

		<?php endwhile; ?>

	<?php endif; ?>

</div>

<?php
get_footer();
