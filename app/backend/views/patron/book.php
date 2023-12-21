<main class="container mt-4">
  <h2>Book List</h2>
  <div class="my-3">
    <form action="<?= BASEURL ?>/Patron/searchBook" method="post">
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
            <?php
              if ($book['QuantityAvailable'] > 0) {
                echo '<a href="' . BASEURL . '/Patron/borrowBook/' . $book['BookID'] . '" class="badge text-bg-success">Borrow</a>';
              }
            ?>
            <a href="<?= BASEURL ?>/Patron/reserveBook/<?= $book['BookID'] ?>" class="badge text-bg-primary">Reserve</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>