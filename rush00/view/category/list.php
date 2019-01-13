<?php $title = 'Categories'; ?>
<?php ob_start(); ?>

<p>
  <a href="index.php?action=add_category"><button>Creer une categorie</button></a>
</p>
<table>
  <tr>
    <th>Nom</th>
  </tr>
  <?php foreach ($categories as $category): ?>
  <tr>
    <td><?= $category['name'] ?></td>
    <td>
      <a href="index.php?action=edit_category&id=<?= $category['id'] ?>"><button>Editer</button></a>
      <a href="index.php?action=remove_category&id=<?= $category['id'] ?>"><button>Supprimer</button></a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
