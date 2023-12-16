<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= BASEURL ?>/img/fav.png" type="image/x-icon">
    <title>Library - <?= $data['title']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light bg-light mb-0">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= BASEURL ?>"><img src="<?= BASEURL ?>/img/logo.png" alt="Your Brand Logo" style="max-width: 150px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?= BASEURL ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASEURL ?>/table">Book List</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div id="content">