<head>
    <link href="/assets/css/edit_sidebar.css" rel="stylesheet">
</head>
<html>
<div class="sidebar-parent">
    <p>Site</p>
    <a class="<?php echo checkActive($data,"dashboard")?>" href=<?= ROOT_DIR . "/edit/dashboard"?>><img src="/assets/icons/dashboard.svg">&nbsp;&nbsp;Dashboard</a>
    <a class="<?php echo checkActive($data,'pages')?>" href=<?= ROOT_DIR . "/edit/pages"?>><img src="/assets/icons/pages.svg">&nbsp;&nbsp;Pages</a>

<?php
    if ($data['is_admin']) {
        echo "<p>Admin</p><a class=\"" . checkActive($data,'users') . "\"" . "href=" . ROOT_DIR . "/edit/users><img src=/assets/icons/users.svg>&nbsp;&nbsp;Users</a>";
    };
?>
</div>

</html>