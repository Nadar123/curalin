<div id="product" class="product">
    <div class="container">
        <div class="product-wrap">
            <div class="product__info">
                <h3>What is the right package for you? </h3>

                <?php
                    $product_categories = array('curalin');

                    $wc_query = new WP_Query( array(
                        'post_type' => 'product',
                        'post_status' => 'publish',
                        'posts_per_page' => 10,
                        'tax_query' => array( array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => $product_categories,
                            'operator' => 'IN',
                        ) )
                    ) );
                    
                ?>  

                <div class="product-info__currentPrice">
                    <?php if ($wc_query->have_posts()) : ?>
                        <?php while ($wc_query->have_posts()) : $wc_query->the_post(); ?>
                            <div class="sales-drop" data-product-id="<?php echo get_the_ID();?>">
                                <div class="sales-drop__active">
                                    <div class="btn-sales">
                                        <p><?php the_title(); ?> </p>
                                        <?php $product = wc_get_product( get_the_ID() );?>                                    
                                    </div>
                                </div>
                                <div class="sales-drop__list">
                                <div class="btn-sales js-add-to-cart-sale" data-quantity="1">
                                    <span class="btn-sales__perc">regular price</span>
                                    <p>Single unit</p>
                                </div>
                                    <div class="btn-sales js-add-to-cart-sale" data-quantity="3">
                                        <span class="btn-sales__perc">10% OFF</span>
                                        <p>CuraLin 3 Pack</p>
                                    </div>
                                    <div class="btn-sales js-add-to-cart-sale" data-quantity="6">
                                        <span class="btn-sales__perc">20% OFF</span>
                                        <p>CuraLin 6 Pack</p>
                                    </div>
                                </div>
                            </div>

                            <div class="product-info__currentPrice__price">
                                <p>
                                    <?php
                                   // print_r( $product);
                                    // var_dump($product);
                                   // $display = 'none'; 
                                    if( $product->get_price_html()) : ?>
                                        <span class="info__currentPrice" style="display: <?php echo $display ?>">
                                            <span></span>
                                        </span>
                                    <?php endif; ?>
                                    <span class="info__salePrice">
                                        <span><?php echo $product->get_price_html(); ?> </span>
                                    </span>
                                </p>
                            </div>
                        <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                                <?php else:  ?>
                                    <li>
                                        <?php _e( 'No products' ); ?>
                                    </li>
                    <?php endif; ?>
                </div>

                <div class="product-info__review">
                    <div class="product-info__review__stars">
                        <span class="icon-star active"></span>
                        <span class="icon-star active"></span>
                        <span class="icon-star active"></span>
                        <span class="icon-star active"></span>
                        <span class="icon-star active"></span>
                    </div>
                    <p>(1578 Reviews)</p>
                </div>
                <div class="product-info__img">
                    <img src="<?php bloginfo('template_directory');?>/images/image-22.png" alt="" class="">

                </div>
            </div>

            <div class="product__form">
                <div class="form_process">
                    <div class="process-box">
                        <div id="progress1" class="process-box_circle">
                            <span class="icon-customer"></span>
                        </div>
                        <span class="process-box__text">Customer Information</span>
                    </div>
                    <div class="process-box">
                        <div id="progress2" class="process-box_circle">
                            <span class="icon-address"></span>
                        </div>
                        <span class="process-box__text">Shipping address</span>
                    </div>
                    <div class="process-box">
                        <div id="progress3" class="process-box_circle">
                            <span class="icon-payment"></span>
                        </div>
                        <span class="process-box__text">Payment Method</span>
                    </div>
                    <div class="process-box">
                        <div id="progress4" class="process-box_circle">
                            <span class="icon-check"></span>
                        </div>
                        <span class="process-box__text">Confirmation </span>
                    </div>
                </div>

                <div class="form_total">
                    <table>
                     <?php if ($wc_query->have_posts()) : ?>
                        <?php while ($wc_query->have_posts()) : $wc_query->the_post(); ?>
                            <div class="sales-drop" data-product-id="<?php echo get_the_ID();?>">
                            <tbody>
                                <tr class="product-info__currentPrice__price"> 
                                    <td >Subtotal</td>
                                    <td class="info__salePrice">
                                    <?php echo $product->get_price_html(); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>Free</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="product-info__currentPrice__price"> 
                                    <td><b>Totall</b></td>
                                    <td class="info__salePrice">
                                        <b> <?php echo $product->get_price_html(); ?></b>
                                    </td>
                                </tr>
                            </tfoot>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    </table>
                </div>

                <div id="btnField" class="btn_field">
                    <div class="btn_field_img">
                        <img src="<?php bloginfo('template_directory');?>/images/image-31.png" alt="" class="">
                        <img src="<?php bloginfo('template_directory');?>/images/image-32.png" alt="" class="">
                        <img src="<?php bloginfo('template_directory');?>/images/image-33.png" alt="" class="">
                    </div>
                    <a class="main-btn next" href=<?php echo site_url('/checkout') ?>> 
                        Next Step <span class="icon-next"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>