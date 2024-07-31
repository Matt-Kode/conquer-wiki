<?php

Class Edit extends Controller
{


    function index()
    {

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
            header("Location: " . ROOT_DIR . "/home");
    }

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
                $DB = new Database();

                $query = "DELETE FROM users WHERE id=:userid";

                $DB->write($query, array('userid' => $userid));

                header("Location: " . ROOT_DIR . "/edit/users");
                return;
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

                if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['permission'])) {

                    $DB = new Database();

                    $query = "INSERT INTO users (username, password, permission) VALUES (:username, :password, :permission)";

                    $DB->write($query, array('username' => $_POST['username'], 'password' => $_POST['password'], 'permission' => $_POST['permission']));

                    header("Location: " . ROOT_DIR . "/edit/users");
                    return;

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

                if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['permission'])) {

                    $DB = new Database();

                    $query = "UPDATE users SET username=:username, password=:password, permission=:permission WHERE id=:userid";

                    $DB->write($query, array('username' => $_POST['username'], 'password' => $_POST['password'], 'permission' => $_POST['permission'], 'userid' => $userid));

                    header("Location: " . ROOT_DIR . "/edit/users");
                    return;

                }

                    $data['page_title'] = 'Edit';
                    $data['logged_in'] = true;
                    $data['is_admin'] = true;

                    $DB = new Database();
                    $query = "SELECT * FROM users WHERE id=:userid LIMIT 1";

                    $user = $DB->read($query, array(':userid' => $userid));

                    $data['username'] = $user[0]->username;
                    $data['permission'] = $user[0]->permission;
                    $data['password'] = $user[0]->password;

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
                    $query = "SELECT * FROM pages";
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

                    if (isset($_POST['content']) && isset($_POST['name'])) {

                        $creating_user = $_SESSION['username'];
                        date_default_timezone_set("America/New_York");
                        $date = date('Y-m-d H:i:s a');

                        $DB = new Database();
                        $query = "INSERT INTO pages (name, content, created_at, created_by, last_edited, last_edited_by) VALUES (:name, :content, :created_at, :created_by, :last_edited, :last_edited_by)";
                        $DB->write($query, array('name' => $_POST['name'], 'content' => $_POST['content'], 'created_at' => $date, 'created_by' => $creating_user, 'last_edited' => $date, 'last_edited_by' => $creating_user));

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
}