<!DOCTYPE HTML>
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
<div class="content">
    <h1>Edit page</h1>
    <form class="add-page-form" method="post">
        <label for="namein">Name</label>
        <div id="name">
            <input type="text" id="namein" name="name" placeholder="Name" value='<?= $data['page_name']?>'>
            <p>Please enter a name</p>
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
        let content = '<?=$data['page_content']?>';
        tinymce.activeEditor.setContent(content);
    }
</script>
</html>
