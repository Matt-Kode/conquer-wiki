<?php
Class register extends Controller {
    public function index() {
        sendMail("This is a test", "mtweaver04@yahoo.com");
    }

}