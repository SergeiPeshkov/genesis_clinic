<?php get_header(); ?>
    <?php query_posts('post_type=press&showposts=-1'); ?> 
                    <ul class="subnav">
                        <li><a href="#">О клинике</a></li>
                        <li><a href="#">Как нас найти</a></li>
                        <li><a href="#">Отзывы</a></li>
                        <li><a href="#">Фото и видео</a></li>
                        <li class="active"><a href="#">Пресса о нас</a></li>
                        <li><a href="#">Новости</a></li>
                        <li><a href="#">Контакты</a></li>
                        <li><a href="#">История клиники</a></li>
                    </ul>
                </nav>

                <!-- .b-breadcrumbs -->
                <div class="b-breadcrumbs">
                    <ul>
                        <li><a href="#">О клинике</a></li>
                        <li class="current">Пресса о нас</li>
                    </ul>
                </div>
                <!-- /.b-breadcrumbs -->

            </div>
            <!-- /.main-top -->

            <!-- .main-body -->
            <div class="main-body clr">
                <h1>Пресса о нас</h1>

                <!-- #rightside -->
                <aside id="rightside">

                    <!-- .b-links block -->
                    <div class="b-links block shadow">
                        <h2>Вопросы и ответы</h2>
                        <ul>
                            <li><a href="#">Боль в ноге</a></li>
                            <li><a href="#">Болит голова!!! Что делать?</a></li>
                            <li><a href="#">Очень нужна помощь психиатра</a></li>
                            <li><a href="#">Постоянная заложенность носа!</a></li>
                            <li><a href="#">Где сделать ребёнку операцию по исправленю носовой прегородки</a></li>
                            <li><a href="#">Заложенность носа, ком в горле</a></li>
                        </ul>
                        <div class="more"><a href="#">Все вопросы &raquo;</a></div>
                    </div>
                    <!-- /.b-links block -->

                    <!-- .b-links block -->
                    <div class="b-links block shadow">
                        <h2>Новости</h2>
                        <ul>
                            <li><a href="#">Новейшие технологии лечения позвоночника</a></li>
                            <li><a href="#">Щадящая хирургия</a></li>
                            <li><a href="#">Очень нужна помощь психиатра</a></li>
                            <li><a href="#">Постоянная заложенность носа!</a></li>
                            <li><a href="#">Где сделать ребёнку операцию по исправленю носовой прегородки</a></li>
                            <li><a href="#">Заложенность носа, ком в горле</a></li>
                        </ul>
                        <div class="more"><a href="#">Все новости &raquo;</a></div>
                    </div>
                    <!-- /.b-links block -->

                </aside>
                <!-- /#rightside -->
                
                <!-- #content -->
                <div id="content">
                    
                    <!-- .b-pressa -->
                    <div class="b-pressa">
                        
                        <?php while ( have_posts() ) : the_post(); ?>
                        <?php $press = get_post_meta($post->ID, 'smi', 1); ?>
                        <?php $date = get_post_meta($post->ID, 'date', 1); ?>
                        <article>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php the_content(); ?>
                            <div class="istochnik"><?=$press?>, <?=$date?></div>
                        </article>
                        <?php endwhile; ?>

                    </div>
                    <!-- /.b-pressa -->

                </div>
                <!-- /#content -->

            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->

<?php get_footer(); ?>