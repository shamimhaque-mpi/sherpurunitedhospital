<?php

class group_wise_diagnosis extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->load->helper('barcode');
        $this->data['meta_title'] = 'Group Diagnosis';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="diagnosis-menu"';
        $this->data['subMenu'] = 'data-target="group_wise"';
        $this->data['reference'] = NULL;

        // get all test
        $this->data['allGroupName'] = $this->action->read('test_group', ['trash'=>0]);    
        $this->data['pid'] = $this->input->get("pid"); 

        $this->data['doctors'] = $this->action->read("doctors", ['status'=>1]);      
        $this->data['reference'] = $this->action->read("marketer", ['trash' => 0]); 

        $tableFrom ='patients';
        $tableTo = 'bills';
        
		$joinCond ='patients.pid=bills.pid';

        $where = ['bills.title'=>'consultancy', 'patients.name !='=>''];
        
        $this->data['patient_idInfo'] = get_join($tableFrom, $tableTo, $joinCond, $where);
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/diagnosis/nav', $this->data);
        $this->load->view('components/diagnosis/group_wise_diagnosis', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    public function add(){
       $billID = $this->addBill(); 
       $this->addJournal(); 

        foreach ($_POST['test_id'] as $key => $value) {
            $data = array(
              "date"            => $this->input->post("date"),
              "delivery"        => $this->input->post("delivery_date"),
              "pid"             => $this->input->post("pid"),              
              "group_id"        => $_POST['group_id'][$key],
              "test_id"         => $value,
              "reference_name"  => $this->input->post('reference_name'),
              "bill"            => $billID,

              "refereed_doctor" => $this->input->post("refereed_doctor"),
              'alt_doctor_id'   => $this->input->post('alt_doctor_id'),        
              'alt_doctor_fee'  => $this->input->post('alt_doctor_fee'),        
              "status"          => "pending"             
            );

           $this->action->add("diagnosis", $data); 
        }   

        // patients add into patients table
        $patientsInfo = array(
            'pid'       => $this->input->post("pid"), 
            'name'      => $this->input->post("patient_name"), 
            'contact'   => $this->input->post("contact_number"), 
            'age'       => $this->input->post("age"), 
            'address'   => $this->input->post("address"), 
            'gender'    => $this->input->post("gender")
        );
       
        $this->action->add('patients',$patientsInfo);  
        // end patients add
            //Sending SMS Start
        $content = "Dear ".$this->input->post('patient_name')."\nYour Diagnosis Successfully Accepted.\nRegards, Life Care Clinic";

        $num        = $this->input->post("contact_number");
        $message    = send_sms($num, $content);

        $insert = array(
            'delivery_date'     => date('Y-m-d'),
            'delivery_time'     => date('H:i:s'),
            'mobile'            => $num,
            'message'           => $content,
            'total_characters'  => strlen($content),
            'total_messages'    => 1,
            'delivery_report'   => $message
        );
            
        $this->action->add('sms_record', $insert);

        redirect("diagnosis/group_wise_diagnosis/voucher?voucher=". $this->input->post("voucher"), "refresh");
    }

    private function addBill() {
        $data = array(
            "date"                  => $this->input->post('date'),
            "voucher"               => $this->input->post('voucher'),
            "pid"                   => $this->input->post('pid'),
            "title"                 => "diagnosis",
            "details"               => "diagnosis",
            "subtotal"              => $this->input->post("subtotal"),
            "vat"                   => $this->input->post("vat"),
            "vat_amount"            => $this->input->post("vat_amount"),
            "total"                 => $this->input->post('total'),
            "discount"              => $this->input->post('discount'),
            "less_type"             => $this->input->post('less_type'),
            "grand_total"           => $this->input->post('grand_total'),
            "paid"                  => $this->input->post('paid'),
            "due"                   => $this->input->post('due'),
            "last_paid"             => $this->input->post('paid'),
            "last_payment_date"     => $this->input->post('date'),
            "status"                => "diagnosis"
        );

        $id = $this->action->addAndGetInsertedID('bills', $data);
        
           //Voucher Bar code generating Start here----------------                
		$product_code = $this->input->post('voucher');

		$barcode = $this->action->read('barcode');
		$font     = './private/fonts/arialbd.ttf';

		$fontSize = 10;   // GD1 in px ; GD2 in point
		$marge    = 8;   // between barcode and hri in pixel
		$x        = $barcode[0]->pos_x;  // barcode center
		$y        = $barcode[0]->pos_y;  // barcode center
		$height   = $barcode[0]->code_height;   // barcode height in 1D ; module size in 2D
		$width    =$barcode[0]->code_width;    // barcode height in 1D ; not use in 2D
		//$width    = 2;    // barcode height in 1D ; not use in 2D
		$angle    = 0;   // rotation in degrees : nb : non horizontable barcode might not be usable because of pixelisation

		$code     = $product_code; // barcode, of course ;)
		$type     = $barcode[0]->code_type;
		$image_height = $barcode[0]->img_height;
		$image_width = $barcode[0]->img_width;  
		// -------------------------------------------------- //
		//                    USEFUL
		// -------------------------------------------------- //

		// -------------------------------------------------- //
		//            ALLOCATE GD RESSOURCE
		// -------------------------------------------------- //
		$im     = imagecreatetruecolor($image_width, $image_height);
		$black  = ImageColorAllocate($im,0x00,0x00,0x00);
		$white  = ImageColorAllocate($im,0xff,0xff,0xff);
		$red    = ImageColorAllocate($im,0xff,0x00,0x00);
		$blue   = ImageColorAllocate($im,0x00,0x00,0xff);
		imagefilledrectangle($im, 0, 0, $image_width, $image_height, $white);

		// -------------------------------------------------- //
		//                      BARCODE
		// -------------------------------------------------- //
		$data = Barcode::gd($im, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);

		// -------------------------------------------------- //
		//        HRI (Human readable Interpretation)
		// -------------------------------------------------- //
		if (isset($font)){
			$box = imagettfbbox($fontSize, 0, $font, $data['hri']);
			$len = $box[2] - $box[0];
			Barcode::rotate(-$len / 2, ($height / 2) + $fontSize + $marge, $angle, $xt, $yt);
			imagettftext($im, $fontSize, $angle, $x + $xt, $y + $yt, $black, $font, $data['hri']);
		}


		$success=imagepng($im, './public/uploaded_barcode/'.$product_code.image_type_to_extension(IMAGETYPE_PNG));
		imagedestroy($im);
		// echo $code. image_type_to_extension(IMAGETYPE_PNG);
		$product_code.image_type_to_extension(IMAGETYPE_PNG);



		//Patient Bar code generating Start here----------------                
		$product_code = $this->input->post('pid');

		$barcode = $this->action->read('patient_barcode');


		$font     = './private/fonts/arialbd.ttf';
		// - -

		$fontSize = 10;   // GD1 in px ; GD2 in point
		$marge    = 8;   // between barcode and hri in pixel
		$x        = $barcode[0]->pos_x;  // barcode center
		$y        = $barcode[0]->pos_y;  // barcode center
		$height   = $barcode[0]->code_height;   // barcode height in 1D ; module size in 2D
		$width    =$barcode[0]->code_width;    // barcode height in 1D ; not use in 2D
		//$width    = 2;    // barcode height in 1D ; not use in 2D
		$angle    = 0;   // rotation in degrees : nb : non horizontable barcode might not be usable because of pixelisation

		$code     = $product_code; // barcode, of course ;)
		$type     = $barcode[0]->code_type;
		$image_height = $barcode[0]->img_height;
		$image_width = $barcode[0]->img_width;  
		// -------------------------------------------------- //
		//                    USEFUL
		// -------------------------------------------------- //

		// -------------------------------------------------- //
		//            ALLOCATE GD RESSOURCE
		// -------------------------------------------------- //
		$im     = imagecreatetruecolor($image_width, $image_height);
		$black  = ImageColorAllocate($im,0x00,0x00,0x00);
		$white  = ImageColorAllocate($im,0xff,0xff,0xff);
		$red    = ImageColorAllocate($im,0xff,0x00,0x00);
		$blue   = ImageColorAllocate($im,0x00,0x00,0xff);
		imagefilledrectangle($im, 0, 0, $image_width, $image_height, $white);

		// -------------------------------------------------- //
		//                      BARCODE
		// -------------------------------------------------- //
		$data = Barcode::gd($im, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);

		// -------------------------------------------------- //
		//        HRI (Human readable Interpretation)
		// -------------------------------------------------- //
		if (isset($font)){
			$box = imagettfbbox($fontSize, 0, $font, $data['hri']);
			$len = $box[2] - $box[0];
			Barcode::rotate(-$len / 2, ($height / 2) + $fontSize + $marge, $angle, $xt, $yt);
			imagettftext($im, $fontSize, $angle, $x + $xt, $y + $yt, $black, $font, $data['hri']);
		}


		$success=imagepng($im, './public/uploaded_barcode/'.$product_code.image_type_to_extension(IMAGETYPE_PNG));
		imagedestroy($im);
		// echo $code. image_type_to_extension(IMAGETYPE_PNG);
		$product_code.image_type_to_extension(IMAGETYPE_PNG);
        
        return $id; 
    }

    private function addJournal(){

      $regi_id = $this->action->read("registrations",array('pid'=> $this->input->post('pid')));

      $data = array(
            "date"    => $this->input->post('date'),
            "details" => "diagnosis",
            "amount"  => $this->input->post('paid'),
            "ref"  => "pid:".$this->input->post('pid'),
            "status"  => "income"
        );

      $this->action->add("journal",$data); 
      return true;
    }



    public function voucher(){
        $this->data['active'] = 'data-target="diagnosis-menu"';
        $this->data['subMenu'] = 'data-target="all"';

        $where = array('voucher' => $this->input->get("voucher"));
        $bills = $this->data['bills'] = $this->action->read('bills', $where);

        $where = [
          "diagnosis.bill"=> $bills[0]->id
        ];

        $tableTo = ['test', 'group_mapping', 'test_group'];
        $joinCond= ['diagnosis.test_id=test.id', 'test.id=group_mapping.test_id', 'group_mapping.group_id=test_group.id'];
        $select  = 'diagnosis.*, test.*, test_group.group_name';

        $this->data['diagnosis']   = get_join('diagnosis', $tableTo, $joinCond, $where, $select, ['test.id']);
        $this->data['patientInfo'] = $this->action->read('patients', array("pid" => $bills[0]->pid));

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/diagnosis/nav', $this->data);
        $this->load->view('components/diagnosis/groupWiseVoucher', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
}