<?php get_header(); ?>
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
                        <li><a href="#">Блог</a></li>
                        <li><a href="#">Гончар Константин Владимирович</a></li>
                        <li class="current">Если йода не хватает</li>
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

                    <!-- .b-authors block shadow -->    
                    <div class="b-authors block shadow">
                        <h2>Автор</h2>

                        <?php 
                            $doctor = get_posts(array(
                                "post_type" => 'doctor',
                                "showposts" => '1',
                                "meta_key" => "acco",
                                "meta_value" => $post->post_author
                            ));
                            if ($doctor[0]->ID) {
                                $doctor = get_the_title($doctor[0]->ID);
                                $rang = get_post_meta($doctor[0]->ID, 'rang', 1);
                            } else {
                                $first_name = get_the_author_meta('first_name');
                                $last_name = get_the_author_meta('last_name');      
                                $doctor = $first_name.' '.$last_name;
                            }
                        ?>
                        <!-- .user-block -->
                        <div class="user-block">
                            <div class="img"><img src="tmp/author1.jpg" alt="Гончар Константин Владимирович" width="120" height="111" ></div>
                            <div class="info">
                                <div class="name"><a href="#"><?=$doctor?></a></div>
                                <?php if ($rang) { ?><div class="prof"><?=$rang?></div><?php } ?>
                            </div>
                        </div>
                        <!-- /.user-block -->

                    </div>
                    <!-- /.b-authors block shadow -->

                    <!-- .b-links block -->
                    <div class="b-links block shadow">
                        <h2>Последнее в блогах</h2>
                        <ul>
                            <li><a href="#">Боль в ноге</a></li>
                            <li><a href="#">Болит голова!!! Что делать?</a></li>
                            <li><a href="#">Очень нужна помощь психиатра</a></li>
                            <li><a href="#">Постоянная заложенность носа!</a></li>
                            <li><a href="#">Где сделать ребёнку операцию по исправленю носовой прегородки</a></li>
                            <li><a href="#">Заложенность носа, ком в горле</a></li>
                        </ul>
                        <div class="more"><a href="#">Все статьи &raquo;</a></div>
                    </div>
                    <!-- /.b-links block -->

                </aside>
                <!-- /#rightside -->
                
                <!-- #content -->
                <div id="content">
                    <?php 
                        $category = wp_get_object_terms($post->ID, 'bcat');
                        $category = $category[0] ? $category[0]->name : 'Без категории' ;
                    ?>
                    <div class="article-panel">
                        <span class="comments"><?php comments_number('Комментариев нет', '1 комментарий', '% коммент.'); ?></span>
                     | <span class="date"><?php the_date('j M, H:i'); ?></span>
                     | <span class="type"><?=$category?></span>
                     | <span class="author"><?=$doctor?></span>
                    </div> 
                    <?php the_content(); ?>

                    <!-- .b-comments block -->
                    <div class="b-comments block">
                        <h2>Комментарии</h2>
                        
                        <?php comments_template(); ?>
                    </div>
                    <!-- /.b-comments block -->

                <?php endwhile; endif; ?>

                </div>
                <!-- /#content -->

            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->

<?php get_footer(); ?>