<?php

class Ajax extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('action');
    }

    public function retrieveBy($table) {
        $receive = filter_input(INPUT_POST, 'condition');
        $condition = json_decode($receive, TRUE); // json object to array

        $result = $this->action->read($table, $condition);
        echo json_encode($result);
    }

    public function retrieve_Distinct($table){
        $receive = filter_input(INPUT_POST,"condition");
        $condition = json_decode($receive, TRUE); // json object to array

        $result = $this->action->readDistinct($table,$condition['column']);
        echo json_encode($result);
     }

    public function deleteInfo($table) {
        // for database
        $receiveCond = filter_input(INPUT_POST, 'condition');
        $condArray = json_decode($receiveCond, TRUE); // json object to array

        // delete from database
        $confirm = $this->action->deleteData($table, $condArray);
        // show message
        echo $this->data[$confirm];
    }

    public function deleteWithFile($table) {
        // for database
        $receiveCond = filter_input(INPUT_POST, 'condition');
        $condArray = json_decode($receiveCond, TRUE); // json object to array
        // for files
        $receiveFile = filter_input(INPUT_POST, 'file');

        //check file exists or not
        if( !empty($receiveFile) ){
            $fileArray = explode(',', $receiveFile); // create an array
            // delete file from dir
            for($i=0;$i<count($fileArray);$i++){
                $path = './public/attachment/'.$fileArray[$i];
                unlink($path);
            }
        }

        // delete from database
        $confirm = $this->action->deleteData($table, $condArray);
        // show message
        echo $this->data[$confirm];
    }




    public function readJoinData(){
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $form = $receive['from'];
        $join = $receive['join'];

        // take the condition
        $joinCond = $receive['cond'];

        // check and set where condition exists or not
        $where = array();
        if(array_key_exists('where', $receive)){
            foreach ($receive['where'] as $key => $val) {
                if($val != ""){
                    $where[$key] = $val;
                }
            }
        }

        // get information from database
        $result = $this->action->joinAndRead($form, $join, $joinCond, $where);

        // convart the information array to JSON string
        echo json_encode($result);
    }


    public function readJoinDataFromMultipleTable(){
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $form = $receive['from'];
        $join = $receive['join'];

        // check and set where condition exists or not
        $where = array();
        if(array_key_exists('where', $receive)){
            foreach ($receive['where'] as $key => $val) {
                if($val != ""){
                    $where[$key] = $val;
                }
            }
        }

        // get information from databas
        $result = $this->action->multipleJoinAndRead($form, $join, $where);

        // convart the information array to JSON string
        echo json_encode($result);
    }


    // all new functions
    public function read(){
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $table = $receive['table'];

        // set a default condition
        $condition = array();

        // check the condition exists into the array
        if(array_key_exists('cond', $receive)){
            $condition = $receive['cond'];
        }

        // get information from database
        $result = $this->action->read($table, $condition);

        // convart the information array to JSON string
        echo json_encode($result);
    }


    // read limit method
    public function read_limit(){
        $content = file_get_contents("php://input");
        $content_array = json_decode($content, true);
        $table_name = $content_array['table'];
        
        $where = array();
        if(array_key_exists('cond', $content_array)){
            $where = $content_array['cond'];
        }
        
        $by = 'asc';
        if(array_key_exists('by', $content_array)){
            $by = $content_array['by'];
        }
        
        $limit = 1;
        if(array_key_exists('limit', $content_array)){
            $limit = $content_array['limit'];
        }
        
        $data = $this->action->read_limit($table_name, $where, $by, $limit);
        
        echo json_encode($data);
    }
    


    public function readDistinct(){
        // get the incoming object
        $content = file_get_contents("php://input");
        // convart object to array
        $receive = json_decode($content, true);        
        // take table name from the array
        $table = $receive['table'];
        // set a default condition
        $condition = array();
        // check the condition exists into the array
        if(array_key_exists('cond', $receive)){
            $condition = $receive['cond'];
        }
        // get information from database
        $result = $this->action->read_distinct($table, $condition, $receive['column']);

        // convart the information array to JSON string
        echo json_encode($result);
    }


    //get data from database using groupby clause
    public function read_GroupBy(){
        // get the incoming object
        $content = file_get_contents("php://input");
        // convart object to array
        $receive = json_decode($content, true);
        // take table name from the array
        $table = $receive['table'];
        // set a default condition
        $condition = array();
        // check the condition exists into the array
        if(array_key_exists('cond', $receive)){
            $condition = $receive['cond'];
        }
        // get information from database
        $result = $this->action->readGroupBy($table, $receive['column'], $condition);

        // convart the information array to JSON string
        echo json_encode($result);
    }



    public function delete(){
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $table = $receive['table'];

        // set a default condition
        $condition = array();

        // check the condition exists into the array
        if(array_key_exists('cond', $receive)){
            $condition = $receive['cond'];
        }

        // check and delete file from folder
        if(array_key_exists('file', $receive)){
            if($receive['file'] == true){
                // get information from database
                $result = $this->action->read($table, $condition);
                $this->deleteFile($result[0]->path);
            }
        }

        // delete from database
        $confirm = $this->action->deleteData($table, $condition);

        // show message
        echo $this->data[$confirm];
    }

    public function deleteFileJS(){
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        // call the deleteFile function
        $this->deleteFile($receive);
    }

    public function deleteFile($files=array()) {
        foreach($files as $key => $file) {
            $path = './'.$file;
            unlink($path);
        }
    }

    public function save(){
        $result = null;

        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $table = $receive['table'];
        
        // take data from the array
        $data = $receive['data'];

        // set a default condition
        $condition = array();

        // check the condition exists into the array
        if(array_key_exists('cond', $receive)){
            $condition = $receive['cond'];
            $result = $this->action->update($table, $data, $condition);
        } else {
            $result = $this->action->add($table, $data);
        }

        // convart the information array to JSON string
        echo $result;
    }
    
    public function bill_status(){
        $result = null;

        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $table = $receive['table'];
        
        // take patient contact from the array
        $contact = $receive['contact'];
        
        // take table title from the array
        $title = $receive['title'];

        // take data from the array
        $data = $receive['data'];

        // set a default condition
        $condition = array();

        // check the condition exists into the array
        if(array_key_exists('cond', $receive) && $title=="diagnosis"){
            $condition = $receive['cond'];
            $result = $this->action->update($table, $data, $condition);
            if($result && $data['payment_status'] == "completed")
            {
                $content = 'প্রিয় গ্রাহক আপনার ডায়াগনোসিস রিপোর্টের কাজ সম্পূর্ণ হয়েছে। আপনি রিপোর্ট সংগ্রহ করতে পারেন ধন্যবাদ, \nআল-আমিন ডায়ানোসিস।';
               	$message = send_sms($content, $content);
                $insert = array(
                    'delivery_date'     => date('Y-m-d'),
                    'delivery_time'     => date('H:i:s'),
                    'mobile'            => $contact,
                    'message'           => $content,
                    'total_characters'  => 120,
                    'total_messages'    => 1,
                    'delivery_report'   => $message
                );
                $this->action->add('sms_record', $insert);
            }
        }

        // convart the information array to JSON string
        echo $result;
    }

    public function memberId(){
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);
        $branch = $receive["branch"];
        $team = $receive["team"];

        // get id no
        $memberId = memberId('members', $branch, $team);
        echo $memberId;
    }

    public function calculateAge(){
        echo age($_POST["dob"]);
    }

    public function getTransactionDescription(){
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);
        $key = $receive["key"];

        echo json_encode(config_item($key));
    }

    public function exists() {
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        $table = $receive['table'];
        $where = $receive['where'];

        $result = $this->action->read($table, $where);

        if($result != null) {
            echo 1;
        } else {
            echo 0;
        }
    }


    // get all data
    public function result(){
		
        // get the incoming object
        $content = file_get_contents("php://input");
        
        // convart object to array
        $receive = json_decode($content, true);
        
        // take table name from the array
        $table = $receive['table'];

        // set a default condition
        $where = [];
        // check the condition exists into the array
        if(array_key_exists('cond', $receive)){
            $where = $receive['cond'];
        }
		
		// where in
		$where_in = [];
        if(array_key_exists('where_in', $receive)){
            $where_in = $receive['where_in'];
        }
        
        // check select column
        if(array_key_exists('select', $receive)){
            $select = $receive['select'];
        }else{
            $select = '';
        }
        
        // check group
        if(array_key_exists('groupBy', $receive)){
            $groupBy = $receive['groupBy'];
        }else{
            $groupBy = '';
        }
        
        
        // check order column
        if(array_key_exists('order_col', $receive)){
            $order_col = $receive['order_col'];
        }else{
            $order_col = '';
        }
		
		// check order by
		if(array_key_exists('order_by', $receive)){
            $order_by  = $receive['order_by'];
        }else{
            $order_by = 'ASC';
        }
        
        // check limit
        if(array_key_exists('limit', $receive) && array_key_exists('limit_offset', $receive)){
            $limit = $receive['limit'];
            $limit_offset = $receive['limit_offset'];
        }elseif(array_key_exists('limit', $receive)){
            $limit = $receive['limit'];
			$limit_offset = '';
        }else{
			$limit = '';
			$limit_offset = '';
		}
        
        // get information from database
        $result = get_result($table, $where, $select, $groupBy, $order_col, $order_by, $limit, $limit_offset, $where_in);

        // convart the information array to JSON string
        echo json_encode($result);
    }
	
    
    // get all join data
    public function join(){
		
        // get the incoming object
        $content = file_get_contents("php://input");
        

        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $tableFrom  = $receive['tableFrom'];
        $tableTo    = $receive['tableTo'];

        // join condition
        $joinCond = [];
        // check the condition exists into the array
        if(array_key_exists('joinCond', $receive)){
            $joinCond = $receive['joinCond'];
        }
        
        // where condition
        $where = [];
        if(array_key_exists('cond', $receive)){
            $where = $receive['cond'];
        }
		
		$where_in = [];
        if(array_key_exists('where_in', $receive)){
            $where_in = $receive['where_in'];
        }
        
        // check select column
        if(array_key_exists('select', $receive)){
            $select = $receive['select'];
        }else{
            $select = '';
        }
        
        // check group
        if(array_key_exists('groupBy', $receive)){
            $groupBy = $receive['groupBy'];
        }else{
            $groupBy = '';
        }
        
       // check border by
        if(array_key_exists('order_col', $receive)){
            $order_col = $receive['order_col'];
        }else{
            $order_col = '';
        }
		
        if(array_key_exists('order_by', $receive)){
            $order_by  = $receive['order_by'];
        }else{
            $order_by = 'ASC';
        }
        
        // check limit
        if(array_key_exists('limit', $receive) && array_key_exists('limit_offset', $receive)){
            $limit = $receive['limit'];
            $limit_offset = $receive['limit_offset'];
        }elseif(array_key_exists('limit', $receive)){
            $limit = $receive['limit'];
			$limit_offset = '';
        }else{
			$limit = '';
			$limit_offset = '';
		}
        
        // get information from database
        $result = get_join($tableFrom, $tableTo, $joinCond, $where, $select, $groupBy, $order_col, $order_by, $limit, $limit_offset, $where_in);

        // convart the information array to JSON string
        echo json_encode($result);
    }
    
    // make left join 
    public function leftJoin(){
        // get the incoming object
        $content = file_get_contents("php://input");
        

        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $tableFrom  = $receive['tableFrom'];
        $tableTo    = $receive['tableTo'];

        // join condition
        $joinCond = [];
        // check the condition exists into the array
        if(array_key_exists('joinCond', $receive)){
            $joinCond = $receive['joinCond'];
        }
        
        // where condition
        $where = [];
        if(array_key_exists('cond', $receive)){
            $where = $receive['cond'];
        }
		
		$where_in = [];
        if(array_key_exists('where_in', $receive)){
            $where_in = $receive['where_in'];
        }
        
        // check select column
        if(array_key_exists('select', $receive)){
            $select = $receive['select'];
        }else{
            $select = '';
        }
        
        // check group
        if(array_key_exists('groupBy', $receive)){
            $groupBy = $receive['groupBy'];
        }else{
            $groupBy = '';
        }
        
       // check border by
        if(array_key_exists('order_col', $receive)){
            $order_col = $receive['order_col'];
        }else{
            $order_col = '';
        }
		
        if(array_key_exists('order_by', $receive)){
            $order_by  = $receive['order_by'];
        }else{
            $order_by = 'ASC';
        }
        
        // check limit
        if(array_key_exists('limit', $receive) && array_key_exists('limit_offset', $receive)){
            $limit = $receive['limit'];
            $limit_offset = $receive['limit_offset'];
        }elseif(array_key_exists('limit', $receive)){
            $limit = $receive['limit'];
			$limit_offset = '';
        }else{
			$limit = '';
			$limit_offset = '';
		}
        
        // get information from database
        $result = get_left_join($tableFrom, $tableTo, $joinCond, $where, $select, $groupBy, $order_col, $order_by, $limit, $limit_offset, $where_in);

        // convart the information array to JSON string
        echo json_encode($result);
    }
    
    // get all join data
    public function commission(){
		
        // get the incoming object
        $content = file_get_contents("php://input");
        

        // convart object to array
        $receive = json_decode($content, true);
        
        $ref_id = (!empty($receive['ref_id']) ? $receive['ref_id'] : '');

        // get information from database
        $result = get_commission($ref_id);

        // convart the information array to JSON string
        echo json_encode($result);
    }
    
    public function doctors_details(){
        echo json_encode(doctor_commision());
    }
    
}
