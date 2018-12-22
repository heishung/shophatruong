<?php /* Template Name: Trang chủ */ get_header(); ?>


		<!-- section -->

<section id="advertisement">
    <div class="container">
        <img src="images/shop/advertisement.jpg" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">

                    <?php get_sidebar(); ?>

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>

                    <?php
                    $args = new WP_Query(
                        array(
                            'posts_per_page' => 8,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_visibility',
                                    'field' => 'name',
                                    'terms' => 'featured',
                                    'operator' => 'IN'),
                            ),
                        )
                    );
                    if (have_posts()): while (have_posts()) :the_post(); global  $product;?>

                        <div  id="post-<?php the_ID(); ?>" class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?php the_post_thumbnail_url() ?>" alt="" />
                                        <h2><?php echo number_format($product->price) ?></h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="<?php echo $product->get_id(); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>$56</h2>
                                            <p><?php the_title() ?></p>
                                            <a href="<?php echo $product->get_id(); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                    <img src="<?php get_template_directory_uri() ?>/images/home/new.png" class="new" alt="" />
                                    <img src="images/home/sale.png" class="new" alt="" />
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- article -->
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <?php the_content(); ?>

                            <?php comments_template( '', true ); // Remove if you don't want comments ?>

                            <br class="clear">

                            <?php edit_post_link(); ?>

                        </article>
                        <!-- /article -->

                    <?php endwhile; ?>

                    <?php else: ?>

                        <!-- article -->
                        <article>

                            <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

                        </article>
                        <!-- /article -->

                    <?php endif; ?>



                    <?php get_template_part('pagination'); ?>
                    <!--<ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul>-->
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>





		<!-- /section -->




<?php get_footer(); ?>
