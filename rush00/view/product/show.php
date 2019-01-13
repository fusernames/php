<?php $title = $product['name']; ?>
<?php ob_start(); ?>

<img width="200px" height="auto" src="<?= $product['img'] ?>"><br>
<p><?= $product['description'] ?></p>
Prix : <?= $product['price'] ?><br>
<a href="index.php?action=add_to_cart&id_product=<?= $product['id'] ?>"><button>Ajouter au panier</button></a><br>
<?php if (productSecurity('edit', $product['id'])) : ?>
<a href="index.php?action=edit_product&id=<?= $product['id'] ?>"><button>Editer</button></a>
<?php endif; ?>
<?php if (productSecurity('delete', $product['id'])) : ?>
<a href="index.php?action=remove_product&id=<?= $product['id'] ?>"><button>Supprimer</button></a>
<?php endif; ?>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
