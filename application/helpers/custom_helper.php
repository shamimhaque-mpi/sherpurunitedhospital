<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// genetate tender code
function generator($table, $prefix = '')
{
    $code = '';
    // get codeigniter instanse
    $CI = &get_instance();
    // load model
    $CI->load->model('action');
    // use model method
    $val = $CI->action->forIdGenerator($table);

    if (!empty($val)) {
        $id = intval($val[0]->id) + 1;
    } else {
        $id = 1;
    }

    if ($prefix != '') {
        $code = $prefix . $id;
    } else {
        $code = $id;
    }

    return $code;
}


function patientUniqueId($table)
{
    $counter = 1;

    $CI = &get_instance();
    $CI->load->model('action');

    $length = 5;
    $sql    = $CI->action->get_max_value($table, "pid", $length);
    $val    = $sql[0]->last_code;

    // use model method

    if ($val != null) {
        $counter = $val + 1;
    }

    $counter = str_pad($counter, 5, 0, STR_PAD_LEFT);
    return $counter;
}


function productCode($table)
{
    $counter = 1;

    $CI = &get_instance();
    $CI->load->model('action');

    $length = 5;
    $sql    = $CI->action->get_max_value($table, "code", $length);
    $val    = $sql[0]->last_code;

    // use model method

    if ($val != null) {
        $counter = $val + 1;
    }

    $counter = str_pad($counter, 5, 0, STR_PAD_LEFT);
    return $counter;
}

// function saleVoucher($table) {
//     $counter = 1;

//     $CI = & get_instance();
//     $CI->load->model('action');

//     $length = 5;
//     $sql = $CI->action->get_max_value($table,"voucher",$length);
//     $val = $sql[0]->last_code;

//     // use model method

//     if($val!=null){
//         $counter =$val+1;
//     }
//     $date = str_replace("-","",date('Y-m-d'));

//     $counter =str_pad($counter,3,0, STR_PAD_LEFT);
//    $counter = $date.$counter;
//     return $counter;
// }


// genetate patient id
// 
function patient_id($table, $prefix = '')
{
    $code = '';
    // get codeigniter instanse
    $CI = &get_instance();
    // load model
    $CI->load->model('action');
    // use model method
    $val = $CI->action->forIdGenerator($table);

    if (!empty($val)) {
        $id = intval($val[0]->id) + 1;
    } else {
        $id = 1;
    }

    $code = $id;


    if (strlen($code) == 1) {
        $code = "000" . $code;
    } elseif (strlen($code) == 2) {
        $code = "00" . $code;
    } elseif (strlen($code) == 3) {
        $code = "0" . $code;
    } else {
        $code = $code;
    }

    return $prefix . date("y") . date("m") . date("d") . $code;
}


// genetate employee id
function employee_id($table)
{
    $code = '';
    // get codeigniter instanse
    $CI = &get_instance();
    // load model
    $CI->load->model('action');
    // use model method
    $val = $CI->action->readGroupBy($table, "emp_id", array(), "id", "desc");

    if (!empty($val)) {
        $id = intval($val[0]->emp_id) + 1;
    } else {
        $id = 1;
    }

    $code = $id;


    if (strlen($code) == 1) {
        $code = "000" . $code;
    } elseif (strlen($code) == 2) {
        $code = "00" . $code;
    } elseif (strlen($code) == 3) {
        $code = "0" . $code;
    } else {
        $code = $code;
    }

    return $code;
}

// genetate voucher no
function generate_voucher($table, $where = array(), $prefix = '', $type = '')
{
    $code    = '';
    $counter = 1;

    // get codeigniter instanse
    $CI = &get_instance();

    // load model
    $CI->load->model('action');

    // use model method  
    $val = $CI->action->read($table, $where, 'desc');

    if ($val != null) {
        $counter = intval($val[0]->id) + 1;
    }

    if (strlen($counter) == 1) {
        $counter = '000' . $counter;
    } elseif (strlen($counter) == 2) {
        $counter = '00' . $counter;
    } elseif (strlen($counter) == 3) {
        $counter = '0' . $counter;
    } else {
        $counter = $counter;
    }

    $code = $type . date('y') . date('m') . date('d') . $prefix . $counter;
    return $code;
}

// genetate tender code
function generateUniqueId($table)
{
    $code    = '';
    $counter = 1;

    // get codeigniter instanse
    $CI = &get_instance();

    // load model
    $CI->load->model('action');

    // use model method
    $val = $CI->action->maxId($table);


    if (is_array($val)) {
        $counter = intval($val[0]->maxId) + 1;
    } else {
        $counter = 1;
    }

    if (strlen($counter) == 2) {
        $counter = '00' . $counter;
    } elseif (strlen($counter) == 3) {
        $counter = '0' . $counter;
    } else {
        $counter = '000' . $counter;
    }
    return $counter;
}

// Generate Unique ID for stock table
function generateUniqueStockId($table, $digit = 5)
{
    $code    = '';
    $counter = 1;

    // get codeigniter instanse
    $CI = &get_instance();

    // load model
    $CI->load->model('action');

    // use model method  
    $val = $CI->action->read($table, array(), 'desc');

    if ($val != null) {
        $counter = intval($val[0]->voucher_no) + 1;
    }

    $counter = str_pad($counter, $digit, 0, STR_PAD_LEFT);
    return $counter;
}

function incomeFiledId($table, $digit = 4)
{
    $code    = '';
    $counter = 1;

    // get codeigniter instanse
    $CI = &get_instance();

    // load model
    $CI->load->model('action');

    // use model method
    $val = $CI->action->maxId($table);


    if (is_array($val)) {
        $counter = intval($val[0]->maxId) + 1;
    } else {
        $counter = 1;
    }
    $counter = str_pad($counter, $digit, 0, STR_PAD_LEFT);
    return $counter;
}


// genetate tender code
function memberId($table, $b, $t)
{
    $branch = $b;
    $year   = date('y');
    $team   = $t;
    $id     = generateUniqueId($table);

    $memberId = $branch . $year . $team . $id;
    return $memberId;
}

function age($date)
{
    list($year, $month, $day) = explode("-", $date);

    $doy = date('Y') - $year;
    $dom = date('m') - $month;
    $dod = date('d') - $day;

    if ($dod < 0 || $dom < 0) $doy--;

    return $doy;
}


/*Maruf hasan's Helper*/
function custom_fetch($var, $field)
{
    if (isset($var)) {
        return $var[0]->$field;
    }
}

function v_check($value)
{
    if ($value != null) {
        return $value;
    } else {
        return "N/A";
    }
}


function filter($value)
{
    $capitalize = "";
    $rmv_scor   = str_replace("_", " ", $value);
    if (mb_detect_encoding($rmv_scor) != 'UTF-8') {
        $capitalize = ucwords($rmv_scor);
    } else {
        $capitalize = $rmv_scor;
    }

    return $capitalize;
}


//Privilege Related functions Start here

function ck_menu($menu)
{
    $CI = &get_instance();
    $CI->load->model('action');
    $CI->load->library('session');
    $privilege = $CI->session->userdata("privilege");
    $user_id   = $CI->session->userdata("user_id");


    if ($privilege == "super") {
        return true;
    }

    $where = array(
        "privilege_name" => $privilege,
        "user_id"        => $user_id
    );

    $data = $CI->action->read("privileges", $where);
    if ($data == null) {
        return false;
        $id = "false";
    }

    $access_array = json_decode($data[0]->access, true);
    $access_array = array_keys($access_array);

    if (in_array($menu, $access_array)) {
        return true;
        echo "Matched";
    }
    //return false;
}


function ck_action($menu, $action)
{
    $CI = &get_instance();
    $CI->load->model('action');
    $CI->load->library('session');
    $privilege = $CI->session->userdata("privilege");
    $user_id   = $CI->session->userdata("user_id");

    if ($privilege == "super") {
        return true;
    }

    $where = array(
        "privilege_name" => $privilege,
    );

    $data = $CI->action->read("privileges", $where);
    if ($data == null) {
        return false;
    }

    $access_array = json_decode($data[0]->access, true);
    //return $access_array;

    if (!array_key_exists($menu, $access_array)) {
        return false;
    }

    if (in_array($action, $access_array[$menu])) {
        return true;
    }
    return false;
}

//Privilege Related functions end here
//
//

function float_number($value)
{
    return $number = number_format($value, 2);
}

// Unic Id Genareator 

function generatesUniqueId($table, $digit = 4)
{
    $code    = '';
    $counter = 1;

    // get codeigniter instanse
    $CI = &get_instance();

    // load model
    $CI->load->model('action');

    // use model method
    $val = $CI->action->maxId($table);


    if (is_array($val)) {
        $counter = intval($val[0]->maxId) + 1;
    } else {
        $counter = 1;
    }
    $counter = str_pad($counter, $digit, 0, STR_PAD_LEFT);
    return $counter;
}
