<?php
/*
    Template Name: .search
*/
?>
<?php get_header(); ?>

                    <ul>
                        <li><a href="<?=site_url().'/doctor/'?>">Доктора</a></li>
                        <li><a href="<?=site_url().'/about/'?>">О клинике</a></li>
                        <li><a href="<?=site_url().'/price/'?>">Услуги и цены</a></li>
                    </ul>
                </nav>

                <!-- .b-breadcrumbs -->
                <div class="b-breadcrumbs">
                    <ul>
                        <li>
                            <a href="<?=site_url()?>">Главная</a>
                        </li>
                        <li>Поиск</li>
                    </ul>
                </div>
                <!-- /.b-breadcrumbs -->

            </div>
            <!-- /.main-top -->

            <!-- .main-body -->
            <div class="main-body clr">
                <h1>Поиск</h1>
                
                <!-- #content -->
                <div id="content">
                    
                    <!-- .b-articles-list -->
                    <div class="b-articles-list">
                        <?php if ($_GET['q']) { ?>
                        <?php $the_query = new WP_Query(array('s' => $_GET['q'], 'post_type' => array('news', 'press', 'blog', 'reviews', 'answers'))); ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <article>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="article-panel">
                        <span class="comments"><?php comments_number('Комментариев нет', '1 комментарий', '% коммент.'); ?></span>
                     | <span class="date"><?php the_date('j M, H:i'); ?></span>
                    </div> 
                            <?php the_excerpt(); ?>
                        </article>
                        <?php endwhile; wp_reset_postdata(); ?>
                        <?php } else { ?>
                        <p>Ничего не найдено.</p>
                        <?php } ?>

                    </div>
                    <!-- /.b-articles-list -->

                    <!-- .pager 
                    <div class="pager">
                        <ul>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">7</a></li>
                            <li><a href="#">8</a></li>
                            <li><a href="#">9</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                     /.pager -->

                </div>
                <!-- /#content -->

            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->

<?php get_footer(); ?>