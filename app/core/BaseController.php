<?php
class BaseController
{
    function view($name, $data = [])
    {
        require_once "../app/view/" . $name . ".php";
    }
}
