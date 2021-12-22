
<?php get_header(); ?>
    <?php query_posts('post_type=press&showposts=-1&orderby=date&order=DESC'); ?> 
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
                        <li><a href="<?=site_url()?>">Главная</a></li>
                        <li><a href="<?=site_url().'/about/'?>">О клинике</a></li>
                        <li class="current">Пресса о нас</li>
                    </ul>
                </div>
                <!-- /.b-breadcrumbs -->

            </div>
            <!-- /.main-top -->

            <!-- .main-body -->
            <div class="main-body clr">
                <h1>Пресса о нас</h1>

                <!-- #rightside -->
                <aside id="rightside">

                    <!-- .b-links block -->
                    <?php $in_blocks = get_option('gnss_in_blocks'); ?>
                    <div class="b-links block shadow">
                        <h2>Вопросы и ответы</h2>
                        <ul>
                        <?php
                            $wAnswers = get_posts(array('post_type' => 'answers', 'showposts' => $in_blocks['answ_num']));
                            foreach ($wAnswers as $k => $wAnsw) { 
                        ?>
                            <li><a href="<?=get_permalink($wAnsw->ID)?>"><?=get_the_title($wAnsw->ID)?></a></li>
                        <?php } ?>
                        </ul>                        
                        <div class="more"><a href="<?=get_post_type_archive_link('answers')?>">Все вопросы &raquo;</a></div>
                    </div>
                    <!-- /.b-links block -->

                    <!-- .b-links block -->
                    <div class="b-links block shadow">
                        <h2>Новости</h2>
                        <ul>
                        <?php
                            $wNews = get_posts(array('post_type' => 'news', 'showposts' => $in_blocks['news_num']));
                            foreach ($wNews as $k => $wN) { 
                        ?>
                            <li>
                                <a href="<?=get_permalink($wN->ID)?>"><?=get_the_title($wN->ID)?>
                            </li>
                        <?php } ?>
                        </ul>
                        <div class="more"><a href="<?=get_post_type_archive_link('news')?>">Все новости &raquo;</a></div>
                    </div>
                    <!-- /.b-links block -->

                </aside>
                <!-- /#rightside -->
                
                <!-- #content -->
                <div id="content">
                    
                    <!-- .b-pressa -->
                    <div class="b-pressa">
                        
                        <?php while ( have_posts() ) : the_post(); ?>
                        <?php $press = get_post_meta($post->ID, 'smi', 1); ?>
                        <?php $date = get_post_meta($post->ID, 'date', 1); ?>
                        <article>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php the_content(); ?>
                            <div class="istochnik"><?=$press?> <?=$date?></div>
                        </article>
                        <?php endwhile; ?>

                    </div>
                    <!-- /.b-pressa -->

                </div>
                <!-- /#content -->

            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->

<?php get_footer(); ?>
