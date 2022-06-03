<!-- Begin Loop -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
I'm the example page
<div>
ACF Field Content: <?php the_field('acf_example_field') ?>  
  <span>Example CRB Field Content: </span>
  <?php the_content(); ?>
</div>

<?php endwhile; endif; ?>
<!-- End Loop -->