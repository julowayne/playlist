<?php 

require('models/Artist.php');
require('models/Label.php');
require('models/Song.php');
require('models/Album.php');

if(isset($_GET['action'])){
	switch ($_GET['action']){
		case 'list' :
			$albums = getAllAlbums();
			$view = 'views/albumList.php';
			$pageTitle = "Liste de tous les albums";
			break;
		case 'new' :
			$labels = getAllLabels();
			$artists = getAllArtists();
			$albums = getAllAlbums();
			$view = 'views/albumForm.php';
			$pageTitle = "Ajout d'un album";
			break;
		case 'add' :
			if($_GET['action'] == 'add'){
	
				if(empty($_POST['name'])){
					
					/* if(empty($_POST['name'])){
						$_SESSION['messages'][] = 'Le champ nom est obligatoire !';
					} */
					
					$_SESSION['old_inputs'] = $_POST;
					header('Location:index.php?controller=albums&action=new');
					exit;
				}
				else{
					$resultAdd = addAlbum($_POST);
					
					$_SESSION['messages'][] = $resultAdd ? '<div class="alert alert-success"> Album enregistré ! </div>' : '<div class="alert alert-danger"> Erreur lors de l enregistrement de l album... :(</div>';
					
					header('Location:index.php?controller=albums&action=list');
					exit;
				}
			}
			break;	
		case 'edit' :
			if(!empty($_POST)){
				if(empty($_POST['name'])){
					
					    if(empty($_POST['name'])){
						$_SESSION['messages'][] = 'Le champ nom est obligatoire !';
					}
					$_SESSION['old_inputs'] = $_POST;
					header('Location:index.php?controller=albums&action=edit&id='.$_GET['id']);
					exit;
				}
		
				else {
					$result = updateAlbum($_GET['id'], $_POST);
					$_SESSION['messages'][] = $result ? '<div class="alert alert-success"> Album mis à jour ! </div>' : '<div class="alert alert-danger"> Erreur lors de la modification de l album... :(</div>';
					header('Location:index.php?controller=albums&action=list');
					exit;
				}
			}	
				else {
					if(!isset($_SESSION['old_inputs'])){
						if (isset($_GET['id'])){
							$artists = getAllArtists();
							$album = getAlbum($_GET['id']);
							if ($album == false){
								header('Location:index.php?controller=albums&action=list');
								exit;
							}	
						}
						else {
							header('Location:index.php?controller=albums&action=list');
							exit;
						}
					}
					$view = 'views/albumForm.php';
					$pageTitle = "Modification d'un album";
				}
			break;
		case 'delete' :
			if (isset($_GET['id'])){
				$result = deleteAlbum( $_GET['id'] );
			}else {
				header('Location:index.php?controller=albums&action=list');
				exit;
			}
			$_SESSION['messages'][] = $result ? '<div class="alert alert-success"> Album supprimé ! </div>' : '<div class="alert alert-danger"> Erreur lors de la suppression de l album... :(</div>';
		
			header('Location:index.php?controller=albums&action=list');
			exit;	
			break;	
        default :
            require('controllers/indexController.php');
	}
}
else{
	require('controllers/indexController.php');
}


