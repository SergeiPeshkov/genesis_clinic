<?php get_header(); ?>
                    <ul>
                        <li class="active"><a href="<?=site_url().'/doctor/'?>">Доктора</a></li>
                        <li><a href="<?=site_url().'/about/'?>">О клинике</a></li>
                        <li><a href="<?=site_url().'/price/'?>">Услуги и цены</a></li>
                    </ul>
                    <?php wp_nav_menu(array("theme_location" => "tabsdocs", "container" => false, "menu_class" => 'subnav')); ?>      
                </nav>

                <!-- .b-breadcrumbs -->
                <div class="b-breadcrumbs">
                    <ul>
                        <?php 
                            global $post;
                            $bDoctor = get_posts(array(
                                'post_type' => 'doctor',
                                'showposts' => 1,
                                'meta_key' => 'acco',
                                'meta_value' => $post->post_author
                            ));
                            $doctor_url = $bDoctor[0]->ID ? get_permalink($bDoctor[0]->ID) : NULL ; 
                        ?>
                        <li><a href="<?=site_url()?>">Главная</a></li>
                        <li><a href="<?=site_url().'/blog/'?>">Блоги</a></li>
                        <?php if ($doctor_url) { ?><li><a href="<?=$doctor_url?>"><?=get_the_title($bDoctor[0])?></a></li><?php } ?>
                        <li class="current"><?php the_title(); ?></li>
                    </ul>
                </div>
                <!-- /.b-breadcrumbs -->

            </div>
            <!-- /.main-top -->

            <!-- .main-body -->
            <div class="main-body clr">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h1><?php the_title(); ?></h1>       

                <!-- #rightside -->
                <aside id="rightside">

                    <?php if ($doctor_url) { ?>
                    <!-- .b-authors block shadow -->    
                    <div class="b-authors block shadow">
                        <h2>Автор</h2>

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
                        ?>
                        <!-- .user-block -->
                        <div class="user-block">
                            <div class="img">
                                <?=(MultiPostThumbnails::get_the_post_thumbnail('doctor', 'doc-square-thumb', $doc, 'avatar-sb'))?>
                            </div>
                            <div class="info">
                                <div class="name"><a href="<?=site_url().'/blog/?aid='.$post->post_author?>"><?=$doctor?></a></div>
                                <?php if ($rang) { ?><div class="prof"><?=$rang?></div><?php } ?>
                            </div>
                        </div>
                        <!-- /.user-block -->

                    </div>
                    <!-- /.b-authors block shadow -->
                    <?php } ?>

                    <!-- .b-links block -->
                    <div class="b-links block shadow">
                        <h2>Последнее в блогах</h2>
                        <ul>                        
                            <?php
                            $in_blocks = get_option('gnss_in_blocks');
                            $wBlog = get_posts(array('post_type' => 'blog', 'showposts' => $in_blocks['blog_num']));
                            foreach ($wBlog as $k => $wEntry) { 
                        ?>                            
                            <li><a href="<?=get_permalink($wEntry->ID)?>"><?=get_the_title($wEntry->ID)?></a></li>
                        <?php } ?>
                        </ul>
                        <div class="more"><a href="<?=get_post_type_archive_link('blog')?>">Все статьи &raquo;</a></div>
                    </div>
                    <!-- /.b-links block -->

                </aside>
                <!-- /#rightside -->
                
                <!-- #content -->
                <div id="content">
                    <?php 
                        $category = wp_get_object_terms($post->ID, 'bcat');
                        $category = $category[0] ? $category[0]->name : 'Без категории' ;
                    ?>
                    <div class="article-panel">
                        <span class="comments"><?php comments_number('Комментариев нет', '1 комментарий', '% коммент.'); ?></span>
                     | <span class="date"><?php the_date('j M, H:i'); ?></span>
                     | <span class="type"><?=$category?></span>
                     <?=($doc?'|':'')?> <span class="author"><a href="<?=get_permalink($doc)?>"><?=$doctor?></a></span>
                    </div> 
                    <?php the_content(); ?>

                    <!-- .b-comments block -->
                    <div class="b-comments block">
                        <h2>Комментарии</h2>
                        
                        <?php comments_template(); ?>
                    </div>
                    <!-- /.b-comments block -->

                <?php endwhile; endif; ?>

                </div>
                <!-- /#content -->

            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->

<?php get_footer(); ?>