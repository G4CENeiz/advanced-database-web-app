<?php

class Home extends Controller {
    public function index() {
        // echo 'home/index';
        $data['title'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('home/index');
        $this->view('templates/footer');
    }
}