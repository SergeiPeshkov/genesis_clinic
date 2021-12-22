<?php get_header(); ?>
    <?php query_posts('post_type=f02&showposts=-1'); ?>
                    <ul class="subnav">
                        <li><a href="#">О клинике</a></li>
                        <li><a href="#">Как нас найти</a></li>
                        <li><a href="#">Отзывы</a></li>
                        <li><a href="#">Фото и видео</a></li>
                        <li><a href="#">Пресса о нас</a></li>
                        <li><a href="#">Новости</a></li>
                        <li><a href="#">Контакты</a></li>
                        <li class="active"><a href="#">История клиники</a></li>
                    </ul>
                </nav>

                <!-- .b-breadcrumbs -->
                <div class="b-breadcrumbs">
                    <ul>
                        <li><a href="#">О клинике</a></li>
                        <li class="current">История клиники</li>
                    </ul>
                </div>
                <!-- /.b-breadcrumbs -->

            </div>
            <!-- /.main-top -->

            <!-- .main-body -->
            <div class="main-body clr">
                <h1>История клиники</h1>

                <!-- #rightside -->
                <aside id="rightside">

                    <!-- .b-information -->
                    <div class="b-information">
                        
                        <!-- .address -->
                        <div class="address">
                            <div class="map"><img src="tmp/map1.jpg" alt="" width="310" height="225" ></div>
                            <address>г. Симферополь, ул. Семашко, 4а, </address><a href="#">контакты</a><br>+38 (0652) 549-000
                        </div>
                        <!-- /.address -->

                        <!-- .place -->
                        <div class="place">
                            <h2>Как добраться</h2>
                            <p>На метро до станции Минская, а оттуда на автобусе № 99. Площадь Шевченко - это конечная остановка</p>
                        </div>
                        <!-- /.place -->

                        <!-- .schedule -->
                        <div class="schedule">
                            <h2>Время работы</h2>
                            <dl>
                                <dt>Понедельник-пятница</dt>
                                <dd>8:00 - 21:00</dd>
                                <dt>Суббота</dt>
                                <dd>9:00 - 18:00</dd>
                                <dt>Воскресенье</dt>
                                <dd>9:00 - 14:00</dd>
                            </dl>
                        </div>
                        <!-- /.schedule -->

                    </div>
                    <!-- /.b-information -->

                </aside>
                <!-- /#rightside -->
                
                <!-- #content -->
                <div id="content">
                    
                    <!-- .b-history -->
                    <div class="b-history">

                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="block">
                            <h2><?php the_title(); ?></h2>
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile; ?>
                        
                    </div>
                    <!-- /.b-history -->

                </div>
                <!-- /#content -->

            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->
<?php get_footer(); ?>      