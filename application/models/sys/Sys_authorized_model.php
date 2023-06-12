<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sys_authorized_model extends CI_Model
{

    public $table = 'sys_authorized';
    public $id = 'id';
	public $idlevel = 'id_level';
    public $order = 'DESC';
	
	private $id_super_admin = 1;
	private $show = 1;
	private $active = 1;
	private $nonactive=0;
	private $hide = 0;

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
		$afield=array(
		 'sys_authorized.id',
		 'sys_authorized.id_level',
		 'sys_authorized.id_form',
		);
	$this->db->select($afield);
	$this->db->order_by('sys_authorized.'.$this->id, $this->order);
     return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
		$afield=array(
		 'sys_authorized.id',
		 'sys_authorized.id_level',
		 'sys_authorized.id_form',
		);
	$this->db->select($afield);
	$this->db->where('sys_authorized.'.$this->id, $id);
    return $this->db->get($this->table)->row();
    }
	
	
	function get_by_idlevel($idlevel)
    {
		$afield=array(
		 'sys_authorized.id',
		 'sys_authorized.id_level',
		 'sys_authorized.id_form',
		);
		$this->db->select($afield);
		$this->db->where('sys_authorized.'.$this->idlevel, $idlevel);
		return $this->db->get($this->table)->row();
    }
	
	function get_all_by_idlevel($idlevel){
		$afield=array(
		 'sys_authorized.id',
		 'sys_authorized.id_level',
		 'sys_authorized.id_form',
		);
		$this->db->select($afield);
		$this->db->where('sys_authorized.'.$this->idlevel, $idlevel);
		return $this->db->get($this->table)->result_array();
    }

	
	
	function is_valid_auth_link($idlevel,$idform)
    {
		$condition=array(
		 'sys_authorized.id_level'=>$idlevel,
		 'sys_authorized.id_form'=>$idform,
		);
		
		$this->db->select('id');
		$data= $this->db->get_where($this->table,$condition,1)->row();
    
		if($data==NULL){
			return 'false';
		}else{
			return 'true';
		}
	
	}
	
	
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('id_level', $q);
	$this->db->or_like('id_form', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
		$this->db->or_like('id_level', $q);
		$this->db->or_like('id_form', $q);
		$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

	// delete multiple data
	function delete_multiple($data){
		if(!empty($data)){
				$this->db->where_in($this->id,$data);
				$this->db->delete($this->table);
		}		
	}
	
	function delete_multiple_bylevel($data){
		if(!empty($data)){
				$this->db->where_in('id_level',$data);
				//BLOCK DELETE SUPER ADMIN
				$this->db->where_not_in('id_level',$this->id_super_admin);
				$this->db->delete($this->table);
		}		
	}	
}

/* End of file Sys_authorized_model.php */
/* Location: ./application/models/Sys_authorized_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-03-15 05:08:36 */
/* http://harviacode.com */