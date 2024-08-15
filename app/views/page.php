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

    <link rel="stylesheet" href="/assets/css/page.css">
    <link href="/assets/css/scrollbar.css" rel="stylesheet">
    <title><?= WEBSITE_NAME . " | " . $data['page_title']?></title>
</head>

<?php
include("header.php");
?>
<body>
<div class="container">
    <div class="pages">
        <p>PAGES</p>
        <?php
            foreach ($data['all_pages_info'] as $page) {
                echo "
                <a class='" . checkActive($data, $page->name) . "' href='/page/{$page->page_url}'>{$page->name}</a>
                ";
            }
        ?>
    </div>

    <div class="page-contents">
        <p>PAGE CONTENTS</p>
    </div>

    <div class="main-content">
        <?php
            echo $data['content'];
        ?>

        <div class="last-edited">
            <?php
            echo "<p>Last edit by: " . $data['last_edited_by'] . " @ " . $data['last_edited_date'] . " EST</p>"
            ?>
        </div>
        <div class="prev-next">
                <?php
                if (isset($data['previous_page'])) {
                    echo "<a class='prev' href='/page/" . $data['previous_page']->page_url . "'><img src='/assets/icons/backward-arrow.svg'><div ><span>Previous</span><span class='name'>". $data['previous_page']->name ."</span></div></a>";
                }
                ?>
                <?php
                if (isset($data['next_page'])) {
                    echo "<a class='next' href='/page/" . $data['next_page']->page_url . "'><div ><span>Next</span><span class='name'>". $data['next_page']->name ."</span></div><img src='/assets/icons/forward-arrow.svg'></a>";
                }
                ?>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
</body>
<script src="/assets/js/page.js"></script>
</html>