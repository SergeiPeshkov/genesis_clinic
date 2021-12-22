<?php get_header(); ?>

                    <ul>
                        <li class="active"><a href="<?=site_url().'/doctor/'?>">Доктора</a></li>
                        <li><a href="<?=site_url().'/about/'?>">О клинике</a></li>
                        <li><a href="<?=site_url().'/price/'?>">Услуги и цены</a></li>
                    </ul>
                    <?php wp_nav_menu(array("theme_location" => "tabsdocs", "container" => false, "menu_class" => 'subnav')); ?>      
                </nav>

                <!-- .b-breadcrumbs -->
                <?php
                    if( is_tax() ) {
                        global $wp_query;
                        $term = $wp_query->get_queried_object();
                        $title = $term->name;
                    }
                ?>
                <div class="b-breadcrumbs">
                    <ul>
                        <li><a href="<?=site_url()?>">Главная</a></li>
                        <li><a href="<?=site_url()."/blog/"?>">Блоги</a></li>
                        <li class="current"><?=$title?></li>
                    </ul>
                </div>
                <!-- /.b-breadcrumbs -->

            </div>
            <!-- /.main-top -->

            <!-- .main-body -->
            <div class="main-body clr">
                <h1><?php single_term_title(); ?></h1>

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
                            <div class="article-panel"><span class="comments"><?php comments_number('Комментариев нет', '1 комментарий', '% коммент.'); ?></span> | <span class="date"><?php echo get_the_date('j M, H:i'); ?></span>
                             | <span class="type"><?=$category?></span>
                             <?=($doc?'|':'')?> <span class="author"><a href="<?=get_permalink($doc)?>"><?=$doctor?></a></span> 
                            </div>
                            <?php the_excerpt(); ?>
                        </article>
                        <?php endwhile; ?>

                    </div>
                    <!-- /.b-articles-list -->

                    <!-- .pager 
                    <div class="pager">
                        <ul>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">7</a></li>
                            <li><a href="#">8</a></li>
                            <li><a href="#">9</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                     /.pager -->

                </div>
                <!-- /#content -->

            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->

<?php get_footer(); ?>