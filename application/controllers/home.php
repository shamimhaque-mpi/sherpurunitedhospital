<?php

class Home extends Frontend_Controller {

    function __construct() {
        parent::__construct();
        // load retrieve model
        $this->load->model('retrieve');
        //load ip helper
        $this->load->helper('ip');

        $this->data['allLeftAds'] = $this->retrieve->read('advertising', array('ads_position' => 'Left', 'status' => 'active'));
        $this->data['allMiddleAds'] = $this->retrieve->read('advertising', array('ads_position' => 'Middle', 'status' => 'active'));
        $this->data['allRightAds'] = $this->retrieve->read('advertising', array('ads_position' => 'Right', 'status' => 'active'));
    }

    public function index() {
        $this->data['meta_title'] = 'home';
        $this->data['result'] = $this->retrieve->read('posts');

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/left_aside', $this->data);
        $this->load->view('home', $this->data);
        $this->load->view('includes/right_aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }

     public function about() {
        $this->data['meta_title'] = 'about';

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/left_aside', $this->data);
        $this->load->view('about', $this->data);
        $this->load->view('includes/right_aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    public function contact() {
        $this->data['meta_title'] = 'contact';

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/left_aside', $this->data);
        $this->load->view('contact', $this->data);
        $this->load->view('includes/right_aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    public function advertising(){
        $this->load->library('form_validation');
        $this->load->library('upload');

        $this->data['meta_title'] = 'advertising';
        $this->data['confirmation'] = NULL;

        $this->data['allLeftAds'] = $this->retrieve->read('advertising', array('ads_position' => 'Left'));
        $this->data['allMiddleAds'] = $this->retrieve->read('advertising', array('ads_position' => 'Middle'));
        $this->data['allRightAds'] = $this->retrieve->read('advertising', array('ads_position' => 'Right'));

        if(isset($_POST['submit'])){
            $data = array();
            $imageID = rand(1000, 999999).strtotime('now');

            $duration = $this->input->post('duration') * 7;
            $date = new DateTime();
            $date->modify('+' . $duration . ' days');
            $expire = $date->format('Y-m-d');

            // upload screenshot
            $config['upload_path']      = './public/upload/screenshot';
            $config['allowed_types']    = 'jpeg|jpg|png|gif';
            $config['max_size']         = '200'; // 200kb
            $config['file_name']        = $imageID.'-screenshot';
            $config['overwrite']        = true;

            $this->upload->initialize($config);
            $this->form_validation->set_rules('screenshot', 'Screenshot', 'callback_upload_screenshot');

            // upload banner
            if ($this->form_validation->run() == FALSE){
                $messArr = array(
                    "title" => "Warning Message",
                    "emit"  => validation_errors('<p>', '</p>'),
                    "btn"   => true
                );
                $this->data['confirmation'] = message('warning', $messArr);
            } else {
                $upload_screenshot_data = $this->upload->data();
                $data['screenshot'] = 'public/upload/screenshot/' . $upload_screenshot_data['file_name'];
                        
                $config['upload_path']      = './public/upload/banner';
                $config['allowed_types']    = 'jpeg|jpg|png|gif';
                $config['max_size']         = '200';  // 200kb 
                $config['file_name']        = $imageID.'-banner';
                $config['overwrite']        = true;

                $this->upload->initialize($config);
                $this->form_validation->set_rules('banner', 'Banner', 'callback_upload_banner');

                if ($this->form_validation->run() == FALSE){
                    $messArr = array(
                        "title" => "Warning Message",
                        "emit"  => validation_errors('<p>', '</p>'),
                        "btn"   => true
                    );
                    $this->data['confirmation'] = message('warning', $messArr);
                } else {
                    $upload_banner_data = $this->upload->data();
                    $data['banner'] = 'public/upload/banner/' . $upload_banner_data['file_name'];

                    $inData = array(
                        'created_at' => date('Y-m-d H:m:i'),
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'payment_id' => $this->input->post('id'),
                        'path' => $data['banner'],
                        'duration' => $this->input->post('duration'),
                        'cost' => $this->input->post('price'),
                        'screenshot' => $data['screenshot'],
                        'position' => $this->input->post('ads_id')
                    );

                    $upData = array(
                      'expire' => $expire,
                      'banner_url' => $data['banner'],
                      'target_url' => $this->input->post('http'),
                      'email' => $this->input->post('email'),
                      'status' => 'Pending'
                    );

                    $where = array('ads_id' => $this->input->post('ads_id'));

                    $this->retrieve->update('advertising', $upData, $where);

                    $options = array(
                        'title'=>'success',
                        'emit'=>'Ads Saved Sucessfully!',
                        'btn'=>true
                    );

                    $this->data['confirmation'] = message($this->retrieve->add('statistic', $inData),$options);
                }
            }
        }
        
        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('advertising', $this->data);
        $this->load->view('includes/footer', $this->data);
    }

    public function advertising_detils(){
        $this->data['meta_title'] = 'advertising_detils';

        $where = array('id' => $this->input->get('id'));
        $this->data['result'] = $this->retrieve->read('posts', $where);

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('advertising_detils', $this->data);
        $this->load->view('includes/footer', $this->data);
    }

    public function marked() {
        $this->data['meta_title'] = 'marked';

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/left_aside', $this->data);
        $this->load->view('marked', $this->data);
        $this->load->view('includes/right_aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }

    public function lastUpdate(){
        $this->data['meta_title'] = 'last_update';
        $this->data['lastupdates'] = NULL;

        $this->data['lastupdates']=$this->retrieve->read('posts');

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/left_aside', $this->data);
        $this->load->view('lastUpdate', $this->data);
        $this->load->view('includes/right_aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    public function fastRaising(){
        $this->data['meta_title'] = 'fast_raising';
        $this->data['fast_raising'] = NULL;

        $this->data['fast_raising']=$this->retrieve->read('posts',array('menu'=>'fastRaising'));

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/left_aside', $this->data);
        $this->load->view('fastRaising', $this->data);
        $this->load->view('includes/right_aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    public function mostTrusted(){
        $this->data['meta_title'] = 'most_trusted';
        $this->data['most_trusted'] = NULL;

        $this->data['most_trusted']=$this->retrieve->read('posts',array('menu'=>'mostTrusted'));

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/left_aside', $this->data);
        $this->load->view('mostTrusted', $this->data);
        $this->load->view('includes/right_aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    public function latestScam(){
        $this->data['meta_title'] = 'latest_scam';
        $this->data['latest_scam'] = NULL;

        $this->data['latest_scam']=$this->retrieve->read('posts',array('menu'=>'lastProblem'));
        
        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/left_aside', $this->data);
        $this->load->view('latestScam', $this->data);
        $this->load->view('includes/right_aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    public function last_expired_banners(){
        $this->data['meta_title'] = 'last_expired_banners';

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/left_aside', $this->data);
        $this->load->view('last_expired_banners', $this->data);
        $this->load->view('includes/right_aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }

 public function maintenance(){
    $this->load->view('maintenance');
 }

 public function upload_screenshot() {
        if (isset($_FILES['screenshot']) && !empty($_FILES['screenshot']['name'])) {
            if ($this->upload->do_upload('screenshot')) {
                $this->upload->data();
                
                return TRUE;
            } else {
                // possibly do some clean up ... then throw an error
                $this->form_validation->set_message('upload_screenshot', $this->upload->display_errors());
                
                return FALSE;
            }
        } else {
            // throw an error because nothing was uploaded
            $this->form_validation->set_message('upload_screenshot', "You must upload an valid screenshot!");
            return FALSE;
        }
    }

    public function upload_banner() {
        if (isset($_FILES['banner']) && !empty($_FILES['banner']['name'])) {
            if ($this->upload->do_upload('banner')) {
                $this->upload->data();
                
                return TRUE;
            } else {
                // possibly do some clean up ... then throw an error
                $this->form_validation->set_message('upload_banner', $this->upload->display_errors());
                
                return FALSE;
            }
        } else {
            // throw an error because nothing was uploaded
            $this->form_validation->set_message('upload_banner', "You must upload an valid banner!");
            return FALSE;
        }
    }


    public function getAds(){
        $content = file_get_contents("php://input");
        $receive = json_decode($content, true);

        $table = $receive["table"];
        $column = $receive["key"];
        $value = $receive["value"];

        // get information from database
        $result = $this->retrieve->readWithIn($table, $column, $value);

        // convart the information array to JSON string
        echo json_encode($result);
    }



}
