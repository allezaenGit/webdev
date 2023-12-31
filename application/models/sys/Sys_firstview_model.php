<?php

/* ATURAN
* - Data Hanya Boleh di akses / di lihat oleh userGroup yang sama
* - Pembatasan di lakukan dengan menggunakan Query :
* 	$this->db->where($this->table.'.'.$this->f_usergroup, $this->user_group_id);
* -	$user_group_id..di isi dari contructor controller pemanggil
*
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sys_firstview_model extends CI_Model
{

    public $table = 'sys_firstview';
    public $id = 'id';
    public $order = 'DESC';
	public $f_usergroup = 'opt_usergroup';
	public $user_group_id='';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
		$afield=array(
		 $this->table.'.id',
		 $this->table.'.initial',
		 $this->table.'.id_menu',
		);
	$this->db->select($afield);
	$this->db->where($this->table.'.'.$this->f_usergroup, $this->user_group_id);
	$this->db->order_by('sys_firstview.'.$this->id, $this->order);
     return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
		$afield=array(
		 $this->table.'.id',
		 $this->table.'.initial',
		 $this->table.'.id_menu',
		);
	$this->db->select($afield);
	$this->db->where($this->table.'.'.$this->f_usergroup, $this->user_group_id);
	$this->db->where('sys_firstview.'.$this->id, $id);
    return $this->db->get($this->table)->row();
    }
	
	
	
	/* Memastikan data yg dibuat tidak kembar/sama,
	   fungsi ini sebagai pengganti fungsi primary key dr db,
	   krn primary key sudah di gunakan untuk column id,
	   untuk memastikan data yg exist bukan data yang sementara di proses
	   maka di gunakan fungsi " where_not_in ".
	   -create : id di kosongkan.
	   -update : id di isi dengan id data yg di proses.	
	*/	
	function if_exist($id,$data){

		$this->db->where_not_in($this->table.'.id',$id);
		$this->db->where($this->table.'.'.$this->f_usergroup, $this->user_group_id);
		$q=$this->db->get_where($this->table, $data)->result_array();
		if(count($q)>0){
			return 'true';
		}else{
			return 'false';
		}		
	}	
	
	
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
		$this->db->where($this->table.'.'.$this->f_usergroup, $this->user_group_id);
		$this->db->or_like('initial', $q);
		$this->db->where($this->table.'.'.$this->f_usergroup, $this->user_group_id);
		$this->db->or_like('id_menu', $q);
		$this->db->where($this->table.'.'.$this->f_usergroup, $this->user_group_id);
		$this->db->from($this->table);
        return 	$this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
		$afield=array(
		 $this->table.'.id',
		 $this->table.'.initial',
		 $this->table.'.id_menu',
		);
		$this->db->select($afield);        $this->db->order_by($this->id, $this->order);
        $this->db->like('sys_firstview.id', $q);
		$this->db->where($this->table.'.'.$this->f_usergroup, $this->user_group_id);
		$this->db->or_like('sys_firstview.initial', $q);
		$this->db->where($this->table.'.'.$this->f_usergroup, $this->user_group_id);
		$this->db->or_like('sys_firstview.id_menu', $q);
		$this->db->where($this->table.'.'.$this->f_usergroup, $this->user_group_id);
		$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

	// get data with limit, filter and search
    function get_limit_data_filter($limit, $start = 0, $q = NULL, $field_filter) {
		$afield=array(
		 $this->table.'.id',
		 $this->table.'.initial',
		 $this->table.'.id_menu',
		);
		$this->db->select($afield);
		$this->db->order_by($this->id, $this->order);
		switch($field_filter){
			 default :
				 $this->db->like('sys_firstview.'.$field_filter, $q);
				 $this->db->where($this->table.'.'.$this->f_usergroup, $this->user_group_id);
		}
		$this->db->limit($limit, $start);
		return $this->db->get($this->table)->result();
	}
	
    // insert data
    function insert($data)
    {
		$data[$this->f_usergroup] = $this->user_group_id;
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
		$this->db->where($this->table.'.'.$this->f_usergroup, $this->user_group_id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
		$this->db->where($this->table.'.'.$this->f_usergroup, $this->user_group_id);
        $this->db->delete($this->table);
    }

	// delete multiple data
	function delete_multiple($data){
		if(!empty($data)){
				$this->db->where_in($this->id,$data);
				$this->db->where($this->table.'.'.$this->f_usergroup, $this->user_group_id);
				$this->db->delete($this->table);
		}		
	}	
}

/* End of file Sys_firstview_model.php */
/* Location: ./application/models/Sys_firstview_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-06-18 00:38:20 */
/* http://harviacode.com */