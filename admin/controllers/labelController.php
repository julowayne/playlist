<?php 

require('models/Artist.php');
require('models/Label.php');
require('models/Song.php');
require('models/Album.php');

if(isset($_GET['action'])){
	switch ($_GET['action']){
		case 'list' :
            $labels = getAllLabels();
			$view = 'views/labelList.php';
			$pageTitle = "Liste de tous les labels";
			break;
		case 'new' :
			$labels = getAllLabels();
			$view = 'views/labelForm.php';
			$pageTitle = "Ajout d'un label";
			break;
		case 'add' :
			if(empty($_POST['name'])){
		
				if(empty($_POST['name'])){
					$_SESSION['messages'][] = 'Le champ label est obligatoire !';
				}
				$_SESSION['old_inputs'] = $_POST;
				header('Location:index.php?controller=labels&action=new');
				exit;
			}
			else{
				$resultAddLabel = addLabel($_POST);
				
				$_SESSION['messages'][] = $resultAddLabel ? '<div class="alert alert-success"> Label enregistré ! </div>' : '<div class="alert alert-danger"> Erreur lors de l enregistrement du Label... :(</div>';
				
				header('Location:index.php?controller=labels&action=list');
				exit;
			}
			break;
		case 'edit' :
			if(!empty($_POST)){
				if( empty($_POST['name'])){
		
					if(empty($_POST['name'])){
						$_SESSION['messages'][] = 'Le champ label est obligatoire !';
					}
					
					$_SESSION['old_inputs'] = $_POST;
					header('Location:index.php?controller=labels&action=edit&id='.$_GET['id']);
					exit;
				}
		
				else {
					$result = updateLabel($_GET['id'], $_POST);
					$_SESSION['messages'][] = $result ? '<div class="alert alert-success"> Label mis à jour ! </div>' : '<div class="alert alert-danger"> Erreur lors de la mise à jour de l album... :(</div>';
					header('Location:index.php?controller=labels&action=list');
					exit;
				}
			}	
				else {
					if(!isset($_SESSION['old_inputs'])){
						if (isset($_GET['id'])){
							$label = getLabel($_GET['id']);
							if ($label == false){
								header('Location:index.php?controller=labels&action=list');
								exit;
							}	
						}
						else {
							header('Location:index.php?controller=labels&action=list');
							exit;
						}
					}
					$labels = getAllLabels();
					$view = 'views/labelForm.php';
					$pageTitle = "Modification d'un label";
				}
			break;	
		case 'delete' :
			if (isset($_GET['id'])){
				$result = deleteLabel( $_GET['id'] );
			}else {
				header('Location:index.php?controller=labels&action=list');
				exit;
			}
			$_SESSION['messages'][] = $result ? '<div class="alert alert-success"> Label supprimé ! </div>' : '<div class="alert alert-danger"> Erreur lors de la suppression du label... :(</div>';
		
			header('Location:index.php?controller=labels&action=list');
			exit;
			break;	
        default :
            require('controllers/indexController.php');
	}
}
else{
	require('controllers/indexController.php');
}
