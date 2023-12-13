<?php

class Table extends Controller {
    public function index() {
        $data['title'] = 'Book List';
        $this->view('templates/header', $data);
        $this->view('table/index');
        $this->view('templates/footer');
    }
}