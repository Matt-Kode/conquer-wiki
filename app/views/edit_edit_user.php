<html>

<head>
    <link href="/assets/css/edit.css" rel="stylesheet">
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
    <h1>Edit user</h1>
    <form method="post">
        <label for="usernamein">Username</label>
        <div id="username">
            <input type="text" id="usernamein" name="username" placeholder="Username" value=<?= $data['username']?>>
            <p>Please enter a username</p>
        </div>
        <label for="passwordin">Password</label>
        <div id="password">
            <input type="text" id="passwordin" name="password" placeholder="Password" value=<?= $data['password']?>>
            <p>Please enter a password</p>
        </div>
        <label for="permission">Permission</label>
        <select id="permission" name="permission">
            <option value="editor" <?php if ($data['permission'] === 'editor') {echo 'selected';}?>>Editor</option>
            <option value="admin" <?php if ($data['permission'] === 'admin') {echo 'selected';}?>>Admin</option>
        </select>
        <input type="submit" value="Update">
    </form>
</div>

</body>

<script src="/assets/js/edit.js"></script>

</html>