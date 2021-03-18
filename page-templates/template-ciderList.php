<?php
/* Template Name: CiderList */
?>

<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
        $ciders = new WP_Query(
            array(
                'post_type' => 'wp_ciders', // This is the name of your post type - change this as required,
                'post_status' => 'publish',
                'posts_per_page' => -1, // -1 shows all
                // 'cat' => '' // Can add category filter
                // 'tag' => '' // Can add tag filter

            )
        );

        if ($ciders->have_posts()) :
            while ($ciders->have_posts()) : $ciders->the_post();
                // die(var_dump($post)); Use die, var_dump to show PHP object
                the_title('<h2>', '</h2>');
        ?>
                <small>
                    <?php
                    $catList = get_the_terms($ciders->ID, 'Sweetness');
                    if ($catList) {
                        $i = 0;
                        foreach ($catList as $term) {
                            $i += 1;
                            echo ($i > 1 ? ', ' : '') . $term->name;
                        }
                    }

                    ?>
                </small>
        <?php
                the_content();

                $tagList = get_the_terms($ciders->ID, 'tags');
                if ($tagList) {
                    $i = 0;
                    $tag;
                    foreach ($tagList as $term) {
                        $tag = $term->name;
                        echo "<p class='badge bg-secondary m-1'>$tag</p>";
                    }
                }

            endwhile;
        else :
            // When no posts are found, output this text.
            _e('Sorry, no posts matched your criteria.');
        endif;
        wp_reset_postdata();
        ?>
    </main>
</div>


<?php get_footer(); ?>