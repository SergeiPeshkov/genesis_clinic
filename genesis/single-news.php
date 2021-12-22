<?php get_header(); ?>
                    <ul>
                        <li><a href="<?=site_url().'/doctor/'?>">Доктора</a></li>
                        <li class="active"><a href="<?=site_url().'/about/'?>">О клинике</a></li>
                        <li><a href="<?=site_url().'/price/'?>">Услуги и цены</a></li>
                    </ul>
                    <?php wp_nav_menu(array("theme_location" => "tabsabout", "container" => false, "menu_class" => 'subnav')); ?>      
                </nav>

                <!-- .b-breadcrumbs -->
                <div class="b-breadcrumbs">
                    <ul>
                        <?php global $post; ?>
                        <li><a href="<?=site_url()?>">Главная</a></li>
                        <li><a href="<?=site_url().'/news/'?>">Новости</a></li>
                        <li><a href="<?=get_permalink(get_post_meta($post->ID, 'direction', 1))?>"><?=get_the_title(get_post_meta($post->ID, 'direction', 1))?></a></li>
                        <li class="current"><?=get_the_title($post->ID)?></li>
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

                    <!-- .b-links block -->
                    <div class="b-links block shadow">
                        <h2>Последнее в блогах</h2>
                        <ul>
                        <?php
                            $wBlog = get_posts(array('post_type' => 'blog', 'showposts' => 3));
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
                        $category = get_the_title(get_post_meta($post->ID, 'direction', 1));
                    ?>
                    <div class="article-panel">
                        <span class="comments"><?php comments_number('Комментариев нет', '1 комментарий', '% коммент.'); ?></span>
                     | <span class="date"><?php the_date('j M, H:i'); ?></span>
                     | <span class="type"><?=$category?></span>
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