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
    <meta name="csrf_token" content="<?=createToken()?>">
    <meta name="theme-color" content="#1f1f1f">

    <link href="/assets/css/edit.css" rel="stylesheet">
    <link href="/assets/css/scrollbar.css" rel="stylesheet">
    <title><?= WEBSITE_NAME . " | " . $data['page_title']?></title>
</head>

<div class="confirmation-backdrop">
    <div class="confirmation">
        <img src="/assets/icons/error.svg">
        <p>Are you sure?</p>
        <div class="decision">
            <button onclick="closeConfirmation()" class="close">No</button>
            <button class="proceed">Yes</button>
        </div>
    </div>
</div>

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
                        <a id='#edit-page-btn' href=" . ROOT_DIR . "/edit/edit_page/{$pageid}><img src='/assets/icons/edit.svg'></a>
                        <button  id='delete-page-btn' onclick='openConfirmation(\"page\", {$pageid})'><img src='/assets/icons/delete.svg'></button>
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
<script src="/assets/js/page-list.js"></script>
<script src="/assets/js/user-page-management.js"></script>

</html>
