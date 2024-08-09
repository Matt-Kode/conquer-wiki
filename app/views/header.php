<html>
    <head>
        <link href="/assets/css/header.css" rel="stylesheet">
    </head>

    <div class="search-backdrop">
        <div class="search">
            <div class="search-bar">
            <img src="/assets/icons/search.svg">
            <input type="search" oninput="fetchResults(this.value)" class="search-input">
            </div>

            <div class="search-results">

            </div>
        </div>
    </div>

    <header id="navbar-parent">

        <a href="/" id="logo">ConquerEarthMC Wiki</a>
        <div id="navbar">
            <button class="search-btn" onclick="openSearch()"><img src="/assets/icons/search.svg"></button>
            <div class="account">
                <img class='account-button' src="/assets/icons/user2.svg">
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

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="/assets/js/header.js"></script>

</html>
