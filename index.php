<?php
include 'scrapeCoverAlbum.php';
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
  <header>
    <h1 class="text-center my-4">JDW MUSIC</h1>
    <div class="container">
      <div class="row row-cols-4 g-4">
        <?php foreach ($albums as $album) : ?>
          <div class="col text-center">
            <div class="card h-100">
              <img src="<?php echo $album['cover_album_url'] ?>" class="card-img-top" alt="<?php echo $album['title'] ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo $album['title'] ?></h5>
                <p class="card-text"><?php echo $album['artist'] ?></p>
                <p class="card-text"><?php echo $album['publish_year'] ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </header>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>