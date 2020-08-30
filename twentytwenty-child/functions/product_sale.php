<?php
add_action('wp_ajax_add_product_sale_to_cart', 'add_product_sale_to_cart');
add_action('wp_ajax_nopriv_add_product_sale_to_cart', 'add_product_sale_to_cart');

function add_product_sale_to_cart(){
  $product = wc_get_product($_POST['product_id']);

  WC()->cart->empty_cart();
  WC()->cart->add_to_cart($_POST['product_id'],$_POST['quantity']);

  $regular_total_price = (int)$product->get_regular_price()*(int)$_POST['quantity'];
  $sale_price = $regular_total_price;
  
  if($_POST['quantity'] >= 3 && $_POST['quantity'] < 6 ){
    $sale_price = 0.9*$regular_total_price;
  } elseif($_POST['quantity'] >= 6){
    $sale_price = 0.8*$regular_total_price;
  } else{
    $regular_total_price = false;
  }


  $currency_symbole = get_woocommerce_currency_symbol();
  wp_send_json( array(
      'regular_product_price' => $regular_total_price ? $regular_total_price . $currency_symbole : false,
      'sale_product_price' => $sale_price . $currency_symbole
    )
  );
}