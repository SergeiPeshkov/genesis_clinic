<?php
/*
    Template Name: .about
*/
?>
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
                        <li><a href="<?=site_url()?>">Главная</a></li>
                        <li><?php the_title(); ?></li>
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

                    <!-- .b-information -->
                    <div class="b-information">
                        
                        <?php $_blocks = maybe_unserialize(get_post_meta($post->ID, '_blocks', 1)); ?>

                        <?php if ($_blocks['address']) { ?>
                            <?php get_template_part('block', 'address'); ?>
                        <?php } ?>

                        <?php if ($_blocks['place']) { ?>
                            <?php get_template_part('block', 'place'); ?>
                        <?php } ?>

                        <?php if ($_blocks['schedule']) { ?>
                            <?php get_template_part('block', 'schedule'); ?>
                        <?php } ?>

                    </div>
                    <!-- /.b-information -->

                </aside>
                <!-- /#rightside -->
                
                <!-- #content -->
                <div id="content">
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