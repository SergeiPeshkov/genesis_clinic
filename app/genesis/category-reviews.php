<?php get_header(); ?>
    <?php query_posts('post_type=reviews&showposts=-1'); ?>
                    <ul class="subnav">
                        <li><a href="<?=site_url().'/about/'?>">О клинике</a></li>
                        <li><a href="#">Как нас найти</a></li>
                        <li class="active"><a href="<?=site_url().'/reviews/'?>">Отзывы</a></li>
                        <li><a href="<?=site_url().'/gallery/'?>">Фото и видео</a></li>
                        <li><a href="<?=site_url().'/press/'?>">Пресса о нас</a></li>
                        <li><a href="<?=site_url().'/news/'?>">Новости</a></li>
                        <li><a href="<?=site_url().'/contact/'?>">Контакты</a></li>
                        <li><a href="<?=site_url().'/history/'?>">История клиники</a></li>
                    </ul>
                </nav>

                <!-- .b-breadcrumbs -->
                <div class="b-breadcrumbs">
                    <ul>
                        <li><a href="#">О клинике</a></li>
                        <li class="current">Отзывы</li>
                    </ul>
                </div>
                <!-- /.b-breadcrumbs -->

            </div>
            <!-- /.main-top -->

            <!-- .main-body -->
            <div class="main-body clr">
                <h1>Отзывы</h1>

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

                    <!-- .b-reviews -->
                    <div class="b-reviews">
                        
                        <?php while ( have_posts() ) : the_post(); ?>
                        <!-- .review -->
                        <div class="review">
                            <div class="review-panel">
                                <span class="name"><?php the_title(); ?></span>
                                <span class="date"><?php the_date('j M, H:i'); ?></span>
                            </div>
                            <?php the_content(); ?>
                        </div>
                        <!-- /.review -->
                        <?php endwhile; ?>

                    </div>
                    <!-- /.b-reviews -->             

                    <!-- .b-form -->
                    <div class="b-form">
                        <form action="#" method="">
                            <h2>Оставить отзыв</h2>
                            <span class="description">все поля обязательны для заполнения</span>
                            <div class="col">
                                <div class="form-item">
                                    <label>Имя</label>
                                    <div class="controls">
                                        <input type="text" class="form-text">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-item">
                                    <label>e-mail</label>
                                    <div class="controls">
                                        <input type="email" class="form-text">
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <label>Вопрос</label>
                                <div class="controls">
                                    <textarea cols="30" rows="10"></textarea>
                                    <label><input type="checkbox" checked="checked">Я даю согласие на обработку и публикацию моих персональных данных</label>
                                </div>
                            </div>
                            <div class="form-item">
                                <label>&nbsp;</label>
                                <div class="controls">
                                    <button type="submit">Оставить отзыв</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.b-form -->

                </div>
                <!-- /#content -->

            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->

<?php get_footer(); ?>