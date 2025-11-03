<?php


$albums = json_decode(file_get_contents('library.json'), true);

if ($albums[count($albums) - 1]["cover_album_url"] == "") {
  include './scrapeCoverAlbum.php';
  $albums = json_decode(file_get_contents('library.json'), true);
}
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
  <header>
    <h1 class="text-center my-4">JDW MUSIC</h1>

  </header>
  <main>
    <div class="container">
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