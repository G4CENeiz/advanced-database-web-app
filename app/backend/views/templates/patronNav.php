<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light bg-light mb-0">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= BASEURL ?>"><img src="<?= BASEURL ?>/img/logo.png" alt="Your Brand Logo" style="max-width: 150px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?= BASEURL ?>/patron">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASEURL ?>/patron/book">Book List</a>
        </li>
        <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#logOutModal">
          Logout
        </button>
      </ul>
    </div>
  </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="logOutModal" tabindex="-1" aria-labelledby="logOutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="logOutModalLabel">Logout</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?= BASEURL ?>/patron/logout">Confirm</a>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <div class="container mt-3" id="flasher-container">
    <?= Flasher::flash(); ?>
  </div>