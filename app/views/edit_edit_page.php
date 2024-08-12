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
include("header.php");
?>

<?php
include("edit_sidebar.php");
?>

<body>
<div class="content">
    <h1>Edit page</h1>
    <form class="add-page-form" method="post">
        <input type="hidden" name="csrf_token" value="<?=createToken()?>">
        <label for="namein">Name</label>
        <div id="name">
            <input type="text" id="namein" name="name" placeholder="Name" value='<?= $data['page_name']?>'>
            <p id="no-value">Please enter a name</p>
            <p id="too-long">No more than 16 characters</p>
        </div>
        <textarea id="text-editor" name="content"></textarea>
    <input type="submit" value="Update">
    </form>
</div>



</body>
<script type="text/javascript" src="/assets/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script src="/assets/js/page-editor.js"></script>
<script>
    function saveEditableContent() {
        tinymce.activeEditor.setContent(`<?=$data['page_content']?>`);
    }
</script>
</html>
