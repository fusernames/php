<?php

function checkOrder($order) {
  foreach ($order['products'] as $product) {
    if (!is_numeric($product['quantity']))
      return FALSE;
  }
  return TRUE;
}
