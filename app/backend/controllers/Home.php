<?php
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'patron') {
        header('Location: ' . BASEURL . "/patron");
    }
    if ($_SESSION['role'] == 'staff') {
        header('Location: ' . BASEURL . "/staff");
    }
}

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
        $this->view('home/login');
        $this->view('templates/footer');
    }

    public function loginProcess() {
        if ($_POST['userType'] == 'staff') {
            if ($this->model('StaffModel')->login($_POST)) $this->loginSuccess('staff');
            else $this->flasherRoute('Login', 'failed', 'user is unregistered', 'danger', 'home/login');
        } else if ($_POST['userType'] == 'patron') {
            if ($this->model('PatronModel')->login($_POST)) $this->loginSuccess('patron');
            else $this->flasherRoute('Login', 'failed', 'user is unregistered', 'danger', 'home/login');
        } else {
            $this->flasherRoute('Login', 'failed', 'user type is unknown', 'danger', 'home/login');
        }
    }

    private function loginSuccess($route) {
        $_SESSION['role'] = $route;
        $this->flasherRoute('Login', 'successfully', 'as ' . $route, 'success', $route);
    }
}
