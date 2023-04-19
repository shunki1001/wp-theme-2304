<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!-- <header class="header">
<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
</header> -->
<div class="entry-content" itemprop="mainContentOfPage">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); } ?>
<?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</div>
<div class="category-post-list">
<?php if ( is_page( 8754 ) ): ?>
    <?php $list_categroies_id = array(34, 31, 35, 36);
    foreach ($list_categroies_id as $category_id) :?>
    <?php
    $cat_posts = get_posts(array(
        'post_type' => 'post', // 投稿タイプ
        'category' => $category_id, // カテゴリをスラッグで指定する場合
        'posts_per_page' => 5, // 表示件数
        'orderby' => 'date', // 表示順の基準
        'order' => 'DESC' // 昇順・降順
    ));
    global $post; ?>
    <div class="each-category">
        <div class="each-category-border">
        <h3><?php echo get_cat_name($category_id); ?></h3>
        <?php if($cat_posts): foreach($cat_posts as $post): setup_postdata($post); ?>
            <!-- ループはじめ -->
            <p><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
            <!-- ループおわり -->    
        <?php endforeach; ?>
    <?php else: ?>
        <p>このカテゴリーにはまだ記事がありません。</p>
    <?php endif; wp_reset_postdata(); ?>
    </div>
    </div>
    <?php endforeach ?>
<?php endif; ?>

</div>
</article>
<?php if ( comments_open() && !post_password_required() ) { comments_template( '', true ); } ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>