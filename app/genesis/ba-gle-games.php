<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
$dateformat = get_option('date_format');
$timeformat = get_option('time_format');
?>

<?php get_header(); ?>

  <div id="frame">
  <div id="content"<?php 
  if ($template == 'Sidebar on the left') {echo' class="side-left"';}
  if ($template == 'Full Width (no sidebar)') {echo' class="full-width"';} 
  ?>>
  
  
    <div class="wrapper">
    
    <div id="main">
      
      <?php wp_reset_query(); if (have_posts()) : while (have_posts()) : the_post(); ?>
      
        <div id="single">
        
        <div class="title breadcrumbs">
           <?php echo '<h3>'; wpzoom_breadcrumbs(); echo' - информация об игре	</h3>'; ?>
        </div><!-- end .title -->
        
        <div class="box box-single">
            <?php 
					if ( has_post_thumbnail() ) echo '<div class="alignright">';{ // Проверка на наличие миниатюры для записи

              if (get_ngg_post_thumb_url(get_post_thumbnail_id($post->ID))) {
                $img = get_ngg_post_thumb_url(get_post_thumbnail_id($post->ID));
              } else {
                $thumbURL = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
                $img = $thumbURL[0]; 
              } 
            ?>

            <img width="150" height="150" src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $img ?>&amp;h=150&amp;w=150&amp;zc=1" class="attachment-thumbnail wp-post-image"  alt="<?=get_the_title()?>" title="<?=get_the_title()?>">

            <?php
					} echo '</div>';
			 ?>            
            <h1 class="title"><?php the_title(); ?></h1>
          <!--  <?php if (strlen($wpzoom_ad_content_imgpath) > 1 && $wpzoom_ad_content_select == 'Yes' && $wpzoom_ad_content_pos == 'Before') { echo '<div class="banner">'.stripslashes($wpzoom_ad_content_imgpath)."</div>"; }?>
!-->

<!-- Блок основной информации об игре -->
<div class="postcontent, gameinfo">
<div class="gamedata"><?php echo get_the_term_list( $post->ID, 'genre', '<strong>Жанр: </strong>', ', ', '<br/>' ) ?></div>                			<!-- Жанр (таксономия) -->
<div class="gamedata"><?php echo get_the_term_list( $post->ID, 'publisher', '<strong>Издатель: </strong>', ' | ', '<br/>' ) ?> 	</div>	    		<!-- Издатель (таксонмия)-->
<div class="gamedata"><?php echo get_the_term_list( $post->ID, 'developer', '<strong>Разработчик: </strong>', ' | ', '<br/>' ) ?>  </div>  			<!-- Разработчик (таксономия) -->
<div class="gamedata"><?php echo get_the_term_list( $post->ID, 'platform', '<strong>Платформы: </strong>', ', ', '<br/>' ) ?>      </div>			<!-- Платформа (таксономия) -->
<!-- вывод картинки в зависимости от локализации: game-local-->
<?php
$game_loc = get_post_meta($post->ID, 'game-local', $single);																						/* картинка локализации */
if ($game_loc=='subtrus') echo '<div class="localisation" id="loc_sub"><strong>Локализация:</strong></div>';
elseif ($game_loc=='unknown') echo '<div class="localisation" id="loc_unc"><strong>Локализация:</strong></div>';
elseif ($game_loc=='english') echo '<div class="localisation" id="loc_eng"><strong>Локализация:</strong></div>';
elseif ($game_loc=='allrus') echo '<div class="localisation" id="loc_all"><strong>Локализация:</strong></div>';
else echo '<div class="localisation" id="loc_doc"><strong>Локализация:</strong></div>';
?>
<!-- Конец вывода картинки локализации -->

<!-- Даты релиза -->

<?php
$rdate_inexact = get_post_meta($post->ID, 'rdate_inexact_text', $single);																				/* Неточная дата релиза (если заполнена)*/
if ( $rdate_inexact ) { ?>
<div class="gamedata"><strong>Дата релиза: </strong><?php echo $rdate_inexact; ?> <br/></div>				
<?php } 

$rdate_exact = get_post_meta($post->ID, 'rdate_exact', $single);

							/* точная дата релиза (если заполнена)*/
if ( $rdate_exact ) { ?>
<div class="gamedata"><strong>Дата релиза: </strong><?php echo $rdate_exact; ?> <br/></div> <?php				
 }

$rdate_comment = get_post_meta($post->ID, 'rdate_comment', $single);																					/* комментарий к релизу (если заполнен)*/
if ( $rdate_comment ) { ?>
<div class="gamedata"><strong>Комментарий к релизу: </strong><div class="gamedata_comment"><?php echo $rdate_comment; ?> </div></div>
<?php } ?>

<!-- конец дат -->


<?php $website = get_post_meta($post->ID, 'game-site', $single);
if ( $website ) { ?>
<div class="gamedata"><strong>Сайт: </strong><?php echo $website; ?> <br/></div>																		<!-- Сайт игры (если заполнен) -->
<?php } ?>

<!-- отбор подчиненных записей (DLC) -->

    
    <!-- Проверка, является ли запись DLC (по принадлежности категории) если нет - ищем подчиненные посты-DLC, если да - показываем родительскую игру -->
    <?php
    
    if ( in_category('dlc')) { ;?>
   <div class="gamedata"> <strong>Это дополнение к игре:&nbsp;</strong>
    <!-- Получаем пост-родитель -->
    
    <?php  
$parent_title = get_the_title($post->post_parent); // Тут определяется title родительской страницы и отправляется в переменную
$parent_link = get_permalink($post->post_parent); // Тут определяется URL ссылки на родительскую страницу
$title = get_the_title(); // Тут отправляется в переменную title текущей страницы
setup_postdata($post);
// Здесь задается условие, если названия предыдущей и текущей старниц одинаковые, то ничего не выводится, если разные - выводится название родительской
if ($parent_title != $title){?>

<strong><a href="<?php echo $parent_link;?>"><?php echo $parent_title;?></a></strong></div><?php 											/* Основная игра, если нет подчиненных games */

} 
// else{ echo 888;} // Как бы проверка на работоспособность                                           

    }
     
    else { ;?>
    
    <?php        
	$args = array(  
    			    'numberposts'     => -1,  
        			'orderby'         => 'post_date',  
        			'order'           => 'DESC',  
        			'post_type'       => 'games',  
        			'post_parent'     => $post->ID,  
        			'post_status'     => 'published'  
    				);        
    $posts = get_posts($args);
    
    if ( $posts ) { ?>
    
    <div class="gamedata"><strong>Дополнения:&nbsp;</strong><ul>																			<!-- Список подчиненных записей (дополнения)-->
    <?php foreach($posts as $post){ setup_postdata($post);  ?>
        <li style="padding-left:20px;"><a target="blanc" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li> <?php
    }  echo '</ul></div>';
    wp_reset_postdata();  
    }
    }
    ?>
        
<!-- конец отбора подчиненных записей (DLC)-->

<div class="gamedata"><div><?php echo get_post_meta($post->ID, 'game-description', $single); ?> </div></div>

            </div>
<!-- /Блок основной информации об игре -->
            <div class="cleaner">&nbsp;</div>
            
<!-- Дополнительные материалы!-->
<h2 class="moreposts">Все статьи о <?php the_title(); ?>:</h2>


<?php the_content(); ?> <!-- для показа баннера -->
<?php 
$category = get_the_category();
    rsort($category);  
    $cat_add_id = $category[0]->term_id;  
    $real_id = get_the_ID();                  
    $args = array('category__and' =>array($cat_add_id,4), order =>'DESC', 'orderby' =>'the_date', 'numberposts' =>-1);  
    $posts_no = get_posts($args);
    $count_no = count($posts_no);             
    $args = array('category__and' =>array($cat_add_id,6), order =>'DESC', 'orderby' =>'the_date', 'numberposts' =>-1);  
    $posts_ob = get_posts($args);             
    $count_ob = count($posts_ob);             
    $args = array('category__and' =>array($cat_add_id,7), order =>'DESC', 'orderby' =>'the_date', 'numberposts' =>-1);  
    $posts_pr = get_posts($args);             
    $count_pr = count($posts_pr);             
    $args = array('category__and' =>array($cat_add_id,8), order =>'DESC', 'orderby' =>'the_date', 'numberposts' =>-1);  
    $posts_gu = get_posts($args);             
    $count_gu = count($posts_gu);             
    $args = array('category__and' =>array($cat_add_id,10), order =>'DESC', 'orderby' =>'the_date', 'numberposts' =>-1);  
    $posts_in = get_posts($args);             
    $count_in = count($posts_in);             
    $args = array('category__and' =>array($cat_add_id,11), order =>'DESC', 'orderby' =>'the_date', 'numberposts' =>-1);  
    $posts_mn = get_posts($args);             
    $count_mn = count($posts_mn);             
    $args = array('category__and' =>array($cat_add_id,12), order =>'DESC', 'orderby' =>'the_date', 'numberposts' =>-1);  
    $posts_ev = get_posts($args);  
    $count_ev = count($posts_ev);             
?>
<!-- /Материалы по игре !-->
<div id="quickCategories">
          
          <div class="navTabs">
            <ul class="tabs">
              <li><a href="#tab1">Новости <!--(<?=$count_no?>)--></a></li>
			  <li><a href="#tab2">Обзоры <!--(<?=$count_ob?>)--></a></li>
			  <li><a href="#tab3">Прохождения <!--(<?=$count_pr?>)--></a></li>
			  <li><a href="#tab4">Гайды <!--(<?=$count_gu?>)--></a></li>
			  <li><a href="#tab5">Трофеи <!--(<?=999?>)--></a></li>
			  <li><a href="#tab6">Интервью <!--(<?=$count_in?>)--></a></li>
			  <li><a href="#tab7">Мнения <!--(<?=$count_mn?>)--></a></li>
			  <li><a href="#tab8">События <!--(<?=$count_ev?>)--></a></li>
            </ul>
          </div>
          <div class="box">
            <div class="tab_container">

<!-- Вкладка "Новости"-->
          <div id="tab1" class="tab_content">
		  <?php 
    foreach( $posts_no as $post ){  
        setup_postdata($post);  
        if ($post->ID <> $real_id){  
        ?>  
        <?php the_date( 'd-m-y', '<span id="small_date">', '</span>&nbsp;', 'true' ); ?>&nbsp;&nbsp;<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></br><?php  
        }  
    }
    wp_reset_postdata();  
    ?>
            </div>
            
<!-- Вкладка "Обзоры"-->
			<div id="tab2" class="tab_content">
            <?php 
    foreach( $posts_ob as $post ){  
        setup_postdata($post);  
        if ($post->ID <> $real_id){  
        ?>  
        <?php the_date( 'd-m-y', '<span id="small_date">', '</span>&nbsp;', 'true' ); ?>&nbsp;&nbsp;<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/><?php  
        }  
    }  
    wp_reset_postdata();  
    ?>
            </div>
            
<!-- Вкладка "Прохождения"-->
			<div id="tab3" class="tab_content">
            <?php 
    foreach( $posts_pr as $post ){  
        setup_postdata($post);  
        if ($post->ID <> $real_id){  
        ?>  
        <?php the_date( 'd-m-y', '<span id="small_date">', '</span>&nbsp;', 'true' ); ?>&nbsp;&nbsp;<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/><?php  
        }  
    }  
    wp_reset_postdata();  
    ?>
            </div>
            
<!-- Вкладка "Гайды"-->
			<div id="tab4" class="tab_content">
            <?php 
    foreach( $posts_gu as $post ){  
        setup_postdata($post);  
        if ($post->ID <> $real_id){  
        ?>  
        <?php the_date( 'd-m-y', '<span id="small_date">', '</span>&nbsp;', 'true' ); ?>&nbsp;&nbsp;<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/><?php  
        }  
    }  
    wp_reset_postdata();  
    ?>
            </div>

<!-- Вкладка "Трофеи"-->
			<div id="tab5" class="tab_content">
        <!-- Отбор страниц-листов трофеев. Определяем текущий ID записи, отбираем все записи типа page, со значением произвольного поля равным текущему ИД -->
            <!-- Проверяем, это DLC или нет-->
            <?php
                 if ( in_category('dlc')) { ;?>
                 
<?php
$tr_page_id = get_post_meta($post->ID, 'tr_page', true); /* получаем ИД страницы, указанной в поле "Страница трофеев (tr_page)"*/
      
    $post_id = get_post($tr_page_id);  
    $title = $post_id->post_title;             /* здесь хранится тайтл страницы с трофеями */
    $url =$post_id->guid;                      /* здесь хранится урл страницы с трофеями */
    
/* проверка условия: указана ли страница трофеев */

if ($tr_page_id != 'null') {
        echo "<p><a href='$url'> Все трофеи для игры $title</a></p>";
    }
else {echo 'Мы еще не добавляли трофеи для этой игры, зайдите попозже =)';}
?>

                 </div> 
                 <?php
                 }
                 else {
             
            $curr_ID = get_the_ID();
            $args = array ('post_type'=>'page', 'meta_key'=>'tr_game', 'meta_value'=>$curr_ID);
            $posts = get_posts($args);
             foreach( $posts as $post )  
        	 setup_postdata($post); 
        	 
        	 /* проверяем, есть ли страница с трофеями */
        	 
        	 if ($posts) { ;?>
        	 <a href="<?php the_permalink(); ?>" title="Все трофеи в игре <?php the_title(); ?>" >Все трофеи в игре <?php the_title(); ?></a>
        	 <?php
        	 }
        	 else {
        	 
        	 echo 'Мы еще не добавляли трофеи для этой игры, зайдите попозже =)';
        	 
        	 }
            ?>
            <!-- Конец проверки наличия страницы с трофеями для этой игры -->
            
            <!-- Конец отбора страниц-листов трофеев -->
            </div> 
            
            <?php } 
            wp_reset_postdata();
            ?>
            
<!-- Вкладка "Интервью"-->
			<div id="tab6" class="tab_content">
            <?php
    foreach( $posts_in as $post ){  
        setup_postdata($post);  
        if ($post->ID <> $real_id){  
        ?>  
        <?php the_date( 'd-m-y', '<span id="small_date">', '</span>&nbsp;', 'true' ); ?>&nbsp;&nbsp;<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/><?php  
        }  
    }  
    wp_reset_postdata();  
    ?>
            </div>
            
<!-- Вкладка "Мнения"-->
			<div id="tab7" class="tab_content">
            <?php
    foreach( $posts_mn as $post ){  
        setup_postdata($post);  
        if ($post->ID <> $real_id){  
        ?>  
        <?php the_date( 'd-m-y', '<span id="small_date">', '</span>&nbsp;', 'true' ); ?>&nbsp;&nbsp;<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/><?php  
        }  
    }  
    wp_reset_postdata();  
    ?>
            </div>
            
<!-- Вкладка "События"-->
			<div id="tab8" class="tab_content">
            <?php
    foreach( $posts_ev as $post ){  
        setup_postdata($post);  
        if ($post->ID <> $real_id){  
        ?>  
        <?php the_date( 'd-m-y', '<span id="small_date">', '</span>&nbsp;', 'true' ); ?>&nbsp;&nbsp;<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/><?php  
        }  
    }  
    wp_reset_postdata();  
    ?>
            </div>
            </div>
            
            <div class="cleaner">&nbsp;</div>
          
          </div><!-- end .box -->
          
          </div><!-- end #quickCategories -->
          <?php wp_reset_query(); ?>

<!-- /Материалы по игре !-->
																											<!-- Галерея -->
<?php
$gallery = get_field ('screenshots');
if ($gallery) { ?>
	
<a href="<?php the_permalink(); ?>">[Обзор галерей]</a><br/>
<?php
    foreach ( get_field ( 'screenshots' ) as $nextgen_gallery_id ) :
        if ( $nextgen_gallery_id['ngg_form'] == 'album' ) {
            echo nggShowAlbum( $nextgen_gallery_id['ngg_id'] ); //NextGEN Gallery album
        } elseif ( $nextgen_gallery_id['ngg_form'] == 'gallery' ) {
             echo nggShowGallery( $nextgen_gallery_id['ngg_id'] ); //NextGEN Gallery gallery
        }
    endforeach;
   } 
   
?>        

<!-- получим ссылку на страницу игры для перезвгрузки галереи -->
<!-- -->

<!-- Конец дополнительных материалов!--> 
        </div><!-- end .box -->
          
          </div><!-- end #single -->
          
        
        <div class="cleaner">&nbsp;</div>
        
   <?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria', 'wpzoom');?>.</p>
    <?php endif; ?>
        

        
      </div><!-- end #main -->
      
      <?php if ($template != 'Full Width (no sidebar)') { ?>
      <div id="sidebar">
          
            <?php get_sidebar(); ?>
            
          </div><!-- end #sidebar -->
        <?php } //if template is not full width  ?>
 
      <div class="cleaner">&nbsp;</div>
      
    </div><!-- end .wrapper -->
  </div><!-- end #content -->
  </div><!-- end #frame -->

<?php get_footer(); ?>