<main class="container mt-4">
  <div class="d-flex justify-content-between">
    <h2>Book List</h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary add-book" data-bs-toggle="modal" data-bs-target="#formModal">
      Add Book
    </button>
  </div>
  <div class="my-3">
    <form action="<?= BASEURL ?>/Staff/searchBook" method="post">
      <div class="input-group">
        <input type="text" class="form-control col-10" placeholder="Search Book" name="keyword" id="keyword" aria-label="Search Book" aria-describedby="searchButton" autocomplete="off">
        <div class="col-1">
          <select class="form-select" id="column" name="column" required>
            <option value="Title">Title</option>
            <option value="Author">Author</option>
            <option value="ISBN">ISBN</option>
          </select>
        </div>
        <button class="btn btn-primary col-1" type="submit" id="searchButton">Search</button>
      </div>
    </form>
  </div>
  <table class="table table-light table-striped table-hover caption-top">
    <caption>List of Book</caption>
    <thead>
      <tr>
        <th>Title</th>
        <th>ISBN</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Publication Year</th>
        <th>Available Amount</th>
        <th>Book Total</th>
        <th>Modify</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $data['books'] as $book ) : ?>
        <tr>
          <td> <?= $book['Title'] ?> </td>
          <td> <?= $book['ISBN'] ?> </td>
          <td> <?= $book['Author'] ?> </td>
          <td> <?= $book['Genre'] ?> </td>
          <td> <?= $book['PublicationYear'] ?> </td>
          <td> <?= $book['QuantityAvailable'] ?> </td>
          <td> <?= $book['QuantityTotal'] ?> </td>
          <td>
            <a href="<?= BASEURL ?>/Staff/deleteBook/<?= $book['BookID'] ?>" class="badge text-bg-danger">Delete</a>
            <a href="<?= BASEURL ?>/Staff/editBook/<?= $book['BookID'] ?>" class="badge text-bg-primary editModal" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $book['BookID'] ?>">Edit</a>
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
        <form action="<?= BASEURL ?>/Staff/addBook" method="post">
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

<script src="<?= BASEURL ?>/js/script.staff.book.js"></script>