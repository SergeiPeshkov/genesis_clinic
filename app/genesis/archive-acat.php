<?php get_header(); ?>
    <?php
        $paged = $_GET['paged'] ? $_GET['paged'] : 1 ; 
    ?>
    <?php query_posts('post_type=answers&posts_per_page=1&paged='.$paged); ?>
                    <ul class="subnav">
                        <li><a href="#">Наши специалисты</a></li>
                        <li><a href="#">Запись на прием</a></li>
                        <li><a href="#">Задать вопрос</a></li>
                        <li class="active"><a href="#">Вопросы и ответы</a></li>
                        <li><a href="#">Блог врачей</a></li>
                    </ul>
                </nav>

                <!-- .b-breadcrumbs -->
                <div class="b-breadcrumbs"> 
                    <ul>
                        <li><a href="#">Доктора</a></li>
                        <li class="current">Вопросы и ответы</li>
                    </ul>
                </div>
                <!-- /.b-breadcrumbs -->

            </div>
            <!-- /.main-top -->

            <!-- .main-body -->
            <div class="main-body clr">
                <h1>Вопросы и ответы</h1>
 
                <!-- #rightside -->
                <aside id="rightside">

                    <!-- .b-categories-list block shadow -->
                    <div class="b-categories-list block shadow">
                        <h2>Категории</h2>
                        <ul>
                            <?php wp_list_categories( array('taxonomy' => 'acat', 'orderby' => 'name', 'hide_empty' => 0, 'title_li' => '')); ?>
                        </ul>
                    </div>
                    <!-- /.b-categories-list block shadow -->

                </aside>
                <!-- /#rightside -->
                
                <!-- #content -->
                <div id="content">

                    <?php while ( have_posts() ) : the_post(); ?>
                    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                    <?php endwhile; ?>

                    <!-- .pager 
                    <div class="pager">
                        <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
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

                    <!-- .b-form -->
                    <div class="b-form">
                        <form action="#" method="">
                            <h2>Задайте вопрос</h2>
                            <span class="description">все поля обязательны для заполнения</span>
                            <div class="col">
                                <div class="form-item">
                                    <label>Имя</label>
                                    <div class="controls">
                                        <input type="text" class="form-text">
                                    </div>
                                </div>
                                <div class="form-item">
                                    <label>Категория</label>
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
                                    <button type="submit">Задать вопрос</button>
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