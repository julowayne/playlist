<?php 

require('models/Artist.php');
require('models/Label.php');
require('models/Song.php');
require('models/Album.php');


if(isset($_GET['action'])){
	switch ($_GET['action']){
		case 'list' :
            $songs = getAllSongs();
			$view = 'views/songList.php';
			$pageTitle = "Liste de toutes les chansons";
			break;
		case 'new' :
			$albums = getAllAlbums();
			$artists = getAllArtists();
			$view = 'views/songForm.php';
			$pageTitle = "Ajout d'une chanson";
			break;
		case 'add' :
			if(!empty($_POST)){
					if(empty($_POST['title']) || empty($_POST['artist_id'])){
			
					if(empty($_POST['title'])){
						$_SESSION['messages'][] = 'Le champ titre est obligatoire !';
					}
					if(empty($_POST['artist_id'])){
						$_SESSION['messages'][] = 'Le champ artiste est obligatoire !';
					}
					
					$_SESSION['old_inputs'] = $_POST;
					header('Location:index.php?controller=songs&action=new');
					exit;
				}
				else{
					$resultAdd = addSong($_POST);
					
					$_SESSION['messages'][] = $resultAdd ? '<div class="alert alert-success"> Chanson enregistrée ! </div>' : '<div class="alert alert-danger"> Erreur lors de l enregistrement de la chanson... :(</div>';
					
					header('Location:index.php?controller=songs&action=list');
					exit;
				}
		}
			break;
		case 'edit' :	
			if(!empty($_POST)){
				if(empty($_POST['title']) || empty($_POST['artist_id'])){
					
				 	if(empty($_POST['title'])){
						$_SESSION['messages'][] = 'Le champ titre est obligatoire !';
					}
					if(empty($_POST['artist_id'])){
						$_SESSION['messages'][] = 'Le champ artist est obligatoire !';
					}
					
					$_SESSION['old_inputs'] = $_POST;
					header('Location:index.php?controller=songs&action=edit&id='.$_GET['id']);
					exit;
				}
		
				else {
					$result = updateSong($_GET['id'], $_POST);
					$_SESSION['messages'][] = $result ? '<div class="alert alert-success"> Chanson mise à jour ! </div>' : '<div class="alert alert-danger"> Erreur lors de la mise à jour de la chanson... :(</div>';
					header('Location:index.php?controller=songs&action=list');
					exit;
				}
			}	
				else {
					if(!isset($_SESSION['old_inputs'])){
						if (isset($_GET['id'])){
							$albums = getAllAlbums();
							$artists = getAllArtists();
							$song = getSong($_GET['id']);
							if ($song == false){
								header('Location:index.php?controller=songs&action=list');
								exit;
							}	
						}
						else {
							header('Location:index.php?controller=songs&action=list');
							exit;
						}
					}
					$view = 'views/songForm.php';
					$pageTitle = "Modification d'une chanson";
				}
				break;
		case 'delete':
			if (isset($_GET['id'])){
				$result = deleteSong( $_GET['id'] );
			}else {
				header('Location:index.php?controller=songs&action=list');
				exit;
			}
			$_SESSION['messages'][] = $result ? '<div class="alert alert-success"> Chanson supprimé ! </div>' : '<div class="alert alert-danger"> Erreur lors de la suppression de la chanson... :(</div>';
		
			header('Location:index.php?controller=songs&action=list');
			exit;
			break; 		
        default :
            require('controllers/indexController.php');
	}
}
else{
	require('controllers/indexController.php');
}


