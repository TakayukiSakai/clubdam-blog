<?php

function clubdam_setup() {
    add_theme_support( 'menus' );
}
add_action( 'after_setup_theme', 'clubdam_setup' );


function clubdam_widgets_init() {
	register_sidebar( array(
		'name' => __( 'トップページサイドバー', 'twentytwelve' ),
		'id' => 'top-sidebar',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'コラムページサイドバー', 'twentytwelve' ),
		'id' => 'post-sidebar',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( '固定ページサイドバー', 'twentytwelve' ),
		'id' => 'page-sidebar',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'clubdam_widgets_init' );

function twentytwelve_entry_meta() {
    // Translators: used between list items, there is a space after the comma.
    $categories_list = get_the_category_list( __( ', ', 'tt_child' ) );

    // Translators: used between list items, there is a space after the comma.
    $tag_list = get_the_tag_list( '', __( ', ', 'tt_child' ) );

    $date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
        esc_url( get_permalink() ),
        esc_attr( get_the_time() ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );
/* authorは不要なのでコメントアウトする。
    $author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_attr( sprintf( __( 'View all posts by %s', 'tt_child' ), get_the_author() ) ),
        get_the_author()
    );
ここまで */
/*  以下3つの$utility_textを書き換えて下さい。 */
    // Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
    if ( $tag_list ) {
//      $utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
        $utility_text = __( 'カテゴリー: %1$s | タグ: %2$s | 投稿日: %3$s', 'tt_child' );
    } elseif ( $categories_list ) {
//      $utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
        $utility_text = __( 'カテゴリー: %1$s | 投稿日: %3$s', 'tt_child' );
    } else {
//      $utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
        $utility_text = __( '投稿日: %3$s', 'tt_child' );
    }

    printf(
        $utility_text,
        $categories_list,
        $tag_list,
        $date,
        $author
    );
}

// 親要素のnavigation.jsを取り除く
// overwrite.cssの読み込み
function clubdam_scripts_styles() {
    wp_dequeue_script( 'twentytwelve-navigation' );
    wp_enqueue_style( 'clubdam-overwrite-style', get_stylesheet_directory_uri() . '/css/overwrite.css' );
}
function add_wp_enqueue_scripts() {
    add_action( 'wp_enqueue_scripts', 'clubdam_scripts_styles' );
}
add_action( 'after_setup_theme', 'add_wp_enqueue_scripts' );

// 抜粋の長さを変更する
function custom_excerpt_length($length) {
    return 100;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

// 文末文字を変更する
function custom_excerpt_more($more) {
    return ' ... ';
}
add_filter('excerpt_more', 'custom_excerpt_more');

