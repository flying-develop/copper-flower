<?php

add_action( 'after_setup_theme', 'copperflower_setup' );

function copperflower_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );
	add_theme_support( 'title-tag' );
}

add_action( 'wp_enqueue_scripts', 'copperflower_assets');

function copperflower_assets() {
    $dir = get_template_directory_uri() . '/dist';
	$manifest = json_decode(@file_get_contents($dir . '/manifest.json'), true);

    global $post;

    wp_enqueue_style( 'app', $dir . $manifest['app.css'] ?? null, [], THEME_VERSION );
    wp_enqueue_script( 'app', $dir . $manifest['app.js'] ?? null, [], THEME_VERSION );

    if (is_front_page()) {
        wp_enqueue_style( 'front', $dir . $manifest['front.css'] ?? null, [], THEME_VERSION );
        wp_enqueue_script( 'front', $dir . $manifest['front.js'] ?? null, [], THEME_VERSION );
    }

    if (is_page()) {
        if (is_page_template('page-participant.php')) {
            wp_enqueue_style('become', $dir . $manifest['become.css'] ?? null, [], THEME_VERSION);
            wp_enqueue_script('become', $dir . $manifest['become.js'] ?? null, [], THEME_VERSION);
        } elseif (is_page_template('page-media.php')) {
            if ($post->ID == 109) {
                wp_enqueue_style('news', $dir . $manifest['news.css'] ?? null, [], THEME_VERSION);
                wp_register_script('news', $dir . $manifest['news.js'] ?? null, [], THEME_VERSION);
                wp_localize_script(
                    'news',
                    'infinite',
                    [
                        'ajax_url' => admin_url('admin-ajax.php')
                    ]
                );
                wp_enqueue_script('news');
            }
            if ($post->ID == 115) {
                wp_enqueue_style('gallery', $dir . $manifest['gallery.css'] ?? null, [], THEME_VERSION);
                wp_register_script('gallery', $dir . $manifest['gallery.js'] ?? null, [], THEME_VERSION);
                wp_localize_script(
                    'gallery',
                    'infinite',
                    [
                        'ajax_url' => admin_url('admin-ajax.php')
                    ]
                );
                wp_enqueue_script('gallery');
            }
            if ($post->ID == 117) {
                wp_enqueue_style('movie', $dir . $manifest['movie.css'] ?? null, [], THEME_VERSION);
                wp_register_script('movie', $dir . $manifest['movie.js'] ?? null, [], THEME_VERSION);
                wp_localize_script(
                    'movie',
                    'infinite',
                    [
                        'ajax_url' => admin_url('admin-ajax.php')
                    ]
                );
                wp_enqueue_script('movie');
            }
        } elseif (is_page_template('page-about.php')) {
            wp_enqueue_style('about-page', $dir . $manifest['about.css'] ?? null, [], THEME_VERSION);
            wp_enqueue_script('about-page', $dir . $manifest['about.js'] ?? null, [], THEME_VERSION);
        } elseif (is_page_template('page-participants.php')) {
            wp_enqueue_style('participants', $dir . $manifest['participants.css'] ?? null, [], THEME_VERSION);
            wp_enqueue_script('participants', $dir . $manifest['participants.js'] ?? null, [], THEME_VERSION);
        } elseif (is_page_template('page-jury.php')) {
            wp_enqueue_style('jury', $dir . $manifest['jury.css'] ?? null, [], THEME_VERSION);
            wp_enqueue_script('jury', $dir . $manifest['jury.js'] ?? null, [], THEME_VERSION);
        } elseif (is_page_template('page-partners.php')) {
            wp_enqueue_style('partners', $dir . $manifest['partners.css'] ?? null, [], THEME_VERSION);
            wp_enqueue_script('partners', $dir . $manifest['partners.js'] ?? null, [], THEME_VERSION);
        } elseif (is_page_template('page-projects.php')) {
            wp_enqueue_style('projects', $dir . $manifest['projects.css'] ?? null, [], THEME_VERSION);
            wp_enqueue_script('projects', $dir . $manifest['projects.js'] ?? null, [], THEME_VERSION);
        } else {
            wp_enqueue_style( 'page', $dir . $manifest['page.css'] ?? null, [], THEME_VERSION );
            wp_enqueue_script( 'page', $dir . $manifest['page.js'] ?? null, [], THEME_VERSION );
        }
    } else {
        wp_enqueue_style( 'page', $dir . $manifest['page.css'] ?? null, [], THEME_VERSION );
        wp_enqueue_script( 'page', $dir . $manifest['page.js'] ?? null, [], THEME_VERSION );
    }

    wp_enqueue_style( 'override', get_template_directory_uri() . '/css/override.css', [], THEME_VERSION );

}

add_action( 'admin_menu', 'copperflower_menus' );

function copperflower_menus() {
	remove_menu_page( 'edit.php' );                   //Записи
	remove_menu_page( 'edit-comments.php' );          //Комментарии
}

add_action( 'init', 'copperflower_remove_editor' );

function copperflower_remove_editor() {
	if ( is_admin() ) {
		$post_id = 0;
		$post_id = $_GET['post'] ?? 0;

		$posts = [
			2, // Главная
		];

		if ( in_array($post_id, $posts) && ($_GET['action'] ?? null == 'edit') ) {
				//remove_post_type_support('page', 'editor');
		}

        $disableEditorTempates = [
            'page-participant.php',
            'page-media.php',
            'page-about.php',
            'page-jury.php',
            'page-participants.php',
            'page-partners.php',
            'page-projects.php'
        ];

        if (in_array(get_page_template_slug($post_id), $disableEditorTempates)) {
            remove_post_type_support('page', 'editor');
            remove_post_type_support('page', 'excerpt');
            remove_post_type_support('page', 'comments');
            remove_post_type_support('page', 'revisions');
            remove_post_type_support('page', 'page-attributes');
        }

	}
}

add_action( 'wp_ajax_newsmore', 'news_loadmore' );
add_action( 'wp_ajax_nopriv_newsmore', 'news_loadmore' );

function news_loadmore() {

    $paged = $_POST['paged'] ?? 1;
    $paged++;

    $articles = new WP_query([
        'paged' => $paged,
        'post_type' => 'news',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 6,
        'post_status' => 'publish'
    ]);

    while ($articles->have_posts()) {
        $articles->the_post();
        get_template_part('templates/news/teaser');
    } wp_reset_postdata();

    if ($articles->max_num_pages > $paged) {
        echo '<div class="infinite-loadmore" data-max="' . $articles->max_num_pages . '" data-paged="' . $paged . '"></div>';
    }

    die;

}

add_action( 'wp_ajax_gallerymore', 'gallery_loadmore' );
add_action( 'wp_ajax_nopriv_gallerymore', 'gallery_loadmore' );

function gallery_loadmore() {

    $paged = $_POST['paged'] ?? 1;
    $paged++;

    $articles = new WP_query([
        'paged' => $paged,
        'post_type' => 'gallery',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 6,
        'post_status' => 'publish'
    ]);

    while ($articles->have_posts()) {
        $articles->the_post();
        get_template_part('templates/news/gallery');
    } wp_reset_postdata();

    if ($articles->max_num_pages > $paged) {
        echo '<div class="infinite-loadmore" data-max="' . $articles->max_num_pages . '" data-paged="' . $paged . '"></div>';
    }

    die;

}

add_action( 'wp_ajax_moviemore', 'movie_loadmore' );
add_action( 'wp_ajax_nopriv_moviemore', 'movie_loadmore' );

function movie_loadmore() {

    $paged = $_POST['paged'] ?? 1;
    $paged++;

    $articles = new WP_query([
        'paged' => $paged,
        'post_type' => 'movie',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 6,
        'post_status' => 'publish'
    ]);

    while ($articles->have_posts()) {
        $articles->the_post();
        get_template_part('templates/news/movie');
    } wp_reset_postdata();

    if ($articles->max_num_pages > $paged) {
        echo '<div class="infinite-loadmore" data-max="' . $articles->max_num_pages . '" data-paged="' . $paged . '"></div>';
    }

    die;

}