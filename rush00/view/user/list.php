<?php $title = 'Utilisateurs'; ?>
<?php ob_start(); ?>

<p>
  <a href="index.php?action=register"><button>Creer un utilisateur</button></a>
</p>
<table>
  <tr>
    <th>Pseudo</th>
  </tr>
  <?php foreach ($users as $user): ?>
  <tr>
    <td><?= $user['username'] ?></td>
    <td>
      <a href="index.php?action=edit_user&id=<?= $user['id'] ?>"><button>Editer</button></a>
      <a href="index.php?action=remove_user&id=<?= $user['id'] ?>"><button>Supprimer</button></a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
