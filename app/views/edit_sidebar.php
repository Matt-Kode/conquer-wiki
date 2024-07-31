<head>
    <link href="/public/assets/css/edit_sidebar.css" rel="stylesheet">
<html>

<?php
function checkActive($pageData=[], $page) {
    if ($pageData['active_page']=== $page) {
        return "active";
    }
    return "";
}
?>

<div class="sidebar-parent">
    <p>Site</p>
    <a class="<?php echo checkActive($data,"dashboard")?>" href=<?= ROOT_DIR . "/edit/dashboard"?>><img src="/public/assets/icons/dashboard.svg">&nbsp;&nbsp;Dashboard</a>
    <a class="<?php echo checkActive($data,'pages')?>" href=<?= ROOT_DIR . "/edit/pages"?>><img src="/public/assets/icons/pages.svg">&nbsp;&nbsp;Pages</a>

<?php
    if ($data['is_admin']) {
        echo "<p>Admin</p><a class=\"" . checkActive($data,'users') . "\"" . "href=" . ROOT_DIR . "/edit/users><img src=/public/assets/icons/users.svg>&nbsp;&nbsp;Users</a>";
    };
?>
</div>

</html>