<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ModLogin extends CI_Model
{

    public function getUser($userid, $password)
    {
        $sql = "SELECT username, photo FROM users WHERE userid='".$userid."' AND password='".$password."'";
        $query = $this->db->query($sql);
        
        return $query->result();
    }
}
