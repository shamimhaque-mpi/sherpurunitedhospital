<?php

class Action extends Lab_Model {

    function __construct() {
        parent::__construct();
    }

    // for custom helper
    public function maxId($table) {
        $sql = "SELECT id AS maxId FROM $table ORDER BY id DESC LIMIT 1";

        $query = $this->db->query($sql);
        if($query->num_rows() > 0){
            return $query->result();
        }
        return 0;
    }
 

    public function read_sum($table, $column, $where=array()){
        $this->db->select_sum($column);
        $this->db->where($where);
        $result = $this->db->get($table);

        return $result->result();
    }

    public function max_value($table, $column, $where = array()) {
        $this->db->select_max($column);
        $this->db->where($where);

        $result = $this->db->get($table)->row(); 

        return $result->$column;
    }



 //For barcode
    public function read_col($table, $col = "*", $where=array(),$type='asc',$field='id'){
		$this->db->select($col);
		$this->db->where($where);
		$this->db->order_by($field,$type);
		$query=$this->db->get($table);
		return $query->result();
	}
	



    public function get_max_value($table,$column,$length){
        $sql = "SELECT max($column) as last_code FROM $table WHERE length($column)='$length' " ;
        $query = $this->db->query($sql);
        return $query->result();
    }



    // for custom helper
    public function forIdGenerator($table) {
        if(!count($this->db->ar_orderby)) {
            $this->db->order_by('id', 'desc');
        }

        $this->db->limit(1);
        return $this->db->get($table)->result();
    }

    // retrieve unic value from database
    public function read_distinct($table, $where = array(), $column) {
        $this->db->distinct();
        $this->db->select($column);
        $this->db->where($where);

        return $this->db->get($table)->result();
    }
    // check existance
    public function exists($table, $where) {
        // true or false
        return $this->existance($table, $where);
    }

      public function readOrderby($table,$order_by,$where=array(),$sort='asc'){
        $this->db->order_by($order_by,$sort);
        $this->db->where($where);
        $query = $this->db->get($table);

        return $query->result();
    }

    // save into database
    public function add($table, $data) {
        $this->_table_name = $table;
        return $this->save($data);
    }
 
    // save into database
    public function addAndGetInsertedID($table, $data) {
        $this->db->insert($table, $data);
        $id = $this->db->insert_id();

        return $id;
    }

    // update into database
    public function update($table, $data, $where) {
        $this->_table_name = $table;
        return $this->save($data, $where);
    }

    // retrieve from database
    public function read($table, $where = array(), $by="asc") {
        $this->_table_name = $table;
        $this->_order_type = $by;

        if(count($where) > 0){
            return $this->retrieve_by($where);
        } else {
            return $this->retrieve();
        }
    }

    public function read_limit($table, $where = array(), $by="asc", $limit) {
        $this->_table_name = $table;
        $this->_order_type = $by;
        if (isset($limit)) {
            $this->_limit = $limit;
        }

        if(count($where) > 0){
            return $this->retrieve_by($where);
        } else {
            return $this->retrieve();
        }
    }

    public function readGroupBy($table, $groupBy, $where=array(), $orderBy="id", $sort="desc"){
        $this->db->select('*');
        $this->db->group_by($groupBy); 
        $this->db->order_by($orderBy, $sort); 
        $this->db->where($where);
        $result = $this->db->get($table);

        return $result->result();
    }

	// retrieve from database using two table
    public function joinAndRead($from, $join, $joinCond, $where=array()){
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($join, $joinCond);
        $this->db->where($where);

        $query = $this->db->get();

		return $query->result();
    }
    

    // retrieve from database using multiple table
    public function multipleJoinAndRead($from, $details=array(), $where=array()){
        $this->db->select('*');
        $this->db->from($from);

        // check type exists or not
        foreach ($details as $key => $val) {
            if(array_key_exists("type", $val)){
                $this->db->join($key, $val["condition"], $val["type"]);
            } else {
                $this->db->join($key, $val["condition"]);
            }
        }

        // appling condition
        $this->db->where($where);
        // get the result set
        $query = $this->db->get();
 
        
        // return the set
        return $query->result();
    }

    public function searchTransaction($table) {
        $bank= $this->input->post('bank_name');
        $account= $this->input->post('account_no');
        $fromDate= $this->input->post('date_from');
        $toDate= $this->input->post('date_to');

        $sql = "SELECT * FROM $table WHERE bank='$bank' AND account_number='$account' AND transaction_date BETWEEN   '$fromDate' AND  '$toDate' ";

		$query = $this->db->query($sql);
		return $query->result();
    }

	public function searchCost($table){
        $fromDate= $this->input->post('date_from');
        $toDate= $this->input->post('date_to');

        $sql = "SELECT * FROM $table WHERE  datetime BETWEEN   '$fromDate' AND  '$toDate' order by datetime asc";

		$query = $this->db->query($sql);
		return $query->result();
    }

    // retrieve from database
    public function showbyClass($table, $where = array()){
        $this->_table_name = $table;
        return $this->retrieve_by($where);
    }

	// retrieve from database
    public function show($table){
        $this->_table_name = $table;
		$this->_limit = '10';
        $this->_order_type = 'desc';
        return $this->retrieve();
    }

	// retrieve from database
    public function showbyDesc($table){
        $this->_table_name = $table;
        $this->_order_type = 'desc';
        return $this->retrieve();
    }

    // delete information from table
    public function deleteData($table, $where) {
        $this->_table_name = $table;

        if($this->delete($where)){
            return 'danger';
        }
    }

	public function getAllItems($table) {
        return $this->db->distinct('account_number')->from($table)->get()->result();
    }// for distinct value


    public function retrieve_cond($table, $where = array(), $order = 'asc') {
        $this->db->where($where);
        $this->db->order_by("id", $order);
        $query = $this->db->get($table);

        if($query->num_rows() > 0){
            return $query->result();
        } else {
            return FALSE;
        }
    }

	// retrieve from database
    public function readDistinct($table, $field_name , $where=null){
        
      
        $this->db->distinct($field_name);
        
         if(!empty($where)){
            $this->db->where($where);
        }
        
        $query = $this->db->get($table);
        
        return $query->result();
    }

    public function read_leftJoin($leftTable,$leftField,$rightTable,$rightField){
        $sql= "select * from $leftTable LEFT JOIN users ON $leftTable.$leftField=$rightTable.$rightField";
        $query=$this->db->query($sql);
        return $query->result();
    }

    public function check_existance($table, $where) {
        return $this->existance($table, $where);
    }
    
    public function update_profile($info, $where) {
        $this->_table_name = 'users';
        return $this->save($info, $where);
    }
    
    public function sms_between($table,$fromDate,$toDate) {
        $sql = "SELECT * FROM $table WHERE delivery_date BETWEEN   '$fromDate' AND  '$toDate' ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    // Sum function 
    public function sum($table, $column, $where=array()){
        $this->db->select("SUM($column) as total");
        $this->db->where($where);
        $result = $this->db->get($table);

        return $result->result();
    }

    public function readGroupBySum($table, $groupBy, $where=array()){
        $this->db->select('date, details, SUM(amount) as amount, status');
        $this->db->group_by($groupBy); 
        $this->db->where($where);

        $result = $this->db->get($table);
        return $result->result();
    }
    
    /*
    public function read_leftJoin(){
        $sql= "select * from employee LEFT JOIN users ON employee.employee_mobile=users.mobile where employee_mobile='01735189237' ";
        $query=$this->db->query($sql);
        return $query->result();
    }
    */

    public function readWithIn($table, $column, $value){
        $sql = "select * from $table where $column in ($value)";
        $query = $this->db->query($sql);
        
        return $query->result();
    }

    public function getJournalGroupBy($where) {
        $this->db->select('details, SUM(amount) as total');
        $this->db->group_by('details'); 
        $this->db->where($where);

        $result = $this->db->get('journal');
        return $result->result();
    }


}   

