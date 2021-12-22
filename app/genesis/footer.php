    <!-- footer -->
    <footer>

        <!-- .inner -->
        <div class="inner">
            
            <!-- .col -->
             <div class="col">
                <h2>Доктора</h2>
                <?php wp_nav_menu(array("theme_location" => "footerdocs", "container_class" => "menu")); ?>
             </div>
            <!-- /.col -->

            <!-- .col -->
            <div class="col">
                <h2>О клинике</h2>
                <?php wp_nav_menu(array("theme_location" => "footerabout", "container_class" => "menu")); ?>
            </div>
            <!-- /.col -->

            <!-- .col -->
            <div class="col">
                <h2>Услуги</h2>
                <?php wp_nav_menu(array("theme_location" => "footerservices", "container_class" => "menu")); ?>
            </div>
            <!-- /.col -->

            <!-- .col -->
            <div class="col">
                <h2>Мы в сети</h2>

                <!-- .b-social-btns -->
                <div class="b-social-btns">
                    <ul>

           <li class="social-btn">
<!-- Put this div tag to the place, where the Like block will be -->

           </li>
                       <li class="social-btn">
                            <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fgenesis.ua&amp;send=false&amp;layout=button_count&amp;width=245&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:245px; height:21px;" allowTransparency="true"></iframe>
                        </li>    
                            <li class="social-btn">
                            <!-- Place this tag where you want the +1 button to render. -->
                            <div class="g-plusone" data-href="http://клиника-генезис.рф"></div>

                            <!-- Place this tag after the last +1 button tag. -->
<!--                             <script type="text/javascript">
                              (function() {
                                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                po.src = 'https://apis.google.com/js/plusone.js';
                                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                              })();
                            </script> -->
                        </li>
                    </ul>
                </div>
                <!-- /.b-social-btns -->

                <!-- .b-subscribe -->
                <div class="b-subscribe">
                    <form action="<?=site_url().'/subscribe/'?>" method="POST">
                        <div class="form-item">
                            <label>Подписаться на новости</label>
                            <input type="email" class="form-text" name="email" placeholder="Укажите свой e-mail">
                            <button type="submit">ок</button>
                        </div>
                    </form>
                </div>
                <!-- /.b-subscribe -->

            </div>
            <!-- /.col -->

        </div>
        <!-- /.inner -->

    </footer>
    <!-- /footer -->

<?php wp_footer(); ?>


<!-- RedHelper -->
<!-- BEGIN JIVOSITE CODE {literal} -->
<!-- {/literal} END JIVOSITE CODE -->
<!--/Redhelper -->
<!-- {literal} -->
<!-- <script type='text/javascript'>
    window['liv'+'eTe'+'x'] = true,
    window['li'+'veTe'+'xID'] = 105528,
    window['liv'+'eTex_'+'o'+'bje'+'c'+'t'] = true;
    (function() {
        var t = document['create'+'Eleme'+'nt']('script');
        t.type ='text/javascript';
        t.async = true;
        t.src = '//c'+'s'+'1'+'5.li'+'vet'+'ex'+'.ru/'+'js/client.'+'js';
        var c = document['g'+'etElemen'+'t'+'s'+'ByTagName']('script')[0];
        if ( c ) c['pa'+'rentN'+'ode']['inser'+'tB'+'efore'](t, c);
        else document['doc'+'ument'+'Ele'+'men'+'t']['fir'+'stC'+'hild']['a'+'p'+'p'+'endCh'+'il'+'d'](t);
    })();
</script> -->
<!-- {/literal} -->
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(39014465, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/39014465" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!--  <script src="/callme/js/callme.js" charset="utf-8"></script> -->
</body>
</html>
