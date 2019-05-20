<?php get_header(); ?>

<!-- PAGE.PHP ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

<?php
  $thumb = get_the_post_thumbnail_url( $post->ID, 'Full' );
?>

<main>
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="thumb-in-post">
            <img src="<?php echo $thumb; ?>" />
        </div>
        <div class="page-content">
            <?php the_content(); ?>
        </div>
    <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>