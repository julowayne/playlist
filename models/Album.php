<?php
function getAlbums($artistId = false){
    $db = dbConnect();
  if($artistId != false){
      $query = $db->prepare('SELECT * FROM albums WHERE artist_id = ?');
      $query->execute([$artistId]);
      $selectedAlbums = $query->fetchAll();
    }
  else {
      $query = $db->query('SELECT * FROM albums');
      $selectedAlbums = $query->fetchAll();
  }
  return $selectedAlbums;
}

function getAlbum($id){
    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM albums WHERE id = ?');
    $album = $query->execute([$id]);
    if ($album) {
        return $query->fetch();
    }
    else{
        return false;
    }
}
