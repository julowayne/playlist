<?php require ('partials/header.php'); ?>

<div class="col d-flex bg-light text-left justify-content-center">
<table>
  <div>
  <thead>
    <tr>
      <td><h3>Titre</h3></td>
      <td><h3>Artiste</h3></td>
      <td><h3>Album</h3></td>
    </tr>
  </thead>
  </div>
  <?php foreach($songs as $song): ?>
    <tr>
      <td>
        <a href="index.php?p=song&song_id=<?= $song['id'] ?>">
          <?= $song['title'] ?>
        </a>
      </td>
      <td>
        <a href="index.php?p=artist&artist_id=<?= $song['artist_id'] ?>">
          <?php
            $artist = getArtist($song['artist_id']);
            echo $artist['name'];
          ?>
        </a>
      </td>
      <td>
        <a href="index.php?p=album&album_id=<?= $song['album_id'] ?>">
          <?php
            $album = getAlbum($song['album_id']);
            echo $album['name'];
          ?>
        </a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>


