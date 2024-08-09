<?php

Class Home extends Controller {

    function index() {

        $data['page_title'] = 'home';

        $db = new Database();
        $query = "SELECT * FROM pages ORDER BY position";
        $pages = $db->read($query);

        $data['pages'] = $pages;
        $user = $this->loadModel('user');
        $data['logged_in'] = $user->check_logged_in();

        $this->view('home', $data);
    }



}