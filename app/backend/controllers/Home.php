<?php

class Home extends Controller {
    public function index() {
        $data['title'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('templates/homeNav');
        $this->view('home/index');
        $this->view('templates/footer');
    }

    public function login() {
        $data['title'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('templates/homeNav');
        $this->view('login/index');
        $this->view('templates/footer');
    }

    public function loginProcess() {
        if ($this->model('LoginModel')->login($_POST)) {
            userType($_POST['userType']);
        } else {
            flasherRoute('Login', 'failed', 'please try again', 'danger', 'login');
        }
    }

    private function userType($data) {
        if ($data == 'staff') {
            flasherRoute('Login', 'successfully', 'as staff', 'success', 'staff');
        } else if ($data == 'patron') {
            flasherRoute('Login', 'successfully', 'as patron', 'success', 'patron');
        } else {
            flasherRoute('Login', 'failed', 'unregistered', 'danger', 'login');                
        }
    }

    private function flasherRoute($subject, $message, $action, $type, $route) {
        Flasher::setFlash($subject, $message, $action, $type);
        header('Location: ' . BASEURL . "/$route");
        exit;
    }

    public function signup() {
        $data['title'] = 'Sign uo';
        $this->view('templates/header', $data);
        $this->view('login/sign');
        $this->view('templates/footer');
    }
}
