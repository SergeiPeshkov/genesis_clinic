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

                    <!-- .add-article -->
                    <div class="add-article">
                        <a href="#" class="btn">Добавить статью</a>
                    </div>
                    <!-- /.add-article -->

                    <!-- .b-categories-list block shadow -->
                    <div class="b-categories-list block shadow">
                        <h2>Категории</h2>
                        <ul>
                            <li><a href="#">Акушерство</a></li>
                            <li><a href="#">Аллергология-иммунология</a></li>
                            <li><a href="#">Андрология</a></li>
                            <li><a href="#">Беременность</a></li>
                            <li><a href="#">Гастроэнтерология</a></li>
                            <li><a href="#">Гепатология</a></li>
                            <li><a href="#">Гинекология</a></li>
                            <li><a href="#">Дерматология</a></li>
                            <li><a href="#">Диетология</a></li>
                            <li><a href="#">Кардиология</a></li>
                            <li><a href="#">Пластическая хирургия</a></li>
                        </ul>
                    </div>
                    <!-- /.b-categories-list block shadow -->

                    <!-- .b-authors block shadow -->
                    <div class="b-authors block shadow">
                        <h2>Авторы</h2>

                        <!-- .user-block -->
                        <div class="user-block">
                            <div class="img"><img src="tmp/author1.jpg" alt="Гончар Константин Владимирович" width="120" height="111" ></div>
                            <div class="info">
                                <div class="name"><a href="#">Гончар Константин Владимирович</a></div>
                                <div class="prof">Врач акушерского отделения</div>
                            </div>
                        </div>
                        <!-- /.user-block -->

                        <!-- .user-block -->
                        <div class="user-block">
                            <div class="img"><img src="tmp/author2.jpg" alt="Банников Владимир Иванович" width="120" height="111" ></div>
                            <div class="info">
                                <div class="name"><a href="#">Банников Владимир Иванович</a></div>
                                <div class="prof">Врач акушерского отделения</div>
                            </div>
                        </div>
                        <!-- /.user-block -->

                    </div>
                    <!-- /.b-authors block shadow -->

                </aside>
                <!-- /#rightside -->
                
                <!-- #content -->
                <div id="content">
                    
                    <!-- .b-articles-list -->
                    <div class="b-articles-list">
                        
                        <?php while ( have_posts() ) : the_post(); ?>
                        <article>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="article-panel"><span class="comments">3 комментария</span> | <span class="date">15 июля 2012</span> | <span class="type">Новости</span> | <span class="author">Иванов Константин</span>
                            </div>
                            <?php the_excerpt(); ?>
                        </article>
                        <?php endwhile; ?>

                    </div>
                    <!-- /.b-articles-list -->

                    <!-- .pager -->
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
                    <!-- /.pager -->

                </div>
                <!-- /#content -->

            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->

<?php get_footer(); ?>