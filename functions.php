<?php

// CSSとJSを読み込む
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

    // CSSを読み込む
    wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/assets/css/scss/style.min.css');

    // JSを読み込む
    // wp_enqueue_script( 'intersection-observer', get_stylesheet_directory_uri() . '/assets/js/intersection-observer.js', array(), '1.0.0', true);
    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/assets/js/script.min.js', array(), '1.0.0', true);

}

// ----------------------------
//  管理画面項目設定
// ----------------------------

// 投稿項目を削除
function remove_menus () {
    global $menu;
    unset($menu[5]);  // 投稿
}
add_action('admin_menu', 'remove_menus');   

//カスタム投稿の一覧にカテゴリを表示
function add_custom_column( $defaults ) {
    $defaults['skills_post_cat'] = 'カテゴリー';
    return $defaults;
}
add_filter('manage_skills_post_posts_columns', 'add_custom_column');
function add_custom_column_id($column_name, $id) {
    if( $column_name == 'skills_post_cat' ) {
        echo get_the_term_list($id, 'skills_post_cat', '', ', ');
    }
}
add_action('manage_skills_post_posts_custom_column', 'add_custom_column_id', 10, 2);

// ----------------------------
//  カスタムメニュー設定
// ----------------------------

// メニュー登録
add_action( 'after_setup_theme', 'menu_setup' );
function menu_setup() {
    register_nav_menus( array(
      'top-menu' => 'トップメニュー',
      'sns-menu' => 'SNSメニュー'
    ) );
}

// メニューのliにクラスを付与する
add_filter('nav_menu_css_class', 'atg_menu_classes', 10, 3);
function atg_menu_classes($classes, $item, $args) {
    $classes = array(); // クラス名を初期化
    return $classes;
}

// メニューのliのIDを削除する 
add_filter('nav_menu_item_id', 'removeId', 10);
function removeId( $id ){ 
    return $id = array(); 
}

// ----------------------------
//  ファビコン設定
// ----------------------------

function add_favicon() {
    echo '<link rel="shortcut icon" href=" ' . get_template_directory_uri() . '/favicon.ico" type="image/x-icon" />' . "\n";
}   
add_action('wp_head', 'add_favicon');
  
// ----------------------------
//  カテゴリ固有のクラスをbodyに追加
// ----------------------------

function my_body_class($classes) {
    if(is_front_page() || is_home()) {
        $classes[] = 'l-home';
    }
    elseif (is_page()) {
        $page = get_post();
        $classes[] = 'l-page l-'.$page->post_name;
    }
    elseif (is_singular()) {
        $post = get_post_type();
        $classes[] = 'l-single l-'.$post;    
    }
    elseif (is_tax()) {
        $post = get_post_type();
        $classes[] = 'l-archive l-taxonomy l-'.$post.'_archive l-'.$post.'_taxonomy';    
    }        
    elseif (is_archive()) {
        $post = get_post_type();
        $classes[] = 'l-archive l-'.$post.'_archive';    
    }  
    else {
        $post = get_post_type();
        $classes[] = ' l-'.$post;    
    }
    return $classes;
}
add_filter('body_class', 'my_body_class');

// ----------------------------
//  親カテゴリ判別
// ----------------------------  

function is_parent_slug() {
    global $post;
    if ($post->post_parent) {
        $post_data = get_post($post->post_parent);
        return $post_data->post_name;
    }
}

// ----------------------------
//  カスタム投稿設定
// ----------------------------

function custom_post_type() {
// カスタム投稿タイプの追加
    $Supports = [
        'title',
        'editor',
        'thumbnail'
    ];
    $Supports02 = [
        'title',
        'editor',
    ]; 
    $Supports03 = [
        'title',
    ];        

    // 自己紹介
    register_post_type( 'about',
        array(
            'labels' => array(
                'name' => __( '自己紹介' ),
                'singular_name' => __( '自己紹介' ),
                'add_new' => _x('新しく登録する', '自己紹介'),
                'add_new_item' => __('自己紹介を登録する'),
                'enter_title_here' => _x( 'タイトルを入力', 'about' )
            ),
            'show_in_rest' => true,            
            'public' => true,
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 5, 
            'supports' => $Supports,
        )
    );  

    // 作品
    register_post_type( 'works_post',
        array(
            'labels' => array(
                'name' => __( '作品' ),
                'singular_name' => __( '作品' ),
                'add_new' => _x('新しく登録する', '作品'),
                'add_new_item' => __('作品を登録する'),
                'enter_title_here' => _x( 'タイトルを入力', 'works' )
            ),
            'show_in_rest' => true,            
            'public' => true,
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 5, 
            'supports' => $Supports,
            'rewrite' => array( 'slug' => 'works' ),
        )
    );  
    
    // スキル
    register_post_type( 'skills_post',
        array(
            'labels' => array(
                'name' => __( 'スキル' ),
                'singular_name' => __( 'スキル' ),
                'add_new' => _x('新しく登録する', 'スキル'),
                'add_new_item' => __('スキルを登録する'),
                'enter_title_here' => _x( 'タイトルを入力', 'skills' )
            ),
            'show_in_rest' => true,            
            'public' => true,
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 5, 
            'supports' => $Supports03,
        )
    );
    
    // 経歴
    register_post_type( 'history_post',
        array(
            'labels' => array(
                'name' => __( '経歴' ),
                'singular_name' => __( '経歴' ),
                'add_new' => _x('新しく登録する', '経歴'),
                'add_new_item' => __('経歴を登録する'),
                'enter_title_here' => _x( 'タイトルを入力', 'history' )
            ),
            'show_in_rest' => true,            
            'public' => true,
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 5, 
            'supports' => $Supports03,
        )
    );    

}
add_action( 'init', 'custom_post_type' );

// ----------------------------
//  カスタムタクソノミー設定
// ----------------------------

add_action( 'init', 'create_category_taxonomies', 0 );

function create_category_taxonomies() {
    
    // 作品のカテゴリ
    register_taxonomy(
        'works_post_cat',
        'works_post',
        array(
            'label' => '作品のカテゴリ',
            'singular_label' => '作品のカテゴリ',
            'labels' => array(
                'all_items' => '作品のカテゴリ一覧',
                'add_new_item' => '作品のカテゴリを追加'
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'hierarchical' => true,
        'show_in_rest' => true,    
        'has_archive' => true,         
        )
    ); 
    
    // スキルのカテゴリ
    register_taxonomy(
        'skills_post_cat',
        'skills_post',
        array(
            'label' => 'スキルのカテゴリ',
            'singular_label' => 'スキルのカテゴリ',
            'labels' => array(
                'all_items' => 'スキルのカテゴリ一覧',
                'add_new_item' => 'スキルのカテゴリを追加'
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'hierarchical' => true,
        'show_in_rest' => true,     
        )
    );     
            
}

// ----------------------------
//  サムネイルサイズ設定
// ----------------------------

function add_thumbnail_size() {

    // サムネイルを有効化する
    add_theme_support( 'post-thumbnails' );

    // 作品画像類
    add_image_size( 'works_thumb', 300, 570, array('center','top') );    
    add_image_size( 'works_gallery', 1600, 2200, array('center','top') );    
    add_image_size( 'works_gallery_sp', 1000, 1400, array('center','top') );    
    //　スキルアイコン
    add_image_size( 'skill_icon', 75, 9000 );    

}

add_action( 'after_setup_theme', 'add_thumbnail_size' );

// ----------------------------
//  投稿画面での<br>と<p>の自動挿入の制御
// ----------------------------

function my_tiny_mce_before_init( $init_array ) {
    $init_array['valid_elements'] = '*[*]';
    $init_array['extended_valid_elements'] = '*[*]';
    
    return $init_array;
}
add_filter( 'tiny_mce_before_init' , 'my_tiny_mce_before_init' );

// ----------------------------
//  ページャーの設定
// ----------------------------  

// pagination　アーカイブページのページネーション
// ------------------------------

/**
* ページネーション出力関数
* $paged : 現在のページ
* $pages : 全ページ数
* $range : 左右に何ページ表示するか
* $show_only : 1ページしかない時に表示するかどうか
*/

function pagination( $pages, $paged, $range = 2, $show_only = false ) {

    $pages = ( int ) $pages;    //float型で渡ってくるので明示的に int型 へ
    $paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように

    //表示テキスト
    $text_first   = "←";
    $text_before  = "←";
    $text_next    = "→";
    $text_last    = "→";

    if ( $show_only && $pages === 1 ) {
        // １ページのみで表示設定が true の時
        echo '<div class="l-pager__01"><span class="current pager">1</span></div>';
        return;
    }

    if ( $pages === 1 ) return;    // １ページのみで表示設定もない場合

    if ( 1 !== $pages ) {

        echo '<div class="l-pager__01"><ul class="l-pager__01__list">';        
        
        if ( $paged > 1 ) {
            // 「前のページへ」 の表示
            echo '<li class="l-pager__01__list__item l-pager__01__arw l-pager__01__arw__prev"><a href="', get_pagenum_link( $paged - 1 ) ,'" class="next"><span><svg xmlns="http://www.w3.org/2000/svg" width="80.285" height="11.841"><path data-name="パス 30" d="M80.286 11.34H1.216L12.308.355" fill="none" stroke="#132efc"/></svg></span></a></li>';
        }              

        for ( $i = 1; $i <= $pages; $i++ ) {

            if ( $i <= $paged + $range && $i >= $paged - $range ) {
                // $paged +- $range 以内であればページ番号を出力
                if ( $paged === $i ) {
                    echo '<li class="l-pager__01__list__item l-pager__01__num l-pager__01__num__current"><span class="l-pager__01__circle">', $i ,'</span></li>';
                } else {
                    echo '<li class="l-pager__01__list__item l-pager__01__num"><a href="', get_pagenum_link( $i ) ,'" class="l-pager__01__circle">', $i ,'</a></li>';
                }
            }
        }

        if ( $paged < $pages ) {
            // 「次のページへ」 の表示
            echo '<li class="l-pager__01__list__item l-pager__01__arw l-pager__01__arw__next"><a href="', get_pagenum_link( $paged + 1 ) ,'" class="next"><span><svg xmlns="http://www.w3.org/2000/svg" width="80.285" height="11.841"><path d="M0 11.341h79.07L67.978.355" fill="none" stroke="#132efc"/></svg></span></a></li>';
        }           

        echo '</ul>';

        global $wp_query;
  
        $paged = get_query_var( 'paged' ) - 1;
        $ppp   = get_query_var( 'posts_per_page' );
        $count = $total = $wp_query->post_count;
        $from  = 0;
        if ( 0 < $ppp ) {
          $total = $wp_query->found_posts;
          if ( 0 < $paged )
            $from  = $paged * $ppp;
        }
        printf(
          '<p class="l-pager__01__total">［全%1$s件中｜%2$s%3$s件目を表示］</p>',
          $total,
          ( 1 < $count ? ($from + 1 . '〜') : '' ),
          ($from + $count )
        );        
        
        echo '</div>';
    }
}