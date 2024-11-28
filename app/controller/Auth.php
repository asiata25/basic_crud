<?php
class Auth extends BaseController
{
    private UserModel $userModel;
    public function __construct()
    {
        $this->userModel = $this->model("UserModel");
    }


    function showLogin()
    {
        $data["title"] = "Login";

        $this->view('template/header', $data);
        $this->view("auth/login");
        $this->view('template/footer');
    }

    function login()
    {
        $email = $_POST["email"];
        $user = $this->userModel->getUserByEmail($email);

        $data["title"] = "Login";
        $data["user"] = $user;
        $this->view('template/header', $data);
        $this->view("auth/login", $data);
        $this->view('template/footer');
    }
}
