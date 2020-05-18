
<div class="col-3 text-left">
	<h3>Liste des albums <a class="btn btn-primary btn-sm" href="index.php?controller=albums&action=new" type="button">Ajouter un album</a></h3>
	<?php if(isset($_SESSION['messages'])): ?>
		<h2>
			<?php foreach($_SESSION['messages'] as $message): ?>
				<?= $message ?><br>
			<?php endforeach; ?>
		</h2>
	<?php endif; ?>
</div>
<div class="col bg-light text-left">
	<div class="col-4 py-3">
			<?php foreach($albums as $album): ?>
				<p>Album : <?=  htmlspecialchars($album['name']) ?>
				<a class="btn btn-warning shadow-sm" href="index.php?controller=albums&action=edit&id=<?= $album['id'] ?>" role="button">Modifier</a>
				<a onclick="return confirm('êtes vous sur ?')" class="btn btn-danger shadow-sm"  href="index.php?controller=albums&action=delete&id=<?= $album['id'] ?>" role="button">Supprimer</a></p>
			<?php endforeach; ?>
	</div>
</div>
