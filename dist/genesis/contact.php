<?php
/*
    Template Name: .contact
*/
?>
<?php get_header(); ?>
                    <ul>
                        <li><a href="<?=site_url().'/doctor/'?>">Доктора</a></li>
                        <li class="active"><a href="<?=site_url().'/about/'?>">О клинике</a></li>
                        <li><a href="<?=site_url().'/price/'?>">Услуги и цены</a></li>
                    </ul>
                    <?php wp_nav_menu(array("theme_location" => "tabsabout", "container" => false, "menu_class" => 'subnav')); ?>      
                </nav>
            </div>
            <!-- /.main-top -->

            <!-- .main-body -->
            <div class="main-body clr">


            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <!-- .b-map -->
                <div class="b-map">
                    <?php the_content(); ?>
                </div>
                <!-- /.b-map -->

                <!-- #rightside -->
                <aside id="rightside">

                    <!-- .b-information -->
                    <div class="b-information">

                        <?php $_blocks = maybe_unserialize(get_post_meta($post->ID, '_blocks', 1)); ?>

                        <?php if ($_blocks['address']) { ?>
                            <?php get_template_part('block', 'address'); ?>
                        <?php } ?>

                        <?php if ($_blocks['place']) { ?>
                            <?php get_template_part('block', 'place'); ?>
                        <?php } ?>

                        <?php if ($_blocks['schedule']) { ?>
                            <?php get_template_part('block', 'schedule'); ?>
                        <?php } ?>                        

                    </div>
                    <!-- /.b-information -->

                </aside>
                <!-- /#rightside -->
                
                <!-- #content -->
                <div id="content">
                    
                    <?php
                        $c = $_POST['contact'];
                        if ($c['accepted'] && $c['name'] && $c['email'] && $c['question']) {
							$multiple_to_recipients = array( // те, кто принимают почту.
							'admin@grangy.ru',
							'nana.gappoeva@mail.ru',
							'lelasereb@mail.ru'
							);
                            add_filter('wp_mail_from',create_function('', 'return "'.get_option('admin_email').'";'));
                            add_filter('wp_mail_from_name',create_function('', 'return "Клиника Genesis";'));                              
                            $mTitle = "Новый вопрос со страницы контактов";
							$headers[] = "Reply-To: {$c[name]} <{$c[email]}>";
                            $c['question'] = "{$c[name]} ({$c[email]})\r{$c['question']}";
							$c['result'] = wp_mail($multiple_to_recipients, $mTitle, $c['question'], $headers); 
//                          $c['result'] = wp_mail('lelasereb@mail.ru', $mTitle, $c['question'], $headers);   
// 							$c['result'] = wp_mail((get_option('admin_email')?get_option('admin_email'):'wgnss@mailinator.com'), $mTitle, $c['question']);   
                        }
                    ?>
                    <!-- .b-form -->
                    <div class="b-form">
                        <?php if (!$c['result']) { ?>
                        <form action="" method="POST" class="zForm">
                            <h2>Напишите нам</h2>
                            <span class="description">все поля обязательны для заполнения</span>
                            <div class="col">
                                <div class="form-item">
                                    <label>Имя</label>
                                    <div class="controls">
                                        <input type="text" name="contact[name]" class="form-text">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-item">
                                    <label>e-mail</label>
                                    <div class="controls">
				                        <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                                        <input type="email" name="contact[email]" class="form-text">
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <label>Вопрос</label>
                                <div class="controls">
                                    <textarea cols="30" name="contact[question]" rows="10"></textarea>
                                    <label><input type="checkbox" class="zAgree" name="contact[accepted]">Я даю согласие на обработку и публикацию моих персональных данных</label>
								<label><input type="checkbox" name="contact[accepted2]" class="hirobot"></label> <!-- 	/*проверка на спам*/ -->

                                </div>
                            </div>
                            <div class="form-item">
                                <label>&nbsp;</label>
                                <div class="controls">
                                    <button type="submit" onclick="return checkForm(); ym(39014465, 'reachGoal', 'contact'); return true;">Отправить</button>
                                </div>
                            </div>
                            <script> 
                            function checkForm(){                                
                                $('.zForm input,.zForm textarea').css({'border-color':'#D9D9D9'});
                                var error = false;
                                
                                if(!$('input[name="contact[name]"]').val()){
                                    $('input[name="contact[name]"]').css({'border-color': '#FF0000'});
                                    error = true;
                                }

                                if(!$('input[name="contact[email]"]').val()){
                                    $('input[name="contact[email]"]').css({'border-color': '#FF0000'});
                                    error = true;
                                }

                                if(!$('textarea[name="contact[question]"]').val()){
                                    $('textarea[name="contact[question]"]').css({'border-color': '#FF0000'});
                                    error = true;
                                }

                                if(!$('input[name="contact[accepted]"]').prop('checked')){
                                    error = true;
                                }
								if(!$('input[name="contact[accepted2]"]').prop('checked')){
                                    error = false;
                                } else {
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
                        <p>Ваше сообщение успешно отправлено.</p>
                        <?php } ?>
                    </div>
                    <!-- /.b-form -->

                </div>
                <!-- /#content -->

            <?php endwhile; endif; ?>


            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->

<?php get_footer(); ?>