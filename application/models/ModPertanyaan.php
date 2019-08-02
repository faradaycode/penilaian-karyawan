<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ModPertanyaan extends CI_Model
{

    public function getTanya()
    {
        $sql = "SELECT a.*, b.* FROM pertanyaans a JOIN aspek_nilai b ON 
        a.id_aspek = b.id_aspek ORDER BY a.id_aspek ASC";
        $query = $this->db->query($sql);
        $res = $query->result();
        $jsout = array();

        foreach ($res as $objp) {
            if (!array_key_exists($objp->id_aspek, $jsout)) {
                $exObj = new stdClass();

                $exObj->id_aspek = $objp->id_aspek;
                $exObj->aspek_ket = $objp->aspek_ket;
                $exObj->isi = array();

                $jsout[$objp->id_aspek] = $exObj;
            }

            $insideObj = new stdClass();

            $insideObj->id_pty = $objp->id_pty;
            $insideObj->pertanyaan = $objp->isi_pertanyaan;

            $jsout[$objp->id_aspek]->isi[] = $insideObj;
        }

        $jsout = array_values($jsout);

        return json_encode($jsout);
    }

    function getIdPty()
    {
        $this->db->select("id_pty");
        $this->db->from("pertanyaans");
        $query = $this->db->get();

        return $query->result();
    }
}
