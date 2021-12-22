<?php get_header(); ?>

                    <ul>
                        <li><a href="<?=site_url().'/doctor/'?>">Доктора</a></li>
                        <li><a href="<?=site_url().'/about/'?>">О клинике</a></li>
                        <li><a href="<?=site_url().'/price/'?>">Услуги и цены</a></li>
                    </ul>
                <!-- .b-home-top -->
                <div class="b-home-top">
                    <div class="scrollable">
                        <div class="items">

                            <?php
                                $iblocks = get_option('gnss_index_blocks');
                                $slides = get_posts(array(
                                    'post_type' => 'slider',
				    'orderby' => 'menu_order',
				    'order' => 'ASC',
                                    'showposts' => -1
                                ));
                                foreach ($slides as $slide) {
                            ?>
                            <div>
                                <a href="<?=get_post_meta($slide->ID, 'link', 1)?>">
                                    <span class="img">
                                        <?=get_the_post_thumbnail($slide->ID, 'slider', array('title' => get_the_title($slide->ID)))?>
                                    </span>
                                    <span class="content">
                                        <span class="title"><?=get_the_title($slide->ID)?></span>
                                        <span class="text"><?=strip_tags(strip_shortcodes($slide->post_content))?></span>
                                    </span>
                                </a>
                            </div>
                            <?php } ?>

                        </div>

                        <div class="navi"></div>
                    </div>
                    
                </div>
                <!-- /.b-home-top -->

            </div>
            <!-- /.main-top --> 

            <!-- .main-body -->
            <div class="main-body clr">
                
                <!-- .b-categories -->
                <div class="b-categories">
                    <ul class="frames">

                    <?php $dir_query = new WP_Query( array('post_type' => 'direction', 'showposts' => -1,
				    'orderby' => 'menu_order',
				    'order' => 'ASC') ); ?>
                    <?php while ( $dir_query->have_posts() ) : $dir_query->the_post(); ?>
                        <!-- .category -->
                        <li class="category frame">
                            <a href="<?php the_permalink(); ?>">
                                <span class="img"><?php MultiPostThumbnails::the_post_thumbnail('direction', 'dir-square-thumb', null, 'thumb-drctn'); ?></span>
                                <span class="name"><?php the_title(); ?></span>
                            </a>
                        </li>
                        <!-- /.category -->
                    <?php endwhile; ?>

                    </ul>
                </div>
                <!-- /.b-categories -->

            </div>
            <!-- /.main-body -->

            <!-- .main-bottom -->
            <div class="main-bottom">
                
                <!-- .leftside -->
                <aside class="leftside">
                    
                    <?php if ($iblocks['review_show']) { ?>
                    <!-- .b-otziv block shadow -->
                    <div class="b-otziv block shadow">
                        <h2>Отзывы</h2>
                        <?php $nRvw = get_posts(array('post_type' => 'reviews', 'showposts' => 1)); ?>
                        <div class="userpic"><?=get_the_post_thumbnail($nRvw[0]->ID, 'avatar', array('title' => get_the_title($nRvw[0]->ID)))?></div>
                        <div class="username"><?=get_the_title($nRvw[0]->ID)?></div>
                        <p><?=get_excerpt_by_id($nRvw[0]->ID)?></p>
                        <div class="more"><a href="<?=get_post_type_archive_link('reviews')?>">Все отзывы &raquo;</a></div>
                    </div>
                    <!-- /.b-otziv block shadow -->
                    <?php } ?>

                    <?php if ($iblocks['video_show']) { ?>
                                            
                        <?php 
                            $photos = get_posts(array('post_type' => 'gallery', "showposts" => 1, 'meta_key' => 'index', 'meta_value' => 'on'));
                            if ($photos[0]->ID) {
                            foreach ($photos as $photo) {
                                $video = get_post_meta($photo->ID, 'video', 1);
                        ?>
                    <!-- .b-video block -->
                    <div class="b-video block">
                        <h2>Видео</h2>
                        <?php if ($video) { ?><a href="<?=$video?>" class="player shadow fancybox-media"><?=get_the_post_thumbnail($photo->ID, 'gallery_')?></a><?php } ?>
                    </div>
                    <!-- /.b-video block -->
                        <?php } ?>
                        <?php } ?>
                    <?php } ?>

                </aside>
                <!-- /.leftside -->

                <!-- .rightside -->
                <aside class="rightside">
                    
                    <?php if ($iblocks['answ_show']) { ?>
                    <!-- .b-links block -->
                    <div class="b-links block">
                        <h2>Вопросы и ответы</h2>
                        <ul>
                        <?php
                            $wAnswers = get_posts(array('post_type' => 'answers', 'showposts' => $iblocks['answ_num']));
                            foreach ($wAnswers as $k => $wAnsw) { 
                        ?>
                            <li><a href="<?=get_permalink($wAnsw->ID)?>"><?=get_the_title($wAnsw->ID)?></a></li>
                        <?php } ?>
                        </ul>
                        <div class="more"><a href="<?=get_post_type_archive_link('answers')?>">Все вопросы &raquo;</a></div>
                    </div>
                    <!-- /.b-links block -->
                    <?php } ?>

                    <?php if ($iblocks['blog_show']) { ?>
                    <!-- .b-links block -->
                    <div class="b-links block">
                        <h2>Блоги врачей</h2>
                        <ul>
                        <?php
                            $wBlog = get_posts(array('post_type' => 'blog', 'showposts' => $iblocks['blog_num']));
                            foreach ($wBlog as $k => $wEntry) { 
                        ?>                            
                            <li><a href="<?=get_permalink($wEntry->ID)?>"><?=get_the_title($wEntry->ID)?></a></li>
                        <?php } ?>
                        </ul>
                        <div class="more"><a href="<?=get_post_type_archive_link('blog')?>">Все блоги &raquo;</a></div>
                    </div>
                    <!-- /.b-links block -->
                    <?php } ?>

                </aside>
                <!-- /.rightside -->

                <!-- .home-content -->
                <section class="home-content">

                    <!-- .b-links block -->
                    <div class="b-news block">
                        <h2>Новости</h2>
                        <ul>
                        <?php
                            $wNews = get_posts(array('post_type' => 'news', 'showposts' => $iblocks['news_num']));
                            foreach ($wNews as $k => $wN) { 
                        ?>
                            <li>
                                <h3><a href="<?=get_permalink($wN->ID)?>"><?=get_the_title($wN->ID)?></a></h3>
                                <p><?=get_excerpt_by_id($wN->ID)?></p>
                            </li>
                        <?php } ?>
                        </ul>
                        <div class="more"><a href="<?=get_post_type_archive_link('news')?>">Все новости &raquo;</a></div>
                    </div>
                    <!-- /.b-links block -->

                </section>
                <!-- /.home-content -->

            </div>
            <!-- /.main-bottom -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->

<?php get_footer(); ?>
