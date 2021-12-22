<?php 

    add_action( 'init', 'wpsp_create_post_type' );
    function wpsp_create_post_type() {
        $labels = array(
            'name' => 'Врачи',
            'singular_name' => 'Врача',
            'add_new' => 'Добавить врача',
            'add_new_item' => 'Добавить нового врача',
            'edit_item' => 'Редактировать врача',
            'new_item' => 'Создание врача',
            'view_item' => 'Перейти к врачу',
            'parent_item_colon' => ''
        );
        $args = array( 'labels' => $labels, 
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => null,
            'has_archive' => true, 
            'rewrite' => array( 'slug' => 'doctor' ) ,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail'),
			'taxonomies' => array('post_tag')
        ); 
        register_post_type( 'doctor', $args );

        $yu_labels = array(
            'name' => 'Слайдер',
            'singular_name' => 'Слайд',
            'add_new' => 'Добавить слайд',
            'add_new_item' => 'Добавить новый слайд',
            'edit_item' => 'Редактировать слайд',
            'new_item' => 'Создание слайда',
            'view_item' => 'Перейти к слайду',
            'parent_item_colon' => ''
        );
        $yu_args = array( 'labels' => $yu_labels, 
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => false,
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => null,
            'has_archive' => false, 
            'supports' => array( 'title', 'editor', 'thumbnail')
        ); 
        register_post_type( 'slider', $yu_args );

        $labels11 = array(
            'name' => 'Услуги',
            'singular_name' => 'Услугу',
            'add_new' => 'Добавить услугу',
            'add_new_item' => 'Добавить новую услугу',
            'edit_item' => 'Редактировать услугу',
            'new_item' => 'Создание услуги',
            'view_item' => 'Перейти к услуге',
            'parent_item_colon' => ''
        );
        $args11 = array( 'labels' => $labels11, 
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => null,
            'has_archive' => true, 
            'rewrite' => array( 'slug' => 'service' ) ,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail'),
			'taxonomies' => array('post_tag')
        ); 
        register_post_type( 'service', $args11 );

        $labels12 = array(
            'name' => 'Новости',
            'singular_name' => 'Новость',
            'add_new' => 'Добавить новость',
            'add_new_item' => 'Добавить новую новость',
            'edit_item' => 'Редактировать новость',
            'new_item' => 'Создание новости',
            'view_item' => 'Перейти к новости',
            'parent_item_colon' => ''
        );
        $args120 = array( 'labels' => $labels12, 
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => null,
            'has_archive' => true, 
            'rewrite' => array( 'slug' => 'news' ) ,
            'supports' => array( 'title', 'editor', 'author')
        ); 
        register_post_type( 'news', $args120 );

        $labels132 = array(
            'name' => 'Галерея',
            'singular_name' => 'Объект галереи',
            'add_new' => 'Добавить объект',
            'add_new_item' => 'Добавить новый объект',
            'edit_item' => 'Редактировать объект',
            'new_item' => 'Создание объекта',
            'view_item' => 'Перейти к объекту',
            'parent_item_colon' => ''
        );
        $args132 = array( 'labels' => $labels132, 
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => null,
            'has_archive' => true, 
            'rewrite' => array( 'slug' => 'gallery' ) ,
            'supports' => array( 'title', 'thumbnail')
        ); 
        register_post_type( 'gallery', $args132 );

        $labels2 = array(
            'name' => 'Направления',
            'singular_name' => 'Направление',
            'add_new' => 'Добавить направление',
            'add_new_item' => 'Добавить новое направление',
            'edit_item' => 'Редактировать направление',
            'new_item' => 'Создание направление',
            'view_item' => 'Перейти к направлению',
            'parent_item_colon' => ''
        );
        $args = array( 'labels' => $labels2, 
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => null,
            'has_archive' => true, 
            'rewrite' => array( 'slug' => 'direction' ) ,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail'),
			'taxonomies' => array('post_tag')
        ); 
        register_post_type( 'direction', $args );

        $labels = array(
            'name' => 'Специализации',
            'singular_name' => 'Специализацию',
            'add_new' => 'Добавить специализацию',
            'add_new_item' => 'Добавить новую специализацию',
            'edit_item' => 'Редактировать специализацию',
            'new_item' => 'Создание специализации',
            'view_item' => 'Перейти к специализации',
            'parent_item_colon' => ''
        );  
        $args = array( 'labels' => $labels, 
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => null,
            'has_archive' => true, 
            'rewrite' => array( 'slug' => 'specialisation' ) ,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail')
        ); 
        register_post_type( 'specialisation', $args );

        $labels = array(
            'name' => 'Отзывы',
            'singular_name' => 'Отзыв',
            'add_new' => 'Добавить отзыв',
            'add_new_item' => 'Добавить новый отзыв',
            'edit_item' => 'Редактировать отзыв',
            'new_item' => 'Создание отзыва',
            'view_item' => 'Перейти к отзыву',
            'parent_item_colon' => ''
        );
        $args = array( 'labels' => $labels, 
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => null,
            'has_archive' => true, 
            'rewrite' => array( 'slug' => 'reviews' ) ,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail')
        ); 
        register_post_type( 'reviews', $args );

        $intr_labels = array(
            'name' => 'Интранет',
            'singular_name' => 'Запись в интранет',
            'add_new' => 'Добавить запись',
            'add_new_item' => 'Добавить новую запись', 
            'edit_item' => 'Редактировать запись',
            'new_item' => 'Создание записи',
            'view_item' => 'Перейти к записи',
            'parent_item_colon' => ''
        );
        $intr_args = array( 'labels' => $intr_labels, 
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => null,
            'has_archive' => true, 
            'rewrite' => array( 'slug' => 'intranet' ) ,
            'supports' => array( 'title', 'editor', 'author', 'comments')
        ); 
        register_post_type( 'intranet', $intr_args ); 

        $labels = array(
            'name' => 'Вопросы-ответы',
            'singular_name' => 'Вопрос',
            'add_new' => 'Добавить вопрос',
            'add_new_item' => 'Добавить новый вопрос',
            'edit_item' => 'Редактировать вопрос',
            'new_item' => 'Создание вопроса',
            'view_item' => 'Перейти к вопросу',
            'parent_item_colon' => ''
        );
        $args = array( 'labels' => $labels, 
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => null,
            'has_archive' => true, 
            'rewrite' => array( 'slug' => 'answers' ) ,
            'supports' => array( 'title', 'editor', 'author', 'revisions')
        ); 
        register_post_type( 'answers', $args );

        $labels = array(
            'name' => 'История клиники',
            'singular_name' => 'Событие в истории',
            'add_new' => 'Добавить запись',
            'add_new_item' => 'Добавить новую запись',
            'edit_item' => 'Редактировать запись',
            'new_item' => 'Создание записи',
            'view_item' => 'Перейти к записи',
            'parent_item_colon' => ''
        );
        $args = array( 'labels' => $labels, 
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => null,
            'has_archive' => true, 
            'rewrite' => array( 'slug' => 'history' ) ,
            'supports' => array( 'title', 'editor', 'author')
        ); 
        register_post_type( 'history', $args );

        $labels54 = array(
            'name' => 'Блог',
            'singular_name' => 'Запись в блог',
            'add_new' => 'Добавить запись',
            'add_new_item' => 'Добавить новую запись',
            'edit_item' => 'Редактировать запись',
            'new_item' => 'Создание записи',
            'view_item' => 'Перейти к записи',
            'parent_item_colon' => '',
			'taxonomies' => array('post_tag')
        );
        $args54 = array( 'labels' => $labels54, 
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => null,
            'has_archive' => true, 
            'rewrite' => array( 'slug' => 'blog' ) ,
            'supports' => array( 'title', 'editor', 'author', 'comments', 'thumbnail', 'excerpt')
        ); 
        register_post_type( 'blog', $args54 );

        $labels = array(
            'name' => 'Пресса о нас',
            'singular_name' => 'Упоминание в прессе',
            'add_new' => 'Добавить запись',
            'add_new_item' => 'Добавить новую запись',
            'edit_item' => 'Редактировать запись',
            'new_item' => 'Создание записи',
            'view_item' => 'Перейти к записи',
            'parent_item_colon' => ''
        );
        $args = array( 'labels' => $labels, 
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => null,
            'has_archive' => true, 
            'rewrite' => array( 'slug' => 'press' ) ,
            'supports' => array( 'title', 'editor', 'author')
        ); 
        register_post_type( 'press', $args );


    }   

add_action( 'init', 'create_bcat_taxonomies', 0 );
function create_bcat_taxonomies() 
{
  $labels = array(
    'name' => 'Категории блогов' ,
    'singular_name' => 'Категория блогов',
    'search_items' =>   'Найти' ,
    'all_items' =>  'Все категории' ,
    'parent_item' =>  'Родительская категория' ,
    'parent_item_colon' =>  'Родительская категория:' ,
    'edit_item' =>  'Редактировать категорию' , 
    'update_item' =>  'Обновить категорию' ,
    'add_new_item' =>  'Добавить новую категорию' ,
    'new_item_name' =>  'Имя новой категории' ,
    'menu_name' =>  'Категории' ,
  );    

  register_taxonomy('bcat',array('blog'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'bcat' ),
  ));

}

add_action( 'init', 'create_icat_taxonomies', 0 );
function create_icat_taxonomies() 
{
  $labels = array(
    'name' => 'Категории интранета' ,
    'singular_name' => 'Категория интранета',
    'search_items' =>   'Найти' ,
    'all_items' =>  'Все категории' ,
    'parent_item' =>  'Родительская категория' ,
    'parent_item_colon' =>  'Родительская категория:' ,
    'edit_item' =>  'Редактировать категорию' , 
    'update_item' =>  'Обновить категорию' ,
    'add_new_item' =>  'Добавить новую категорию' ,
    'new_item_name' =>  'Имя новой категории' ,
    'menu_name' =>  'Категории' ,
  );    

  register_taxonomy('icat',array('intranet'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'icat' ),
  ));

}



add_action( 'init', 'create_acat_taxonomies', 0 );
function create_acat_taxonomies() 
{
  $labels = array(
    'name' => 'Категории вопросов' ,
    'singular_name' => 'Категория вопросов',
    'search_items' =>   'Найти' ,
    'all_items' =>  'Все категории' ,
    'parent_item' =>  'Родительская категория' ,
    'parent_item_colon' =>  'Родительская категория:' ,
    'edit_item' =>  'Редактировать категорию' , 
    'update_item' =>  'Обновить категорию' ,
    'add_new_item' =>  'Добавить новую категорию' ,
    'new_item_name' =>  'Имя новой категории' ,
    'menu_name' =>  'Категории' ,
  );    

  register_taxonomy('acat',array('answers'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'acat' ),
  ));

}

    function wprec_create_metaboxes ($post) {
        add_meta_box('photobox', 'Параметры', 'wprec_create_photobox', 'doctor', 'side', 'high'); 
        add_meta_box('pressbox', 'Параметры', 'wprec_create_pressbox', 'press', 'side', 'high'); 
        add_meta_box('newsbox', 'Направления', 'wprec_create_newsbox', 'news', 'side', 'high'); 
        add_meta_box('directionbox', 'Параметры', 'wprec_create_directionbox', 'direction', 'side', 'high'); 
        add_meta_box('servicesbox', 'Параметры', 'wprec_create_servicesbox', 'service', 'side', 'high'); 
        add_meta_box('serviceslocbox', 'Адрес и карта', 'wprec_create_serviceslocbox', 'service', 'side', 'high'); 
        add_meta_box('servicesparentbox', 'Родительский элемент', 'wprec_create_servicesparentbox', 'service', 'side', 'high'); 
        add_meta_box('specparentbox', 'Направление', 'wprec_create_specparentbox', 'specialisation', 'side', 'high'); 
        add_meta_box('specbox', 'Параметры', 'wprec_create_specbox', 'specialisation', 'side', 'high'); 
        add_meta_box('answersbox', 'Ответ', 'wprec_create_answerbox', 'answers', 'normal', 'high');  
        add_meta_box('answersauthorbox', 'Автор ответа', 'wprec_create_revansauthmetabox', 'answers', 'side', 'high');  
        add_meta_box('reviewsanswersbox', 'Ответ', 'wprec_create_reviewsanswerbox', 'reviews', 'normal', 'high'); 
        add_meta_box('sliderbox', 'Параметры', 'wprec_create_slidermetabox', 'slider', 'side', 'high'); 
        add_meta_box('answersmetabox', 'Параметры', 'wprec_create_answersmetabox', 'answers', 'side', 'high'); 
        add_meta_box('reviewsmetabox', 'Параметры', 'wprec_create_reviewsmetabox', 'reviews', 'side', 'high'); 
        add_meta_box('gallerymetabox', 'Параметры', 'wprec_create_gallerymetabox', 'gallery', 'side', 'high'); 
        add_meta_box('pagemetabox', 'Модули', 'wprec_create_pagemetabox', 'page', 'side', 'high'); 
    }
	
    add_action('admin_init', 'wprec_create_metaboxes', 1);  
    function wprec_create_photobox ($post) {
        $wprec_nonce = wp_create_nonce(__FILE__);
        $spec = get_post_meta($post->ID, 'spec', 1);
        $rang = get_post_meta($post->ID, 'rang', 1);
        $leve = get_post_meta($post->ID, 'leve', 1);
        $expi = get_post_meta($post->ID, 'expi', 1);
        $link = get_post_meta($post->ID, 'link', 1);
        $acco = get_post_meta($post->ID, 'acco', 1);
        $specs = get_posts(array(
            'post_type' => 'direction',
            'showposts' => -1
        ));
?>      
        <table>
            <tbody>
                <tr>
                    <td>Направление</td>
                    <td>
                        <select name="wprec[spec]">
                            <?php foreach ($specs as $_spec) { ?>
                            <option <?php selected($spec, $_spec->ID); ?> value="<?=$_spec->ID?>"><?=get_the_title($_spec->ID)?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Должность</td>
                    <td>
                        <input type="text" value="<?=$rang?>" name="wprec[rang]">
                    </td>
                </tr>
                <tr>
                    <td>Звание/степень</td>
                    <td>
                        <input type="text" value="<?=$leve?>" name="wprec[leve]">
                    </td>
                </tr>
                <tr>
                    <td>Опыт работы</td>
                    <td>
                        <input type="text" value="<?=$expi?>" name="wprec[expi]">
                    </td>
                </tr>
                <tr>
                    <td>Блок на странице</td>
                    <td>
                        <?php $show_block = get_post_meta($post->ID, 'show_block', 1); ?>
                        <select name="wprec[show_block]">
                            <option <?php selected($show_block, 'articles'); ?> value="articles">Статьи в блоге</option>
                            <option <?php selected($show_block, 'answers'); ?> value="answers">Ответы на вопросы</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Аккаунт на сайте</td>
                    <td>
                        <?php 
                           $usrs = get_users('role=author');
                        ?>
						
                        <select name="wprec[acco]">					
                            <?php foreach ($usrs as $key => $usr) { ?>
                            <option <?=selected($usr->ID, $acco)?> value="<?=$usr->ID?>"><?=$usr->display_name?></option>
                            <?php } ?>                          
                        </select>
						
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="wprec-nonce" value="<?=$wprec_nonce?>">
<?php
    }
    function wprec_create_pressbox ($post) {
        $wprec_nonce = wp_create_nonce(__FILE__);
        $smi = get_post_meta($post->ID, 'smi', 1);
        $date = get_post_meta($post->ID, 'date', 1);
?>      
        <table>
            <tbody>
                <tr>
                    <td>Название СМИ</td>
                    <td>
                        <input type="text" value="<?=$smi?>" name="wprec[smi]">
                    </td>
                </tr>
                <tr>
                    <td>Дата</td>
                    <td>
                        <input type="text" value="<?=$date?>" name="wprec[date]">
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="wprec-nonce" value="<?=$wprec_nonce?>">
<?php
    }
    function wprec_create_pagemetabox ($post) {
        $wprec_nonce = wp_create_nonce(__FILE__);
        $_blocks = get_post_meta($post->ID, '_blocks', 1);
?>      
        <label><input type="checkbox" <?=checked($_blocks['address'], 'on')?> name="wprec[address]"> Адрес</label><br>
        <label><input type="checkbox" <?=checked($_blocks['place'], 'on')?> name="wprec[place]"> Адреса и телефоны</label><br>
        <label><input type="checkbox" <?=checked($_blocks['schedule'], 'on')?> name="wprec[schedule]"> Время работы</label>
        <input type="hidden" name="_yep_blocks" value="yep">
        <input type="hidden" name="wprec-nonce" value="<?=$wprec_nonce?>">
<?php
    }
    function wprec_create_directionbox ($post) {
        $wprec_nonce = wp_create_nonce(__FILE__);
        $video = get_post_meta($post->ID, 'video', 1);
?>      
        <table>
            <tbody>
                <tr>
                    <td>Ссылка на видео</td>
                    <td>
                        <input type="text" value="<?=$video?>" name="wprec[video]">
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="wprec-nonce" value="<?=$wprec_nonce?>">
<?php
    }
    function wprec_create_specbox ($post) {
        $wprec_nonce = wp_create_nonce(__FILE__);
        $video = get_post_meta($post->ID, 'video', 1);
?>      
        <table>
            <tbody>
                <tr>
                    <td>Ссылка на видео</td>
                    <td>
                        <input type="text" value="<?=$video?>" name="wprec[video]">
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="wprec-nonce" value="<?=$wprec_nonce?>">
<?php
    }
    function wprec_create_answerbox ($post) {
        $wprec_nonce = wp_create_nonce(__FILE__);
        $answer = get_post_meta($post->ID, 'answer', 1);
        global $current_user;
        $current_user = wp_get_current_user();  
?>      
        <textarea name="wprec[answer]" style="width: 100%; max-width: 100%;"><?=$answer?></textarea> 
        <input type="hidden" name="wprec[doctor]" value="<?=$current_user->ID?>">
        <input type="hidden" name="wprec-nonce" value="<?=$wprec_nonce?>">
<?php
    }
    function wprec_create_reviewsanswerbox ($post) {
        $wprec_nonce = wp_create_nonce(__FILE__);
        $answer = get_post_meta($post->ID, 'answer', 1);
?>      
        <textarea name="wprec[answer]" style="width: 100%; max-width: 100%;"><?=$answer?></textarea> 
        <input type="hidden" name="wprec-nonce" value="<?=$wprec_nonce?>">
<?php
    }
    function wprec_create_answersmetabox ($post) {
        $wprec_nonce = wp_create_nonce(__FILE__);
        $email = get_post_meta($post->ID, 'email', 1);
        $name = get_post_meta($post->ID, 'name', 1);
		$date_create = get_post_meta($post->ID, 'date_create', 1 );
?>      
        <table>
            <tbody>
                <tr>
                    <td>Имя</td>
                    <td>
                        <input type="text" name="wprec[name]" value="<?=$name?>">
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="wprec[email]" value="<?=$email?>" disabled="disabled">
                    </td>
                </tr>
				<tr>
                    <td>Дата создания</td>
                    <td>
                        <input type="text" name="wprec[date_create]" value="<?=$date_create?>" disabled="disabled">
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="wprec-nonce" value="<?=$wprec_nonce?>">
<?php
    }


    function wprec_create_reviewsmetabox ($post) {
        $wprec_nonce = wp_create_nonce(__FILE__);
        $name = get_post_meta($post->ID, 'name', 1);
?>      
        <label><input type="checkbox" <?=checked($show, 'on')?> name="wprec[show]"> Показывать на главной</label>
        <input type="hidden" name="wprec-nonce" value="<?=$wprec_nonce?>">
        <input type="hidden" name="wprec_show" value="1">
<?php
    }
    function wprec_create_revansauthmetabox ($post) {
        $author = get_post_meta($post->ID, 'doctor', 1);
        if (is_numeric($author)) {
            $doctorObj = get_posts(array(
                'post_type' => 'doctor',
                'meta_key' => 'acco',
                'meta_value' => $author
            ));
            $userObj = get_userdata($author);
        }
        $answer_author = $doctorObj[0]->ID ? get_the_title($doctorObj[0]->ID) : $userObj->user_nicename ;
?>      
    <input type="text" disabled="disabled" value="<?=$answer_author?>" style="width: 100%;">
<?php
    }
    function wprec_create_gallerymetabox ($post) {
        $wprec_nonce = wp_create_nonce(__FILE__);
        $type = get_post_meta($post->ID, 'type', 1);
        $video = get_post_meta($post->ID, 'video', 1);
        $index = get_post_meta($post->ID, 'index', 1);
        $type = ($type != 'video') ? 'gallery' : $type ;
?>      
        <strong>Тип:</strong><br>
        <label><input type="radio" <?=checked($type, 'gallery')?> value="gallery" name="wprec[type]"> Галерея</label><br>
        <label><input type="radio" <?=checked($type, 'video')?> value="video" name="wprec[type]"> Видео</label><br>
        <hr>
        Ссылка на видео: <input type="text" name="wprec[video]" value="<?=$video?>"><br>
        <label><input type="checkbox" <?=checked($index, 'on')?> name="wprec[index]"> Видео для главной страницы</label><br>
        <input type="hidden" name="wprec-nonce" value="<?=$wprec_nonce?>">
        <input type="hidden" name="wprec_index" value="yep">
<?php
    }

    function wprec_create_slidermetabox ($post) {
        $wprec_nonce = wp_create_nonce(__FILE__);
        $link = get_post_meta($post->ID, 'link', 1);
?>      
        Ссылка <input type="text" name="wprec[link]" style="width: 208px;" value="<?=$link?>">
        <input type="hidden" name="wprec-nonce" value="<?=$wprec_nonce?>">
<?php
    }

    function wprec_create_servicesparentbox ($post) {
        $wprec_nonce = wp_create_nonce(__FILE__);
        $parentem = get_post_meta($post->ID, 'parentem', 1);
        $levA = get_posts(array('post_type' => 'direction', 'showposts' => -1));
        $levB = get_posts(array('post_type' => 'specialisation', 'showposts' => -1));
?>      
        <p><strong>Направления</strong></p>
        <?php if ($levA[0]) { foreach ($levA as $key => $em) {  ?>
        <label><input type="radio" name="wprec[parentem]" <?php checked($parentem, $em->ID); ?> value="<?=$em->ID?>"> <?=get_the_title($em->ID)?></label><br>
        <?php } } ?>
        <p><strong>Специализации</strong></p>
        <?php if ($levB[0]) { foreach ($levB as $key => $em) { ?>
        <label><input type="radio" name="wprec[parentem]" <?php checked($parentem, $em->ID); ?> value="<?=$em->ID?>"> <?=get_the_title($em->ID)?></label><br>
        <?php } } ?>
<?php
    }

    function wprec_create_specparentbox ($post) {
        $wprec_nonce = wp_create_nonce(__FILE__);
        $parentem = get_post_meta($post->ID, 'parentem', 1);
        $levA = get_posts(array('post_type' => 'direction', 'showposts' => -1));
?>      
        <?php if ($levA[0]) { foreach ($levA as $key => $em) {  ?>
        <label><input type="radio" name="wprec[parentem]" <?php checked($parentem, $em->ID); ?> value="<?=$em->ID?>"> <?=get_the_title($em->ID)?></label><br>
        <?php } } ?>
        <input type="hidden" name="wprec-nonce" value="<?=$wprec_nonce?>">
<?php
    }
    function wprec_create_newsbox ($post) {
        $wprec_nonce = wp_create_nonce(__FILE__);
        $direction = get_post_meta($post->ID, 'direction', 1);
        $levA = get_posts(array('post_type' => 'direction', 'showposts' => -1));
?>      
        <?php if ($levA[0]) { foreach ($levA as $key => $em) {  ?>
        <label><input type="radio" name="wprec[direction]" <?php checked($direction, $em->ID); ?> value="<?=$em->ID?>"> <?=get_the_title($em->ID)?></label><br>
        <?php } } ?>
        <input type="hidden" name="wprec-nonce" value="<?=$wprec_nonce?>">
<?php
    }

    function wprec_create_servicesbox ($post) {
        $wprec_nonce = wp_create_nonce(__FILE__);
        $price = get_post_meta($post->ID, 'price', 1);
		$price_repeat = get_post_meta($post->ID, 'price_repeat', 1);
        $room = get_post_meta($post->ID, 'room', 1);
        $phone = get_post_meta($post->ID, 'phone', 1);
        $link = get_post_meta($post->ID, 'link', 1);
?>      
        <table>
            <tbody>
                <tr>
                    <td>Цена (первичный прием)</td>
                    <td>
                        <input type="text" value="<?=$price?>" name="wprec[price]">
                    </td>
                </tr>
				<tr>
                    <td>Цена (повторный прием)</td>
                    <td>
                        <input type="text" value="<?=$price_repeat?>" name="wprec[price_repeat]">
                    </td>
                </tr>
                <tr>
                    <td>Кабинет</td>
                    <td>
                        <input type="text" value="<?=$room?>" name="wprec[room]">
                    </td>
                </tr>
                <tr>
                    <td>Телефон</td>
                    <td>
                        <input type="text" value="<?=$phone?>" name="wprec[phone]">
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="wprec-nonce" value="<?=$wprec_nonce?>">
<?php
    }

    function wprec_create_serviceslocbox ($post) {
        $wprec_nonce = wp_create_nonce(__FILE__);
        $map = get_post_meta($post->ID, 'map', 1);
        $address = get_post_meta($post->ID, 'address', 1);
?>      
        Код карты (310 х 225)
        <textarea name="wprec[map]" style="width: 100%; height: 150px;"><?=$map?></textarea>
        <table>
            <tbody>
                <tr>
                    <td>Адрес</td>
                    <td>
                        <input type="text" value="<?=$address?>" style="width: 100%;" name="wprec[address]">
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="wprec-nonce" value="<?=$wprec_nonce?>">
<?php
    }

    ### 0.2 ### save post

    add_action('save_post', 'wprec_update', 0);
    function wprec_update ($post_id){

        if ( !wp_verify_nonce($_POST['wprec-nonce'], __FILE__) ) return false; 
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; 
        if ( !current_user_can('edit_post', $post_id) ) return false; 
        if( !isset($_POST['wprec']) && !$_POST['_yep_blocks']) return false;    

        if ($_POST['wprec_show'] && !$_POST['wprec']['show']) { delete_post_meta($post_id, 'show'); }
        if ($_POST['wprec_index'] && !$_POST['wprec']['index']) { delete_post_meta($post_id, 'index'); }

        if ($_POST['_yep_blocks']) {
            update_post_meta($post_id, '_blocks', $_POST['wprec']);
        }

        ## обновляем мета-данные
        if ($_POST['wprec']) {
            foreach($_POST['wprec'] as $k => $val){ update_post_meta($post_id, $k, $val); }     
        }

        return $post_id;
    }       

    ### 0.3 ### theme support

    add_theme_support( 'post-thumbnails' ); 
    add_image_size( 'doctor-photo', 300, 398, 1 );

    add_image_size( 'doctor-thumb', 220, 200, 1 );
    add_image_size( 'doctor-avatar', 50, 47, 1 );
    add_image_size( 'slider', 638, 389, 1 );
    add_image_size( 'avatar-sb', 120, 111, 1 );
    add_image_size( 'avatar', 50, 50, 1 );
    add_image_size( 'avatar-comments', 58, 58, 1 );
    add_image_size( 'gallery_', 220, 146, 1 );
    add_image_size( '_gallery', 210, 140, 1 );
    add_image_size( 'thumb-drctn', 310, 192, true );
    add_image_size( 'thumb-drctn-single', 220, 146, true );
    add_image_size( 'thumb-drctn-video', 303, 184, true );

    ### 0.4 ### multi thumbs


    /*
    add_image_size( 'thumb-null', 260, 143, true ); 
    add_image_size( 'thumb-two', 770, 210, true );  
    add_image_size( 'thumb-three', 400, 40, true ); 
    add_image_size( 'thumb-four', 340, 50, true );


    */  

    require_once(realpath(dirname(__FILE__)).'/'.'multi-post-thumbnails.php');
    if (class_exists('MultiPostThumbnails')) {
        new MultiPostThumbnails(array(
            'label' => 'Миниатюра видео',
            'id' => 'video-thumb-d',
            'post_type' => 'direction'
            )
        );
        new MultiPostThumbnails(array(
            'label' => 'Миниатюра видео',
            'id' => 'video-thumb-s',
            'post_type' => 'specialisation'
            )
        );
        new MultiPostThumbnails(array(
            'label' => 'Миниатюра записи для разделов',
            'id' => 'doc-square-thumb',
            'post_type' => 'doctor'
            )
        );
        new MultiPostThumbnails(array(
            'label' => 'Миниатюра записи для главной',
            'id' => 'dir-square-thumb',
            'post_type' => 'direction'
            )
        );
    };

    function wp_corenavi() {
      global $wp_query, $wp_rewrite;
      $pages = '';
      $max = $wp_query->max_num_pages;
      if (!$current = get_query_var('paged')) $current = 1;
      $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
      $a['total'] = $max;
      $a['current'] = $current;

      $total = 1; //1 - выводить текст "Страница N из N", 0 - не выводить
      $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
      $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
      $a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
      $a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"

      if ($max > 1) echo '<div class="navigation">';
      if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
      echo $pages . paginate_links($a);
      if ($max > 1) echo '</div>';
    }

    function get_excerpt_by_id($post_id){
    $the_post = get_post($post_id); //Gets post ID
    $the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
    $excerpt_length = 35; //Sets excerpt length by word count
    $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
    $words = explode(' ', $the_excerpt, $excerpt_length + 1);
    if(count($words) > $excerpt_length) :
    array_pop($words);
    array_push($words, '…');
    $the_excerpt = implode(' ', $words);
    endif;
    $the_excerpt = '<p>' . $the_excerpt . '</p>';
    return $the_excerpt;
    } 

    // 10/24

    add_action('admin_menu', 'create_blocks_options_page');
    function create_blocks_options_page () {
        add_menu_page('Подписчики', 'Подписчики', 10, 'subscribe', 'subscribe_options_page');
        add_submenu_page('options-general.php', 'Блоки страниц', 'Блоки страниц', 10, 'modules', 'blocks_options_page');
        add_submenu_page('options-general.php', 'Блоки на главной', 'Блоки на главной', 10, 'index_modules', 'index_blocks_options_page');
        add_submenu_page('options-general.php', 'Блоки в разделах', 'Блоки в разделах', 10, 'in_modules', 'in_blocks_options_page');
        add_submenu_page('options-general.php', 'Параметры шапки', 'Шапка', 10, 'header', 'header_options_page');
    }   
    function blocks_options_page () {
        if ($_POST['blocks']['yep']) { $blocks = $_POST['blocks']; 

update_option('gnss_blocks', $blocks); }
        else { $blocks = get_option('gnss_blocks'); }
    ?>
    <form method="POST" act="" style="width: 700px;">
        <input type="hidden" name="blocks[yep]" value="yep">
        <table class="form-table">
            <h3>Настройки блоков страниц</h3>
            <tbody>
                <tr class="form-field">
                    <td><strong>Адрес</strong></td>
                    <td></td>
                </tr>
                <tr class="form-field">
                    <td>
                        Код карты
                    </td>
                    <td>
                        <textarea name="blocks[map]"><?=stripslashes($blocks['map'])?></textarea>
                    </td>   
                </tr>
                <tr class="form-field">
                    <td><strong>Адреса и телефоны</strong></td>
                    <td></td>
                </tr>
                <tr class="form-field">
                    <td>
                        Описание
                    </td>
                    <td>
                        <textarea name="blocks[place]"><?=stripslashes($blocks['place'])?></textarea>
                    </td>   
                </tr>
                <tr class="form-field">
                    <td><strong>Время работы</strong></td>
                    <td></td>
                </tr>
                <tr class="form-field">
                    <td>
                        Пн-Пт
                    </td>
                    <td>
                        <input type="text" name="blocks[pnpt]" value="<?=$blocks['pnpt']?>">
                    </td>   
                </tr>
                <tr class="form-field">
                    <td>
                        Сб
                    </td>
                    <td>
                        <input type="text" name="blocks[sb]" value="<?=$blocks['sb']?>">
                    </td>   
                </tr>
                <tr class="form-field">
                    <td>
                        Вс
                    </td>
                    <td>
                        <input type="text" name="blocks[vs]" value="<?=$blocks['vs']?>">
                    </td>   
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Сохранить изменения">
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>    
    <?php } 


    function index_blocks_options_page () {
        if ($_POST['blocks']['yep']) { $blocks = $_POST['blocks']; update_option('gnss_index_blocks', $blocks); }
        else { $blocks = get_option('gnss_index_blocks'); }
    ?>
    <form method="POST" act="" style="width: 700px;">
        <input type="hidden" name="blocks[yep]" value="yep">
        <table class="form-tabled">
            <h3>Настройки блоков на главной</h3>
            <tbody>
                <tr class="form-fielda">
                    <td>
                        Блок новостей
                    </td>
                    <td>
                        <label><input type="radio" <?=checked($blocks['news_show'], 1)?> name="blocks[news_show]" value="1"> вкл.</label> 
                        <label><input type="radio" <?=checked($blocks['news_show'], 0)?> name="blocks[news_show]" value="0"> выкл.</label> 
                    </td>   
                </tr>
                <tr class="form-fielda">
                    <td>
                        Кол-во новостей 
                    </td>
                    <td>
                        <input type="text" class="small-text" name="blocks[news_num]" value="<?=stripslashes($blocks['news_num'])?>">
                    </td>   
                </tr>
                <tr class="form-fielda">
                    <td>
                        Блок вопрос-ответов
                    </td>
                    <td>
                        <label><input type="radio" <?=checked($blocks['answ_show'], 1)?> name="blocks[answ_show]" value="1"> вкл.</label> 
                        <label><input type="radio" <?=checked($blocks['answ_show'], 0)?> name="blocks[answ_show]" value="0"> выкл.</label> 
                    </td>   
                </tr>
                <tr class="form-fielda">
                    <td>
                        Кол-во вопросов-ответов 
                    </td>
                    <td>
                        <input type="text" class="small-text" name="blocks[answ_num]" value="<?=stripslashes($blocks['answ_num'])?>">
                    </td>   
                </tr>
                <tr class="form-fielda">
                    <td>
                        Блок записей из блогов
                    </td>
                    <td>
                        <label><input type="radio" <?=checked($blocks['blog_show'], 1)?> name="blocks[blog_show]" value="1"> вкл.</label> 
                        <label><input type="radio" <?=checked($blocks['blog_show'], 0)?> name="blocks[blog_show]" value="0"> выкл.</label> 
                    </td>   
                </tr>
                <tr class="form-fields">
                    <td>
                        Кол-во записей из блогов
                    </td>
                    <td>
                        <input type="text" class="small-text" name="blocks[blog_num]" value="<?=stripslashes($blocks['blog_num'])?>">
                    </td>   
                </tr>
                <tr class="form-fielda">
                    <td>
                        Блок видео
                    </td>
                    <td>
                        <label><input type="radio" <?=checked($blocks['video_show'], 1)?> name="blocks[video_show]" value="1"> вкл.</label> 
                        <label><input type="radio" <?=checked($blocks['video_show'], 0)?> name="blocks[video_show]" value="0"> выкл.</label> 
                    </td>   
                </tr>
                <tr class="form-fielda">
                    <td>
                        Блок отзыва
                    </td>
                    <td>
                        <label><input type="radio" <?=checked($blocks['review_show'], 1)?> name="blocks[review_show]" value="1"> вкл.</label> 
                        <label><input type="radio" <?=checked($blocks['review_show'], 0)?> name="blocks[review_show]" value="0"> выкл.</label> 
                    </td>   
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Сохранить изменения">
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>    
    <?php } 


    function in_blocks_options_page () {
        if ($_POST['blocks']['yep']) { $blocks = $_POST['blocks']; update_option('gnss_in_blocks', $blocks); }
        else { $blocks = get_option('gnss_in_blocks'); }
    ?>
    <form method="POST" act="" style="width: 700px;">
        <input type="hidden" name="blocks[yep]" value="yep">
        <table class="form-tabled">
            <h3>Настройки блоков в разделах</h3>
            <tbody>
                <tr class="form-fielda">
                    <td>
                        Кол-во новостей 
                    </td>
                    <td>
                        <input type="text" class="small-text" name="blocks[news_num]" value="<?=stripslashes($blocks['news_num'])?>">
                    </td>   
                </tr>
                <tr class="form-fielda">
                    <td>
                        Кол-во вопросов-ответов 
                    </td>
                    <td>
                        <input type="text" class="small-text" name="blocks[answ_num]" value="<?=stripslashes($blocks['answ_num'])?>">
                    </td>   
                </tr>
                <tr class="form-fields">
                    <td>
                        Кол-во записей из блогов
                    </td>
                    <td>
                        <input type="text" class="small-text" name="blocks[blog_num]" value="<?=stripslashes($blocks['blog_num'])?>">
                    </td>   
                </tr>
                <tr class="form-fields">
                    <td>
                        Кол-во записей из интранета
                    </td>
                    <td>
                        <input type="text" class="small-text" name="blocks[intranet_num]" value="<?=stripslashes($blocks['intranet_num'])?>">
                    </td>   
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Сохранить изменения">
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>    
    <?php } 

    function header_options_page () {
        if ($_POST['header']['yep']) { $header = $_POST['header']; update_option('gnss_header', $header); }
        else { $header = maybe_unserialize(get_option('gnss_header')); }
    ?>
    <form method="POST" act="" style="width: 700px;">
        <input type="hidden" name="header[yep]" value="yep">
        <table class="form-table">
            <h3>Параметры шапки и писем</h3>
            <tbody>
                <tr class="form-field">
                    <td>
                        Слоган
                    </td>
                    <td>
                        <input type="text" value="<?=$header['slogan']?>" name="header[slogan]">
                    </td>   
                </tr>
                <tr class="form-field">
                    <td>
                        Номер телефона
                    </td>
                    <td>
                        <input type="text" value="<?=$header['phone']?>" name="header[phone]">
			<input type="text" value="<?=$header['phone2']?>" name="header[phone2]">
                    </td>   
                </tr>
                <tr class="form-field">
                    <td>
                        Twitter
                    </td>
                    <td>
                        <input type="text" value="<?=$header['twitter']?>" name="header[twitter]">
                    </td>   
                </tr>
                <tr class="form-field">
                    <td>
                        Facebook
                    </td>
                    <td>
                        <input type="text" value="<?=$header['facebook']?>" name="header[facebook]">
                    </td>   
                </tr>
		<tr class="form-field">
                    <td>
                        OK
                    </td>
                    <td>
                        <input type="text" value="<?=$header['odnoklassniki']?>" name="header[odnoklassniki]">
                    </td>   
                </tr>
		<tr class="form-field">
                    <td>
                        YT
                    </td>
                    <td>
                        <input type="text" value="<?=$header['youtube']?>" name="header[youtube]">
                    </td>   
                </tr>
		<tr class="form-field">
                    <td>
                        Instagram
                    </td>
                    <td>
                        <input type="text" value="<?=$header['instagram']?>" name="header[instagram]">
                    </td>   
                </tr>
				<tr class="form-field">
                    <td>
                        Почта, на которую будут приходить оповещения с вопросов/ответов и с страницы с контактами
                    </td>
                    <td>
                        <input type="text" value="<?=$header['mailpost']?>" name="header[mailpost]">
                    </td>   
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Сохранить изменения">
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>    
    <?php } 



    function subscribe_options_page () {
    ?>
        <table class="form-table">
            <h3>Подписчики</h3>
            <tbody>
                <tr class="form-field">
                    <td>
                        Экспорт в CSV
                    </td>
                    <td>
                        <a href="<?=get_template_directory_uri().'/export.php'?>" class="button-secondary">Получить файл</a>
                    </td>   
                </tr>
            </tbody>
        </table>    
    <?php } 

    function is_doctor ($user_id = 420420) {
        $doctor = get_posts(array(
            'post_type' => 'doctor',
            'meta_key' => 'acco',
            'meta_value' => $user_id
        ));
        return ($doctor[0]->ID ? TRUE : FALSE);
    }

    function get_the_doctor_avatar ($user_id = 420420) {
        $doctor = get_posts(array(
            'post_type' => 'doctor',
            'meta_key' => 'acco',
            'meta_value' => $user_id
        ));
        return ($doctor[0]->ID ? MultiPostThumbnails::get_the_post_thumbnail('doctor', 'doc-square-thumb', $doctor[0]->ID, 'avatar-comments') : FALSE);
    }

    function comment_author_d ($user_id = 420420) {
        $doctor = get_posts(array(
            'post_type' => 'doctor',
            'meta_key' => 'acco',
            'meta_value' => $user_id
        ));
        return ($doctor[0]->ID ? get_the_title($doctor[0]->ID) : FALSE);
    }


    function regnavmen () {
        register_nav_menus (array(
            "footerdocs" => "Подвал - Доктора",
            "footerservices" => "Подвал - Услуги",
            "footerabout" => "Подвал - О клинике",
            "tabsabout" => "Вкладки - О клинике",
            "tabsprice" => "Направления/Специализации/Услуги",
            "tabsdocs" => "Вкладки - Доктора",
            "header" => "Основное меню"
        ));
    }
    add_action('init', 'regnavmen');

    function prepare_mb_table () {
        if (!get_option('gnss_table_is_ready')) {
            global $wpdb;
            if($wpdb->get_var("show tables like gnss_mb") != 'gnss_mb') {
                $sql = "CREATE TABLE gnss_mb (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                email tinytext NOT NULL,
                name tinytext,
                surname tinytext,
                UNIQUE KEY id (id)
                );";
                require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
                dbDelta($sql);
            }   
            update_option('gnss_table_is_ready', 1);
        }
    }
    add_action('init', 'prepare_mb_table'); 

    #require_once(realpath(dirname(__FILE__)).'/'.'subscribe-to-comments.php');
    function gnss_wp_hide() {
?>
<style type="text/css">
    #wp-admin-bar-wp-logo,
    #footer-thankyou,
    #menu-dashboard .wp-submenu-wrap ul > li + li,
    #footer-upgrade,
    #wp-admin-bar-updates,
    #wp-admin-bar-wp-logo 
    { display: none !important; }
</style>
<?php       
    }
    add_action('wp_head', 'gnss_wp_hide');
    add_action('admin_head', 'gnss_wp_hide');
 
    function my_custom_login_logo(){
        echo '<style type="text/css">
        h1 a { background-image:none !important; }
        </style>';
    }
    add_action('login_head', 'my_custom_login_logo');

    if( !current_user_can( 'edit_users' ) ){
		
        //add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 ); // function create_function deprecated
		add_action( 'init', function($a){remove_action( 'init', 'wp_version_check' );}, 2 );
				
        //add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) ); // function create_function deprecated
		add_filter( 'pre_option_update_core', function($a){return null;});
        // для 3.0+
       // add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) ); //function create_function deprecated
	    add_filter( 'pre_site_transient_update_core', function($a){ return null; } );
    }

    /* Удаление виджетов из Консоли WordPress */
    function clear_dash(){
        $side = &$GLOBALS['wp_meta_boxes']['dashboard']['side']['core'];
        $normal = &$GLOBALS['wp_meta_boxes']['dashboard']['normal']['core'];

        unset($side['dashboard_quick_press']); //Быстрая публикация
        unset($side['dashboard_recent_drafts']); //Полседние черновики
        unset($side['dashboard_primary']); //Блог WordPress
        unset($side['dashboard_secondary']); //Другие Нновости WordPress

        unset($normal['dashboard_incoming_links']); //Входящие ссылки
        unset($normal['dashboard_right_now']); //Прямо сейчас
        unset($normal['dashboard_plugins']); //Последние Плагины
        unset($normal['wp_welcome_panel']); 
    }
    add_action('wp_dashboard_setup', 'clear_dash' );

    function new_excerpt_more( $more ) {
        return '...';
    }
    add_filter('excerpt_more', 'new_excerpt_more'); 

    function email_members($post_ID)  {
        if ('intranet' == get_post_type($post_ID)) {
            global $wpdb;
            $usersarray = $wpdb->get_results("SELECT user_email FROM $wpdb->users;");    
            $users = implode(",", $usersarray);
            //add_filter('wp_mail_from',create_function('', 'return "'.get_option('admin_email').'";'));  // function create_function deprecated
			add_filter('wp_mail_from',  function(){return get_option('admin_email');} );			
            //add_filter('wp_mail_from_name',create_function('', 'return "Клиника Genesis";'));    // function create_function deprecated
            add_filter('wp_mail_from_name', function(){return "Клиника Genesis";});           			
            wp_mail($users, "Интранет GENESIS: опубликована новая запись", 'Ссылка на запись: '.get_permalink($post_ID));
        }
        return $post_ID;
    }
    add_action('publish_post', 'email_members');

    function new_nav_menu_items($nav, $args) {
        $homelink = '<li'.(post_type_archive_title(0, 0) == 'Интранет'?' class="current-menu-item"':NULL).'><a href="' . site_url() . '/intranet/">Интранет</a></li>';
        $nav = is_user_logged_in() && $args->theme_location == 'tabsdocs' ? $homelink . $nav : $nav ;
        return $nav;
    }
    add_filter( 'wp_nav_menu_items', 'new_nav_menu_items', 10, 2 );

    
function pagination($prev = '«', $next = '»') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
        'base' => @add_query_arg('page','%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'prev_text' => __($prev),
        'next_text' => __($next),
        'type' => 'list'
);
    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

    echo paginate_links( $pagination );
};

if ( class_exists("global_posts_ordering") ) {
   $global_posts_ordering = new global_posts_ordering(array(
    'direction',
    'slider',
    'doctor',
    'specialisation',
    'service',
    'press'
));
   /*$global_posts_ordering_2 = new global_posts_ordering(array(
    'doctor'
));
$global_posts_ordering_3 = new global_posts_ordering(array(
    'service'
));

$global_posts_ordering_4 = new global_posts_ordering(array(
    'slider'
));

$global_posts_ordering_5 = new global_posts_ordering(array(
    'press'
));*/
}

function get_damn_edit_post_link ($post_id = 0) {
  return "/wp-admin/post.php?post={$post_id}&action=edit";
}

add_filter('wp_mail_from', 'ji_new_mail_from');
add_filter('wp_mail_from_name', 'ji_new_mail_from_name');
function ji_new_mail_from($old) {
 return get_option('admin_email');
}
function ji_new_mail_from_name($old) {
 return 'Клиника Genesis';
}

    function hide_some_stuff () {
        echo '
        <style type="text/css" media="screen">
        .type-history .row-actions .inline,
        .type-history .row-actions .view,
        .icon32-posts-history + h2 + form #edit-slug-box,
        .icon32-posts-history + h2 + form #preview-action,
        .type-gallery .row-actions .inline,
        .type-gallery .row-actions .view,
        .icon32-posts-gallery + h2 + form #edit-slug-box,
        .icon32-posts-gallery + h2 + form #preview-action,
        .type-reviews .row-actions .inline,
        .type-reviews .row-actions .view,
        .icon32-posts-reviews + h2 + form #edit-slug-box,
        .icon32-posts-reviews + h2 + form #preview-action
        { display: none !important; }
    </style>
        ';
    } 
    add_action('admin_footer', 'hide_some_stuff');

// удаление обновления тем.
	remove_action('load-update-core.php','wp_update_themes');
	//add_filter('pre_site_transient_update_themes',create_function('$a', "return null;")); // create_function deprecated
	add_filter('pre_site_transient_update_themes', function($a){return null;});
	
	wp_clear_scheduled_hook('wp_update_themes');
// /удаление обновления тем.

/*
function my_revisions_to_keep( $revisions ) {
    return 0;
}
add_filter( 'wp_revisions_to_keep', 'my_revisions_to_keep' );
*/

