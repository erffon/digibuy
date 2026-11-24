<?php get_header(); ?>

    <main class="container">
        <div class="dgb-single-post">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php
                    $current_post_id = get_the_ID();
                    $categories      = wp_get_post_categories( $current_post_id, array( 'fields' => 'ids' ) );
                    $related_query   = null;

                    if ( ! empty( $categories ) ) {
                        $related_args = array(
                                'post_type'              => 'post',
                                'post_status'            => 'publish',
                                'posts_per_page'         => 4,
                                'post__not_in'           => array( $current_post_id ),
                                'category__in'           => $categories,
                                'orderby'                => 'date',
                                'order'                  => 'DESC',
                                'no_found_rows'          => true,
                                'ignore_sticky_posts'    => true,
                                'update_post_term_cache' => false,
                                'update_post_meta_cache' => true,
                        );

                        $related_query = new WP_Query( $related_args );
                    }
                    ?>

                    <!-- Single Post - Content -->
                    <article class="dgb-post">
                        <header class="dgb-post__header">
                            <figure class="blog-cover">
                                <?php the_post_thumbnail( 'full' ); ?>
                            </figure>
                            <div class="blog-title">
                                <h1><?php the_title(); ?></h1>
                            </div>
                        </header>
                        <section class="dgb-post__body">
                            <?php the_content(); ?>
                        </section>
                    </article>

                    <!-- Single Post - Sidebar -->
                    <aside class="dgb-single-sidebar">
                        <?php get_template_part( 'parts/blog/single/sidebar-info' ); ?>

                        <?php

                        if ( $related_query instanceof WP_Query && $related_query->have_posts() ) :
                            while ( $related_query->have_posts() ) :
                                $related_query->the_post();

                                get_template_part(
                                        'parts/blog/single/sidebar-cards',
                                        null,
                                        array(
                                                'post_id'   => get_the_ID(),
                                                'thumbnail' => get_the_post_thumbnail_url( get_the_ID(), 'medium' ),
                                                'title'     => get_the_title(),
                                                'subtitle'  => get_the_excerpt(),
                                                'href'      => get_permalink(),
                                        )
                                );
                            endwhile;

                            wp_reset_postdata();
                        endif;
                        ?>
                    </aside>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </main>

<?php get_footer(); ?>