<?php

Class Edit extends Controller
{


    function index()
    {
        header("Location: /edit/pages");
    }

    function users()
    {
        $user = $this->loadModel('user');

        if ($user->check_logged_in()) {
            $user->update_session();
            if ($user->is_admin()) {

            $data['page_title'] = 'Edit';
            $data['logged_in'] = true;
            $data['is_admin'] = true;


            $DB = new Database();
            $query = "SELECT * FROM users";
            $users = $DB->read($query);

            $data['users'] = $users;
            $data['active_page'] = 'users';

            $this->view('edit_users', $data);

            return;
        }
    }
        header("Location: " . ROOT_DIR . "/home");

    }

    function delete_user($userid = '')
    {

        if ($userid === '') {
            header("Location: " . ROOT_DIR . "/edit/users");
            return;
        }

        $user = $this->loadModel('user');

        if ($user->check_logged_in()) {
            $user->update_session();
            if ($user->is_admin()) {

                if (isset($_POST['csrf_token']) && validateToken($_POST['csrf_token'])) {

                    $DB = new Database();

                    $query = "DELETE FROM users WHERE id=:userid";

                    $DB->write($query, array('userid' => $userid));

                    return;
                }
            }
        }
        header("Location: " . ROOT_DIR . "/home");

    }

    function add_user()
    {
        $user = $this->loadModel('user');

        if ($user->check_logged_in()) {
            $user->update_session();
            if ($user->is_admin()) {

                $data['error_code'] = 0;
                if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['permission'])  && isset($_POST['csrf_token']) && validateToken($_POST['csrf_token'])) {

                    $hashedpassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

                    date_default_timezone_set("America/New_York");
                    $date = date('Y-m-d H:i:s a');

                    $DB = new Database();

                    if (!$DB->user_exists($_POST['username'])) {

                        $query = "INSERT INTO users (username, password, permission, created_at) VALUES (:username, :password, :permission, :date)";

                        $DB->write($query, array('username' => $_POST['username'], 'password' => $hashedpassword, 'permission' => $_POST['permission'], 'date' => $date));

                        header("Location: " . ROOT_DIR . "/edit/users");
                        return;
                    } else {
                        $data['error_code'] = 1;
                    }

                }

                $data['page_title'] = 'Edit';
                $data['logged_in'] = true;
                $data['is_admin'] = true;

                $data['active_page'] = 'users';

                $this->view('edit_add_user', $data);
                return;
            }


            header("Location: " . ROOT_DIR . "/home");

        }
    }

    function edit_user($userid = '')
    {

        if ($userid === '') {
            header("Location: " . ROOT_DIR . "/edit/users");
            return;
        }

        $user = $this->loadModel('user');

        if ($user->check_logged_in()) {
            $user->update_session();
            if ($user->is_admin()) {

                $data['error_code'] = 0;
                $DB = new Database();
                $query = "SELECT * FROM users WHERE id=:userid LIMIT 1";
                $user = $DB->read($query, array(':userid' => $userid));

                if (isset($_POST['username']) && isset($_POST['permission']) && isset($_POST['csrf_token']) && validateToken($_POST['csrf_token'])) {

                    if (!$DB->user_exists($_POST['username'])) {
                        if ($_POST['password'] != '') {
                            $hashedpassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

                            $update_query = "UPDATE users SET username=:username, password=:password, permission=:permission WHERE id=:userid";
                            $DB->write($update_query, array('username' => $_POST['username'], 'password' => $hashedpassword, 'permission' => $_POST['permission'], 'userid' => $userid));
                        } else {
                            $update_query = "UPDATE users SET username=:username, permission=:permission WHERE id=:userid";
                            $DB->write($update_query, array('username' => $_POST['username'], 'permission' => $_POST['permission'], 'userid' => $userid));
                        }
                        header("Location: " . ROOT_DIR . "/edit/users");
                        return;
                    } else {
                        $data['error_code'] = 1;
                    }
                }

                if (!$user) {
                    header("Location: " . ROOT_DIR . "/edit/users");
                    return;
                }

                $data['page_title'] = 'Edit';
                $data['logged_in'] = true;
                $data['is_admin'] = true;

                $data['username'] = $user[0]->username;
                $data['permission'] = $user[0]->permission;

                $data['active_page'] = 'users';

                $this->view('edit_edit_user', $data);
                return;
                }
                header("Location: " . ROOT_DIR . "/home");

        }

        }

        function pages() {

            $user = $this->loadModel('user');

            if ($user->check_logged_in()) {
                $user->update_session();
                if ($user->is_editor() || $user->is_admin()) {

                    $data['page_title'] = 'Edit';
                    $data['logged_in'] = true;
                    $data['is_admin'] = $user->is_admin();
                    $data['active_page'] = 'pages';

                    $DB = new Database();
                    $query = "SELECT * FROM pages ORDER BY position";
                    $pages = $DB->read($query);

                    $data['pages'] = $pages;

                    $this->view('edit_pages', $data);

                    return;
                }

                }
            header("Location: " . ROOT_DIR . "/home");
        }

        function add_page() {


            $user = $this->loadModel('user');

            if ($user->check_logged_in()) {
                $user->update_session();
                if ($user->is_editor() || $user->is_admin()) {

                    if (isset($_POST['content']) && isset($_POST['name'])  && isset($_POST['csrf_token']) && validateToken($_POST['csrf_token'])) {

                        $creating_user = $_SESSION['username'];
                        date_default_timezone_set("America/New_York");
                        $date = date('Y-m-d H:i:s a');

                        $page_url = str_replace(" ", "_", strtolower($_POST['name']));

                        $DB = new Database();
                        $query = "INSERT INTO pages (name, page_url, content, created_at, created_by, last_edited, last_edited_by) VALUES (:name, :page_url, :content, :created_at, :created_by, :last_edited, :last_edited_by)";
                        $DB->write($query, array('name' => $_POST['name'], 'page_url' => $page_url, 'content' => $_POST['content'], 'created_at' => $date, 'created_by' => $creating_user, 'last_edited' => $date, 'last_edited_by' => $creating_user));

                        header("Location: " . ROOT_DIR . "/edit/pages");
                        return;
                    }

                    $data['page_title'] = 'Edit';
                    $data['logged_in'] = true;
                    $data['is_admin'] = $user->is_admin();
                    $data['active_page'] = 'pages';
                    $this->view('edit_add_page', $data);

                    return;
                }

            }
            header("Location: " . ROOT_DIR . "/home");
        }

        function delete_page($pageid = []) {

        $user = $this->loadModel('user');

        if ($user->check_logged_in()) {
            $user->update_session();
            if ($user->is_editor() || $user->is_admin()) {

                $db = new Database();
                $query = "DELETE FROM pages WHERE id=:pageid";
                $db->write($query, array('pageid' => $pageid));

                header("Location: " . ROOT_DIR . "/edit/pages");
                return;
            }
        }

        header("Location: " . ROOT_DIR . "/home");

        }

    function edit_page($pageid = '') {

        if ($pageid === '') {
            header("Location: " . ROOT_DIR . "/edit/pages");
            return;
        }

        $user = $this->loadModel('user');

        if ($user->check_logged_in()) {
            $user->update_session();
            if ($user->is_editor() || $user->is_admin()) {

                $db = new Database();
                $query = "SELECT * FROM pages WHERE id=:pageid LIMIT 1";
                $page = $db->read($query, array('pageid' => $pageid));

                if (!$page) {
                    header("Location: " . ROOT_DIR . "/edit/pages");
                    return;
                }

                if (isset($_POST['content']) && isset($_POST['name'])  && isset($_POST['csrf_token']) && validateToken($_POST['csrf_token'])) {

                    $editing_user = $_SESSION['username'];
                    date_default_timezone_set("America/New_York");
                    $date = date('Y-m-d H:i:s a');

                    $page_url = str_replace(" ", "_", strtolower($_POST['name']));

                    $update_query = "UPDATE pages SET content=:content, page_url=:page_url, name=:name, last_edited=:date, last_edited_by=:editing_user WHERE id=:pageid";
                    $db->write($update_query, array('content' => $_POST['content'], 'page_url' => $page_url, 'name' => $_POST['name'],'date' => $date, 'editing_user' => $editing_user,  'pageid' => $pageid));
                    header("Location: " . ROOT_DIR . "/edit/pages");
                    return;
                }

                $data['page_title'] = 'Edit';
                $data['logged_in'] = true;
                $data['is_admin'] = $user->is_admin();
                $data['active_page'] = 'pages';
                $data['page_name'] = $page[0]->name;
                $data['page_content'] = $page[0]->content;

                $this->view('edit_edit_page', $data);
                return;
            }
        }

        header("Location: " . ROOT_DIR . "/home");

    }

        function update_page_positions() {

        $user = $this->loadModel('user');

        if ($user->check_logged_in()) {
            $user->update_session();
            if ($user->is_editor() || $user->is_admin()) {
                $db = new Database();

                if (isset($_POST['positions'])) {
                    foreach ($_POST['positions'] as $position) {
                        $index = $position[0];
                        $newPosition = $position[1];

                        $query = "UPDATE pages SET position=:position WHERE id=:index";
                        $db->write($query, array('position' => $newPosition, 'index' => $index));
                    }
                    return;
                }
                }
            }
        header("Location: " . ROOT_DIR . "/home");
        }

        function upload_image() {

        $user = $this->loadModel('user');

        if ($user->check_logged_in()) {
            $user->update_session();
            if ($user->is_editor() || $user->is_admin()) {

                $accepted_origins = array("http://localhost", "https://wiki.conquerearthmc.com");
                $ImagePath = "assets/uploads/";

                if (isset($_SERVER['HTTP_ORIGIN'])) {

                    if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
                        header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
                    } else {
                        header("HTTP/1.1 403 Origin Denied");
                        return;
                    }
                }

                if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
                    header("Access-Control-Allow-Methods: POST, OPTIONS");
                    return;
                }

                reset($_FILES);
                $temp = current($_FILES);
                if (!is_null($temp['tmp_name'])) {
                    if (is_uploaded_file($temp['tmp_name'])) {

                        if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
                            header("HTTP/1.1 400 Invalid file name.");
                            return;
                        }

                        if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
                            header("HTTP/1.1 400 Invalid extension.");
                            return;
                        }

                        move_uploaded_file($temp['tmp_name'], $ImagePath . $temp['name']);

                        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https://" : "http://";
                        $baseurl = $protocol . $_SERVER["HTTP_HOST"] . "/";

                        echo json_encode(array('location' => $baseurl . $ImagePath . $temp['name']));
                        return;
                    } else {
                        header("HTTP/1.1 500 Server Error");
                        return;
                    }
                }
            }
        }
        header("Location: " . ROOT_DIR . "/home");
        }

}