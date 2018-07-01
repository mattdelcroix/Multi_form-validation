<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Search</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/form.css">
</head>
<body>

      <?php
        require 'navbar.html';
        require 'jumbotron.html';
      ?>

    <!-- Insert the content tin the template -->
    <div class="container">
      <?= $content ?>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/array.js"></script>
  <script src="js/functions.js"></script>
  <script src="js/addEvent.js"></script>
</body>
</html>
