<?php

function checkActive($pageData=[], $page) {
    if ($pageData['active_page'] === $page) {
        return "active";
    }
    return "";
}

function createToken() {
    $seed = random_bytes(8);
    $t = time();
    $hash = hash_hmac('sha256', session_id() . $seed . $t, CSRF_TOKEN_SECRET, true);
    return urlSafeEncode($hash . '|' . $seed . '|' . $t);
}

function validateToken($token) {
    $parts = explode('|',urlSafeDecode($token));
    if (count($parts) === 3) {
        $hash = hash_hmac('sha256', session_id() . $parts[1]  . $parts[2], CSRF_TOKEN_SECRET, true);
        if (hash_equals($hash, $parts[0])) {
            return true;
        }
    }
    return false;
}

function urlSafeEncode($m) {
    return rtrim(strtr(base64_encode($m), '+/', '-_'), '=');
}

function urlSafeDecode($m) {
 return base64_decode(strtr($m, '-_', '+/'));
}