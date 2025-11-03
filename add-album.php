<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>adding album</title>
</head>

<body>
  <?php include 'header.php'; ?>
  <main class="container text-center">

    <div class="card">
      <div class="card-header">
        <h2>Add album</h2>
      </div>
      <div class="card-body">
        <form action="save-album.php" method="POST">
          <div class="mb-3">
            <label for="artist" class="form-label">Artist</label>
            <input type="text" class="form-control" id="artist" name="artist" required>
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="mb-3">
            <label for="publish_year" class="form-label">Publish Year</label>
            <input type="number" class="form-control" id="publish_year" name="publish_year" required>
          </div>
          <button type="submit" class="btn btn-primary">Save Album</button>
        </form>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>