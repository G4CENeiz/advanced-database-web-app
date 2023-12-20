<main class="container mt-4">
  <div class="d-flex justify-content-between">
    <h2>Patron List</h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary add-book" data-bs-toggle="modal" data-bs-target="#formModal">
      Add Patron
    </button>
  </div>
  <table class="table table-light table-striped table-hover caption-top">
    <caption>List of Patron</caption>
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Username</th>
        <th>Password</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $data['patrons'] as $patron ) : ?>
        <tr>
          <td> <?= $patron['FirstName'] ?> </td>
          <td> <?= $patron['LastName'] ?> </td>
          <td> <?= $patron['Email'] ?> </td>
          <td> <?= $patron['PhoneNumber'] ?> </td>
          <td> <?= $patron['Username'] ?> </td>
          <td> <?= $patron['Password'] ?> </td>
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
        <h1 class="modal-title fs-5" id="formModalLabel">Add Patron</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- ... -->
        <form action="<?= BASEURL ?>/Staff/addPatron" method="post">
          <div class="form-group mb-3">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter the username" required
            />
          </div>
          <div class="form-group mb-3">
            <label for="password">Password:</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="Enter the password" required
            />
          </div>
          <div class="form-group mb-3">
            <label for="fname">First Name:</label>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter the First Name" required
            />
          </div>
          <div class="form-group mb-3">
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter the Last Name" required
            />
          </div>
          <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter the email" required
            />
          </div>
          <div class="form-group mb-3">
            <label for="phonenumber">Phone Number:</label> 
            <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Enter the Phone Number" required
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