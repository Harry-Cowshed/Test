<?php
/* Template Name: FilterList */
?>

<?php get_header(); ?>

<!-- FORM -->

<form method="GET" action="/wordpress/filter-page/">

    <?php

    $catTerms = get_terms([
        'taxonomy' => 'Sweetness',
        'hide_empty' => false
    ]);

    echo '<select name="sweetness">';

    foreach ($catTerms as $term) :

        $sweetness = '';
        if (isset($_GET['sweetness'])) {
            if ($_GET['sweetness'] == $term->slug) {
                $sweetness = 'selected';
            }
        }
        echo '<option value="' . $term->slug . '"' . $sweetness . '>' . $term->name . '</option>';

    endforeach;

    echo '</select>';


    $tagTerms = get_terms([
        'taxonomy' => 'tags',
        'hide_empty' => false
    ]);

    echo '<select name="tag">';

    foreach ($tagTerms as $term) :

        $tag = '';
        if (isset($_GET['tag'])) {
            if ($_GET['tag'] == $term->slug) {
                $tag = 'selected';
            }
        }
        echo '<option value="' . $term->slug . '"' . $tag . '>' . $term->name . '</option>';

    endforeach;

    echo '</select>';

    ?>

    <input type="hidden" name="submitted" value="Y">
    <button type="submit">Apply</button>

</form>


<!-- LOOP -->

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php

        if (isset($_GET['submitted'])) :

            $searched = esc_html($_GET['sweetness']);
            $searchedTags = esc_html($_GET['tag']);
        endif;

        $args = [
            'post_type' => 'wp_ciders', // This is the name of your post type - change this as required can be found by hovering over WP pin,
            'post_status' => 'publish',
            'posts_per_page' => -1, // -1 shows all
            'tax_query' => [
                [
                    'taxonomy' => 'Sweetness',
                    'field' => 'slug',
                    'terms' => $searched,
                ],
                [
                    'taxonomy' => 'tags',
                    'field' => 'slug',
                    'terms' => $searchedTags,
                ],
            ]
        ];

        $ciders = new WP_Query($args);

        if ($ciders->have_posts()) :
            while ($ciders->have_posts()) : $ciders->the_post();
                // die(var_dump($post)); Use die, var_dump to show PHP object
                the_title('<h2>', '</h2>');
        ?>
                <small>
                    <?php
                    $catList = get_the_terms($ciders->ID, 'Sweetness');
                    $i = 0;
                    foreach ($catList as $term) {
                        $i += 1;
                        if ($i > 1) {
                            echo ", " . $term->name;
                        } else {
                            echo $term->name;
                        }
                    }
                    ?>
                </small>
        <?php
                the_content();

                $tagList = get_the_terms($ciders->ID, 'tags');
                $i = 0;
                $tag;
                foreach ($tagList as $term) {
                    $tag = $term->name;
                    echo "<p class='badge bg-secondary m-1'>$tag</p>";
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