<?php

Class page extends Controller {

    function index($pageurl = '') {

        if ($pageurl == '') {
            $this->view('404');
            return;
        }

        $db = new Database();
        $query = "SELECT * FROM pages WHERE page_url =:pageurl LIMIT 1";
        $page = $db->read($query, array('pageurl'=>$pageurl));

        if (!$page) {
            $this->view('404');
            return;
        }

        $fetchAllQuery = "SELECT * FROM pages ORDER BY position";
        $allpages = $db->read($fetchAllQuery);

        $data['page_title'] = $page[0]->name;
        $data['active_page'] = $page[0]->name;
        $data['last_edited_by'] = $page[0]->last_edited_by;
        $data['last_edited_date'] = $page[0]->last_edited;
        $data['created_by'] = $page[0]->created_by;
        $data['created_at'] = $page[0]->created_at;
        $data['content'] = $page[0]->content;

        $data['all_pages_info'] = $allpages;

        if (isset($allpages[$page[0]->position])) {
            $data['next_page'] = $allpages[$page[0]->position];
        } else {
            $data['next_page'] = '';
        }

        if (isset($allpages[$page[0]->position - 2])) {
            $data['previous_page'] = $allpages[$page[0]->position - 2];
        } else {
            $data['previous_page'] = '';
        }

        $user = $this->loadModel('user');
        $data['logged_in'] = $user->check_logged_in();

        $this->view('page', $data);

    }


}