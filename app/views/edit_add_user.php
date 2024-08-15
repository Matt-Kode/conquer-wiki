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
    <meta name="theme-color" content="#1f1f1f">

    <link href="/assets/css/edit.css" rel="stylesheet">
    <link href="/assets/css/scrollbar.css" rel="stylesheet">
    <title><?= WEBSITE_NAME . " | " . $data['page_title']?></title>
</head>

<?php
include("header.php");
?>

<?php
include("edit_sidebar.php");
?>

<body>

<div class="user-add-form content">
    <h1>Add new user</h1>
    <?php
    if ($data['error_code'] == 1) {
        echo "<div class='error'><img src='/assets/icons/error.svg'>&nbspUsername already in use</div>";
    }
    ?>
    <form method="post">
        <input type="hidden" name="csrf_token" value="<?=createToken()?>">
        <label for="usernamein">Username</label>
        <div id="username">
        <input type="text" id="usernamein" name="username" placeholder="Username">
            <p id="no-value">Please enter a username</p>
            <p id="too-long">No more than 16 characters</p>
        </div>
        <label for="passwordin">Password</label>
        <div id="password">
        <input type="text" id="passwordin" name="password" placeholder="Password">
            <p id="too-long">No more than 16 characters</p>
        </div>
            <label for="permission">Permission</label>
        <select id="permission" name="permission">
            <option value="editor" selected>Editor</option>
            <option value="admin">Admin</option>
        </select>
        <input type="submit" value="Add">
    </form>
</div>

</body>

<script src="/assets/js/user-form-validation.js"></script>

</html>
