<?php

$empties = false;
$albums = json_decode(file_get_contents('library.json'), true);
foreach ($albums as $album) {
  if ($album["cover_album_url"] === "") {
    $empties = true;
  }
}
if ($empties) {
  include 'scrapeCoverAlbum.php';
}
$albums = json_decode(file_get_contents('library.json'), true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to JDW MUSIC</title>
</head>

<body>
  <?php include 'header.php'; ?>
  <main>
    <div class="container">
      <div class="add-album mb-4 text-center">
        <a class="btn btn-primary" href="./add-album.php">add new album</a>
      </div>
      <div class="row">
        <?php foreach ($albums as $album) : ?>
          <div class="col-12 text-center mb-4">
            <div class="d-flex align-items-center">
              <img src=<?php echo $album["cover_album_url"] ?> alt=<?php echo $album["title"] ?> class="img-fluid me-3">
              <h3><?php echo $album["artist"] ?></h3>
              <span>&nbsp;-&nbsp;</span>
              <h4><?php echo $album["title"] ?></h4>
              <h5>(<?php echo $album["publish_year"] ?>)</h5>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>