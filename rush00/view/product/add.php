<?php $title = 'New product' ?>
<?php ob_start() ?>

<h2>New product</h2>
<form method="POST">
	Name<br>
	<input type="text" name="name"><br>
	Description<br>
	<textarea name="description"></textarea><br>
	Image<br>
	<input type="text" name="img"><br>
	Category<br>
	<select name="category_1">
		<?php foreach ($categories as $category) { ?>
		<option value="<?= $categorie['id'] ?>"><?= $categorie['name'] ?></option>
		<?php } ?>
	</select><br>
	Category<br>
	<select name="category_2">
		<?php foreach ($categories as $category) { ?>
		<option value="<?= $categorie['id'] ?>"><?= $categorie['name'] ?></option>
		<?php } ?>
	</select><br>
</form>

<?php $content = ob_get_clean() ?>
<?php require BASE ?>
