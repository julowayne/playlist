<?php

function getSong($id){
    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM songs WHERE id = ?');
    $song = $query->execute([$id]);
    if ($song) {
        return $query->fetch();
    }
    else{
        return false;
    }
}

function getSongs($albumId = false){
    $db = dbConnect();
    if ($albumId != false){
        $query = $db->prepare('SELECT * FROM songs WHERE album_id = ?');
        $query->execute([$albumId]);
        $selectedSongs = $query->fetchAll();
    }
    else{
        $query = $db->query('SELECT * FROM songs ');
        $selectedSongs = $query->fetchAll();
    }
    return $selectedSongs;
}