<?php
class Auth extends BaseController
{
    function showLogin()
    {
        $data["title"] = "Login";
        $this->view("template/header", $data);
        $this->view("auth/login");
        $this->view("template/footer");
    }
}
