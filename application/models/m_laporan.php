<?php

class M_laporan extends CI_Model
{

    var $cuti           = 'cuti as a';
    var $user           = 'user as b';
    var $user_detail    = 'user_detail as c';

    var $column_order = array(null, 'c.nama_lengkap', null, null, null, null, null);
    var $column_search = array('c.nama_lengkap');
    var $order = array('c.nama_lengkap' => 'asc');

    private function _get_datatables_query() {
        $employeeFilter     = $this->input->post('employee_filter');
        $startDateFilter    = $this->input->post('start_date_filter');
        $endDateFilter      = $this->input->post('end_date_filter');
        
        if ($employeeFilter) {
            $this->db->where('a.id_user ', $employeeFilter);
        }

        if ($startDateFilter) {
            $this->db->where('a.mulai >=', $startDateFilter);
        }
        

        if ($endDateFilter) {
            $this->db->where('a.berakhir <=', $endDateFilter);
        }

        $this->db->select('
            a.id_cuti,
            a.id_user,
            c.nama_lengkap,
            a.tgl_diajukan,
            a.mulai,
            a.berakhir,
            a.perihal_cuti,
            a.id_status_cuti
            ');
        $this->db->from($this->cuti);
        $this->db->join($this->user, 'a.id_user=b.id_user');
        $this->db->join($this->user_detail, 'b.id_user_detail=c.id_user_detail');

        $i = 0;

    foreach ($this->column_search as $item) // loop column 
    {
      if ($_POST['search']['value']) // if datatable send POST for search
      {

        if ($i === 0) // first loop
        {
          $this->db->group_start(); /* open bracket. query Where with OR clause 
          better with bracket. because maybe can combine with other WHERE with AND. */
          $this->db->like($item, $_POST['search']['value']);
      } else {
          $this->db->or_like($item, $_POST['search']['value']);
      }

        if (count($this->column_search) - 1 == $i) //last loop
          $this->db->group_end(); //close bracket
      }
      $i++;
  }

    if (isset($_POST['order'])) // here order processing
    {
      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], 
        $_POST['order']['0']['dir']);
      
  } else if (isset($this->order)) {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
  }
}

function count_filtered()
{
    $this->_get_datatables_query();
    $query = $this->db->get();
    return $query->num_rows();
}

public function count_all()
{
    $this->_get_datatables_query();
    return $this->db->count_all_results();
}

public function getData()
{
    $this->_get_datatables_query();
    if ($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
  $query = $this->db->get();
  return $query->result();
}

public function exportDataCuti($userId, $startDate, $endDate) {
    if ($userId != 0) {
        $this->db->where('a.id_user ', $userId);
    }

    if ($startDate != 0) {
        $this->db->where('a.mulai >=', $startDate);
    }


    if ($endDate != 0) {
        $this->db->where('a.berakhir <=', $endDate);
    }

    $this->db->select('
        a.id_cuti,
        a.id_user,
        c.nama_lengkap,
        a.tgl_diajukan,
        a.mulai,
        a.berakhir,
        a.perihal_cuti,
        a.id_status_cuti
        ');
    $this->db->from($this->cuti);
    $this->db->join($this->user, 'a.id_user=b.id_user');
    $this->db->join($this->user_detail, 'b.id_user_detail=c.id_user_detail');

    $query = $this->db->get();
    return $query->result_array();
}



}