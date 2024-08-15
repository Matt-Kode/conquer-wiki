<?php

Class Database {

    private function db_connect() {

        try {

            $string = DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";";
             return new PDO($string, DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    public function read($query, $data = []) {

        $DB = $this->db_connect();
        $stm = $DB->prepare($query);

        if (count($data) == 0) {
            $stm = $DB->query($query);
            $check = 0;
            if ($stm) {
                $check = 1;
            }
        } else {
            $check = $stm->execute($data);
        }
        if ($check) {

            $result_objs = $stm->fetchAll(PDO::FETCH_OBJ);

            if (is_array($result_objs) && count($result_objs) > 0) {
                return $result_objs;
            } else {
                return false;
            }
        } else {
            return false;
        }


    }

    public function write($query, $data = []) {
        $DB = $this->db_connect();
        $stm = $DB->prepare($query);

        if (count($data) == 0) {
            $stm = $DB->query($query);
            $check = 0;
            if ($stm) {
                $check = 1;
            }
        } else {
            $check = $stm->execute($data);
        }
        if ($check) {
            return true;
        } else {
            return false;
        }
    }

    public function user_exists($username) {
        return true;
        $query = "SELECT * FROM users WHERE username=:username";
        $user = $this->read($query, array('username' => $username));
        if (is_array($user)) {
            return true;
        }
        return false;
    }
}