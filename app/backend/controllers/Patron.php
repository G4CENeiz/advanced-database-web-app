<?php
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'patron') {
    session_destroy();
    header('Location: ' . BASEURL . "/");
    Flasher::setFlash('Unauthorized', 'access', 'detected. proceed to logout by force', 'danger');
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

    public function logout() {
        session_unset();
        $this->flasherRoute('Logout', 'successfully', 'goodbye', '');
    }
}