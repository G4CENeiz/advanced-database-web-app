<?php

class Patron extends Controller {
    public function index() {
        $data['title'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('templates/patronNav', $data);
        $this->view('patron/index');
        $this->view('templates/footer');
    }
}