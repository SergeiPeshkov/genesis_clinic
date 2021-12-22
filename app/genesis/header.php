<!doctype html>
<!--[if lte IE 7 ]><html class="ie ie7" lang="ru"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="ru"><![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="ru"><![endif]-->
<!--[if gt IE 9]><!--><html lang="ru"><!--<![endif]--> 
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Клиника Genesis</title>
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"/> -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/style.css?ver=3" media="all">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/colorbox.css" media="all">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/jquery.fancybox.css" media="all">
	<meta name="yandex-verification" content="2cf5e708ff4dc15b" />
	
    <!-- <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico"> -->
    <!--[if lt IE 9]>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/IE9.js"></script>
    <![endif]-->
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-1.8.0.min.js"></script>
<!-- 	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.colorbox-min.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.tools.min.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.fancybox.pack.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.fancybox-media.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/script.js"></script>
                    <script type="text/javascript">
                      $(document).ready(function(){

                      $("#menu-item-212 a").fancybox({
                        minHeight  : '345px',
                        maxHeight  : '90%',
                        fitToView : false, 
                        width   : '315px',
                        closeClick  : false,
                        openEffect  : 'none',
                        closeEffect : 'none'
                      });

                    });
                    </script>

    <?php wp_head(); ?>
</head>
<body>
    <!-- <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script> -->

    <!-- #wrapper -->
    <div id="wrapper">
        
        <!-- header -->
        <header>
            <?php $header = maybe_unserialize(get_option('gnss_header')); ?>
            <a href="<?php echo site_url(); ?>" id="logo">Клиника Genesis</a>
            <div class="slogan"><?=$header['slogan']?></div>

            <!-- .head-right -->
            <div class="head-right">

                <!-- .b-contact-info -->
                <div class="b-contact-info">
                    <address>Симферополь</address>
                    <div class="phone"><a href="tel:+73652604900" onclick="ym(39014465, 'reachGoal', 'telefon'); return true;"><?=$header['phone']?>, </a></div>
                    <div class="phone"><a href="tel:+79787325000" onclick="ym(39014465, 'reachGoal', 'telefon2'); return true;"> <?=$header['phone2']?></a></div>
                </div>
                <!-- /.b-contact-info -->

                <!-- .b-search -->
                <div class="b-search">
                    <form action="<?=site_url()."/search/"?>" method="GET">
                        <div class="form-item">
                            <input type="text" name="q" class="form-text">
                            <button type="submit"></button>
                        </div>
                    </form>
                </div>
                <!-- /.b-search -->

                <!-- .b-socials -->
                <div class="b-socials">
		    <a href="<?=$header['youtube']?>" class="youtube"></a>
                    <a href="<?=$header['facebook']?>" class="facebook"></a>
                    <a href="<?=$header['twitter']?>" class="twitter"></a>
		    <a href="<?=$header['instagram']?>" class="instagram"></a>
		    <a href="<?=$header['odnoklassniki']?>" class="odnoklassniki"></a>
                    <a href="https://vk.com/clinic.genesis" class="rss"></a>
                </div>
                <!-- /.b-socials -->
            </div>
            <!-- /.head-right -->

            <!-- nav -->
            <nav>
                <?php wp_nav_menu(array("theme_location" => "header", "container" => false)); ?>
            </nav>
            <!-- /nav -->


        </header>

        <!-- /header -->
        <!-- #main -->
        <div id="main">
            
            <!-- .main-top -->
            <div class="main-top">
                <nav>
