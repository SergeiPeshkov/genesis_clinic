<?php get_header(); ?>
    <?php while ( have_posts() ) : the_post(); ?>

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
                        <li><a href="<?=site_url()?>">Главная</a></li>
                        <li><a href="<?=site_url().'/doctor/'?>">Доктора</a></li>
                        <li class="current"><?php the_title(); ?></li>
                    </ul>
                </div>
                <!-- /.b-breadcrumbs -->

            </div>
            <!-- /.main-top -->

            <!-- .main-body -->
            <div class="main-body clr doctor-page">
                <h1><?php the_title(); ?></h1>

                <!-- #rightside -->
                <aside id="rightside">

                    <?php
                        $show_block = get_post_meta($post->ID, 'show_block', 1);
                        $artcls = get_posts(array('post_type' => 'blog', 'showposts' => '4', 'author' => get_post_meta($post->ID, 'acco', 1)));
                        if ('articles' == $show_block && $artcls[0]->ID) {
                    ?>
                    <!-- .b-statii block -->
                    <div class="b-statii block shadow">
                        <h2>Статьи в блоге</h2>
                        <ul> 
                            <?php foreach ($artcls as $artcl) { ?>
                            <li>
                                <a href="<?=get_permalink($artcl->ID)?>"><?=get_the_title($artcl->ID)?></a>
                                <?=get_excerpt_by_id($artcl->ID)?>
                            </li>
                            <?php } ?>
                        </ul>
                        <div class="more"><a href="<?=get_post_type_archive_link('blog')?>">Все статьи &raquo;</a></div>
                    </div>
                    <!-- /.b-statii block -->
                    <?php } ?>

                    <?php
                        $answrs = get_posts(array('post_type' => 'answers', 'showposts' => '10', 'meta_key' => 'doctor', 'meta_value' => get_post_meta($post->ID, 'acco', 1)));
                        if ('answers' == $show_block && $answrs[0]->ID) {
                    ?>
                    <!-- .b-statii block -->
                    <div class="b-statii block shadow">
                        <h2>Ответы на вопросы</h2>
                        <ul> 
                            <?php foreach ($answrs as $answr) { ?>
                            <li>
                                <a href="<?=get_permalink($answr->ID)?>"><?=get_the_title($answr->ID)?></a>
                                <?=get_excerpt_by_id($answr->ID)?>
                            </li>
                            <?php } ?>
                        </ul>
                        <div class="more"><a href="<?=get_post_type_archive_link('answers')?>">Все ответы &raquo;</a></div>
                    </div>
                    <!-- /.b-statii block -->
                    <?php } ?>

                </aside>
                <!-- /#rightside -->
                
                <!-- #content -->
                <div id="content">

                    <div class="b-doctor-img">
                        <?php the_post_thumbnail('doctor-photo'); ?>
                    </div>
                    <div class="b-doctor-info">
                        <?php 
                            $exp = get_post_meta($post->ID, 'expi', 1);
                            $rang = get_post_meta($post->ID, 'rang', 1);
                            $level = get_post_meta($post->ID, 'leve', 1);
                            $link = get_post_meta($post->ID, 'link', 1);
                            $acco = get_post_meta($post->ID, 'acco', 1);
                        ?>
                        <div class="prof"><?=$rang?></div>
                        <dl>
                            <dt>Опыт работы:</dt>
                            <dd><?=$exp?></dd>
			<?php if ($level) { ?>
                            <dt>Степень:</dt>
                            <dd><?=$level?></dd>
			<?php } ?>
                        </dl>
                        
                    </div>
    
                    <?php the_content(); ?>

                    <!-- .b-form -->
                    <div class="b-form">
                        <?php
                            $q = $_POST['question'];
                            if ($q['agree'] && $q['name'] && $q['email'] && $q['question']) {
								$vrach = get_userdata($acco);
								$first_name = $vrach->first_name;
								$last_name = $vrach->last_name;
                                $new_answer = array(
                                    'post_title' => "* Новый вопрос ({$q[name]}, {$q[email]}) врачу ({$first_name} {$last_name})",
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
                                    $userdata = get_userdata($acco);
                                  // wp_mail($userdata->user_email, $mTitle, $mBody);
                                    global $wpdb;
                                    $rslt = $wpdb->insert(
                                        'gnss_mb',
                                        array( 
                                            'email' => $q['email'],
                                            'name' => $q['name']
                                        ),
                                        array( '%s', '%s' )   
                                    );                                    
                                }                                            
                            }    
                        ?>
                        <?php if (!$answer_id) {  ?>
                         <form action="<?php the_permalink(); ?>" method="POST" class="zForm">
                            <h2>Задайте вопрос врачу</h2>
                            <span class="description">все поля обязательны для заполнения</span>
                            <div class="col">
                                <div class="form-item">
                                    <label>Имя</label>
                                    <div class="controls">
                                        <input name="question[name]" type="text" class="form-text">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-item">
                                    <label>e-mail</label>
                                    <div class="controls">
                                        <input name="question[email]" type="email" class="form-text">
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <label>Вопрос</label>
                                <div class="controls">
                                    <textarea name="question[question]" cols="30" rows="10"></textarea>
									 <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                                    <label><input name="question[agree]" class="zAgree" type="checkbox">Я даю согласие на обработку и публикацию моих персональных данных</label>
                                </div>
                            </div>
                            <div class="form-item">
                                <label>&nbsp;</label>
                                <div class="controls">
                                    <button type="submit">Задать вопрос</button>
                                </div>
                            </div>
							                            <script> 
                            function checkForm(){                                
                                $('.zForm input,.zForm textarea').css({'border-color':'#D9D9D9'});
                                var error = false;
                                
                                if(!$('input[name="question[name]"]').val()){
                                    $('input[name="question[name]"]').css({'border-color': '#FF0000'});
                                    error = true;
                                }

                                if(!$('input[name="question[email]"]').val()){
                                    $('input[name="question[email]"]').css({'border-color': '#FF0000'});
                                    error = true;
                                }

                                if(!$('textarea[name="question[question]"]').val()){
                                    $('textarea[name="question[question]"]').css({'border-color': '#FF0000'});
                                    error = true;
                                }

                                if(!$('input[name="question[agree]"]').prop('checked')){
                                    error = true;
                                }
                                if(error){
                                    return false;
                                }
                                return true;
                            }
                            </script>
                        </form>
                        <?php } else { ?>
                        <p>Ваш вопрос поступил в обработку.</p>     
                        <?php } ?>
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
    <?php endwhile; ?>
<?php get_footer(); ?>
