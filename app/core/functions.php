<?php

function checkActive($pageData=[], $page) {
    if ($pageData['active_page']=== $page) {
        return "active";
    }
    return "";
}