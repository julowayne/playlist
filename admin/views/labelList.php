
<div class="col text-left">
<h3>Liste des labels <a class="btn btn-primary btn-sm" href="index.php?controller=labels&action=new" type="button"> Ajouter un label</a></h3>
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
		<?php foreach($labels as $label): ?>
		<p><?=  htmlspecialchars($label['name']) ?> 
		<a class="btn btn-warning"  href="index.php?controller=labels&action=edit&id=<?= $label['id'] ?>" type="button">Modifier</a>
		<a onclick="return confirm('êtes vous sur ?')" class="btn btn-danger" href="index.php?controller=labels&action=delete&id=<?= $label['id'] ?>"type="button">Supprimer</a></p>
		<?php endforeach; ?>
	</div>
</div>


