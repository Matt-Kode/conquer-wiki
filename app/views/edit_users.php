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
            <th>Password</th>
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
                $password = $data['users'][$i]->password;
                $role_weight = $data['users'][$i]->permission;
                echo

                "<tr>
                <td>{$userid}</td>
                <td>{$username}</td>
                <td>{$password}</td>
                <td>{$role_weight}</td>
                <td id='action-row'><a id='edit-btn' href=" . ROOT_DIR . "/edit/edit_user/{$userid}><img src='/assets/icons/edit.svg'></a><a id='delete-btn' href=" . ROOT_DIR . "/edit/delete_user/{$userid}><img src='/assets/icons/delete.svg'></a></td>
            </tr>";
            }
        }
    ?>
    </tbody>
</table>
</div>

</body>

</html>