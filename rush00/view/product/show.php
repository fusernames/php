<?php $title = $product['name']; ?>
<?php ob_start(); ?>

<h3><?= $product['name'] ?></h3>
<img width="200px" height="auto" src="<?= $product['img'] ?>"><br>
<p><?= $product['description'] ?></p>
Prix : <?= $product['price'] ?><br>
<a href="index.php?action=add_to_cart&product_id=<?= $product['id'] ?>"><button>Ajouter au panier</button></a><br>
<a href="index.php?action=edit_product&id=<?= $product['id'] ?>">Editer</a>
<a href="index.php?action=remove_product&id=<?= $product['id'] ?>">Supprimer</a>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
