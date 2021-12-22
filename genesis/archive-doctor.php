<?php get_header(); ?>
	<?php query_posts('post_type=doctor&showposts=-1&orderby=menu_order&order=ASC'); ?>

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
                        <li class="current">Доктора</li>
                    </ul>
                </div>
                <!-- /.b-breadcrumbs -->

            </div>
            <!-- /.main-top -->

            <!-- .main-body -->
            <div class="main-body clr">
                <h1>Наши специалисты</h1>

                <!-- .b-sort -->
                <div class="b-sort">
                    <select id="spec-filter">
                        <option value="0">Выберите направление</option>
                            <?php
                            $specs = get_posts(array(
                                'post_type' => 'direction',
                                'showposts' => -1
                            ));
                            foreach ($specs as $_spec) { 
                            ?>
                            <option <?php selected($spec, $_spec->ID); ?> value="<?=$_spec->ID?>"><?=get_the_title($_spec->ID)?></option>
                            <?php } ?>                        
                    </select>
                </div>
                <!-- /.b-sort -->

                <!-- .b-doctors -->
                <div class="b-doctors">
                    <ul class="frames">
                        
    				<?php while ( have_posts() ) : the_post(); ?>
                        <?php $rang = get_post_meta($post->ID, 'rang', 1); ?>
    					<?php $spec = get_post_meta($post->ID, 'spec', 1); ?>
                        <!-- .doctor -->
                        <li class="doctor frame" data-spec="<?=$spec?>">
                            <a href="<?php the_permalink(); ?>">
                                <span class="img"><?php MultiPostThumbnails::the_post_thumbnail('doctor', 'doc-square-thumb', null, 'doctor-thumb'); ?></span>
                                <span class="name"><?php the_title(); ?></span>
                                <span class="prof"><?=$rang?></span>
                            </a>
                        </li>
                        <!-- /.doctor -->
                    <?php endwhile; ?>

                    </ul>
                </div>
                <!-- /.b-doctors -->

            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->

<?php get_footer(); ?>