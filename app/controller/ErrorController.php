<?php
class ErrorController extends BaseController
{
    function notFound()
    {
        $data["title"] = "404";
        $this->view('template/header', $data);
        $this->view('error/404');
        $this->view('template/footer');
    }
}
