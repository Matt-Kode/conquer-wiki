<?php

Class Search extends Controller {


    function index() {

        if (isset($_POST['searchquery'])) {

            $db = new Database();
            $query = "SELECT * FROM pages WHERE content LIKE '%" . $_POST['searchquery'] . "%'";
            $results = $db->read($query);

            $resultElements = [];
            if ($results) {
                foreach ($results as $result) {
                    $resultElements[] = "<a class='result' href='/" . "#" . "'>" . $result->name . "</a>";
                }
            } else {
                $resultElements[] = "<p class='no-results'>No results found for \"" . $_POST['searchquery'] . "\"</p>";
            }

            echo json_encode($resultElements);
            return;

        }

        header("Location: ");


    }

}