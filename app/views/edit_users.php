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
include("header.php")
?>

<?php
include("edit_sidebar.php");
?>

<body>

<div class="users-table content">
    <h1>Users</h1>
    <a id="add-user-btn" href=<?= ROOT_DIR . "/edit/add_user"?>>Add User</a>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Permission</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
        if (is_array($data['users'])) {
            for ($i = 0; $i < count($data['users']); $i++) {
                $userid = $data['users'][$i]->id;
                $username = $data['users'][$i]->username;
                $role_weight = $data['users'][$i]->permission;
                echo

                "<tr>
                <td>{$userid}</td>
                <td>{$username}</td>
                <td>{$role_weight}</td>
                <td id='action-column'><a id='edit-btn' href=" . ROOT_DIR . "/edit/edit_user/{$userid}><img src='/assets/icons/edit.svg'></a><button id='delete-btn' onclick='openConfirmation(\"user\", {$userid})'><img src='/assets/icons/delete.svg'></button></td>
            </tr>";
            }
        }
    ?>
    </tbody>
</table>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="/assets/js/user-page-management.js"></script>
</html>