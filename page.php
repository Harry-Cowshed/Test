<?php 
    /* Template Name: Homepage */
    get_header(); ?>

<div>
    <h2><?php the_title() ?></h2>
</div>
<div>
    <?php get_template_part('includes/section', 'content'); ?>
</div>
<?php get_footer(); ?>