<?php require_once '../controller/selectTrackController.php';
 ?>

<form action="/controller/updateTrackController.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="trackId" value="<?php echo $selectTrack['id']?>">
  <input type="text" name="title" value ="<?php echo $selectTrack['title']?>" required><br>
  <input type="text" name="artist" value="<?php echo $selectTrack['artist']?>" required><br>
  <input type="number" name="duration" value="<?php echo $selectTrack['duration']?>" required><br>
  <input type="number" name="year" value="<?php echo $selectTrack['year']?>" required><br>
  <label for="uploadTrackField">Charger la musique (format mp3, wma, mp4)</label>
  <input type="hidden" name="MAX_SIZE_VALUE" value="10000000">
  <input id = "uploadTrackField" type="file" name="uploadFile" value="">
  <input type="submit" name="submit" value ="Valider">
</form>
