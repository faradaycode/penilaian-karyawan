<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ModPertanyaan extends CI_Model
{

    public function getTanya()
    {
        $sql = "SELECT a.*, b.* FROM pertanyaans a JOIN aspek_nilai b ON 
        a.id_aspek = b.id_aspek";
        $query = $this->db->query($sql);
        $res = $query->result();
        // $data = array();
        // $aspek = array();
        // $obj = new stdClass();

        // foreach ($res as $rows) {
        //     foreach {
        //         array_push(
        //             $data,
        //             array(
        //                 "id_pty" => $rows->id_pty,
        //                 "pertanyaan" => $rows->isi_pertanyaan
        //             )
        //         );
        //     }
        // }

        // return $query->result();
        return $res;
    }
}
