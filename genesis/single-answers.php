<?php get_header(); ?>

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
                        <li><a href="<?=site_url().'/doctor/'?>">Доктора</a></li>
                        <li><a href="<?=site_url().'/answers/'?>">Вопросы и ответы</a></li>
                        <li class="current"><?=the_title()?></li>
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
                        <h2>Все вопросы</h2>
                        <ul>
                            <?php wp_list_categories( array('taxonomy' => 'acat', 'orderby' => 'name', 'hide_empty' => 0, 'title_li' => '')); ?>
                        </ul>
                    </div>
                    <!-- /.b-categories-list block shadow -->

                </aside>
                <!-- /#rightside -->
                
                <!-- #content -->
                <div id="content">   

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <!-- .b-answers -->
                    <div class="b-answers">

                        <!-- .question -->
                        <div class="question">
                            <?php the_content(); ?>
                        </div>
                        <!-- /.question -->

                        <?php
                            $answer = get_post_meta($post->ID, 'answer', 1);
                            $doctor = get_post_meta($post->ID, 'doctor', 1);
			    $user_info = get_userdata($doctor);
                            $doctor = $user_info->user_level == 10 ? $post->post_author : $doctor ;
                            $doctor = get_posts(array(
                                "post_type" => 'doctor',
                                "showposts" => '1',
                                "meta_key" => "acco",
                                "meta_value" => $doctor
                            ));
                            if ($doctor[0]->ID) {
                                $rang = get_post_meta($doctor[0]->ID, 'rang', 1);
                                $avatar = MultiPostThumbnails::get_the_post_thumbnail('doctor', 'doc-square-thumb', $doctor[0]->ID, 'doctor-avatar');
                                $doctor_url = get_permalink($doctor[0]->ID);
                                $doctor = get_the_title($doctor[0]->ID);
                            }
                        ?>
                        <!-- .answer -->
                        <div class="answer">
                            <?php if ($doctor_url) { ?>
                            <a href="<?=$doctor_url?>" class="img">
                                <?=$avatar?>
                            </a>
                            <?php } ?>
                            <div class="answer-text">
                                <p><?=$answer?></p>
                                <?php if ($doctor_url) { ?>
                                <div class="answer-panel">
                                    <div class="name"><a href="<?=$doctor_url?>"><?=$doctor?></a></div>
                                    <div class="prof"><?=$rang?></div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.answer -->

                    </div>
                    <!-- /.b-answers -->
                    <?php endwhile; endif; ?>

                    <h2>Похожие вопросы</h2>

                    <!-- .b-links -->
                    <div class="b-links">
                        <ul>
                            <?php 
                            $questions = get_posts(array('post_type' => 'answers', 'showposts' => 5, 'orderby' => 'rand', 'exclude' => $post->ID));
                            foreach ($questions as $key => $qstn) { ?>
                            <li><a href="<?=get_permalink($qstn->ID)?>"><?=get_the_title($qstn->ID)?></a></li>
                            <?php } ?>
                        </ul>
                        <div class="more"><a href="<?=get_post_type_archive_link('answers')?>">Все вопросы &raquo;</a></div>
                    </div>
                    <!-- /.b-links -->

                </div>
                <!-- /#content -->

            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->

<?php get_footer(); ?>