<?php 
require('models/Label.php');
require('models/Artist.php');


if(isset($_GET['id'])){

    $label = getLabel($_GET['id']);
    
    if($label == false){
        header('Location:index.php');
        exit;
    }

    //Aller cherhcer les artistes liés au label pour affichage dans la vue

    $artists = getArtists($_GET['id']);

    include('views/label.php');

}