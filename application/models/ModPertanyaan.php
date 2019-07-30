<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ModPertanyaan extends CI_Model
{

    public function getTanya()
    {
        $sql = "SELECT a.*, b.aspek_ket FROM pertanyaans a JOIN aspek_nilai b ON a.id_aspek = b.id_aspek";
        $query = $this->db->query($sql);

        return $query->result();
    }
}
