<?php
add_action('wp_ajax_add_product_sale_to_cart', 'add_product_sale_to_cart');
add_action('wp_ajax_nopriv_add_product_sale_to_cart', 'add_product_sale_to_cart');

function add_product_sale_to_cart(){
  $product = wc_get_product($_POST['product_id']);

  WC()->cart->empty_cart();
  WC()->cart->add_to_cart($_POST['product_id'],$_POST['quantity']);

  if($_POST['quantity'] == 1){
    $sale_price = 1*(int)$product->get_regular_price();
  }

  if($_POST['quantity'] == 3){
    $sale_price = 0.9*(int)$product->get_regular_price()*3;
  }

  if($_POST['quantity'] == 6){
    $sale_price = 0.8*(int)$product->get_regular_price()*6;
  }

  $currency_symbole = get_woocommerce_currency_symbol();
  wp_send_json( array(
      'regular_product_price' => $product->get_regular_price() . $currency_symbole,
      'sale_product_price' => $sale_price . $currency_symbole
    )
  );
}