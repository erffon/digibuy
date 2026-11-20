<?php get_header(); ?>

<main class="container ">
    <div class="dgb-single-post">
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <!--    Single Post - Content-->
            <article class="dgb-post">
                <header class="dgb-post__header">
                    <figure class="blog-cover">
                        <?php the_post_thumbnail('full'); ?>
                    </figure>
                    <div class="blog-title">
                        <h1><?= get_the_title(); ?></h1>
                    </div>
                </header>
                <section class="dgb-post__body">
                    <?php the_content(); ?>
                </section>
            </article>
            <!--    Single Post - Sidebar-->
            <aside class="dgb-single-sidebar">
                hello
            </aside>
        <?php endwhile; endif; ?>
    </div>
</main>

<?php get_footer(); ?>

