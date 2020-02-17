
<?php
class CuttingDetailModel extends CI_Model{
    var $table = 'cutting_detail';   

    var $column_order = array('id_cutting_detail', 'size', 'qty', 'no_bundle');
    var $column_search = array('id_cutting_detail', 'size', 'qty', 'no_bundle');
    var $order = array('id_cutting_detail' => 'asc');
    
    private function _get_datatables_query(){
        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item)
        {
            if($_POST['search']['value'])
            {

                if($i===0) // first loop
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
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

    public function get_all(){
        $this->db->from($this->table);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_cutting_detail',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_by_id_cutting($idCutting){
        $this->db->select('id_cutting_detail, size, qty, no_bundle,cutting_date');
        $this->db->from($this->table);
        $this->db->where('id_cutting',$idCutting);
        $this->db->where('cutting_date',null);
        $query = $this->db->get();

        // print_r($query->result());
        // print_r($this->db->last_query());

        return $query->result();        
    }

    public function save($idCutting)
    {
        // $this->db->insert($this->table, $data);
        // return $this->db->insert_id();
        if(isset($_POST['dataCuttingDetail'])){
            $dataCuttingDetail = $_POST['dataCuttingDetail'];
            $data = array(
                'id_cutting' => $dataCuttingDetail['id_cutting'],
                'size' => $dataCuttingDetail['size'],
                'qty' => $dataCuttingDetail['qty'],
                'no_bundle' => $dataCuttingDetail['no_bundle'],
                'kode_barcode' => $dataCuttingDetail['kode_barcode'],
                'outermold_barcode' => $dataCuttingDetail['outermold_barcode'],
                'midmold_barcode' => $dataCuttingDetail['midmold_barcode'],
                'linningmold_barcode' => $dataCuttingDetail['linningmold_barcode']                
            );

            $this->db->insert($this->table, $data);

            return "OK";
        }
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id_cutting_detail', $id);
        $this->db->delete($this->table);
    }

    public function update2(){
        if(isset($_POST['dataStr'])){
            $dataStr = $_POST['dataStr'];
            $id = $dataStr['id'];
            $tgl = $dataStr['tgl'];

            $this->db->update($this->table, array("cutting_date" => date('Y-m-d', strtotime($tgl))), array("id_cutting_detail" => $id));
            return $this->db->affected_rows();
        }
    }

}