<?php

Class User {

    public function login($POST) {

        if (isset($POST['username']) && isset($POST['password'])) {

            $arr['username'] = $POST['username'];
            $arr['password'] = $POST['password'];

            $DB = new Database();
            $query = 'SELECT * FROM users WHERE username=:username AND password=:password LIMIT 1';
            $data = $DB ->read($query, $arr);

            if (is_array($data)) {

                $_SESSION['user_id'] = $data[0]->id;
                $_SESSION['username'] = $data[0]->username;
                $_SESSION['permission'] = $data[0]->permission;

            } else {
                return 1;
            }
        } else {
            return 2;
        }
    return 0;
    }

    public function check_logged_in() {

        if (isset($_SESSION['user_id'])) {
            return true;
        }
        return false;
    }

    public function logout() {

        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['permission']);

        session_destroy();

        header("Location: " . ROOT_DIR . "/home");

    }

    public function is_admin() {

        if ($_SESSION['permission'] === 'admin') {
            return true;
            }

        return false;
    }

    public function is_editor() {
        if ($_SESSION['permission'] === 'editor') {
            return true;
        }
        return false;
    }

    private function still_exists() {
        $DB = new Database();
        $query = 'SELECT * FROM users WHERE id=:userid LIMIT 1';

        $user = $DB->read($query, array('userid' => $_SESSION['user_id']));

        if (!is_array($user)) {
            return false;
        }

        return true;
    }

    public function update_session() {

        if ($this->still_exists()) {
            $DB = new Database();
            $query = 'SELECT * FROM users WHERE id=:userid LIMIT 1';

            $user = $DB->read($query, array('userid' => $_SESSION['user_id']));

            $_SESSION['username'] = $user[0]->username;
            $_SESSION['permission'] = $user[0]->permission;

            return;
        }

        $this->logout();
    }

}