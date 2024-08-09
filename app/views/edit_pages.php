<!DOCTYPE HTML>
<html>
<head>

    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/icons/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicons/favicon-16x16.png">
    <link rel="manifest" href="/assets/icons/favicons/site.webmanifest">
    <link rel="mask-icon" href="/assets/icons/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link href="/assets/css/edit.css" rel="stylesheet">
    <title><?= WEBSITE_NAME . " | " . $data['page_title']?></title>
</head>

<?php
include("header.php");
?>

<?php
include("edit_sidebar.php");
?>

<body>

<div class="pages-list-container content">

    <h1>Pages</h1>

    <a id="add-page-btn" href=<?= ROOT_DIR . "/edit/add_page"?>>Add Page</a>

    <ul class="pages-list">

        <?php
        if (is_array($data['pages'])) {


            for ($i = 0; $i < count($data['pages']); $i++) {

                $pageid = $data['pages'][$i]->id;
                $pagename = $data['pages'][$i]->name;
                $pagecreated = $data['pages'][$i]->created_at;
                $pagecreatedby = $data['pages'][$i]->created_by;
                $pageedited = $data['pages'][$i]->last_edited;
                $pageeditedby = $data['pages'][$i]->last_edited_by;
                $pageposition = $data['pages'][$i]->position;

                echo
                    "<li class='page'  data-index={$pageid} data-position={$pageposition}>
                    <div>
                        <p>{$pagename}</p>
                        <p id='page-info'>Created by: {$pagecreatedby} @ {$pagecreated}&nbsp;&nbsp;&nbsp;Last edited by: {$pageeditedby} @ {$pageedited}</p>
                    </div>
                    <span>
                        <a href=" . ROOT_DIR . "/edit/edit_page/{$pageid}><img id='#edit-page-btn' src='/assets/icons/edit.svg'></a>
                        <a href=" . ROOT_DIR . "/edit/delete_page/{$pageid}><img id='delete-page-btn' src='/assets/icons/delete.svg'></a>
                    </span>
                </li>";
            }
        }

        ?>
    </ul>

</div>







</body>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
<script src="/assets/js/pages.js"></script>

</html>
