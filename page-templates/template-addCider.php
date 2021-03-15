<?php
/* Template Name: Add Cider */
?>

<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <h2><?php get_template_part('includes/section', 'content'); ?></h2>

        <!-- cider input form -->
        <form class="ciderForm">
            <div class="mb-3">
                <label for="text" class="form-label">Title:</label>
                <input type="text" name="cider-name" class="form-control" id="text" placeholder="name of cider">
            </div>
            <div class="mb-3">
                <label for="cider text" class="form-label">Content:</label>
                <textarea class="form-control" name="cider-content" id="cider text" rows="3" placeholder="enter info"></textarea>
            </div>
            <button id="addCiderBtn" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
</div>


<?php get_footer(); ?>