<?php 

require('models/Artist.php');
require('models/Label.php');
require('models/Song.php');
require('models/Album.php');


if(isset($_GET['action'])){
	switch ($_GET['action']){
		case 'list' :
			$artists = getAllArtists();
			$view = 'views/artistList.php';
			$pageTitle = "Liste de tous les artistes";
			break;
		case 'new' :
			$labels = getAllLabels();
			$view = 'views/artistForm.php';
			$pageTitle = "Ajout d'un artiste";
			break;
		case 'add' :
			if(empty($_POST['name'])){
		
				if(empty($_POST['name'])){
					$_SESSION['messages'][] = 'Le champ nom est obligatoire !';
				}
				
				$_SESSION['old_inputs'] = $_POST;
				header('Location:index.php?controller=artists&action=new');
				exit;
			}
			else{
				$resultAdd = add($_POST);
				
				$_SESSION['messages'][] = $resultAdd ? '<div class="alert alert-success"> Artiste enregistré ! </div>' : '<div class="alert alert-danger"> Erreur lors de l enregistrement de l artiste... :(</div>';
				
				header('Location:index.php?controller=artists&action=list');
				exit;
			}
			break;
		case 'edit' :
			if(!empty($_POST)){
				if(empty($_POST['name'])){
					
					if(empty($_POST['name'])){
						$_SESSION['messages'][] = 'Le champ nom est obligatoire !';
					}
					
					$_SESSION['old_inputs'] = $_POST;
					header('Location:index.php?controller=artists&action=edit&id='.$_GET['id']);
					exit;
				}
		
				else {
					$result = update($_GET['id'], $_POST);
					$_SESSION['messages'][] = $result ? '<div class="alert alert-success"> Artiste mis à jour ! </div>' : '<div class="alert alert-danger"> Erreur lors de la mise à jour de l artiste... :(</div>';
					header('Location:index.php?controller=artists&action=list');
					exit;
				}
			}	
				else {
					if(!isset($_SESSION['old_inputs'])){
						if (isset($_GET['id'])){
							$artist = getArtist($_GET['id']);
							$albums = getAllAlbums();
							$songs = getAllSongs();
							if ($artist == false){
								header('Location:index.php?controller=artists&action=list');
								exit;
							}	
						}
						else {
							header('Location:index.php?controller=artists&action=list');
							exit;
						}
					}
					$labels = getAllLabels();
					$view = 'views/artistForm.php';
					$pageTitle = "Modification d'un artiste";
				}
				break;
		case 'delete' :
			if (isset($_GET['id'])){
				$result = delete( $_GET['id'] );
			}else {
				header('Location:index.php?controller=artists&action=list');
				exit;
			}
			$_SESSION['messages'][] = $result ? '<div class="alert alert-success"> Artiste supprimé ! </div>' : '<div class="alert alert-danger"> Erreur lors de la suppression de l artiste... :(</div>';
		
			header('Location:index.php?controller=artists&action=list');
			exit;
			break;		
        default :
            require('controllers/indexController.php');
	}
}
else{
	require('controllers/indexController.php');
}

