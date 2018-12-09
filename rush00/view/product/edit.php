<?php $title = 'Editer '.htmlspecialchars($product['name']); ?>
<?php ob_start(); ?>

<h3>Editer : <?= htmlspecialchars($product['name']) ?><h3>
<form method="POST">
	Name<br>
	<input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>"><br>
	Description<br>
	<textarea name="description"><?= htmlspecialchars($product['description']) ?></textarea><br>
	Price<br>
	<input type="text" name="price" value="<?= htmlspecialchars($product['price']) ?>"><br>
	Image<br>
	<input type="text" name="img" value ="<?= htmlspecialchars($product['img']) ?>"><br>
	Category<br>
	<select name="category_1">
		<option value="">Aucun</option>
		<?php foreach ($categories as $category) { ?>
		<option value="<?= $category['id'] ?>" <?php if ($product['category_1'] == $category['id']) { ?>selected<?php }?>><?= $category['name'] ?></option>
		<?php } ?>
	</select>
	<select name="category_2">
		<option value="">Aucun</option>
		<?php foreach ($categories as $category) { ?>
		<option value="<?= $category['id'] ?>" <?php if ($product['category_2'] == $category['id']) { ?>selected<?php }?>><?= $category['name'] ?></option>
		<?php } ?>
	</select><br>
	<input type="submit" value="Editer">
</form>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
