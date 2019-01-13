<?php $title = 'Administration'; ?>
<?php ob_start(); ?>

<header style="text-align:center;">
  <a href="index.php?action=list_users">Utilisateurs</a>
  <a href="index.php?action=list_categories">Categories</a>
  <a href="index.php?action=list_orders">Commandes</a>
  <a href="index.php?action=list_products">Products</a>
</header>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
