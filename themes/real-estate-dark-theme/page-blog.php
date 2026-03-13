<?php
/**
 * Template Name: Blog Page
 */
get_header();
?>

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--secondary-bg) 0%, var(--primary-bg) 100%); padding: 100px 0 60px; text-align: center;">
    <div class="container">
        <h1 style="font-size: 3rem; margin-bottom: 15px;">Our Blog</h1>
        <p style="font-size: 18px; color: var(--text-gray);">Latest news, tips, and insights from the real estate world</p>
    </div>
</section>

<!-- Blog Posts -->
<section class="section">
    <div class="container">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $blog_query = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 9,
            'paged' => $paged,
        ));

        if ($blog_query->have_posts()) : ?>
            <div class="posts-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px;">
                <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?> style="background: var(--card-bg); border-radius: 8px; overflow: hidden; border: 1px solid var(--border-color); transition: var(--transition);">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail" style="height: 220px; overflow: hidden;">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', array('style' => 'width: 100%; height: 100%; object-fit: cover; transition: var(--transition);')); ?>
                                </a>
                            </div>
                        <?php else : ?>
                            <div class="post-thumbnail" style="height: 220px; background: var(--secondary-bg); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-image" style="font-size: 48px; color: var(--border-color);"></i>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-content" style="padding: 25px;">
                            <div class="post-meta" style="display: flex; gap: 15px; margin-bottom: 15px; font-size: 13px; color: var(--text-gray);">
                                <span>
                                    <i class="far fa-calendar"></i>
                                    <?php echo get_the_date(); ?>
                                </span>
                                <span>
                                    <i class="far fa-user"></i>
                                    <?php the_author(); ?>
                                </span>
                            </div>
                            
                            <h2 class="post-title" style="font-size: 20px; margin-bottom: 15px;">
                                <a href="<?php the_permalink(); ?>" style="color: var(--text-light);"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="post-excerpt" style="color: var(--text-gray); margin-bottom: 20px; line-height: 1.6;">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="read-more" style="color: var(--accent-gold); font-weight: 600; display: inline-flex; align-items: center; gap: 8px;">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <div style="margin-top: 50px;">
                <?php
                echo paginate_links(array(
                    'total' => $blog_query->max_num_pages,
                    'prev_text' => '<i class="fas fa-arrow-left"></i> Previous',
                    'next_text' => 'Next <i class="fas fa-arrow-right"></i>',
                ));
                ?>
            </div>
            
            <?php wp_reset_postdata();
        else : ?>
            <div class="no-posts" style="text-align: center; padding: 60px 20px;">
                <i class="fas fa-newspaper" style="font-size: 64px; color: var(--accent-gold); margin-bottom: 20px;"></i>
                <h2 style="margin-bottom: 15px;">No Blog Posts Yet</h2>
                <p style="color: var(--text-gray); margin-bottom: 30px;">Check back soon for our latest articles and insights!</p>
                <a href="<?php echo home_url(); ?>" class="btn btn-primary">Back to Home</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>