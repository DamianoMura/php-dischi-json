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
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-3">
            <div class="card h-100">
              <div class="card-header d-flex flex-col">
                <span><?php echo $album["artist"] ?></span>
              </div>
              <div class="card-body">
                <img src=<?php echo $album["cover_album_url"] ?> alt=<?php echo $album["title"] ?> class="img-fluid me-3">
              </div>
              <div class="card-footer">

                <span><?php echo $album["title"] ?></span>
                <span>(<?php echo $album["publish_year"] ?>)</span>

              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>