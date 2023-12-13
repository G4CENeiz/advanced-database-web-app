<?php

class Upload extends Controller {
    public function index() {
        $data['title'] = 'Add Book';
        $this->view('templates/header', $data);
        $this->view('upload/index');
        $this->view('templates/footer');
    }
}