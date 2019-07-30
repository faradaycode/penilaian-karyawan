<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ModNilai extends CI_Model
{
    //field yang ada di table user
    var $column_order = array('a.nip_k', 'a.nama_k', 'b.n_teknis', 'b.n_nonteknis', 'b.n_pribadi');
    var $column_search = array('a.nip_k', 'a.nama_k'); //field yang diizin untuk pencarian 
    var $order = array('a.nama_k' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_all_nilai()
    {
        $sql = "SELECT a.*, b.n_teknis, b.n_nonteknis, b.n_pribadi 
        FROM karyawans a LEFT JOIN nilais b ON a.id_k = b.id_k";

        $result = $this->db->query($sql);

        return $result->result();
    }

    private function _get_datatables_query()
    {
        // $sql = "SELECT a.*, b.n_teknis, b.n_nonteknis, b.n_pribadi 
        // FROM karyawans a LEFT JOIN nilais b ON a.id_k = b.id_k";

        $this->db->select("a.*, b.n_teknis, b.n_nonteknis, b.n_pribadi");
        $this->db->from("karyawans a");
        $this->db->join("nilais b", "a.id_k = b.id_k");
        // $this->db->query($sql);

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
        $this->db->select("a.*, b.n_teknis, b.n_nonteknis, b.n_pribadi");
        $this->db->from("karyawans a");
        $this->db->join("nilais b", "a.id_k = b.id_k");

        return $this->db->count_all_results();
    }
}
