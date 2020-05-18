<?php
if(!isset($_GET['album_id']) || !ctype_digit($_GET['album_id'])){
  header('Location:index.php');
  exit;
}

require('models/album.php');
require('models/artist.php');
require('models/song.php');

$album = getAlbum($_GET['album_id']);

if($album == false){
  header('Location:index.php');
  exit;
}

$artist = getArtist($album['artist_id']);

$songs = getSongs($album['id']);

include 'views/album.php';
