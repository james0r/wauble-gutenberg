<!-- Begin Loop -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
I'm the example page
<div>
  <span>Example CRB Field Content: </span>
  <?php echo carbon_get_post_meta(get_the_ID(), 'crb_example_field'); ?>
</div>

<?php endwhile; endif; ?>
<!-- End Loop -->