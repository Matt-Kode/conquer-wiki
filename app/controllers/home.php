<?php

Class Home extends Controller {

    function index() {

        $data['page_title'] = 'home';
        $data['logged_in'] = false;
        $data['is_admin'] = false;

        $user = $this->loadModel('user');

        if ($user->check_logged_in()) {
            $data['logged_in'] = true;
            $data['username'] = $_SESSION['username'];
            if ($user->is_admin()) {
                $data['is_admin'] = true;
            }
        }

        $this->view('home', $data);
    }



}