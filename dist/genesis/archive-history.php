<?php get_header(); ?>
    <?php query_posts('post_type=history&showposts=-1'); ?>
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
                        <li class="current">История клиники</li>
                    </ul>
                </div>
                <!-- /.b-breadcrumbs -->

            </div>
            <!-- /.main-top -->

            <!-- .main-body -->
            <div class="main-body clr">
                <h1>История клиники</h1>

                <!-- #rightside -->
                <aside id="rightside">

                    <!-- .b-information -->
                    <div class="b-information">
                        
                        <?php $_blocks = maybe_unserialize(get_post_meta($post->ID, '_blocks', 1)); ?>

                            <?php get_template_part('block', 'address'); ?>

                            <?php get_template_part('block', 'place'); ?>

                            <?php get_template_part('block', 'schedule'); ?>

                    </div>
                    <!-- /.b-information -->

                </aside>
                <!-- /#rightside -->
                
                <!-- #content -->
                <div id="content">
                    
                    <!-- .b-history -->
                    <div class="b-history">

                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="block">
                            <h2><?php the_title(); ?></h2>
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile; ?>
                        
                    </div>
                    <!-- /.b-history -->

                </div>
                <!-- /#content -->

            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->
<?php get_footer(); ?>      