<?php
/*
    Template Name: .subscribe
*/
?>
<?php get_header(); ?>
 
                    <ul>
                        <li><a href="<?=site_url().'/doctor/'?>">Доктора</a></li>
                        <li><a href="<?=site_url().'/about/'?>">О клинике</a></li>
                        <li><a href="<?=site_url().'/price/'?>">Услуги и цены</a></li>
                    </ul>
                </nav>

                <!-- .b-breadcrumbs -->
                <div class="b-breadcrumbs">
                    <ul>
                        <li><a href="<?=site_url()?>">Главная</a></li>
                        <li><?php the_title(); ?></li>
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
                    <?php the_content(); ?>                    
<?php
    if (md5($_POST['email'].'wag1') == $_POST['_key']) {
            $res = $wpdb->update( 'gnss_mb',
                array( 
                    'name' => $_POST['_name'],
                    'surname' => $_POST['surname']
                ),
                array( 'email' => $_POST['email'] ),
                array( '%s', '%s'),
                array( '%s' )
            );  
?>
<p>Вы успешно подписались на новостную рассылку.</p>
<?php            
    } elseif ($_POST['email']) {
            global $wpdb;
            $rslt = $wpdb->insert(
                'gnss_mb',
                array( 
                    'email' => $_POST['email']
                ),
                array( '%s' )   
            );              
            $key = md5($_POST['email'].'wag1');
?>
    <form action="<?=site_url().'/subscribe/'?>" method="post">
        <table>
            <tr>
                <td><strong>Имя</strong> </td>
                <td> <input type="text" name="_name"></td>
            </tr>
            <tr>
                <td><strong>Фамилия</strong> </td>
                <td> <input type="text" name="surname"></td>
            </tr>
        </table>
        <input type="hidden" name="email" value="<?=$_POST['email']?>">
        <input type="hidden" name="_key" value="<?=$key?>">
        <input type="submit" value="Сохранить">
    </form>
<?php
    } else {
        echo "<p>Что-то не так. Попробуйте снова.</p>"; 
    }
?>
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