<main class="container mt-4">
  <div class="d-flex justify-content-between">
    <h2>Book List</h2>
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search Book" name="keyword" id="keyword" aria-label="Search Book" aria-describedby="searchButton" autocomplete="off">
      <button class="btn btn-primary" type="submit" id="searchButton">Button</button>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary add-book" data-bs-toggle="modal" data-bs-target="#formModal">
      Add Book
    </button>
  </div>
  <table class="table" data-toggle="table" data-sortable="true" data-pagination="true" data-search="true" data-show-columns="true">
    <thead>
      <tr>
        <th data-field="title" data-sortable="true">Title</th>
        <th data-field="isbn" data-sortable="true">ISBN</th>
        <th data-field="author" data-sortable="true">Author</th>
        <th data-field="genre" data-sortable="true">Genre</th>
        <th data-field="publicationYear" data-sortable="true">Publication Year</th>
        <th data-field="availableAmount" data-sortable="true">Available Amount</th>
        <th>Modify</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $data['books'] as $book ) : ?>
        <tr data-id="<?= $book['BookID'] ?>" data-title="<?= $book['Title'] ?>" data-isbn="<?= $book['ISBN'] ?>" data-author="<?= $book['Author'] ?>" data-genre="<?= $book['Genre'] ?>" data-publicationYear="<?= $book['PublicationYear'] ?>" data-availableAmount="<?= $book['QuantityAvailable'] ?>">
          <td> <?= $book['Title'] ?> </td>
          <td> <?= $book['ISBN'] ?> </td>
          <td> <?= $book['Author'] ?> </td>
          <td> <?= $book['Genre'] ?> </td>
          <td> <?= $book['PublicationYear'] ?> </td>
          <td> <?= $book['QuantityAvailable'] ?> </td>
          <td>
            <a href="<?= BASEURL ?>/table/delete/<?= $book['BookID'] ?>" class="badge text-bg-danger">Delete</a>
            <a href="<?= BASEURL ?>/table/edit/<?= $book['BookID'] ?>" class="badge text-bg-primary editModal" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $book['BookID'] ?>">Edit</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>



<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="formModalLabel">Add Book</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- ... -->
        <form action="<?= BASEURL ?>/table/add" method="post">
          <input type="hidden" name="id" id="id">
          <div class="form-group mb-3">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter the title of the book" required
            />
          </div>
          <div class="form-group mb-3">
            <label for="author">Author:</label>
            <input type="text" class="form-control" id="author" name="author" placeholder="Enter the author of the book" required
            />
          </div>
          <div class="form-group mb-3">
            <label for="isbn">ISBN:</label>
            <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Enter the ISBN of the book" required
            />
          </div>
          <div class="form-group mb-3">
            <label for="genre">Genre:</label>
            <input type="text" class="form-control" id="genre" name="genre" placeholder="Enter the genre of the book" required
            />
          </div>
          <div class="form-group mb-3">
            <label for="publicationYear">Publication Year:</label>
            <input type="text" class="form-control" id="publicationYear" name="publicationYear" placeholder="Enter the publication year of the book" required
            />
          </div>
          <div class="form-group mb-3">
            <label for="quantity">Quantity:</label> 
            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter the quantity of the book" required
            />
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>