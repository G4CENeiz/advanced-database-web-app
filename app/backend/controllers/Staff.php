<?php

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
        $data['books'] = $this->model('StaffModel')->getAllBooks();
        $this->view('templates/header', $data);
        $this->view('templates/staffNav');
        $this->view('staff/book', $data);
        $this->view('templates/footer');
    }

    public function delete($bookID) {
        if ($this->model('StaffModel')->delete($bookID) > 0) {
            Flasher::setFlash('Book', 'successfully', 'deleted', 'success');
            header('Location: ' . BASEURL . '/staff/book');
            exit;
        } else {
            Flasher::setFlash('Book', 'unsuccessfully', 'deleted', 'danger');
            header('Location: ' . BASEURL . '/staff/book');
            exit;
        }
    }
    
    public function add() {
        if ($this->model('StaffModel')->addBook($_POST) > 0) {
            Flasher::setFlash('Book', 'successfully', 'added', 'success');
            header('Location: ' . BASEURL . '/staff/book');
            exit;
        } else {
            Flasher::setFlash('Book', 'unsuccessfully', 'added', 'danger');
            header('Location: ' . BASEURL . '/staff/book');
            exit;
        }
    }

    public function getedit() {
        echo json_encode($this->model('StaffModel')->getBookById($_POST['id']));
    }

    public function edit() {
        if ($this->model('StaffModel')->editBook($_POST) > 0) {
            Flasher::setFlash('Book', 'successfully', 'edited', 'success');
            header('Location: ' . BASEURL . '/staff/book');
            exit;
        } else {
            Flasher::setFlash('Book', 'unsuccessfully', 'edited', 'danger');
            header('Location: ' . BASEURL . '/staff/book');
            exit;
        }
    }

    public function search() {
        $data['title'] = 'Book List';
        $data['books'] = $this->model('StaffModel')->searchBook();
        $this->view('templates/header', $data);
        $this->view('templates/staffNav', $data);
        $this->view('staff/book', $data);
        $this->view('templates/footer');
    }
}