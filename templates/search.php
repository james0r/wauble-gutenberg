<?php get_search_form(); ?> 

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php get_template_part('template-parts/content-search'); ?>

<?php endwhile; else: ?>

<?php get_template_part('template-parts/content-none'); ?>

<?php endif; ?>