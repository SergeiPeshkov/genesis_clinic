<?php get_header(); ?>
    <?php query_posts('post_type=blog&showposts=-1'); ?>

                    <ul class="subnav">
                        <li><a href="#">Наши специалисты</a></li>
                        <li><a href="#">Запись на прием</a></li>
                        <li><a href="#">Задать вопрос</a></li>
                        <li><a href="#">Вопросы и ответы</a></li>
                        <li class="active"><a href="#">Блог врачей</a></li>
                    </ul>
                </nav>

                <!-- .b-breadcrumbs -->
                <div class="b-breadcrumbs">
                    <ul>
                        <li><a href="#">Доктора</a></li>
                        <li class="current">Блог</li>
                    </ul>
                </div>
                <!-- /.b-breadcrumbs -->

            </div>
            <!-- /.main-top -->

            <!-- .main-body -->
            <div class="main-body clr">
                <h1>Блог</h1>

                <!-- #rightside -->
                <aside id="rightside">

                    <!-- .b-categories-list block shadow -->
                    <div class="b-categories-list block shadow">
                        <h2>Категории</h2>
                        <ul>
                            <?php wp_list_categories( array('taxonomy' => 'bcat', 'orderby' => 'name', 'hide_empty' => 0, 'title_li' => '')); ?>
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
                    ?>
                    <div class="article-panel">
                        <span class="comments"><?php comments_number('Комментариев нет', '1 комментарий', '% коммент.'); ?></span>
                     | <span class="date"><?php the_date('j M, H:i'); ?></span>
                     | <span class="type"><?=$category?></span>
                    </div> 
                            <?php the_excerpt(); ?>
                        </article>
                        <?php endwhile; ?>

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