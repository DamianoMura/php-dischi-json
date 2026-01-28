<?php
$new_album = [
  "artist" => '',
  "title" => '',
  "publish_year" => '',
  "cover_album_url" => ''
];
$albums = json_decode(file_get_contents('library.json'), true);
$suggestedSrcAttributes = [];
if (isset($_GET['cover_album_url'])) var_dump($_GET['cover_album_url']);
if ((isset($_GET['artist']) && isset($_GET['title']) && isset($_GET['publish_year']))) {

  if (isset($_GET['cover_album_url'])) {
    $imageIndex = $_GET['cover_album_url'];

    $new_album = [
      "artist" => $_GET['artist'],
      "title" => $_GET['title'],
      "publish_year" => $_GET['publish_year'],
      "cover_album_url" => $_GET['cover_album_url']
    ];
    $albums[] = $new_album;
    file_put_contents('library.json', json_encode($albums));
    header('Location: index.php');
  }

  $new_album = [
    "artist" => $_GET['artist'],
    "title" => $_GET['title'],
    "publish_year" => $_GET['publish_year'],
    "cover_album_url" => ""
  ];
  //scraping first 10 images to choose one from
  $title = $new_album['title'] . " " . $new_album['artist'];
  //sobstituting spaces with + as you would do manually on the browser's query string =)
  $title = str_replace(" ", "+", $title);
  //goes and gets the web page with this query string
  $query_string = "https://www.google.com/search?q=$title&sca_esv=dc724815bbf34a06&hl=it&biw=1136&bih=809&udm=2&sxsrf=AE3TifPnHAOPrhbXWPvBmUst-f08BfK6RQ%3A1761847569586&ei=EakDaazDI7WO9u8P6L2UqAM&ved=0ahUKEwjsj6LUwcyQAxU1h_0HHegeBTUQ4dUDCBQ&uact=5&oq=Back+to+Black&gs_lp=Egtnd3Mtd2l6LWltZyINQmFjayB0byBCbGFjazILEAAYgAQYsQMYgwEyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAEMgsQABiABBixAxiDATIFEAAYgARInQZQAFgAcAB4AJABAJgBlAGgAZQBqgEDMC4xuAEDyAEA-AEC-AEBmAIBoAKYAZgDAJIHAzAuMaAHjQWyBwMwLjG4B5gBwgcDMi0xyAcD&sclient=gws-wiz-img";

  $scrape_content = file_get_contents($query_string);
  $dom = new DOMDocument();
  libxml_use_internal_errors(true);
  $dom->loadHTML($scrape_content);
  libxml_clear_errors();
  $imgtags = $dom->getElementsByTagName('img');
  foreach ($imgtags as $tag) {
    $suggestedSrcAttributes[] = $tag->getAttribute('src');
  }
  //first result is google logo and we need to take it off
  array_shift($suggestedSrcAttributes);
  //grab only 8 results mobile 1 col md 2 cols lg 4 cols
  array_splice($suggestedSrcAttributes, 8);
  // var_dump($suggestedSrcAttributes);


}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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
        <form action="add-album.php" method="GET">
          <div class="mb-3">
            <label for="artist" class="form-label">Artist</label>
            <input type="text" class="form-control" id="artist" name="artist" required value="<?php
                                                                                              if (isset($_GET['artist'])) echo $_GET['artist'] ?>">
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required value="<?php
                                                                                            if (isset($_GET['title'])) echo $_GET['title'] ?>">
          </div>
          <div class="mb-3">
            <label for="publish_year" class="form-label">Publish Year</label>
            <input type="number" class="form-control" id="publish_year" name="publish_year" required value="<?php
                                                                                                            if (isset($_GET['publish_year'])) echo $_GET['publish_year'] ?>">
          </div>

          <?php if (sizeof($suggestedSrcAttributes) > 0) {
          ?>
            <div class="container">
              <span>Choose between Google image search results</span>
              <div class="row">
                <div class="col-12">
                  <div class="input-group">

                    <?php foreach ($suggestedSrcAttributes as $index => $src): ?>
                      <div class="col-md-3 col-6 p-2">
                        <div class="card position-relative h-100">
                          <img src="<?php echo $src ?>" class="card-img-top" alt="result <?php echo $index ?> from google">
                          <div class="card-body p-2 text-center">
                            <div class="form-check m-0">
                              <input class="form-check-input" type="radio"
                                name="cover_album_url"
                                id="imageRadio<?php echo $index ?>"
                                value="<?php echo $src ?>">
                              <label class="form-check-label small" for="imageRadio<?php echo $index ?>">
                                Result <?php echo $index + 1 ?>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach;
                    if (isset($_GET['cover_album_url'])) var_dump($_GET['cover_album_url']); ?>



                  </div>
                <?php
              }
                ?>




                <button type="submit" class="btn btn-primary"><?php
                                                              if (sizeof($suggestedSrcAttributes) === 0) {
                                                                echo 'Search Album Cover';
                                                              } else
                                                                echo 'Store New Album';
                                                              ?>
                </button>
        </form>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>