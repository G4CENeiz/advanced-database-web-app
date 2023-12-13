<main class="container mt-4">
  <table class="table" data-toggle="table" data-sortable="true" data-pagination="true" data-search="true" data-show-columns="true">
    <thead>
      <tr>
        <th data-field="title" data-sortable="true">Title</th>
        <th data-field="isbn" data-sortable="true">ISBN</th>
        <th data-field="author" data-sortable="true">Author</th>
        <th data-field="genre" data-sortable="true">Genre</th>
        <th data-field="publicationYear" data-sortable="true">Publication Year</th>
        <th data-field="availableAmount" data-sortable="true">Available Amount</th>
      </tr>
    </thead>
    <tbody>
      <!-- Add your book data here as rows -->
      <tr data-id="1" data-title="Book 1" data-isbn="1234567890" data-author="Author 1" data-genre="Fiction" data-publicationYear="2022" data-availableAmount="10">
        <td>Book 1</td>
        <td>1234567890</td>
        <td>Author 1</td>
        <td>Fiction</td>
        <td>2022</td>
        <td>10</td>
      </tr>
      <tr data-id="2" data-title="Book 2" data-isbn="0987654321" data-author="Author 2" data-genre="Non-Fiction" data-publicationYear="2021" data-availableAmount="5">
        <td>Book 2</td>
        <td>0987654321</td>
        <td>Author 2</td>
        <td>Non-Fiction</td>
        <td>2021</td>
        <td>5</td>
      </tr>
      <!-- Add more rows as needed -->
    </tbody>
  </table>
</main>