<?php

class Staff extends Controller {
    public function index() {
        $data['title'] = 'Book List';
        $data['books'] = $this->model('Book_model')->getAllBooks();
        $this->view('templates/header', $data);
        $this->view('table/index', $data);
        $this->view('templates/footer');
    }

    public function delete($bookID) {
        if ($this->model('Book_model')->delete($bookID) > 0) {
            Flasher::setFlash('Book', 'successfully', 'deleted', 'success');
            header('Location: ' . BASEURL . '/table');
            exit;
        } else {
            Flasher::setFlash('Book', 'unsuccessfully', 'deleted', 'danger');
            header('Location: ' . BASEURL . '/table');
            exit;
        }
    }
    
    public function add() {
        if ($this->model('Book_model')->addBook($_POST) > 0) {
            Flasher::setFlash('Book', 'successfully', 'added', 'success');
            header('Location: ' . BASEURL . '/table');
            exit;
        } else {
            Flasher::setFlash('Book', 'unsuccessfully', 'added', 'danger');
            header('Location: ' . BASEURL . '/table');
            exit;
        }
    }

    public function getedit() {
        // echo $_POST['id'];
        echo json_encode($this->model('Book_model')->getBookById($_POST['id']));
    }

    public function edit() {
        if ($this->model('Book_model')->editBook($_POST) > 0) {
            Flasher::setFlash('Book', 'successfully', 'edited', 'success');
            header('Location: ' . BASEURL . '/table');
            exit;
        } else {
            Flasher::setFlash('Book', 'unsuccessfully', 'edited', 'danger');
            header('Location: ' . BASEURL . '/table');
            exit;
        }
    }
}