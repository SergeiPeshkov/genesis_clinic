<?php get_header(); ?>
    <?php
        $paged = $_GET['paged'] ? $_GET['paged'] : 1 ; 
    ?>
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
                        <?php
                            $q = $_POST['question'];
                            if ($q['agree']) {
                                $new_answer = array(
                                    'post_title' => "* Новый вопрос ({$q[name]}, {$q[email]})",
                                    'post_content' => $q['question'],
                                    'post_type' => 'answers'
                                );
                                $answer_id = wp_insert_post($new_answer);
                                if ($answer_id) {
                                    update_post_meta($answer_id, 'name', $q['name']);
                                    update_post_meta($answer_id, 'email', $q['email']);
                                    add_filter('wp_mail_from',create_function('', 'return "'.get_option('admin_email').'";'));
                                    add_filter('wp_mail_from_name',create_function('', 'return "Клиника Genesis";'));                              
                                    $mTitle = "* Новый вопрос ({$q[name]}, {$q[email]})";
                                    $mLink = get_damn_edit_post_link($answer_id);    
                                    $mBody = "Чтобы ответить на этот вопрос - перейдите по следующей ссылке: {$mLink}";
                                    wp_mail((get_option('admin_email')?get_option('admin_email'):'wgnss@mailinator.com'), $mTitle, $mBody);                                                            
                                }                
                            }    
                        ?>
                        <form action="<?=site_url().'/answers/'?>" method="POST" class="zForm">
                            <h2>Задайте вопрос</h2>
                            <span class="description">все поля обязательны для заполнения</span>
                            <div class="col">
                                <div class="form-item">
                                    <label>Имя</label>
                                    <div class="controls">
                                        <input type="text" name="question[name]" class="form-text">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-item">
                                    <label>e-mail</label>
                                    <div class="controls">
                                        <input type="email" name="question[email]" class="form-text">
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <label>Вопрос</label>
                                <div class="controls">
                                    <textarea cols="30" rows="10" name="question[question]" ></textarea>
                                    <label><input type="checkbox" class="zAgree" name="question[agree]" checked="checked">Я даю согласие на обработку и публикацию моих персональных данных</label>
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