<?php
/**
 * Archive Cars Page Template
 */

get_header();

$args = array(
    'post_type'     => 'cars',
    'post_status'   => 'publish',
    'post_per_page' => 9,
);

$query = new WP_Query($args);
?>

<?php if($query->have_posts()): ?>
    <div class="container py-12 mx-auto">
        <div class="grid grid-cols-3 gap-5">
            <?php while($query->have_posts()): $query->the_post() ?>
                <div class="p-5 shadow-md card">
                    <span class="text-2xl font-bold"><?php the_title();?></span>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>

<?php
get_footer();