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

    <link href="/assets/css/login.css" rel="stylesheet">
    <title><?= WEBSITE_NAME . " | " . $data['page_title']?></title>
</head>
<body>
<div class="login-parent">
    <h1>Login</h1>

    <?php
        if ($data['error_code'] == 1) {
            echo "<div class='error'><img src='/assets/icons/error.svg'>&nbspPassword is incorrect</div>";
        }

        if ($data['error_code'] == 2) {
            echo "<div class='error'><img src='/assets/icons/error.svg'>&nbspUser does not exist</div>";
        }
    ?>
    <form method="post">
        <label for="usernamein">Username</label>
        <div id="username">
        <input type="text" id="usernamein" name="username" placeholder="Username"  value=
                <?= isset($_POST['username']) ? $_POST['username'] : ""?>>
            <p id="no-value">Please enter a username</p>
        </div>
        <label for="passwordin">Password</label>
        <div id="password">
        <input type="password" id='passwordin'name="password" placeholder="Password">
            <p id="no-value">Please enter a password</p>
        </div>
        <input type="submit" value="Login">
    </form>
</div>
</body>
<script src="/assets/js/login.js"></script>
</html>