<?php

require_once __DIR__.'/config/defines.php';
require_once MODEL.'user.php';
require_once MODEL.'category.php';
require_once MODEL.'product.php';

session_start();
session_destroy();
$files = glob(DATA.'*');
foreach($files as $file) {
  if(is_file($file))
    unlink($file);
}

register('admin', 'admin', 'admin');
register('user', 'user');
addCategory('Céréales');
addCategory('Patisseries');
addCategory('Biscuits');
addCategory('Très bons');
$product = array(
  'name' => 'Chocapics',
	'description' => 'C\'est fort en chocolat',
	'img' => 'https://www.nestle.fr/asset-library/PublishingImages/Brands/Cereales/FR_CHOCAPIC_Chocapic-Regular_820x1094_Pack_01.png',
	'price' => '3.28',
	'category_1' => '1',
	'category_2' => ''
);
addProduct($product);
$product = array(
  'name' => 'Miel pops',
	'description' => 'Bzzzzzz',
	'img' => 'http://images.kglobalservices.com/www.kelloggs.fr/fr_fr/product/product_253595/prod_img-253856_miel-pops-cracks-400g.png',
	'price' => '2.85',
	'category_1' => '1',
	'category_2' => '4'
);
addProduct($product);
$product = array(
  'name' => 'Churros',
	'description' => '',
	'img' => 'https://www.cookomix.com/wp-content/uploads/2016/08/churros-thermomix-800x600.jpg',
	'price' => '5.21',
	'category_1' => '2',
	'category_2' => '4'
);
addProduct($product);
$product = array(
  'name' => 'Chocolatine',
	'description' => '',
	'img' => 'http://couteaux-et-tirebouchons.com/wp-content/uploads/2016/01/Pain-au-chocolat-ou-chocolatine.jpg',
	'price' => '1.00',
	'category_1' => '2',
	'category_2' => ''
);
addProduct($product);
$product = array(
  'name' => 'Oreo',
	'description' => 'C\'est pas bon',
	'img' => 'http://idata.over-blog.com/4/10/51/02/biscuit-oreo.jpg',
	'price' => '2.99',
	'category_1' => '3',
	'category_2' => ''
);
addProduct($product);
$product = array(
  'name' => 'BelVita Brut de Céréales',
	'description' => 'Pour le petit déjeuner !',
	'img' => 'http://images.sweetauthoring.com/product/68910.jpg',
	'price' => '4.30',
	'category_1' => '3',
	'category_2' => ''
);
addProduct($product);
$product = array(
  'name' => 'Princes',
	'description' => 'Pour le petit déjeuner !',
	'img' => 'http://images.sweetauthoring.com/product/84313.jpg',
	'price' => '2.10',
	'category_1' => '4',
	'category_2' => '3'
);
addProduct($product);
$product = array(
  'name' => 'Eclair au Chocolat',
	'description' => 'un delice',
	'img' => 'https://static.750g.com/images/auto-427/c727cfc5240b2ac4e92882acf519543d/eclairs-au-chocolat.jpg',
	'price' => '1.50',
	'category_1' => '2',
	'category_2' => '4'
);
addProduct($product);
echo 'Installation réussie.<br><br><a href="index.php"><button>Rejoindre le site</button></a>';
