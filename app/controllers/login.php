<?php

Class Login extends Controller {

    function index() {

        $data['page_title'] = 'Login';
        $data['error_code'] = 0;

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $user = $this->loadModel('user');
            $error_code = $user->login($_POST);

            if ($error_code == 0) {
                header("Location: " . ROOT_DIR . "/home");
                die();
            } elseif ($error_code == 1) {
                $data['error_code'] = 1;
            } elseif ($error_code == 2) {
                $data['error_code'] = 2;
            }
        }

        $this->view('login', $data);
    }
}