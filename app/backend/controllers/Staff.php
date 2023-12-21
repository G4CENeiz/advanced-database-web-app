<?php
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'staff') {
    session_destroy();
    header('Location: ' . BASEURL . "/");
    Flasher::setFlash('Unauthorized', 'access', 'detected. proceed to logout by force', 'danger');
    exit;
}

class Staff extends Controller {
    public function index() {
        $data['title'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('templates/staffNav', $data);
        $this->view('staff/index');
        $this->view('templates/footer');
    }
    public function book() {
        $data['title'] = 'Book List';
        $data['books'] = $this->model('BookModel')->getAllBooks();
        $this->view('templates/header', $data);
        $this->view('templates/staffNav');
        $this->view('staff/book', $data);
        $this->view('templates/footer');
    }

    public function manageLoan() {
        $data['title'] = 'Loans';
        $this->model('FineModel')->assessFine();
        $data['pending'] = $this->model('LoanModel')->getPendingLoan();
        $data['reserve'] = $this->model('ReservationModel')->getAllReservation();
        $data['active'] = $this->model('LoanModel')->getActiveLoan();
        $data['overdue'] = $this->model('LoanModel')->getOverDueLoan();
        $data['returned'] = $this->model('LoanModel')->getReturnedLoan();
        $this->view('templates/header', $data);
        $this->view('templates/staffNav');
        $this->view('staff/loan', $data);
        $this->view('templates/footer');
    }

    public function approveLoan() {
        // var_dump($_POST);
        if ($this->model('LoanModel')->approveLoan($_POST['loanid'], $_POST['period']) > 0) {
            $this->flasherRoute('Loan', 'successfully', 'approved', 'success', '/staff/manageLoan');
        }
    }

    public function denyLoan($loanId) {
        $bookId = $this->model('LoanModel')->denyLoan($loanId);
        $this->model('BookModel')->returnBook($bookId);
        $this->flasherRoute('Loan', 'successfully', 'denied', 'success', '/staff/manageLoan');
    }

    public function returnBook($loanid) {
        $fineid = $this->model('LoanModel')->getFineIdByLoanId($loanid);
        $bookid = $this->model('LoanModel')->getBookIdByLoanId($loanid);
        if ($this->model('FineModel')->payFine($fineid))
        if ($this->model('LoanModel')->setReturnDate())
        if ($this->model('BookModel')->returnBook($bookid))
        $this->flasherRoute('Book', 'successfully', 'returned', 'success', '/staff/manageLoan');
    }

    public function returnFine($loanid) {
        $this->returnBook($loanid);
    }

    public function managePatron() {
        $data['title'] = 'Patron Management';
        $data['patrons'] = $this->model('PatronModel')->getAllPatrons();
        $this->view('templates/header', $data);
        $this->view('templates/staffNav');
        $this->view('staff/patron', $data);
        $this->view('templates/footer');
    }

    public function deleteBook($bookID) {
        if ($this->model('BookModel')->delete($bookID) > 0) {
            Flasher::setFlash('Book', 'successfully', 'deleted', 'success');
            header('Location: ' . BASEURL . '/staff/book');
            exit;
        } else {
            Flasher::setFlash('Book', 'unsuccessfully', 'deleted', 'danger');
            header('Location: ' . BASEURL . '/staff/book');
            exit;
        }
    }
    
    public function addBook() {
        if ($this->model('BookModel')->addBook($_POST) > 0) {
            Flasher::setFlash('Book', 'successfully', 'added', 'success');
            header('Location: ' . BASEURL . '/staff/book');
            exit;
        } else {
            Flasher::setFlash('Book', 'unsuccessfully', 'added', 'danger');
            header('Location: ' . BASEURL . '/staff/book');
            exit;
        }
    }

    public function geteditBook() {
        echo json_encode($this->model('BookModel')->getBookById($_POST['id']));
    }

    public function editBook() {
        if ($this->model('BookModel')->editBook($_POST) > 0) {
            $this->flasherRoute('Book', 'successfully', 'edited', 'success', '/staff/book');
        } else {
            $this->flasherRoute('Book', 'unsuccessfully', 'edited', 'danger', '/staff/book');
        }
    }

    public function searchBook() {
        $data['title'] = 'Book List';
        $data['books'] = $this->model('BookModel')->searchBook();
        $this->view('templates/header', $data);
        $this->view('templates/staffNav', $data);
        $this->view('staff/book', $data);
        $this->view('templates/footer');
    }

    public function addPatron() {
        if ($this->model('PatronModel')->addPatron($_POST) > 0) {
            Flasher::setFlash('Patron', 'successfully', 'added', 'success');
            header('Location: ' . BASEURL . '/staff/managePatron');
            exit;
        } else {
            Flasher::setFlash('Patron', 'unsuccessfully', 'added', 'danger');
            header('Location: ' . BASEURL . '/staff/managePatron');
            exit;
        }
    }

    public function logout() {
        session_unset();
        $this->flasherRoute('Logout', 'successfully', 'goodbye', 'success', '');
    }
}