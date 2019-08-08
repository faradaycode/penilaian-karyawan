<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ModKaryawan extends CI_Model
{

    var $table = 'karyawans';
    var $column_order = array('nip_k', 'nama_k'); //field yang ada di table user
    var $column_search = array('nip_k', 'nama_k'); //field yang diizin untuk pencarian 
    var $order = array('nama_k' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_all_karyawans()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $result = $this->db->get();

        return $result->result();
    }

    private function _get_datatables_query()
    {

        $this->db->select("id_k, nip_k, nama_k, nama_j, mulai_kerja");
        $this->db->from($this->table);
        $this->db->join("jabatans", $this->table . ".id_j=jabatans.id_j");

        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by(
                $this->column_order[$_POST['order']['0']['column']],
                $_POST['order']['0']['dir']
            );
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();

        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();

        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);

        return $this->db->count_all_results();
    }

    function delKyw($id)
    {
        $sql = "DELETE $id from karyawans";
        $query = $this->db->query($sql);

        return $query->result();
    }

    function getJabatan()
    {
        $this->db->select("*");
        $this->db->from("jabatans");
        $res = $this->db->get();

        return $res->result();
    }

    function add($nip, $nama, $jabatan, $hari_gabung)
    {
        $data = array(
            NIPKYW => $nip,
            NAMAKYW => $nama,
            IDJABAT => $jabatan,
            MULAIKERJA => $hari_gabung
        );

        return $this->db->insert("karyawans", $data);
    }

    function update($id, $nip, $nama, $jabatan, $hari_gabung)
    {
        $data = array(
            NIPKYW => $nip,
            NAMAKYW => $nama,
            IDJABAT => $jabatan,
            MULAIKERJA => $hari_gabung
        );

        $this->db->where("id_k", $id);

        return $this->db->update("karyawans", $data);
    }

    function addBatch($array)
    {
        return $this->db->insert_batch("karyawans", $array);
    }

    function getAllNilai()
    {
        $this->db->select("nama_k, nip_k, nama_j, n_teknis, n_nonteknis, n_pribadi");
        $this->db->from("karyawans");
        $this->db->join("jabatans", "jabatans.id_j= karyawans.id_j");
        $this->db->join("nilais", "nilais.id_k= karyawans.id_k");

        $query = $this->db->get();

        return $query->result();
    }

    function del($id)
    {
        $this->db->where('id_k', $id);
        return $this->db->delete($this->table);
    }
}
