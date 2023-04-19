<?php get_header(); ?>
<header class="header">
<h1 class="entry-title" itemprop="name"><?php the_archive_title(); ?></h1>
<div class="archive-meta" itemprop="description"><?php if ( '' != the_archive_description() ) { echo esc_html( the_archive_description() ); } ?></div>
</header>
<div class="archive-title">
    BLOG
</div>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="padding:1em 5%;">
    
    <div class="entry-summary">
    <?php if ( ( has_post_thumbnail() ) && ( !is_search() ) ) : ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
    <?php endif; ?>
    <?php if ( is_search() ) { ?>
    <div class="entry-links"><?php wp_link_pages(); ?></div>
    <?php } ?>
    </div>

    <header>
    <?php if ( is_singular() ) { echo '<h1 class="entry-title" itemprop="headline">'; } else { echo '<h2 class="entry-title">'; } ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" class="archive-article-link"><?php the_title(); ?></a>
    <?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>
    <?php edit_post_link(); ?>

    <div class="entry-meta">
    <time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" title="<?php echo esc_attr( get_the_date() ); ?>" <?php if ( is_single() ) { echo 'itemprop="datePublished" pubdate'; } ?>><?php the_time( get_option( 'date_format' ) ); ?></time>
    <?php if ( is_single() ) { echo '<meta itemprop="dateModified" content="' . esc_attr( get_the_modified_date() ) . '" />'; } ?>
    </div>
    
    </header>
    <div itemprop="description"><?php the_excerpt(); ?></div>
    </article>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
<?php get_footer(); ?>