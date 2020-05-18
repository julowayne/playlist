<?php

if(!isset($_GET['song_id']) || !ctype_digit($_GET['song_id'])){
  header('Location:index.php');
  exit;
}

require('models/album.php');
require('models/artist.php'); 
require('models/song.php');

$song = getSong($_GET['song_id']);

if($song == false){
  header('Location:index.php');
  exit;
}

include 'views/song.php';
