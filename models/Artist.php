<?php
function getArtists($artistId = null){
    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM artists');
    $query->execute([$artistId]);
    $getArtists = $query->fetchAll();
    return $getArtists;
}
function getArtist($id){
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM artists WHERE id = ?');
    $artist = $query->execute([$id]);
    if ($artist) {
        return $query->fetch();
    }
    else{
        return false;
    }
}

function getArtistLabel($labelId){

    $db = dbConnect();


        $query = $db->prepare("
        
        SELECT a.* 
        FROM artists a
        INNER JOIN labels l ON l.id = a.label_id
        WHERE a.label_id = ?
        ");
        $query->execute([
            $labelId,
        ]);
    return $query->fetchAll();
} 