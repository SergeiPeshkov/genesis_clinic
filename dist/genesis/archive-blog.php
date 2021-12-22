<?php get_header(); ?>
    <?php $doctor = $_GET['aid'] ? "&author={$_GET[aid]}" : NULL ; ?>
<?  
// cover-up
if ($_GET['paged'])     { $pgd = $_GET['paged']; }
elseif ($_GET['page'])  { $pgd = $_GET['page']; }
else                    { $pgd = 1; }
// cover-up.
?>
    <?php query_posts('post_type=blog&posts_per_page='.get_option('posts_per_page').'&paged='.$pgd.$doctor); ?>

                    <ul>
                        <li class="active"><a href="<?=site_url().'/doctor/'?>">Доктора</a></li>
                        <li><a href="<?=site_url().'/about/'?>">О клинике</a></li>
                        <li><a href="<?=site_url().'/price/'?>">Услуги и цены</a></li>
                    </ul>
                <?php
                    if (is_numeric($_GET['aid'])) {
                        $blogTitleBox = get_posts(array(
                            'post_type' => 'doctor',
                            'showposts' => 1,
                            'meta_key' => 'acco',
                            'meta_value' => $_GET['aid']
                        ));
                        $docBlogTitle  = get_the_title($blogTitleBox[0]->ID);
                    }
                ?>
                    <?php wp_nav_menu(array("theme_location" => "tabsdocs", "container" => false, "menu_class" => 'subnav')); ?>      
                </nav>

                <!-- .b-breadcrumbs -->
                <div class="b-breadcrumbs">
                    <ul>
                        <li><a href="<?=site_url()?>">Главная</a></li>
                        <?php if ($_GET['aid']) { ?>
                        <li><a href="<?=site_url().'/blog/'?>">Блоги</a></li>
                        <?php } else { ?>
                        <li class="current">Блоги</li>
                        <?php } ?>
                        <?=(is_numeric($_GET['aid'])?'<li class="current">'.$docBlogTitle.'</li>':NULL)?>
                    </ul>
                </div>
                <!-- /.b-breadcrumbs -->

            </div>
            <!-- /.main-top -->

            <!-- .main-body -->
            <div class="main-body clr">
                <h1><?=($docBlogTitle?$docBlogTitle:'Блоги')?></h1>

                <!-- #rightside -->
                <aside id="rightside">

                    <!-- .b-categories-list block shadow -->
                    <div class="b-categories-list block shadow">
                        <h2>Категории</h2>
                        <ul>
                            <?php wp_list_categories( array('taxonomy' => 'bcat', 'orderby' => 'name', 'hide_empty' => 0, 'title_li' => '')); ?>
                        </ul>
                    </div>
                    <!-- /.b-categories-list block shadow -->

                    <!-- .b-authors block shadow -->
                    <div class="b-authors block shadow">
                        <h2>Авторы</h2>

                        <?php
                            $zAuthors = get_posts(
                                array(
                                    'post_type' => 'doctor',
                                    'showposts' => -1
                                )
                            );
                            foreach ($zAuthors as $zAthr) {
                                $zAcco = get_post_meta($zAthr->ID, 'acco', 1);
                                if ($zAcco) {
                                    $zPosts = get_posts(array(
                                        'post_type' => 'blog',
                                        'showposts' => 1,
                                        'author' => $zAcco
                                    ));
                                    if ($zPosts[0]->ID) {
                                            $rang = get_post_meta($doctor[0]->ID, 'rang', 1);
                        ?>
                        <!-- .user-block -->
                        <div class="user-block">
                            <div class="img">
                                <?=(MultiPostThumbnails::get_the_post_thumbnail('doctor', 'doc-square-thumb', $zAthr->ID, 'avatar-sb'))?>
                            </div>
                            <div class="info">
                                <div class="name"><a href="<?=site_url().'/blog/?aid='.$zAcco?>"><?=get_the_title($zAthr->ID)?></a></div>
                                <div class="prof"><?=$rang?></div>
                            </div>
                        </div>
                        <!-- /.user-block -->
                        <?php
                                    }
                                }
                            }
                        ?>

                    </div>
                    <!-- /.b-authors block shadow -->

                </aside>
                <!-- /#rightside -->
                
                <!-- #content -->
                <div id="content">
                    
                    <!-- .b-articles-list -->
                    <div class="b-articles-list">
                        
                        <?php while ( have_posts() ) : the_post(); ?>

                        <?php 
                            $doctor = get_posts(array(
                                "post_type" => 'doctor',
                                "showposts" => '1',
                                "meta_key" => "acco",
                                "meta_value" => $post->post_author
                            ));
                            $doc = $doctor[0]->ID;
                            if ($doctor[0]->ID) {
                                $doctor = get_the_title($doctor[0]->ID);
                                $rang = get_post_meta($doctor[0]->ID, 'rang', 1);
                            } else {
                                $first_name = get_the_author_meta('first_name');
                                $last_name = get_the_author_meta('last_name');      
                                $doctor = $first_name.' '.$last_name;
                            }

                            $category = wp_get_object_terms($post->ID, 'bcat');
                            $category = $category[0] ? $category[0]->name : 'Без категории' ;
                        ?>
                        <article>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="article-panel">
                                <span class="comments"><?php comments_number('Комментариев нет', '1 комментарий', '% коммент.'); ?></span>
                     | <span class="date"><?php echo get_the_date('j M, H:i'); ?></span>
                     | <span class="type"><?=$category?></span>
                     <?=($doc?'|':'')?> <span class="author"><a href="<?=get_permalink($doc)?>"><?=$doctor?></a></span>
                            </div>
                            <?php the_excerpt(); ?>
                        </article>
                        <?php endwhile; ?>

                    </div>
                    <!-- /.b-articles-list -->

<?php if (have_posts()) { ?>
<!-- .pager -->
<div class="pager">
    <?php pagination(); ?>
</div>
<!-- /.pager -->
<?php } ?>

                </div>
                <!-- /#content -->

            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->

<?php get_footer(); ?>