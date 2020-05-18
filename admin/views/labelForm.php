
<div class="col bg-light text-left">
	<h3>Formulaire du label</h3>
	<?php if(isset($_SESSION['messages'])): ?>
		<div>
			<?php foreach($_SESSION['messages'] as $message): ?>
				<?= $message ?><br>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<form action="index.php?controller=labels&action=<?= isset($label) || (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='.$_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">
		
		<label for="name">Nom du Label:</label>
		<input  type="text" name="name" id="name" value="<?= isset($label) ? $label['name'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?>" /><br>
		

		<input class="btn btn-success" name="save" type="submit" value="Enregistrer" />
	</form>
</div>


