<?php

class Home_model {
    private $name = 'MyName';

    public function getUser() {
        return $this->name;
    }
}