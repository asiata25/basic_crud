<?php
class UserModel extends BaseModel
{
    function getUserByEmail($email)
    {
        $this->db->query("SELECT * FROM users WHERE email=:email");
        $this->db->bind("email", $email);
        return $this->db->fetch();
    }
}
