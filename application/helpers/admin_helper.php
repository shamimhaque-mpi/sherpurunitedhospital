<?php
// insert send_sms_record
if (!function_exists('send_sms_record')) {
    function send_sms_record($mobile = null, $body = null)
    {
        /****
        *   $mobile = '01721571954';
        *   $body   = '[SMS body]';
        *   send_sms_record($mobile, $body);
        ****/
        
        if (!empty($mobile) && !empty($body)) {
            $message    = send_sms($mobile, $body);
            
            $insert = array(
                'delivery_date'    => date('Y-m-d'),
                'delivery_time'    => date('H:i:s'),
                'mobile'           => $mobile,
                'message'          => $body,
                'total_characters' => strlen($body),
                'total_messages'   => message_length(strlen($body), $message),
                'delivery_report'  => $message
            );
            
            if ($message) {
                $this->action->add('sms_record', $insert);
                // $this->data['confirmation'] = message('success', array());
                return 1;
            } else {
                // $this->data['confirmation'] = message('warning', array());
                return 0;
            }
        } else {
            return 0;
        }
    }
}



// get get_hash
if (!function_exists('get_hash')) {
    function get_hash($value = null)
    {
        if (!empty($value)) {
            return hash('md5', $value . config_item('encryption_key'));
        }
    }
}


// get date
if (!function_exists('get_date')) {
    function get_date($date_formate, $date = null)
    {
        if (!empty($date)) {
            return date($date_formate, strtotime($date));
        } else {
            return date($date_formate);
        }
        return false;
    }
}
// get time
if (!function_exists('get_time')) {
    function get_time($time_formate, $time = null)
    {
        if (!empty($time)) {
            return date($time_formate, strtotime($time));
        } else {
            return date($time_formate);
        }
        return false;
    }
}
// get date_time
if (!function_exists('get_date_time')) {
    function get_date_time($date_time_formate, $date_time = null)
    {
        if (!empty($date_time)) {
            return date($date_time_formate, strtotime($date_time));
        } else {
            return date($date_time_formate);
        }
        return false;
    }
}


// get dd
if (!function_exists('dd')) {
    function dd($value = null)
    {
        if (!empty($value)) {
            echo '<pre style="color: #fff; background: #000; padding: 10px; border-radius: 4px;">';
            print_r($value);
            die();
            echo '</pre>';
        } else {
            echo '<pre style="color: #fff; background: #000; padding: 10px; border-radius: 4px;">';
            echo('{empty}');
            die();
            echo '</pre>';
        }
        return false;
    }
}

// get encode
if (!function_exists('get_encode')) {
    function get_encode($value = null, $formate = '')
    {
        if (!empty($value)) {
            if (!empty($formate)) {
                return $formate(base64_encode($value));
            } else {
                return $encode = base64_encode($value);
            }
        }
        return false;
    }
}

// get decode
if (!function_exists('get_decode')) {
    function get_decode($value = null, $formate = '')
    {
        if (!empty($value)) {
            if (!empty($formate)) {
                return base64_decode($formate($value));
            } else {
                return $encode = base64_decode($value);
            }
        }
        return false;
    }
}


// get voucher no
if (!function_exists('get_voucher')) {
    function get_voucher($id, $digite = 6, $prefix = null)
    {
        if (!empty($id)) {
            if (!empty($prefix)) {
                $counter = $prefix . date('y') . date('m') . str_pad($id, $digite, 0, STR_PAD_LEFT);
                return $counter;
            } else {
                $counter = date('y') . date('m') . str_pad($id, $digite, 0, STR_PAD_LEFT);
                return $counter;
            }
        }
        return false;
    }
}


// get code
if (!function_exists('get_code')) {
    function get_code($id, $digite = 6, $prefix = null)
    {
        if (!empty($id)) {
            if (!empty($prefix)) {
                $counter = $prefix . str_pad($id, $digite, 0, STR_PAD_LEFT);
                return $counter;
            } else {
                $counter = str_pad($id, $digite, 0, STR_PAD_LEFT);
                return $counter;
            }
        }
        return false;
    }
}


// get code
if (!function_exists('get_code_table')) {
    function get_code_table($table, $digite = 3, $where = [])
    {
        //get main CodeIgniter object
        $ci =& get_instance();

        //get data from databasea
        if (!empty($table)) {

            if (!empty($where)) {
                $ci->db->where($where);
            }

            $total_row = $ci->db->count_all_results($table);

            $counter = str_pad(++$total_row, $digite, 0, STR_PAD_LEFT);
            return $counter;
        }
        return false;
    }
}

// save data
if (!function_exists('save_data')) {
    function save_data($table, $data = [], $where = [], $action = false)
    {
        //get main CodeIgniter object
        $ci =& get_instance();

        //get data from databasea
        if (!empty($table) && !empty($data)) {
            if (!empty($where)) {
                $ci->db->where($where);
                $ci->db->update($table, $data);
                return true;
            } else {
                if ($action) {
                    $ci->db->insert($table, $data);
                    return $ci->db->insert_id();
                } else {
                    $ci->db->insert($table, $data);
                    return true;
                }
            }
        }
        return false;
    }
}


// delete data
if (!function_exists('delete_data')) {
    function delete_data($table, $where = [])
    {
        //get main CodeIgniter object
        $ci =& get_instance();
        if (!empty($table) && !empty($where)) {
            $ci->db->where($where);
            $ci->db->delete($table);
            return true;
        }
        return false;
    }
}


// convert number
if (!function_exists('convert_number')) {
    function convert_number($input_number, $convert_language = 'en')
    {
        $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
        $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");

        if ($convert_language == 'bn') {
            return str_replace($en, $bn, $input_number);
        } else {
            return str_replace($bn, $en, $input_number);
        }
        return false;
    }
}


// get row
if (!function_exists('get_row')) {
    function get_row($table, $where = [], $select = null)
    {
        //get main CodeIgniter object
        $ci =& get_instance();

        //get data from databasea
        if (!empty($where)) {

            // get select column
            if (!empty($select)) {
                $ci->db->select($select);
            }

            $query = $ci->db->where($where)->get($table);

            return $query->row();
        }
        return false;
    }
}


// get name
if (!function_exists('get_name')) {
    function get_name($table, $select_column = null, $where = [])
    {
        //get main CodeIgniter object
        $ci =& get_instance();

        //get data from databasea
        if (!empty($table) && !empty($select_column) && !empty($where)) {

            // get select column
            $ci->db->select($select_column);
            $ci->db->where($where);

            $query = $ci->db->get($table);

            if ($query->num_rows() > 0) {
                $result = $query->row();
                return $result->$select_column;
            }

            return false;
        }

        return false;
    }
}


// get all data
if (!function_exists('get_result')) {
    function get_result($table, $where = null, $select = null, $groupBy = null, $order_col = null, $order_by = 'ASC', $limit = null, $limit_offset = null, $where_in = null)
    {
        //get main CodeIgniter object
        $ci =& get_instance();

        if (!empty($table)) {
            // select column
            if (!empty($select)) {
                $ci->db->select($select);
            }

            //get where
            if (!empty($where)) {
                $ci->db->where($where);
            }

            //get where in
            if (!empty($where_in)) {
                if (is_array($where_in)) {
                    foreach ($where_in as $value) {
                        $ci->db->where_in($value[0], $value[1]);
                    }
                }
            }

            // get group by
            if (!empty($groupBy)) {
                $ci->db->group_by($groupBy);
            }

            // order by
            if (!empty($order_col) && !empty($order_by)) {
                $ci->db->order_by($order_col, $order_by);
            }

            // get limit
            if (!empty($limit) && !empty($limit_offset)) {
                $ci->db->limit($limit, $limit_offset);
            } elseif (!empty($limit)) {
                $ci->db->limit($limit);
            }

            // get query
            $query = $ci->db->get($table);
            return $query->result();
        }
        return false;
    }
}


// get join all data
if (!function_exists('get_join')) {
    function get_join($tableFrom, $tableTo, $joinCond, $where = [], $select = null, $groupBy = null, $order_col = null, $order_by = 'ASC', $limit = null, $limit_offset = null, $where_in = null)
    {
        //get main CodeIgniter object
        $ci =& get_instance();

        if (!empty($tableFrom) && !empty($tableTo) && !empty($joinCond)) {

            // get all query
            if (!empty($select)) {
                $ci->db->select($select);
            }

            $ci->db->from($tableFrom);

            if (!empty($tableTo) && !empty($joinCond)) {
                if (is_array($tableTo) && is_array($tableTo)) {
                    foreach ($tableTo as $_key => $to_value) {
                        $ci->db->join($to_value, $joinCond[$_key]);
                    }
                } else {
                    $ci->db->join($tableTo, $joinCond);
                }
            }

            // get where
            if (!empty($where)) {
                $ci->db->where($where);
            }

            //get where in
            if (!empty($where_in)) {
                if (is_array($where_in)) {
                    foreach ($where_in as $value) {
                        $ci->db->where_in($value[0], $value[1]);
                    }
                }
            }

            // get group by
            if (!empty($groupBy)) {
                $ci->db->group_by($groupBy);
            }

            // get order by
            if (!empty($order_col) && !empty($order_by)) {
                $ci->db->order_by($order_col, $order_by);
            }

            // get limit
            if (!empty($limit) && !empty($limit_offset)) {
                $ci->db->limit($limit, $limit_offset);
            } elseif (!empty($limit)) {
                $ci->db->limit($limit);
            }

            // get query
            $query = $ci->db->get();
            return $query->result();

        } else {
            return false;
        }
    }
}


// get row join
if (!function_exists('get_row_join')) {
    function get_row_join($tableFrom, $tableTo, $joinCond, $where = [], $select = [])
    {
        //get main CodeIgniter object
        $ci =& get_instance();


        if (!empty($tableFrom) && !empty($tableTo) && !empty($joinCond) && !empty($where)) {

            // get all query
            if (!empty($select)) {
                $ci->db->select($select);
            }

            $ci->db->from($tableFrom);

            if (!empty($tableTo) && !empty($joinCond)) {
                if (is_array($tableTo) && is_array($tableTo)) {
                    foreach ($tableTo as $_key => $to_value) {
                        $ci->db->join($to_value, $joinCond[$_key]);
                    }
                } else {
                    $ci->db->join($tableTo, $joinCond);
                }
            }

            $ci->db->where($where);

            // get query
            $query = $ci->db->get();
            return $query->row();
        }
        return false;
    }
}


// get pagination
if (!function_exists('get_pagination')) {
    function get_pagination($pag_query = [])
    {
        //get main CodeIgniter object
        $CI =& get_instance();

        if (array_key_exists('select', $pag_query)) {
            $CI->db->select($pag_query['select']);
        }

        if (array_key_exists('where', $pag_query)) {
            $CI->db->where($pag_query['where']);
        }

        $search = '';
        if (!empty($_GET)) {
            $CI->db->where($_GET);

            $search .= '?';

            $i     = 1;
            $count = count($_GET);
            foreach ($_GET as $_key => $s_value) {
                if ($count == 1) {
                    $search .= $_key . '=' . $s_value;
                } else {
                    if ($i != $count) {
                        $search .= $_key . '=' . $s_value . '&';
                    } else {
                        $search .= $_key . '=' . $s_value;
                    }
                    $i++;
                }
            }
        }

        $total_row = $CI->db->count_all_results($pag_query['table']);

        if (array_key_exists('per_page', $pag_query)) {
            $per_page = $pag_query['per_page'];
        } else {
            $per_page = 10;
        }

        // pagination config
        $config               = [];
        $config["base_url"]   = base_url() . $pag_query['url'] . '/';
        $config["total_rows"] = $total_row;
        $config["per_page"]   = $per_page;
        $config['suffix']     = $search;

        // initialize pagination
        $CI->pagination->initialize($config);

        $page = ($CI->uri->segment($pag_query['segment'])) ? $CI->uri->segment($pag_query['segment']) : 0;

        $return_data["links"] = $CI->pagination->create_links();


        if (array_key_exists('where', $pag_query)) {
            $CI->db->where($pag_query['where']);
        }

        if (!empty($_GET)) {
            $CI->db->where($_GET);
        }

        $CI->db->limit($per_page, $page);

        $query = $CI->db->get($pag_query['table']);

        if ($query->num_rows() > 0) {
            $return_data['results'] = $query->result();
            return $return_data;
        }

        return false;
    }
}


// get sum
if (!function_exists('get_sum')) {
    function get_sum($table, $column, $where = null, $groupBy = null)
    {
        //get main CodeIgniter object
        $ci =& get_instance();

        //get data from databasea
        if (!empty($where) && $ci->db->field_exists($column, $table)) {
            //get data from databasea
            $ci->db->select_sum($column);
            $ci->db->where($where);
            //get group by
            if (!empty($groupBy)) {
                $ci->db->group_by($groupBy);
            }
            $query = $ci->db->get($table);

            if ($query->num_rows > 0) {
                $result = $query->row();
                return $result->$column;
            } else {
                return 0;
            }
        } else {
            return false;
        }
    }
}


// get join sum
if (!function_exists('get_join_sum')) {
    function get_join_sum($tableFrom, $tableTo, $joinCond, $column, $where = [], $groupBy = null)
    {
        //get main CodeIgniter object
        $ci =& get_instance();

        if (!empty($tableFrom) && !empty($tableTo) && !empty($joinCond) && !empty($column) && !empty($where)) {

            // get all query
            if (!empty($column)) {
                $ci->db->select_sum($column);
            }

            $ci->db->from($tableFrom);

            if (!empty($tableTo) && !empty($joinCond)) {
                if (is_array($tableTo) && is_array($tableTo)) {
                    foreach ($tableTo as $_key => $to_value) {
                        $ci->db->join($to_value, $joinCond[$_key]);
                    }
                } else {
                    $ci->db->join($tableTo, $joinCond);
                }
            }

            $ci->db->where($where);

            //get group by
            if (!empty($groupBy)) {
                $ci->db->group_by($groupBy);
            }

            // get column name
            $column = explode('.', $column);
            if (count($column) > 1) {
                $column = $column[1];
            } else {
                $column = $column;
            }

            // get query
            $query = $ci->db->get();
            if ($query->num_rows > 0) {
                $result = $query->row();
                return $result->$column;
            } else {
                return 0;
            }

        }
        return false;
    }
}


// get commission
if (!function_exists('get_commission')) {
    function get_commission($ref_id = null)
    {
        //get main CodeIgniter object
        $ci =& get_instance();
        
        $data = [];
        
        //get data from databasea
        if (!empty($ref_id)) {
            
            $commInfo = $ci->db->query("SELECT marketer.name, bills.grand_total, marketer.commission, CAST(SUM(bills.grand_total / 100 * marketer.commission) AS DECIMAL(16,2)) AS total_commission FROM bills JOIN diagnosis ON bills.id=diagnosis.bill JOIN marketer ON diagnosis.reference_name=marketer.id WHERE diagnosis.reference_name='$ref_id' AND bills.grand_total > 0 AND marketer.commission > 0 GROUP BY bills.voucher")->result();
            $paymentInfo = $ci->db->query("SELECT SUM(payment) AS paid FROM rf_pc_commission_payment WHERE rf_pc_id='$ref_id' AND trash=0")->row();
            
            $commission = 0;
            if(!empty($commInfo)){
                foreach($commInfo as $value){
                    $commission += $value->total_commission;
                }
            }
            
            $paid = (!empty($paymentInfo->paid) ? $paymentInfo->paid : 0);
            
            $data['ref_id']     = $ref_id;
            $data['commission'] = $commission;
            $data['paid']       = $paid;
            $data['balance']    = $commission - $paid;
            
        }else{
            
            $data['ref_id']     = 'N/A';
            $data['commission'] = 0;
            $data['paid']       = 0;
            $data['balance']    = 0;
        }
        
        return $data;
    }
}

// custom query
if (!function_exists('custom_query')) {
    function custom_query($query = null, $return_type = false, $action = true)
    {
        //get main CodeIgniter object
        $ci =& get_instance();
        //get data from databasea
        if (!empty($query) && $action == true) {

            if ($return_type) {
                return $ci->db->query($query)->row();
            } else {
                return $ci->db->query($query)->result();
            }
        } else if (!empty($query) && $action == false) {

            return $ci->db->query($query);
        }
        return false;
    }
}


// get max value
if (!function_exists('get_max')) {
    function get_max($table, $column, $where = [])
    {
        //get main CodeIgniter object
        $ci =& get_instance();

        //get data from databasea
        if (!empty($where) && $ci->db->field_exists($column, $table)) {
            //get data from databasea
            $ci->db->select_max($column);
            $ci->db->where($where);
            $query = $ci->db->get($table);

            if ($query->num_rows() > 0) {
                $result = $query->row();
                return $result->$column;
            } else {
                return 0.00;
            }
        } else {
            return false;
        }
    }
}


// file upload
if (!function_exists('file_upload')) {
    function file_upload($fileName, $dir_path = "upload", $file_type = null, $prefix = "img")
    {
        if ($_FILES[$fileName]["name"] != null or $_FILES[$fileName]["name"] != "") {

            if (!empty($file_type)) {
                $f_type = $file_type;
            } else {
                $f_type = 'png|jpeg|jpg|gif';
            }
            $config                  = [];
            $config['upload_path']   = './public/' . $dir_path;
            $config['allowed_types'] = $f_type;
            $config['max_size']      = '5120';
            $config['max_width']     = '2560';
            $config['max_height']    = '2045';
            $config['file_name']     = $prefix . '-' . time() . rand();
            $config['overwrite']     = true;

            $ci = &get_instance();
            $ci->upload->initialize($config);

            if ($ci->upload->do_upload($fileName)) {
                $upload_data = $ci->upload->data();

                $filePath = 'public/' . $dir_path . '/' . $upload_data['file_name'];

                return $filePath;
            } else {
                return false;
            }
        }
    }
}


// get input data
if (!function_exists('input_data')) {
    function input_data($input_name = null)
    {
        if (!empty($input_name)) {
            if (is_array($input_name)) {
                $new_data = [];
                foreach ($input_name as $val) {
                    $new_data[$val] = htmlspecialchars(trim($_POST[$val]));
                }
                return $new_data;
            } else {
                return htmlspecialchars(trim($_POST[$input_name]));
            }
        } else {
            return false;
        }
    }
}

// create slug
if (!function_exists('get_slug')) {
    function get_slug($input_data = null, $replace = '-')
    {
        if (!empty($input_data)) {
            return str_replace(' ', $replace, strtolower($input_data));
        } else {
            return false;
        }
    }
}


// check exists
if (!function_exists('check_exists')) {
    function check_exists($table, $where = [])
    {
        //get main CodeIgniter object
        $ci =& get_instance();

        if (!empty($table) && !empty($where)) {

            $ci->db->where($where);
            $query = $ci->db->get($table);
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}


// check null
if (!function_exists('check_null')) {
    function check_null($input_data = null)
    {
        if (!empty($input_data)) {
            return $input_data;
        } else {
            return 'N/A';
        }
    }
}

if (!function_exists('get_filter')) {
    function get_filter($input_string = null)
    {
        if (!empty($input_string)) {
            $input_string = str_replace("_", " ", $input_string);
            if (mb_detect_encoding($input_string) != 'UTF-8') {
                $result = ucwords($input_string);
            } else {
                $result = $input_string;
            }

            return $result;
        }
        return false;
    }
}

if (!function_exists('get_number')) {
    function get_number($number = null, $decimal = 2)
    {
        if (!empty($number)) {
            return number_format($number, $decimal);
        }
        return false;
    }
}




// get left join all data
if (!function_exists('get_left_join')) {
    function get_left_join($tableFrom, $tableTo, $joinCond, $where = [], $select = null, $groupBy = null, $order_col = null, $order_by = 'desc', $limit = null, $limit_offset = null, $where_in = null)
    {
        //get main CodeIgniter object
        $ci =& get_instance();

        if (!empty($tableFrom) && !empty($tableTo) && !empty($joinCond)) {

            // get all query
            if (!empty($select)) {
                $ci->db->select($select);
            }

            // get table form
            $ci->db->from($tableFrom);

            // get join
            if (!empty($tableTo) && !empty($joinCond)) {
                if (is_array($tableTo) && is_array($tableTo)) {
                    foreach ($tableTo as $_key => $to_value) {
                        $ci->db->join($to_value, $joinCond[$_key], 'left');
                    }
                } else {
                    $ci->db->join($tableTo, $joinCond, 'left');
                }
            }

            // get where
            if (!empty($where)) {
                $ci->db->where($where);
            }

            //get where in
            if (!empty($where_in)) {
                if (is_array($where_in)) {
                    foreach ($where_in as $value) {
                        $ci->db->where_in($value[0], $value[1]);
                    }
                }
            }

            // get group by
            if (!empty($groupBy)) {
                $ci->db->group_by($groupBy);
            }

            // get order by
            if (!empty($order_col) && !empty($order_by)) {
                $ci->db->order_by($order_col, $order_by);
            }

            // get limit
            if (!empty($limit) && !empty($limit_offset)) {
                $ci->db->limit($limit, $limit_offset);
            } elseif (!empty($limit)) {
                $ci->db->limit($limit);
            }

            // get query
            $query = $ci->db->get();
            return $query->result();

        } else {
            return false;
        }
    }
}

function message_length($strlength, $message = NULL){
	$messLen = 0;
	
	if (strlen($message) != strlen(utf8_decode($message))) {
      if( $strlength <= 63){ $messLen = 1; }
		else if( $strlength <= 126){ $messLen = 2; }
		else if( $strlength <= 189){ $messLen = 3; }
		else if( $strlength <= 252){ $messLen = 4; }
		else if( $strlength <= 315){ $messLen = 5; }
		else if( $strlength <= 378){ $messLen = 6; }
		else if( $strlength <= 441){ $messLen = 7; }
		else if( $strlength <= 504){ $messLen = 8; }
		else { $messLen = "Equal to an MMS."; }		
        }else{
		if( $strlength <= 160){ $messLen = 1; }
		else if( $strlength <= 306){ $messLen = 2; }
		else if( $strlength <= 459){ $messLen = 3; }
		else if( $strlength <= 612){ $messLen = 4; }
		else if( $strlength <= 765){ $messLen = 5; }
		else if( $strlength <= 918){ $messLen = 6; }
		else if( $strlength <= 1071){ $messLen = 7; }
		else if( $strlength <= 1080){ $messLen = 8; }
		else { $messLen = "Equal to an MMS."; }
		
        }
        
        return $messLen;
	
}


// get date format
if (!function_exists('get_date_format')) {
    function get_date_format($date, $format = 'Y-m-d')
    {

        if (!empty($date)) {
            return date($format, strtotime($date));
        }
        return false;
    }
}


// get number formate
if (!function_exists('get_number_format')) {
    function get_number_format($number = null, $decimal = 2)
    {
        if (!empty($number)) {
            return number_format($number, $decimal);
        }
        return 0;
    }
}

function doctor_commision(){
    $table = 'doctors';
    $table_to = ['consultancies', 'bills'];
    $join_condi = ['doctors.id=consultancies.doctor', 'consultancies.pid=bills.pid'];
    $select = ['doctors.*', 'sum(bills.grand_total) as grand_total'];
    $groupBy = 'doctors.id';
    $where = ["doctors.status"=>1];
    
    $result = get_left_join($table, $table_to, $join_condi, $where, $select, $groupBy);
    
    
    $details = [];
    foreach($result as $key=>$value){
        $commission = $value->commission;
	    $total_bill = $value->grand_total;
	    $Total_paid = 0;
	    
	    $paid = get_result('doctor_payment', ['doctor_id'=>$value->id], 'sum(payment) as total_paid');
	    
	    $paid = ($paid ? $paid[0]->total_paid : 0);
	    
	    $balance = (($total_bill / 100) * $commission) - $paid;
	    
	    $value = (array)$value;
	    $value['balance'] = $balance;
	    
	    $details[$key] = (object)$value;
    }
    return $details;
}

// get left join all data
if (!function_exists('get_left_join')) {
    function get_left_join($tableFrom, $tableTo, $joinCond, $where = [], $select = null, $groupBy = null, $order_col = null, $order_by = 'desc', $limit = null, $limit_offset = null, $where_in = null)
    {
        //get main CodeIgniter object
        $ci =& get_instance();
        
        if (!empty($tableFrom) && !empty($tableTo) && !empty($joinCond)) {
        
            // get all query
            if (!empty($select)) {
                $ci->db->select($select);
            }
            
            // get table form
            $ci->db->from($tableFrom);
            
            // get join
            if (!empty($tableTo) && !empty($joinCond)) {
                if (is_array($tableTo) && is_array($tableTo)) {
                    foreach ($tableTo as $_key => $to_value) {
                    $ci->db->join($to_value, $joinCond[$_key], 'left');
                    }
                } else {
                    $ci->db->join($tableTo, $joinCond, 'left');
                }
            }
            
            // get where
            if (!empty($where)) {
                $ci->db->where($where);
            }
            
            //get where in
            if (!empty($where_in)) {
                if (is_array($where_in)) {
                    foreach ($where_in as $value) {
                    $ci->db->where_in($value[0], $value[1]);
                    }
                }
            }
            
            // get group by
            if (!empty($groupBy)) {
                $ci->db->group_by($groupBy);
            }
            
            // get order by
            if (!empty($order_col) && !empty($order_by)) {
                $ci->db->order_by($order_col, $order_by);
            }
            
            // get limit
            if (!empty($limit) && !empty($limit_offset)) {
                $ci->db->limit($limit, $limit_offset);
            } elseif (!empty($limit)) {
                $ci->db->limit($limit);
            }
            
            // get query
            $query = $ci->db->get();
            return $query->result();
            
        } else {
            return false;
        }
    }
}




