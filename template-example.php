<?php /* Template Name: Template Example */ ?>

<?php get_header() ?>

<?php while (have_posts()):the_post(); ?>

  <section class="content">
      <h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
      <?php the_post_thumbnail() ?>
      <?php the_content() ?>
  </section>

<?php endwhile; ?>


<?php
get_footer();
