<?php get_header(); ?>

<!-- FRONT-PAGE.PHP ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<?php
  $thumb = get_the_post_thumbnail_url( $post->ID, 'Full' );
?>

<main>
    <div class="homepage-content">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="thumb-in-post">
                    <img src="<?php echo $thumb; ?>" />
                </div>
                <?php the_content(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>