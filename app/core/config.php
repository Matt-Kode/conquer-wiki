<?php

const WEBSITE_NAME = "CEMC Wiki";

const ROOT_DIR = "";

const DB_TYPE = 'mysql';
const DB_HOST = 'localhost';
const DB_NAME = 'wiki_db';
const DB_USER = 'root';
const DB_PASSWORD = '';

const DEBUG = true;

if (DEBUG) {
    ini_set("display_errors", 1);
} else {
    ini_set("display_errors", 0);
}



