<html>

<head>
    <link href="/public/assets/css/edit.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
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
    <form method="post">
        <label for="usernamein">Username</label>
        <div id="username">
        <input type="text" id="usernamein" name="username" placeholder="Username">
            <p>Please enter a username</p>
        </div>
        <label for="passwordin">Password</label>
        <div id="password">
        <input type="text" id="passwordin" name="password" placeholder="Password">
            <p>Please enter a password</p>
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

<script src="../../public/assets/js/edit.js"></script>

</html>
