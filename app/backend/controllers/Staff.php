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

    public function logout() {
        session_unset();
        $this->flasherRoute('Logout', 'successfully', 'goodbye', 'success', '');
    }
}