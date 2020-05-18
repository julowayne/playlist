
<div class="col-3 bg-light text-left">
	<h3>Formulaire de l'album:</h3>
		<?php if(isset($_SESSION['messages'])): ?>
		<h2>
			<?php foreach($_SESSION['messages'] as $message): ?>
				<?= $message ?><br>
			<?php endforeach; ?>
		</h2>
		<?php endif; ?>
		<form action="index.php?controller=albums&action=<?= isset($album) || (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='.$_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">
			<label for="artist_id">Artiste: </label>
			<select name="artist_id" id="artist_id">
			<?php foreach($artists as $artist): ?>
			<option value="<?= $artist['id'] ?>" <?php if (isset($album) && $album['artist_id'] == $artist['id']): ?> selected="selected" <?php endif;?>><?= $artist['name'] ?></option>
			<?php endforeach;?>
			</select><br>
			
			<label for="name">Album: </label>
			<input type="text" name="name" id="name" value="<?= isset($album) ? $album['name'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?>"><br>

			
			<label for="year">Année: </label>
			<input type="number" name="year" id="year" value="<?= isset($album) ? $album['year'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['year'] : '' ?>"><br>

			<input class="btn btn-success" name="save" type="submit" value="Enregistrer" />
		</form>
</div>




