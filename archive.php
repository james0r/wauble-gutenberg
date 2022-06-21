<?php get_template_part('template-parts/header'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<h1 class="entry-title"><?php the_title(); ?>
</h1>

<?php endwhile; endif; ?>

<h2>Archives by Month:</h2>
<ul>
  <?php wp_get_archives('type=monthly'); ?>
</ul>

<h2>Archives by Subject:</h2>
<ul>
  <?php wp_list_categories(); ?>
</ul>

<?php get_template_part('template-parts/footer');
