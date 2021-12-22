<?php get_header() ?>
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
                        <li><a href="<?=site_url()?>">Главная</a></li>
                        <li class="current">Фото и видео</li>
                    </ul>
                </div>
                <!-- /.b-breadcrumbs -->

            </div>
            <!-- /.main-top -->

            <!-- .main-body -->
            <div class="main-body clr">
                <h1>Фотографии</h1>

                <!-- .b-photos -->
                <div class="b-photos">
                    <ul class="frames">

                        <?php 
                            $photos = get_posts(array('post_type' => 'gallery', "showposts" => -1, 'meta_key' => 'type', 'meta_value' => 'gallery'));
                            foreach ($photos as $photo) {
                        ?>
                        <!-- .photo -->
                        <li class="photo frame">
                            <?php $img = wp_get_attachment_image_src(get_post_thumbnail_id($photo->ID), 'full'); ?>
                            <a id="galTrigger-<?=$photo->ID?>" href="javascript:;">
                                <span class="img">
                                    <?=get_the_post_thumbnail($photo->ID, 'gallery_')?>
                                </span>
                                <span class="name"><?=get_the_title($photo->ID)?></span>
                            </a>
                        <?php
                                unset($args, $attachments);
                                $args = array(
                                    'order'          => 'DESC',
                                    'post_type'      => 'attachment',
                                    'post_parent'    => $photo->ID,
                                    'post_mime_type' => 'image',
                                    'post_status'    => null,
                                    'numberposts'    => -1,
                                );
                                $attachments = get_posts($args);
                                if ($attachments) {
                        ?>
                                <script type="text/javascript">
                                     $("#galTrigger-<?=$photo->ID?>").click(function() {
                                            console.log(111);
                                            $.fancybox([
                        <?php
                                    foreach ($attachments as $k => $attachment) {
                                        $img = wp_get_attachment_image_src($attachment->ID, 'full');
                                ?>
                                        <?=($k?', ':NULL)?>'<?=$img[0]?>'
                                <?php
                                    }
                                ?>
                                            ]);

                                    });                                
                                </script>
                                <?php
                                } 
                        ?>                            
                        </li>
                        <!-- /.photo -->
                        <?php } ?>

                    </ul>
                </div>
                <!-- /.b-photos -->

                <h1>Видео</h1>

                <!-- .b-videos -->
                <div class="b-videos">
                    <ul class="frames">

                        <?php 
                            $photos = get_posts(array('post_type' => 'gallery', "showposts" => -1, 'meta_key' => 'type', 'meta_value' => 'video'));
                            foreach ($photos as $photo) {
                                $video = get_post_meta($photo->ID, 'video', 1);
                        ?>
                        <!-- .video -->
                        <li class="video frame">
                            <a class="fancybox-media" href="<?=$video?>">
                                <span class="img player shadow"><?=get_the_post_thumbnail($photo->ID, 'gallery_')?></span>
                                <span class="name"><?=get_the_title($photo->ID)?></span>
                            </a>
                        </li>
                        <!-- /.video -->
                        <?php } ?>

                    </ul>
                </div>
                <!-- /.b-videos -->

            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->

<?php get_footer(); ?>