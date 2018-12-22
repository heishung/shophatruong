			<!-- footer -->
            <footer id="footer"><!--Footer-->
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="companyinfo">
                                    <h2>
                                        <?php $Name_web = get_theme_mod('Name_web') ;
                                        if (!empty($Name_web)){echo $Name_web;}
                                        ?>

                                    </h2>
                                    <p> <?php $Desc_web = get_theme_mod('Desc_web') ;
                                        if (!empty($Desc_web)){echo $Desc_web;}
                                        ?></p>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <?php $getpostnews = new WP_Query(array( 'posts_per_page'=>4 ));
                                    while ($getpostnews->have_posts()):$getpostnews->the_post();
                                    $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID,'thumbnail'));
                                ?>
                                <div class="col-sm-3">
                                    <div class="video-gallery text-center">
                                        <a href="#">
                                            <div class="iframe-img">
                                                <img src="images/home/iframe1.png" alt="" />
                                            </div>
                                            <div class="overlay-icon">
                                                <i class="fa fa-play-circle-o"></i>
                                            </div>
                                        </a>
                                        <p>Circle of Hands</p>
                                        <h2>24 DEC 2014</h2>
                                    </div>
                                </div>
                                <?php endwhile;wp_reset_query(); ?>


                            </div>
                            <div class="col-sm-3">
                                <div class="address">
                                    <img src="images/home/map.png" alt="" />
                                    <p> <?php $Addr_web = get_theme_mod('Addr_web') ;
                                        if (!empty($Addr_web)){echo $Addr_web;}
                                        ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-widget">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="single-widget">
                                    <h2>Service</h2>
                                    <ul class="nav nav-pills nav-stacked">
                                       <?php $menuLocations=get_nav_menu_locations();
                                       $menuID=$menuLocations['footer-nav-1'];
                                       $primaryNav=wp_get_nav_menu_items($menuID);
                                       $id_parent=0;
                                       foreach ($primaryNav as $navItem){
                                           ?>
                                        <li><a href="<?php echo $navItem->url ?>"><?php echo $navItem->title?></a></li>
                                        <?php
                                       }
                                       ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="single-widget">
                                    <h2>Quock Shop</h2>
                                    <ul class="nav nav-pills nav-stacked">
                                        <?php $menuLocations=get_nav_menu_locations();
                                        $menuID=$menuLocations['footer-nav-2'];
                                        $primaryNav=wp_get_nav_menu_items($menuID);
                                        $id_parent=0;
                                        foreach ($primaryNav as $navItem){
                                            ?>
                                            <li><a href="<?php echo $navItem->url ?>"><?php echo $navItem->title?></a></li>
                                            <?php
                                        }
                                        ?>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="single-widget">
                                    <h2>Policies</h2>
                                    <ul class="nav nav-pills nav-stacked">
                                        <?php $menuLocations=get_nav_menu_locations();
                                        $menuID=$menuLocations['footer-nav-3'];
                                        $primaryNav=wp_get_nav_menu_items($menuID);
                                        $id_parent=0;
                                        foreach ($primaryNav as $navItem){
                                            ?>
                                            <li><a href="<?php echo $navItem->url ?>"><?php echo $navItem->title?></a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="single-widget">
                                    <h2>About Shopper</h2>
                                    <ul class="nav nav-pills nav-stacked">
                                        <?php $menuLocations=get_nav_menu_locations();
                                        $menuID=$menuLocations['footer-nav-4'];
                                        $primaryNav=wp_get_nav_menu_items($menuID);
                                        $id_parent=0;
                                        foreach ($primaryNav as $navItem){
                                            ?>
                                            <li><a href="<?php echo $navItem->url ?>"><?php echo $navItem->title?></a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-offset-1">
                                <div class="single-widget">
                                    <h2>About Shopper</h2>
                                    <form action="#" class="searchform">
                                        <input type="text" placeholder="Your email address" />
                                        <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                        <p>Get the most recent updates from <br />our site and be updated your self...</p>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                            <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                        </div>
                    </div>
                </div>

            </footer><!--/Footer-->



		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
