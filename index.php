<?php



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to JDW MUSIC</title>
</head>

<body>
  <pre>
  <?php



  ?>
  </pre>

  <script>
    const onload = <?php echo $scrape_content; ?>;
    const albums = onload.getElementsByTagName('a');
    console.log(albums);
  </script>
</body>

</html>