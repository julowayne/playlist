<?php

require('models/album.php');
require('models/artist.php');
require('models/song.php');


$songs = getSongs();

include 'views/index.php';
