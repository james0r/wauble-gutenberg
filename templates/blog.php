<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <div class="item post-<?php echo get_the_ID(); ?>">
    Title: <?php echo get_the_title(); ?><br>
    Content: <?php the_content(); ?></br>
    Link: <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
  </div>
  <hr>

<?php endwhile; endif; ?>
