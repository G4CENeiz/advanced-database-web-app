<main class="container mt-4">
  <table class="table table-light table-striped table-hover caption-top">
    <caption>List of Pending Approval Loan</caption>
    <thead>
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>ISBN</th>
        <th>Borrower</th>
        <th>Loan Date</th>
        <th>Due Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td> Statistic 101 - for collage </td>
          <td> Prof. Dr.Eng. Aye Dunno B.Sc M.Sc </td>
          <td> 3215469780285 </td>
          <td> Last Name </td>
          <td> 2023-12-1 </td>
          <td> 2023-12-22 </td>
          <td>
            <a href="<?= BASEURL ?>/Staff/returnBook/" class="badge text-bg-success">Approve</a>
            <a href="<?= BASEURL ?>/Staff/returnBook/" class="badge text-bg-danger">Deny</a>
          </td>
        </tr>
    </tbody>
  </table>
  <table class="table table-info table-striped table-hover caption-top">
    <caption>List of Reservation</caption>
    <thead>
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>ISBN</th>
        <th>Borrower</th>
        <th>Reservation Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <tr class="table-light">
          <td> Lorem, ipsum dolor. </td>
          <td> Lorem, ipsum. </td>
          <td> Lorem, ipsum dolor. </td>
          <td> Lorem, ipsum. </td>
          <td> Lorem, ipsum dolor. </td>
          <td>
            <a href="<?= BASEURL ?>/Staff/returnBook/" class="badge text-bg-info">Notify</a>
          </td>
        </tr>
    </tbody>
  </table>
  <table class="table table-light table-striped table-hover caption-top">
    <caption>List of Active Loan</caption>
    <thead>
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>ISBN</th>
        <th>Borrower</th>
        <th>Loan Date</th>
        <th>Due Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td> Lorem, ipsum dolor. </td>
          <td> Lorem, ipsum. </td>
          <td> Lorem, ipsum dolor. </td>
          <td> Lorem, ipsum. </td>
          <td> Lorem, ipsum dolor. </td>
          <td> Lorem, ipsum dolor. </td>
          <td>
            <a href="<?= BASEURL ?>/Staff/returnBook/" class="badge text-bg-warning">Return</a>
          </td>
        </tr>
    </tbody>
  </table>
  <table class="table table-light table-striped table-hover caption-top">
    <caption>List of Over Due Loan</caption>
    <thead>
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>ISBN</th>
        <th>Borrower</th>
        <th>Loan Date</th>
        <th>Due Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td> Lorem, ipsum dolor. </td>
          <td> Lorem, ipsum. </td>
          <td> Lorem, ipsum dolor. </td>
          <td> Lorem, ipsum. </td>
          <td> Lorem, ipsum dolor. </td>
          <td> Lorem, ipsum dolor. </td>
          <td>
            <a href="<?= BASEURL ?>/Staff/returnBook/" class="badge text-bg-danger">Return & Pay</a>
          </td>
        </tr>
    </tbody>
  </table>
  <table class="table table-light table-striped table-hover caption-top">
    <caption>List of Returned Loan</caption>
    <thead>
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>ISBN</th>
        <th>Borrower</th>
        <th>Loan Date</th>
        <th>Due Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td> Lorem, ipsum dolor. </td>
          <td> Lorem, ipsum. </td>
          <td> Lorem, ipsum dolor. </td>
          <td> Lorem, ipsum. </td>
          <td> Lorem, ipsum dolor. </td>
          <td> Lorem, ipsum dolor. </td>
          <td>
            <a href="<?= BASEURL ?>/Staff/returnBook/" class="badge text-bg-warning">Return</a>
          </td>
        </tr>
    </tbody>
  </table>
</main>