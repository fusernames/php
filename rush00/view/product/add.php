<?php $title = 'Nouveau produit' ?>
<?php ob_start() ?>

<form method="POST">
	Name<br>
	<input type="text" name="name"><br>
	Description<br>
	<textarea name="description"></textarea><br>
	Price<br>
	<input type="text" name="price"><br>
	Image<br>
	<input type="text" name="img"><br>
	Category<br>
	<select name="category_1">
		<option value="">Aucun</option>
		<?php foreach ($categories as $category) { ?>
		<option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
		<?php } ?>
	</select>
	<select name="category_2">
		<option value="">Aucun</option>
		<?php foreach ($categories as $category) { ?>
		<option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
		<?php } ?>
	</select><br>
	<input type="submit" value="Creer">
</form>

<?php $content = ob_get_clean() ?>
<?php require BASE ?>
