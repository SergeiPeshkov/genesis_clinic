<?php get_header(); ?>

<?  
// cover-up
if ($_GET['paged'])     { $pgd = $_GET['paged']; }
elseif ($_GET['page'])  { $pgd = $_GET['page']; }
else                    { $pgd = 1; }
// cover-up.
?>


    <?php query_posts('post_type=reviews&posts_per_page='.get_option('posts_per_page').'&paged='.$pgd); ?>
                    <ul>
                        <li><a href="<?=site_url().'/doctor/'?>">Доктора</a></li>
                        <li class="active"><a href="<?=site_url().'/about/'?>">О клинике</a></li>
                        <li><a href="<?=site_url().'/price/'?>">Услуги и цены</a></li>
                    </ul>
                    <?php wp_nav_menu(array("theme_location" => "tabsabout", "container" => false, "menu_class" => 'subnav')); ?>      
                </nav>

                <!-- .b-breadcrumbs -->
                <div class="b-breadcrumbs">
                    <ul>
                        <?php global $post; ?>
                        <li><a href="<?=site_url()?>">Главная</a></li>
                        <li><a href="<?=site_url().'/about/'?>">О клинике</a></li>
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
                    <?php $in_blocks = get_option('gnss_in_blocks'); ?>
                    <div class="b-links block shadow">
                        <h2>Вопросы и ответы</h2>
                        <ul>
                        <?php
                            $wAnswers = get_posts(array('post_type' => 'answers', 'showposts' => $in_blocks['answ_num']));
                            foreach ($wAnswers as $k => $wAnsw) { 
                        ?>
                            <li><a href="<?=get_permalink($wAnsw->ID)?>"><?=get_the_title($wAnsw->ID)?></a></li>
                        <?php } ?>
                        </ul>
                        <div class="more"><a href="<?=get_post_type_archive_link('answers')?>">Все вопросы &raquo;</a></div>
                    </div>
                    <!-- /.b-links block -->

                    <!-- .b-links block -->
                    <div class="b-links block shadow">
                        <h2>Новости</h2>
                        <ul>
                        <?php
                            $wNews = get_posts(array('post_type' => 'news', 'showposts' => $in_blocks['news_num']));
                            foreach ($wNews as $k => $wN) { 
                        ?>
                            <li>
                                <a href="<?=get_permalink($wN->ID)?>"><?=get_the_title($wN->ID)?>
                            </li>
                        <?php } ?>
                        </ul>
                        <div class="more"><a href="<?=get_post_type_archive_link('news')?>">Все новости &raquo;</a></div>
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
                                <span class="date"><?php echo get_the_date('j M, H:i'); ?></span>
                            </div>
                            <?php the_content(); ?>
                        </div>
                        <!-- /.review -->
                        <?php if (get_post_meta($post->ID, 'answer', 1)) { ?>
                        <!-- .review-answer -->
                        <div class="review review-answer">
                            <div class="review-panel">
                                <span class="name">Администрация</span>
                            </div>
                            <?=get_post_meta($post->ID, 'answer', 1)?>
                        </div>
                        <!-- /.review-answer -->
                        <?php } ?>
                        <?php endwhile; ?>

                        <?php if (have_posts()) { ?>
                        <!-- .pager -->
                        <div class="pager">
                            <?php pagination(); ?>
                        </div>
                        <!-- /.pager -->
                        <?php } ?>

                    </div>
                    <!-- /.b-reviews -->             

                        <?php
                            $q = $_POST['review'];
                            if ($q['agree'] && $q['name'] && $q['email'] && $q['review']) {
                                $new_answer = array(
                                    'post_title' => "* Новый отзыв ({$q[name]}, {$q[email]})",
                                    'post_content' => $q['review'],
                                    'post_type' => 'reviews'
                                );
                                $answer_id = wp_insert_post($new_answer);
                                if ($answer_id) {
                                    update_post_meta($answer_id, 'name', $q['name']);
                                    update_post_meta($answer_id, 'email', $q['email']);
                                    add_filter('wp_mail_from',create_function('', 'return "'.get_option('admin_email').'";'));
                                    add_filter('wp_mail_from_name',create_function('', 'return "Клиника Genesis";'));                              
                                    $mTitle = "* Новый отзыв ({$q[name]}, {$q[email]})";
                                    $mLink = get_damn_edit_post_link($answer_id);    
                                    $mBody = "Чтобы одобрить или изменить этот отзыв - перейдите по следующей ссылке: {$siteurl}{$mLink}";
//                                     wp_mail((get_option('admin_email')?get_option('admin_email'):'wgnss@mailinator.com'), $mTitle, $mBody);                                                            
                                }                
                            }    
                        ?>
                    <!-- .b-form -->
                    <div class="b-form">
                        <?php if (!$answer_id) { ?>
                        <form action="" method="POST" class="zForm">
                            <h2>Оставить отзыв</h2>
                            <span class="description">все поля обязательны для заполнения</span>
                            <div class="col">
                                <div class="form-item">
                                    <label>Имя</label>
                                    <div class="controls">
                                        <input type="text" name="review[name]" class="form-text">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-item">
                                    <label>e-mail</label>
                                    <div class="controls">
                                        <input type="email" name="review[email]" class="form-text">
										    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <label>Отзыв</label>
                                <div class="controls">
                                    <textarea cols="30" name="review[review]" rows="10"></textarea>
                                    <label><input type="checkbox" name="review[agree]" class="zAgree">Я даю согласие на обработку и публикацию моих персональных данных</label>
                                </div>
                            </div>
                            <div class="form-item">
                                <label>&nbsp;</label>
                                <div class="controls">
                                    <button type="submit" onclick="return checkForm();">Оставить отзыв</button>
                                </div>
                            </div>
                            <script> 
                            function checkForm(){                                
                                $('.zForm input,.zForm textarea').css({'border-color':'#D9D9D9'});
                                var error = false;
                                
                                if(!$('input[name="review[name]"]').val()){
                                    $('input[name="review[name]"]').css({'border-color': '#FF0000'});
                                    error = true;
                                }

                                if(!$('input[name="review[email]"]').val()){
                                    $('input[name="review[email]"]').css({'border-color': '#FF0000'});
                                    error = true;
                                }

                                if(!$('textarea[name="review[review]"]').val()){
                                    $('textarea[name="review[review]"]').css({'border-color': '#FF0000'});
                                    error = true;
                                }

                                if(!$('input[name="review[agree]"]').prop('checked')){
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
                        <p>Ваш отзыв был принят и передан на рассмотрение.</p>                        
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

<?php get_footer(); ?>