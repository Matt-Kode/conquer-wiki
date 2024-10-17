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

    <link href="/assets/css/home.css" rel="stylesheet">
    <link href="/assets/css/scrollbar.css" rel="stylesheet">
    <title><?= WEBSITE_NAME . " | " . $data['page_title']?></title>
</head>


<?php
include("header.php");
?>

<body>

<div class="container">
    <img class="logo" src="/assets/icons/logo.png">
    <p>Welcome to the official <b>ConquerEarthMC</b> Wiki! This is a ConquerEarth-led, community-maintained Wiki for ConquerEarthMC. Our goal is to provide the most accurate information in the best way possible. We will continually improve where needed and hope to provide the best transparency.</p>
    <p>Interested in helping improve the Wiki? Join our <a href="https://www.conquerearthmc.com/discord">discord</a> and make a ticket to apply.</p>
    <?php
    if ($data['pages']) {
        foreach ($data['pages'] as $page) {
            echo "
               <div class='underlay'><a class='page' href='/page/{$page->page_url}'>{$page->name}</a></div>
            ";
        }
    }
    ?>
</div>
<?php
include("footer.php");
?>
</body>
</html>