<html>
    <head>
        <link href="/assets/css/header.css" rel="stylesheet">
    </head>

    <header id="navbar-parent">

        <a href="/" id="logo">ConquerEarthMC Wiki</a>
        <div id="navbar">
            <div class="account">
                <img class='account-button' src="/assets/icons/user.svg">
                <div class="account-dropdown">
                    <?php
                        if ($data['logged_in']) {
                            echo '<a href=' . ROOT_DIR . '/edit/pages>Edit</a>
                                <a href=' . ROOT_DIR . '/logout>Logout</a>';
                        } else {
                            echo '<a href=' . ROOT_DIR . '/login>Login</a>';
                        }

                    ?>
                </div>
            </div>
        </div>
    </header>

<script src="/assets/js/header.js"></script>

</html>
