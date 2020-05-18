<?php
if(!isset($_GET['artist_id']) || !ctype_digit($_GET['artist_id'])){
  header('Location:index.php');
  exit;
}

require('models/album.php');
require('models/artist.php');

$artist = getArtist($_GET['artist_id']);

if($artist == false){
  header('Location:index.php');
  exit;
}

$albums = getAlbums($artist['id']);

// Pour cette fonction, je n'ai pas réussi a afficher les labels liés au artistes, j'ai essayé pleins de choses mais j'arrivais plus a réfléchir au bout d'un moment :(
$artist_labels = getArtistLabel($_GET['artist_id']);

include 'views/artist.php';
