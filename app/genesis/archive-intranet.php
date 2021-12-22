<?php get_header(); ?>
<?  
// cover-up
if ($_GET['paged'])     { $pgd = $_GET['paged']; }
elseif ($_GET['page'])  { $pgd = $_GET['page']; }
else                    { $pgd = 1; }
// cover-up.
?>
    <?php query_posts('post_type=intranet&posts_per_page='.get_option('posts_per_page').'&paged='.$pgd); ?>

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
                        <li>
                            <a href="<?=site_url()?>">Главная</a>
                        </li>
                        <li>Интранет</li>
                    </ul>
                </div>
                <!-- /.b-breadcrumbs -->

            </div>
            <!-- /.main-top -->

            <!-- .main-body -->
            <div class="main-body clr">

                <?php if (is_user_logged_in()) { ?>
                
                <h1>Интранет</h1>
                
                <!-- #rightside -->
                <aside id="rightside">

                    <!-- .b-categories-list block shadow -->
                    <div class="b-categories-list block shadow">
                        <h2>Категории</h2>
                        <ul>
                            <?php wp_list_categories( array('taxonomy' => 'icat', 'orderby' => 'name', 'hide_empty' => 0, 'title_li' => '')); ?>
                        </ul>
                    </div>
                    <!-- /.b-categories-list block shadow -->

                </aside>
                <!-- /#rightside -->

                <!-- #content -->
                <div id="content">
                    
                    <!-- .b-articles-list -->
                    <div class="b-articles-list">
                        
                        <?php while ( have_posts() ) : the_post(); ?>
                        <article>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php 
                        $category = get_the_title(get_post_meta($post->ID, 'direction', 1));

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
                    <div class="article-panel">
                        <span class="comments"><?php comments_number('Комментариев нет', '1 комментарий', '% коммент.'); ?></span>
                     | <span class="date"><?php echo get_the_date('j M, H:i'); ?></span>
                     | <span class="type"><?php echo get_the_term_list( $post->ID, 'icat', '', ', ', '' ); ?></span>
                     <?=($doc?'|':'')?> <span class="author"><a href="<?=get_permalink($doc)?>"><?=$doctor?></a></span>  
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

                <?php } else { ?>
                <p>Доступ к странице запрещен.</p>
                <?php } ?>                

            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->

<?php get_footer(); ?>