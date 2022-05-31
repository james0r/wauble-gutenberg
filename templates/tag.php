<?php $tag_id = get_queried_object_id(); ?>

List of posts with <?php echo get_tag($tag_id)->name ?>

<!-- Begin Loop -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php 
      echo '<br>';
      the_title(); 
      the_content();    
    ?>

<?php endwhile; endif; ?>
<!-- End Loop -->