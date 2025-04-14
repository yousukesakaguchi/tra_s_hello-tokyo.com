<?php

// カスタム投稿タイプ設定

    add_action('init', 'register_cpt_init', 0 );
    function register_cpt_init() {
        register_post_type(
            'item', array(
                'label' => '商品',
                'description' => '',
                'public' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'menu_position' => 5,
                'capability_type' => 'page',
                'hierarchical' => false,
                'rewrite' => array( 'slug' => '','with_front' => true ),
                'query_var' => true,
                'has_archive' => true,
                'exclude_from_search' => false,
                'supports' => array('title','author','editor'),
                'taxonomies' => array(''),
                'show_in_rest' => false,
                'labels' => array(
                    'name' => '商品',
                    'singular_name' => '商品',
                    'all_items' => '商品 一覧',
                    'menu_name' => '商品',
                    'add_new' => '新規追加',
                    'add_new_item' => '新規商品を追加',
                    'edit' => '編集',
                    'edit_item' => '記事の編集',
                    'new_item' => '新しい記事',
                    'view' => '表示',
                    'view_item' => '記事を表示',
                    'search_items' => '記事の検索',
                    'not_found' => '見つかりません',
                    'not_found_in_trash' => 'ゴミ箱にはありません。',
                    'parent' => '親',
                )
            )
        );
    };


add_action( 'init', 'create_taxonomies', 0 );

function create_taxonomies() {

    $item_cat_labels = array(
        'name'              => '商品カテゴリー',
        'singular_name'     => '商品カテゴリー',
        'search_items'      => '商品カテゴリーを検索',
        'all_items'         => '全ての商品カテゴリー',
        'parent_item'       => 'Parent Genre',
        'parent_item_colon' => 'Parent Genre:',
        'edit_item'         => '商品カテゴリーを編集',
        'update_item'       => 'Update Genre',
        'add_new_item'      => '新規 商品カテゴリーを追加',
        'new_item_name'     => 'New Genre Name',
        'menu_name'         => '商品種別'
    );

    $category_item_cat_args = array(
        'hierarchical'      => true,
        'labels'            => $item_cat_labels,
        'has_archive' => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'rewrite'           => array( 'slug' => 'item-cat' ),
        'public' => true
    );


    register_taxonomy('item-cat','item', $category_item_cat_args);

}
