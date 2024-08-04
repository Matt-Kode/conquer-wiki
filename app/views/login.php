<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="/assets/css/login.css" rel="stylesheet">
    <title><?= WEBSITE_NAME . " | " . $data['page_title']?></title>
</head>
<body>
<div class="login-parent">
    <h1>Login</h1>

    <?php
        if ($data['error_code'] == 1) {
            echo "<div class='error'><i class='bx bx-error-circle'></i>&nbspPlease enter valid username and password</div>";
        }

        if ($data['error_code'] == 2) {
            echo "<div class='error'><i class='bx bx-error-circle'></i>&nbspInvalid username or password</div>";
        }
    ?>
    <form method="post">
        <label for="usernamein">Username</label>
        <div id="username">
        <input type="text" id="usernamein" name="username" placeholder="Username"  value=
                <?= isset($_POST['username']) ? $_POST['username'] : ""?>>
            <p>Please enter a username</p>
        </div>
        <label for="passwordin">Password</label>
        <div id="password">
        <input type="password" id='passwordin'name="password" placeholder="Password">
            <p>Please enter a password</p>
        </div>
        <input type="submit" value="Login">
    </form>
</div>
</body>
<script src="/assets/js/login.js"></script>
</html>