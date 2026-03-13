<?php
/**
 * Single Post Template
 */
get_header();
?>

<div class="container content-wrapper" style="padding: 100px 20px 60px;">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="max-width: 800px; margin: 0 auto;">
            
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail" style="margin-bottom: 30px; border-radius: 8px; overflow: hidden;">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>
            
            <header class="entry-header" style="margin-bottom: 30px;">
                <h1 class="entry-title" style="font-size: 2.5rem; margin-bottom: 20px;"><?php the_title(); ?></h1>
                
                <div class="entry-meta" style="display: flex; gap: 20px; color: var(--text-gray); font-size: 14px;">
                    <span><i class="far fa-calendar"></i> <?php echo get_the_date(); ?></span>
                    <span><i class="far fa-user"></i> <?php the_author(); ?></span>
                    <span><i class="far fa-folder"></i> <?php the_category(', '); ?></span>
                </div>
            </header>
            
            <div class="entry-content" style="line-height: 1.8; color: var(--text-gray);">
                <?php the_content(); ?>
            </div>
            
            <?php if (has_tag()) : ?>
                <div class="entry-tags" style="margin-top: 40px; padding-top: 30px; border-top: 1px solid var(--border-color);">
                    <strong style="color: var(--text-light);">Tags: </strong>
                    <?php the_tags('', ', ', ''); ?>
                </div>
            <?php endif; ?>
            
        </article>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>  