<article>
  I'm a page <br>
  Page Name: <?php echo get_the_title(); ?> <br>
  Featured Image: <br>
  <?php 
    echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
  ?><br>
  Page Content: <?php the_content(); ?> <br>
</article>