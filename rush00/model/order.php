<?php

function checkOrder($order) {
  foreach ($order['products'] as $product) {
    if (!is_numeric($product['quantity']) || $product['quantity'] < 1)
      return FALSE;
  }
  return TRUE;
}
