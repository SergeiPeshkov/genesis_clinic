<?php
/*
    Template Name: .price
*/
?>
<?php get_header(); ?>          
                    <ul>
                        <li><a href="<?=site_url().'/doctor/'?>">Доктора</a></li>
                        <li><a href="<?=site_url().'/about/'?>">О клинике</a></li>
                        <li class="active"><a href="<?=site_url().'/price/'?>">Услуги и цены</a></li>
                    </ul>
                    <?php wp_nav_menu(array("theme_location" => "tabsprice", "container" => false, "menu_class" => 'subnav')); ?>
                </nav>

                <!-- .b-breadcrumbs -->
                <div class="b-breadcrumbs">
                    <ul>
                        <li><a href="<?=site_url()?>">Главная</a></li>
                        <li>Услуги и цены</li>
                    </ul>
                </div>
                <!-- /.b-breadcrumbs -->

            </div>
            <!-- /.main-top -->

            <!-- .main-body -->
            <div class="main-body clr">
                <h1>Цены (оплата производится через кассу)</h1>

                <!-- .tabs -->
                <ul class="tabs">
                            <?php 
                                $directions = get_posts(array(
                                    'post_type' => 'direction', 
                                    'showposts' => -1
                                ));
                                foreach ($directions as $direction) {
                            ?>
                            <li><a href="<?=get_permalink($direction->ID)?>"><?=get_the_title($direction->ID)?></a></li>
                            <?php } ?>             
                </ul>
                <!-- /.tabs -->

                <!-- .panes -->
                <div class="panes">
                    <?php 
                        foreach ($directions as $direction) {

                    ?>
                    <div>
                        <table class="price-table">
                            <tr>
                                <th>Название услуги</th>
                                <th>Все цены указаны в рублях</th>
                            </tr>
                            <?php 
                                $services = get_posts(array(
                                    'post_type' => 'service', 
                                    'showposts' => -1,
                                    'meta_key' => 'parentem',
                                    'meta_value' => $direction->ID
                                ));
                                $specs = get_posts(array(
                                    'post_type' => 'specialisation', 
                                    'showposts' => -1,
                                    'meta_key' => 'parentem',
                                    'meta_value' => $direction->ID
                                ));
                                foreach ($specs as $key => $spec) {
                                    $_services = get_posts(array(
                                        'post_type' => 'service', 
                                        'showposts' => -1,
                                        'meta_key' => 'parentem',
                                        'meta_value' => $spec->ID
                                    ));
                                    if ($_services[0]->ID) {
                                        $services = array_merge($services, $_services);
                                    }
                                }
                                foreach ($services as $service) {
                                    $price = get_post_meta($service->ID, 'price', 1);
                            ?>                                         
                            <tr>
                                <td><a href="<?=get_permalink($service->ID)?>"><?=get_the_title($service->ID)?></a></td>
                                <td><?=$price?></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <?php } ?>
                </div>
                <!-- /.panes -->

            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

    </div>
    <!-- /#wrapper -->

<?php get_footer(); ?>
