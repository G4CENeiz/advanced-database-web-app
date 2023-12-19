<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light bg-light mb-0">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= BASEURL ?>/home"><img src="<?= BASEURL ?>/img/logo.png" alt="Your Brand Logo" style="max-width: 150px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?= BASEURL ?>/home/login">Log in</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div id="content">
  <div class="container mt-3" id="flasher-container">
    <?= Flasher::flash(); ?>
  </div>