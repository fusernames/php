<?php $title = $product['name']; ?>
<?php ob_start(); ?>

<img width="200px" height="auto" src="<?= $product['img'] ?>"><br>
<p><?= $product['description'] ?></p>
Prix : <b><?= $product['price']?></b><br>
Categories :
<?php if ($product['category_1']) : ?>
  <b><?= $product['category_1']['name'] ?></b>
<?php endif ?>
<?php if ($product['category_2']) : ?>
  , <b><?= $product['category_2']['name'] ?></b>
<?php endif ?>
<p>
<a href="index.php?action=add_to_cart&id_product=<?= $product['id'] ?>"><button>Ajouter au panier</button></a><br>
<?php if (productSecurity('edit', $product['id'])) : ?>
<a href="index.php?action=edit_product&id=<?= $product['id'] ?>"><button>Editer</button></a>
<?php endif; ?>
<?php if (productSecurity('delete', $product['id'])) : ?>
<a href="index.php?action=remove_product&id=<?= $product['id'] ?>"><button>Supprimer</button></a>
<?php endif; ?>
</p>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
