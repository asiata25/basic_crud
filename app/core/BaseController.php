<?php
class BaseController
{
    function view($name, $data = [])
    {
        require_once "../app/view/" . $name . ".php";
    }

    function model($name) : BaseModel
    {
        require_once "../app/model/" . $name . ".php";
        return new $name;
    }
}
