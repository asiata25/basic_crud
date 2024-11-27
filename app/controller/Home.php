<?php
class Home extends BaseController
{
    function index()
    {
        $data["title"] = "Home";
        $data["name"] = "mantap";
        $this->view('template/header', $data);
        $this->view('home/index', $data);
        $this->view('template/footer');
    }
}
