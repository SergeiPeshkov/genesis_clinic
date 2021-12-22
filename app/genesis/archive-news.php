<?php get_header(); ?>
<?  
// cover-up
if ($_GET['paged'])     { $pgd = $_GET['paged']; }
elseif ($_GET['page'])  { $pgd = $_GET['page']; }
else                    { $pgd = 1; }
// cover-up.
?>
    <?php query_posts('post_type=news&posts_per_page='.get_option('posts_per_page').'&paged='.$pgd); ?>

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
                        <li>
                            <a href="<?=site_url()?>">Главная</a>
                        </li>
                        <li>Новости</li>
                    </ul>
                </div>
                <!-- /.b-breadcrumbs -->

            </div>
            <!-- /.main-top -->

            <!-- .main-body -->
            <div class="main-body clr">
                <h1>Новости</h1>
                
                <!-- #content -->
                <div id="content">
                    
                    <!-- .b-articles-list -->
                    <div class="b-articles-list">
                        
                        <?php while ( have_posts() ) : the_post(); ?>
                        <article>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php 
                        $category = get_the_title(get_post_meta($post->ID, 'direction', 1));
                    ?>
                    <div class="article-panel">
                        <span class="comments"><?php comments_number('Комментариев нет', '1 комментарий', '% коммент.'); ?></span>
                     | <span class="date"><?php echo get_the_date('j M, H:i'); ?></span>
                     | <span class="type"><?=$category?></span>
                    </div> 
                            <?php the_excerpt(); ?>
                        </article>
                        <?php endwhile; ?>

                    </div>
                    <!-- /.b-articles-list -->

<?php if (have_posts()) { ?>
<!-- .pager -->
<div class="pager">
    <?php pagination(); ?>
</div>
<!-- /.pager -->
<?php } ?>

                </div>
                <!-- /#content -->

            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->

<?php get_footer(); ?>