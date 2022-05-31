<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div>
    Title: <?php echo get_the_title(); ?>
  </div>

  <div>
    Thumbnail: <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'alignleft')); ?>
  </div>

  <div>
    Excerpt: <?php the_excerpt(); ?>
  </div>

</article><!-- #post-<?php the_ID(); ?> -->