<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Playlist</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php require ('partials/header.php'); ?>

<div class="col bg-light text-left">
<a class="btn btn-primary shadow-sm btn-sm" href="index.php">retour à l'index</a>
<p>Chanson : <?= $song['title'] ?></p>
<p>Artiste :
  <a href="index.php?p=artist&artist_id=<?= $song['artist_id'] ?>">
    <?php
      $artist = getArtist($song['artist_id']);
      echo $artist['name'];
    ?>
  </a>
</p>
<p>Album :
  <a href="index.php?p=album&album_id=<?= $song['album_id'] ?>">
    <?php
      $album = getAlbum($song['album_id']);
      echo $album['name'];
    ?>
  </a>
</p>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
