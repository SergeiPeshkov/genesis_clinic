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
                        <li><a href="<?=get_permalink(get_post_meta($post->ID, 'parentem', 1))?>"><?=get_the_title(get_post_meta($post->ID, 'parentem', 1))?></a></li>
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
                        <h2>Другие услуги отделения</h2>
                        <ul>
                            <?php 
                                $parentem = get_post_meta($post->ID, 'parentem', 1);
                                $services = get_posts(array(
                                    'post_type' => 'service', 
                                    'showposts' => -1,
                                    'orderby' => 'menu_order',
                                    'order' => 'ASC',
                                    'meta_key' => 'parentem',
                                    'meta_value' => $parentem,
                                    'exclude' => $post->ID
                                ));
                                foreach ($services as $service) {
                            ?>
                            <li><a href="<?=get_permalink($service->ID)?>"><?=get_the_title($service->ID)?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- /.b-links block -->

                    <!-- .b-information block -->
                    <div class="b-information block">
                        <h2>Как нас найти</h2>
                        
                        <!-- .address -->
                        <div class="address">
                            <?php
                                $map = get_post_meta($post->ID, 'map', 1);
                                $address = get_post_meta($post->ID, 'address', 1);
                            ?>
                            <div class="map"><?=$map?></div>
                            <address><?=$address?> </address><a href="<?=site_url().'/contact/'?>">контакты</a>
                        </div>
                        <!-- /.address -->

                    </div>
                    <!-- /.b-information block -->

                </aside>
                <!-- /#rightside -->
                
                <!-- #content -->
                <div id="content">
    
                    <!-- .b-mrt -->
                    <div class="b-mrt">
                        
                        
                        <?php
                            $link = get_post_meta($post->ID, 'link', 1);
                            $room = get_post_meta($post->ID, 'room', 1);
                            $phone = get_post_meta($post->ID, 'phone', 1);
                            $price = get_post_meta($post->ID, 'price', 1);
                        ?>
                        <?php if (has_post_thumbnail()) { ?>
                        <div class="img">
                            <?php the_post_thumbnail('thumb-drctn'); ?>
                        </div>
                        <?php } ?>
                        <div class="info <?=(has_post_thumbnail()?NULL:'info-wo-m')?>">
                            <dl>
                                <dt>Цена:</dt>
                                <dd><?=$price?> руб.</dd>
                                <?php if ($room) { ?>
                                <dt>Кабинет:</dt>
                                <dd><?=$room?></dd>
                                <?php } ?>
                                <dt><?=$phone?></dt>
                            </dl>
                            
                        </div>

                    </div>
                    <!-- /.b-mrt -->

                    <?php the_content(); ?>

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
