<?php
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'patron') {
    header('Location: ' . BASEURL . "/");
    exit;
}

class Patron extends Controller {
    public function index() {
        $data['title'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('templates/patronNav', $data);
        $this->view('patron/index');
        $this->view('templates/footer');
    }

    public function book() {
        $data['title'] = 'Book List';
        $data['books'] = $this->model('BookModel')->getAllBooks();
        $this->view('templates/header', $data);
        $this->view('templates/patronNav', $data);
        $this->view('patron/book', $data);
        $this->view('templates/footer');
    }

    public function searchBook() {
        $data['title'] = 'Book List';
        $data['books'] = $this->model('BookModel')->searchBook();
        $this->view('templates/header', $data);
        $this->view('templates/patronNav', $data);
        $this->view('patron/book', $data);
        $this->view('templates/footer');
    }

    public function borrowBook($bookID) {
        if ($this->model('BookModel')->borrowBook($bookID) > 0)
        if ($this->model('LoanModel')->addNewLoan($bookID) > 0)
        $this->flasherRoute('Book', 'successfully', 'propossed to be borrowed', 'success', 'patron/book');
    }

    public function reserveBook($bookID) {
        
    }

    public function logout() {
        session_unset();
        $this->flasherRoute('Logout', 'successfully', 'goodbye', 'success', '');
    }
}