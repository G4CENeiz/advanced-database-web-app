<main class="container mt-4">
  <table class="table table-light table-striped table-hover caption-top">
    <caption>List of Pending Approval Loan</caption>
    <thead>
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>ISBN</th>
        <th>Borrower</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $data['pending'] as $loan ) : ?>
        <tr>
          <td> <?= $loan['Title'] ?> </td>
          <td> <?= $loan['Author'] ?> </td>
          <td> <?= $loan['ISBN'] ?> </td>
          <td> <?= $loan['FirstName'] ?> <?= $loan['LastName'] ?> </td>
          <td>
            <a href="<?= BASEURL ?>/Staff/approveLoan/<?= $loan['LoanId'] ?>" class="badge text-bg-success approve-modal" data-id="<?= $loan['LoanId'] ?>" data-bs-toggle="modal" data-bs-target="#approving">Approve</a>
            <a href="<?= BASEURL ?>/Staff/denyLoan/<?= $loan['LoanId'] ?>" class="badge text-bg-danger">Deny</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <table class="table table-light table-striped table-hover caption-top">
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
      <?php foreach( $data['reserve'] as $reserve ) : ?>
        <tr>
          <td> <?= $reserve['Title'] ?> </td>
          <td> <?= $reserve['Author'] ?> </td>
          <td> <?= $reserve['ISBN'] ?> </td>
          <td> <?= $reserve['FirstName'] ?> <?= $reserve['LastName'] ?> </td>
          <td> <?= $reserve['ReservationDate'] ?> </td>
          <td>
            <a href="<?= BASEURL ?>/Staff/notifyReservation/<?= $reserve['PatronId'] ?>" class="badge text-bg-info">Notify</a>
          </td>
        </tr>
      <?php endforeach; ?>
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
      <?php foreach( $data['active'] as $active ) : ?>
        <tr>
          <td> <?= $active['Title'] ?> </td>
          <td> <?= $active['Author'] ?> </td>
          <td> <?= $active['ISBN'] ?> </td>
          <td> <?= $active['FirstName'] ?> <?= $active['LastName'] ?> </td>
          <td> <?= $active['LoanDate'] ?> </td>
          <td> <?= $active['LoanDueDate'] ?> </td>
          <td>
            <a href="<?= BASEURL ?>/Staff/returnBook/<?= $active['LoanId'] ?>" class="badge text-bg-warning">Return</a>
          </td>
        </tr>
      <?php endforeach; ?>
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
        <th>Fine Amount</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $data['overdue'] as $overdue ) : ?>
        <tr>
          <td> <?= $overdue['Title'] ?> </td>
          <td> <?= $overdue['Author'] ?> </td>
          <td> <?= $overdue['ISBN'] ?> </td>
          <td> <?= $overdue['FirstName'] ?> <?= $overdue['LastName'] ?> </td>
          <td> <?= $overdue['LoanDate'] ?> </td>
          <td> <?= $overdue['LoanDueDate'] ?> </td>
          <td> <?= $overdue['Amount'] ?> </td>
          <td>
            <a href="<?= BASEURL ?>/Staff/returnFine/<?= $overdue['LoanId'] ?>" class="badge text-bg-danger">Return & Pay</a>
          </td>
        </tr>
      <?php endforeach; ?>
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
        <th>Return Date</th>
        <th>Fine Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $data['returned'] as $returned ) : ?>
        <tr>
          <td> <?= $returned['Title'] ?> </td>
          <td> <?= $returned['Author'] ?> </td>
          <td> <?= $returned['ISBN'] ?> </td>
          <td> <?= $returned['FirstName'] ?> <?= $returned['LastName'] ?> </td>
          <td> <?= $returned['LoanDate'] ?> </td>
          <td> <?= $returned['ReturnDate'] ?> </td>
          <td> <?= $returned['Amount'] ?> </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>

<!-- Modal -->
<div class="modal fade" id="approving" tabindex="-1" aria-labelledby="approvingLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="approvingLabel">Approval Due Date</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- ... -->
        <form action="<?= BASEURL ?>/staff/approveLoan" method="post">
          <input type="hidden" name="loanid" id="loanid">
        <div class="mb-3">
          <label for="period" class="form-label">Lending Period</label>
          <input type="text" class="form-control" id="period" name="period" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        <button type="submit" class="btn btn-primary">Approve</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="<?= BASEURL ?>/js/script.staff.loan.js"></script>