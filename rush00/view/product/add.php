<?php $title = 'New product' ?>
<?php ob_start() ?>

<h2>New product</h2>
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
		<option>Choisissez</option>
		<?php foreach ($categories as $category) { ?>
		<option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
		<?php } ?>
	</select>
	<select name="category_2">
		<option>Choisissez</option>
		<?php foreach ($categories as $category) { ?>
		<option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
		<?php } ?>
	</select><br>
	<input type="submit" value="Creer">
</form>

<?php $content = ob_get_clean() ?>
<?php require BASE ?>
