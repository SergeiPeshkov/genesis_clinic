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
                        <?php global $post; ?>
                        <li><a href="<?=site_url()?>">Главная</a></li>
                        <li><a href="<?=site_url().'/intranet/'?>">Интранет</a></li>
                        <li><?php echo get_the_term_list( $post->ID, 'icat', '', '/', '' ); ?></li>
                        <li class="current"><?=get_the_title($post->ID)?></li>
                    </ul>
                </div>
                <!-- /.b-breadcrumbs -->

            </div>
            <!-- /.main-top -->

            <!-- .main-body -->
            <div class="main-body clr">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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

                <?php if (is_user_logged_in()) { ?>

                <h1><?php the_title(); ?></h1>       

                <!-- #rightside -->
                <aside id="rightside">

                    <!-- .b-links block -->
                    <div class="b-links block shadow">
                        <h2>Последнее в интранете</h2>
                        <ul>
                        <?php
                            $in_blocks = get_option('gnss_in_blocks');
                            $wBlog = get_posts(array('post_type' => 'intranet', 'showposts' => $in_blocks['intranet_num']));
                            foreach ($wBlog as $k => $wEntry) { 
                        ?>                            
                            <li><a href="<?=get_permalink($wEntry->ID)?>"><?=get_the_title($wEntry->ID)?></a></li>
                        <?php } ?>
                        </ul>
                        <div class="more"><a href="<?=get_post_type_archive_link('intranet')?>">Все статьи &raquo;</a></div>
                    </div>
                    <!-- /.b-links block -->

                </aside>
                <!-- /#rightside -->
                
                <!-- #content -->
                <div id="content">
                    <div class="article-panel">
                        <span class="comments"><?php comments_number('Комментариев нет', '1 комментарий', '% коммент.'); ?></span>
                     | <span class="date"><?php the_date('j M, H:i'); ?></span>
                     | <span class="type"><?php echo get_the_term_list( $post->ID, 'icat', '', ', ', '' ); ?></span>
                     <?=($doc?'|':'')?> <span class="author"><a href="<?=get_permalink($doc)?>"><?=$doctor?></a></span>
                    </div> 
                    <?php the_content(); ?>

                    <!-- .b-comments block -->
                    <div class="b-comments block">
                        <h2>Комментарии</h2>
                        
                        <?php comments_template(); ?>
                    </div>
                    <!-- /.b-comments block -->

                <?php } else { ?>
                <p>Доступ к странице запрещен.</p>
                <?php } ?>


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