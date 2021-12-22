<?php get_header(); ?>
                    <ul>
                        <li><a href="<?=site_url().'/doctor/'?>">Доктора</a></li>
                        <li><a href="<?=site_url().'/about/'?>">О клинике</a></li>
                        <li class="active"><a href="<?=site_url().'/price/'?>">Услуги и цены</a></li>
                    </ul>
                    <?php wp_nav_menu(array("theme_location" => "tabsprice", "container" => false, "menu_class" => 'subnav')); ?>      
                </nav>

                <!-- .b-breadcrumbs -->
                <div class="b-breadcrumbs">
                    <ul>
                        <?php global $post; ?>
                        <li><a href="<?=site_url()?>">Главная</a></li>
                        <li><a href="<?=site_url().'/price/'?>">Перечень услуг и цены</a></li>
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

                    <?php 
                        $services = get_posts(array(
                            'post_type' => 'service', 
                            'showposts' => -1,
                            'orderby' => 'menu_order',
                            'order' => 'ASC',
                            'meta_key' => 'parentem',
                            'meta_value' => $post->ID
                        ));
                        if ($services[0]->ID) {
                    ?>
                    <!-- .b-links block -->
                    <div class="b-links block shadow">
                        <h2>Услуги</h2>
                        <ul>
                            <?php 
                                foreach ($services as $service) {
                            ?>
                            <li><a href="<?=get_permalink($service->ID)?>"><?=get_the_title($service->ID)?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- /.b-links block -->
                    <?php 
                        }
                        $spe = get_posts(array(
                            'post_type' => 'specialisation', 
                            'showposts' => -1,
                            'orderby' => 'menu_order',
                            'order' => 'ASC',
                            'meta_key' => 'parentem',
                            'meta_value' => $post->ID
                        ));
                        if ($spe[0]->ID) {
                    ?>
                    <!-- .b-links block -->
                    <div class="b-links block shadow">
                        <h2>Специализации</h2>
                        <ul>
                            <?php 
                                foreach ($spe as $specialisation) {
                            ?>
                            <li><a href="<?=get_permalink($specialisation->ID)?>"><?=get_the_title($specialisation->ID)?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- /.b-links block -->
                    <?php } ?>

                    <!-- .b-links block -->
                    <div class="b-links block shadow">
                        <h2>Новости</h2>
                        <ul>
                            <?php
                                $in_blocks = get_option('gnss_in_blocks');            
                                $news = get_posts(array('post_type' => 'news', 'showposts' => $in_blocks['news_num'], 'meta_key' => 'direction', 'meta_value' => $post->ID));
                                foreach ($news as $n) { 
                            ?>
                            <li><a href="<?=get_permalink($n->ID)?>"><?=get_the_title($n->ID)?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- /.b-links block -->

                </aside>
                <!-- /#rightside -->
                
                <!-- #content -->
                <div id="content">
    
                    <!-- .b-diagnostic -->
                    <div class="b-diagnostic">
                        
                        <!-- .content -->
                        <div class="content">

                            <!-- .left -->
                            <div class="f-left">
                            <?php if (has_post_thumbnail()) { ?>
                            <div class="img"><?php the_post_thumbnail('thumb-drctn'); ?></div>
                            <?php } ?>
                            
                            <?php $video = get_post_meta($post->ID, 'video', 1); ?>
                            <?php if ($video) { ?>
                            <!-- .b-video block -->
                            <div class="b-video block">
                                <h2>Видео</h2>
                                <a href="<?=$video?>" class="player shadow fancybox-media">
                                    <?php MultiPostThumbnails::the_post_thumbnail('direction', 'video-thumb-d', null, 'thumb-drctn-video'); ?>
                                </a>
                            </div>
                            <!-- /.b-video block -->
                            <?php } ?>
                        </div>
                        <!-- /.left-->
                            <?php the_content(); ?>
                        </div>
                        <!-- /.content -->

                    </div> 
                    <!-- /.b-diagnostic -->
 
                </div>
                <!-- /#content -->

            <?php endwhile; endif; ?>
            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->

<?php get_footer(); ?>