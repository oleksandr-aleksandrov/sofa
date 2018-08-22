<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package gordian
 */

get_header();
?>


<?php
while (have_posts()) :
    the_post();


    the_post_navigation();


endwhile; // End of the loop.
?>


<?php

get_footer();
