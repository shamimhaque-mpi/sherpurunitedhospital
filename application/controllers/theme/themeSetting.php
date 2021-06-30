<?php
class ThemeSetting extends Admin_controller {
     function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('action');

        $this->data['vatInfo']=$this->action->read('vat');
    }
    
    public function index() {
        $this->data['meta_title'] = 'Themt';
        $this->data['active'] = 'data-target="theme_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;

//-----------------------------------------------------------------------------------------
//--------------------------------Changeing Logo start here--------------------------------
//-----------------------------------------------------------------------------------------
        if ($this->input->post('submit_logo')) {

            if ($_FILES["attachFile"]["name"]!=null && $_FILES["attachFile"]["name"]!="" ) {

                $config['upload_path'] = './public/img';
                $config['allowed_types'] = 'png|jpeg|jpg|gif';
                $config['max_size'] = '4096';
                $config['max_width'] = '3000'; /* max width of the image file */
                $config['max_height'] = '3000';
                $config['file_name'] ="logo_".rand(111111,999999); 
                $config['overwrite']=true;   
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload("attachFile")){
                    $upload_data=$this->upload->data();
                    
                   //Encoding into json array start here
                    $logo_info=array(
                        'logo'=> "public/img/".$upload_data['file_name'],
                        'faveicon'=> $this->input->post('faveicon'),
                    );
                    $logo_data=json_encode($logo_info);
                    //Encoding into json array end here
                    $data=array(
                        'logo'=>$logo_data
                    );
                    $msg_array = array(
                        "title" => "Success",
                        "emit"  => "Logo Successfully Saved",
                        "btn"   => true
                    );
                    $this->data['confirmation'] = message($this->action->add('theme_setting', $data), $msg_array);
                }
                    
            }
                else{
                    $msg_array=array(
                    "title"=>"Error",
                    "emit"=>$this->upload->display_errors(),
                    "btn"=>true
                    );
                    $this->data['confirmation']=message("warning",$msg_array);
                }

            }

        if ($this->input->post('update_logo')) {

            $where=array(
                'id'=>$this->input->post('theme_id')
            );

            if ($_FILES["attachFile"]["name"]!=null && $_FILES["attachFile"]["name"]!="" ) {

                $config['upload_path'] = './public/img';
                $config['allowed_types'] = 'png|jpeg|jpg|gif';
                $config['max_size'] = '4096';
                $config['max_width'] = '3000'; /* max width of the image file */
                $config['max_height'] = '3000';
                $config['file_name'] ="logo_".rand(111111,999999); 
                $config['overwrite']=true;   
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload("attachFile")){

                    if (is_file('./'.$this->input->post('old_logo'))) {
                        unlink('./'.$this->input->post('old_logo'));
                    }

                    $upload_data=$this->upload->data();
                    
                   //Encoding into json array start here
                    $logo_info=array(
                        'logo'=> "public/img/".$upload_data['file_name'],
                        'faveicon'=> $this->input->post('faveicon'),
                    );
                    $logo_data=json_encode($logo_info);
                    //Encoding into json array end here
                    $data=array(
                        'logo'=>$logo_data
                    );
                    $msg_array = array(
                        "title" => "Success",
                        "emit"  => "Logo Successfully Saved",
                        "btn"   => true
                    );
                    $this->data['confirmation'] = message($this->action->update('theme_setting', $data,$where), $msg_array);
                }
                    
            }
                else{
                    $msg_array=array(
                    "title"=>"Error",
                    "emit"=>$this->upload->display_errors(),
                    "btn"=>true
                    );
                    $this->data['confirmation']=message("warning",$msg_array);
                }

            }

//-----------------------------------------------------------------------------------------
//---------------------------------Changeing Logo end here---------------------------------
//-----------------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------------
//--------------------------------Changeing Feveicon start here----------------------------
//-----------------------------------------------------------------------------------------
        if ($this->input->post('submit_fevicon')) {

            if ($_FILES["attachFile"]["name"]!=null && $_FILES["attachFile"]["name"]!="" ) {

                $config['upload_path'] = './public/img';
                $config['allowed_types'] = 'png|jpeg|jpg|gif';
                $config['max_size'] = '4096';
                $config['max_width'] = '3000'; /* max width of the image file */
                $config['max_height'] = '3000';
                $config['file_name'] ="favicon_".rand(111111,999999); 
                $config['overwrite']=true;   
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload("attachFile")){
                    $upload_data=$this->upload->data();
                    
                   //Encoding into json array start here
                    $logo_info=array(
                        'logo'=> $this->input->post('logo'),
                        'faveicon'=> "public/img/".$upload_data['file_name'],
                    );
                    $logo_data=json_encode($logo_info);
                    //Encoding into json array end here
                    $data=array(
                        'logo'=>$logo_data
                    );
                    $msg_array = array(
                        "title" => "Success",
                        "emit"  => "Logo Successfully Saved",
                        "btn"   => true
                    );
                    $this->data['confirmation'] = message($this->action->add('theme_setting', $data), $msg_array);
                }
                    
            }
                else{
                    $msg_array=array(
                    "title"=>"Error",
                    "emit"=>$this->upload->display_errors(),
                    "btn"=>true
                    );
                    $this->data['confirmation']=message("warning",$msg_array);
                }

            }

        if ($this->input->post('update_fevicon')) {
            $where=array(
                'id'=>$this->input->post('theme_id')
            );

            if ($_FILES["attachFile"]["name"]!=null && $_FILES["attachFile"]["name"]!="" ) {

                $config['upload_path'] = './public/img';
                $config['allowed_types'] = 'png|jpeg|jpg|gif';
                $config['max_size'] = '4096';
                $config['max_width'] = '3000'; /* max width of the image file */
                $config['max_height'] = '3000';
                $config['file_name'] ="favicon_".rand(111111,999999); 
                $config['overwrite']=true;   
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload("attachFile")){

                    if (is_file('./'.$this->input->post('old_faveicon'))) {
                        unlink('./'.$this->input->post('old_faveicon'));
                    }

                    $upload_data=$this->upload->data();
                    
                   //Encoding into json array start here
                    $logo_info=array(
                        'logo'=> $this->input->post('logo'),
                        'faveicon'=> "public/img/".$upload_data['file_name'],
                    );
                    $logo_data=json_encode($logo_info);
                    //Encoding into json array end here
                    $data=array(
                        'logo'=>$logo_data
                    );
                    $msg_array = array(
                        "title" => "Success",
                        "emit"  => "Logo Successfully Saved",
                        "btn"   => true
                    );
                    $this->data['confirmation'] = message($this->action->update('theme_setting', $data,$where), $msg_array);
                }
                    
            }
                else{
                    $msg_array=array(
                    "title"=>"Error",
                    "emit"=>$this->upload->display_errors(),
                    "btn"=>true
                    );
                    $this->data['confirmation']=message("warning",$msg_array);
                }

            }

//-----------------------------------------------------------------------------------------
//---------------------------------Changeing Feveicon end here-----------------------------
//-----------------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------------
//--------------------------------Changeing Menu Icon start here---------------------------
//-----------------------------------------------------------------------------------------
        if ($this->input->post('submit_menu_icon')) {
//Encoding into json array start here
            $menu_icon=array(
                'aside_menu'=> $this->input->post('aside_menu'),
                'footer_menu'=> $this->input->post('footer_menu')
            );
            $menu_icon=json_encode($menu_icon);
//Encoding into json array end here
            $data=array(
                'menu_icon'=>$menu_icon
            );
            $msg_array = array(
                "title" => "Success",
                "emit"  => "Theme successfully Saved",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->add('theme_setting', $data), $msg_array);
        }

        if ($this->input->post('update_menu_icon')) {
            $where=array(
                'id'=>$this->input->post('theme_id')
            );

            //Encoding into json array start here
            $menu_icon=array(
                'aside_menu'=> $this->input->post('aside_menu'),
                'footer_menu'=> $this->input->post('footer_menu')
            );
            $menu_icon=json_encode($menu_icon);
//Encoding into json array end here
            $data=array(
                'menu_icon'=>$menu_icon
            );
            $msg_array = array(
                "title" => "Success",
                "emit"  => "Theme successfully Saved",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->update('theme_setting', $data,$where), $msg_array);
        }

//-----------------------------------------------------------------------------------------
//---------------------------------Changeing Menu Icon end here----------------------------
//-----------------------------------------------------------------------------------------


        $this->data['theme_data']=$this->action->read('theme_setting');

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/theme/nav', $this->data);
        $this->load->view('components/theme/changeLogo', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function theme_tools() {
        $this->data['meta_title'] = 'Themt';
        $this->data['active'] = 'data-target="theme_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;

        //--------------------------------------------------------------------------------------
        //----------------------------Language Change start here--------------------------------
        //--------------------------------------------------------------------------------------
        if ($this->input->post('submit_language')) {
            $data=array(
                'language'=>$this->input->post("language")
            );
            $msg_array = array(
                "title" => "Success",
                "emit"  => "Language successfully Saved",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->add('theme_setting', $data), $msg_array);
        }

        if ($this->input->post('update_language')) {
            $where=array(
                'id'=>$this->input->post('theme_id')
            );
            $data=array(
                'language'=>$this->input->post("language")
            );

            $msg_array = array(
                "title" => "Success",
                "emit"  => "Language successfully Updated",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->update('theme_setting', $data,$where), $msg_array);
        }
        //----------------------------------------------------------------------------------------------
        //----------------------------------Language Change end here------------------------------------
        //----------------------------------------------------------------------------------------------

        //--------------------------------------------------------------------------------------
        //-------------------------Header Information start here--------------------------------
        //--------------------------------------------------------------------------------------
        if ($this->input->post('submit_header')) {

            //Encoding into json array start here
            $h_info=array(
                'site_name'=> $this->input->post('site_name'),
                'place_name'=> $this->input->post('place_name'),
            );
            $header_info=json_encode($h_info);
            //Encoding into json array end here
            $data=array(
                'header'=>$header_info
            );
            $msg_array = array(
                "title" => "Success",
                "emit"  => "Theme successfully Saved",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->add('theme_setting', $data), $msg_array);
            redirect('theme/themeSetting/theme_tools');
        }

        if ($this->input->post('update_header')) {
            $where=array(
                'id'=>$this->input->post('theme_id')
            );
            //Encoding into json array start here
            $h_info=array(
                'site_name'=> $this->input->post('site_name'),
                'place_name'=> $this->input->post('place_name'),
                'addr_moblile'  => $this->input->post('addr_moblile'),
            );
            
            $is_banner  = $this->input->post('is_banner');
            if($is_banner){
                $h_info['is_banner'] = 'yes';
            }else{
                $h_info['is_banner'] = 'no';
            }
            
            $header_info=json_encode($h_info);
            //Encoding into json array end here
            $data=array(
                'header'=>$header_info
            );

            $msg_array = array(
                "title" => "Success",
                "emit"  => "Theme successfully Updated",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->update('theme_setting', $data,$where), $msg_array);
            $this->session->set_flashdata("confirmation", $this->data['confirmation']);
            redirect('theme/themeSetting/theme_tools','refresh');

        }
        //---------------------------------------------------------------------------------
        //---------------------------Header Information end here---------------------------
        //---------------------------------------------------------------------------------





        //Footer Setting Start*****Footer Setting Start*****Footer Setting Start*****Footer Setting Start*****
        //Footer Setting Start*****Footer Setting Start*****Footer Setting Start*****Footer Setting Start*****
        //Footer Setting Start*****Footer Setting Start*****Footer Setting Start*****Footer Setting Start*****
        //--------------------------------------------------------------------------------------
        //----------------------------------------Last footer Text change start here------------
        //--------------------------------------------------------------------------------------
        if ($this->input->post('submit_footer')) {

//Encoding into json array start here
            $f_info=array(
                'l_footer_text' => $this->input->post('l_footer_text'),
                'addr_moblile'  => $this->input->post('addr_moblile'),
                'addr_email'    => $this->input->post('addr_email'),
                'addr_address'  => $this->input->post('addr_address')
            );

//Uploading Footer Image Start here            
            if ($_FILES["attachFile"]["name"]!=null && $_FILES["attachFile"]["name"]!="" ) {
                $config['upload_path'] = './public/img';
                $config['allowed_types'] = 'png|jpeg|jpg|gif';
                $config['max_size'] = '4096';
                $config['max_width'] = '3000'; /* max width of the image file */
                $config['max_height'] = '3000';
                $config['file_name'] ="footer_".rand(111111,999999); 
                $config['overwrite']=true;   
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload("attachFile")){
                    /*
                    if (is_file('./'.$this->input->post('old_faveicon'))) {
                        unlink('./'.$this->input->post('old_faveicon'));
                    }*/

                    $upload_data=$this->upload->data();
                   //Encoding into json array start here
                    $f_info['footer_img']= "public/img/".$upload_data['file_name'];
                }
                else{
                    $msg_array=array(
                    "title"=>"Error",
                    "emit"=>$this->upload->display_errors(),
                    "btn"=>true
                    );
                    $this->data['confirmation']=message("warning",$msg_array);
                }
            }
            else{
                $f_info['footer_img']=$this->input->post('footer_img');
            }
//Uploading Footer Image End here            

            $footer_info=json_encode($f_info);
//Encoding into json array end here

            $data=array(
                'footer'=>$footer_info
            );

            $msg_array = array(
                "title" => "Success",
                "emit"  => "Theme successfully Saved",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->add('theme_setting', $data), $msg_array);
            $this->session->set_flashdata("confirmation", $this->data['confirmation']);
            redirect('theme/themeSetting/theme_tools','refresh');
        }

        //Edit Start here--------------------------------------------------------------------------------------------
        if ($this->input->post('update_footer')) {
            $where=array(
                'id'=>$this->input->post('theme_id')
            );
//Encoding into json array start here
            $f_info=array(
                'l_footer_text' => $this->input->post('l_footer_text'),
                'addr_moblile'  => $this->input->post('addr_moblile'),
                'addr_email'    => $this->input->post('addr_email'),
                'addr_address'  => $this->input->post('addr_address')
            );

//Uploading Footer Image Start here            
            if ($_FILES["attachFile"]["name"]!=null && $_FILES["attachFile"]["name"]!="" ) {
                $config['upload_path'] = './public/img';
                $config['allowed_types'] = 'png|jpeg|jpg|gif';
                $config['max_size'] = '4096';
                $config['max_width'] = '3000'; /* max width of the image file */
                $config['max_height'] = '3000';
                $config['file_name'] ="footer_".rand(111111,999999); 
                $config['overwrite']=true;   
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload("attachFile")){
                    if (is_file('./'.$this->input->post('old_foot_img'))) {
                        unlink('./'.$this->input->post('old_foot_img'));
                    }

                    $upload_data=$this->upload->data();
                    //Encoding into json array start here
                    $f_info['footer_img']= "public/img/".$upload_data['file_name'];
                }
                else{
                    $msg_array=array(
                    "title"=>"Error",
                    "emit"=>$this->upload->display_errors(),
                    "btn"=>true
                    );
                    $this->data['confirmation']=message("warning",$msg_array);
                }
            }
            else{
                $f_info['footer_img']=$this->input->post('footer_img');
            }
//Uploading Footer Image End here 

            $footer_info=json_encode($f_info);
//Encoding into json array end here


            $data=array(
                'footer'=>$footer_info
            );

            $msg_array = array(
                "title" => "Success",
                "emit"  => "Theme successfully Updated",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->update('theme_setting', $data,$where), $msg_array);
            $this->session->set_flashdata("confirmation", $this->data['confirmation']);
            redirect('theme/themeSetting','refresh');
        }

        //----------------------------------------------------------------------------------------------
        //----------------------------------Last footer Text change end here----------------------------
        //----------------------------------------------------------------------------------------------
        //Footer Setting End****Footer Setting End****Footer Setting End****Footer Setting End****Footer Setting End****
        //Footer Setting End****Footer Setting End****Footer Setting End****Footer Setting End****Footer Setting End****
        //Footer Setting End****Footer Setting End****Footer Setting End****Footer Setting End****Footer Setting End****

        //--------------------------------------------------------------------------------------
        //-----------------------------Social Icon start here-----------------------------------
        //--------------------------------------------------------------------------------------
        if ($this->input->post('submit_social')) {

//Encoding into json array start here
            $s_icon=array(
                's_facebook'   => $this->input->post('s_facebook'),
                's_twitter'    => $this->input->post('s_twitter'),
                's_gplus'      => $this->input->post('s_gplus'),
                's_pinterest'  => $this->input->post('s_pinterest')
            );
            $social_link=json_encode($s_icon);
//Encoding into json array end here
            $data=array(
                'social_icon'=>$social_link
            );
            $msg_array = array(
                "title" => "Success",
                "emit"  => "Theme successfully Saved",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->add('theme_setting', $data), $msg_array);
        }

        if ($this->input->post('update_social')) {
            $where=array(
                'id'=>$this->input->post('theme_id')
            );
            
            //Encoding into json array start here
            $s_icon=array(
                's_facebook'   => $this->input->post('s_facebook'),
                's_twitter'    => $this->input->post('s_twitter'),
                's_gplus'      => $this->input->post('s_gplus'),
                's_pinterest'  => $this->input->post('s_pinterest')
            );
            
            $social_link=json_encode($s_icon);
            //Encoding into json array end here
            $data=array(
                'social_icon'=>$social_link
            );

            $msg_array = array(
                "title" => "Success",
                "emit"  => "Theme successfully Updated",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->update('theme_setting', $data,$where), $msg_array);
        }
        //----------------------------------------------------------------------------------------------
        //------------------------------------Social Icon end here--------------------------------------
        //----------------------------------------------------------------------------------------------
        
        if($_POST && $_POST['signature']){
            $data = $_POST;
            unset($data['signature']);
            
            $theme_setting = get_result('theme_setting');
            if($theme_setting){
                $id = $theme_setting[0]->id;
                save_data('theme_setting', ['signature'=>json_encode($data)], ['id'=>$id]);
            }else{
                save_data('theme_setting', ['signature'=>json_encode($data)]);
            }
        }
        
        $this->data['theme_data']=$this->action->read('theme_setting');

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/theme/nav', $this->data);
        $this->load->view('components/theme/theme_tools', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function theme_basic() {
        $this->data['meta_title'] = 'Themt';
        $this->data['active'] = 'data-target="theme_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;


        //----------------------------------------------------------------------------------------------
        //----------------------------------------Theme Color change End here---------------------------
        //----------------------------------------------------------------------------------------------
        if ($this->input->post('submit')) {
            $data=array(
                'theme_color'=>$this->input->post('themeColor')
            );

            $msg_array = array(
                "title" => "Success",
                "emit"  => "Theme successfully Saved",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->add('theme_setting', $data), $msg_array);
        }

        if ($this->input->post('update')) {
            $where=array(
                'id'=>$this->input->post('theme_id')
            );
            $data=array(
                'theme_color'=>$this->input->post('themeColor')
            );

            $msg_array = array(
                "title" => "Success",
                "emit"  => "Theme successfully Updated",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->update('theme_setting', $data,$where), $msg_array);
        }

        //----------------------------------------------------------------------------------------------
        //----------------------------------------Theme Color change End here---------------------------
        //----------------------------------------------------------------------------------------------

        //----------------------------------------------------------------------------------------------
        //------------------------------------Theme Background change Start here------------------------
        //----------------------------------------------------------------------------------------------
        if ($this->input->post('submit_bg')) {
            $data=array();

            if ($_FILES["attachFile"]["name"]!=null or $_FILES["attachFile"]["name"]!="" ) {

                $config['upload_path'] = './public/img';
                $config['allowed_types'] = 'png|jpeg|jpg|gif';
                $config['max_size'] = '4096';
                $config['max_width'] = '3000'; /* max width of the image file */
                $config['max_height'] = '3000';
                $config['file_name'] ="background"; 
                $config['overwrite']=true;   
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload("attachFile")){
                    $upload_data = $this->upload->data();
                    
                    $data["background_pattern"]="public/img/".$upload_data['file_name'];


                } else {
                    $msg_array=array(
                        "title" => "Error",
                        "emit"  => $this->upload->display_errors(),
                        "btn"   => true
                    );
                    $this->data['confirmation'] = message("warning", $msg_array);
                }

            }

            $msg_array = array(
                "title" => "Success",
                "emit"  => "Theme successfully Saved",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->add('theme_setting', $data), $msg_array);
        }

        if ($this->input->post('update_bg')) {
            $where=array(
                'id'=>$this->input->post('theme_id')
            );
            $data=array();

            if ($_FILES["attachFile"]["name"]!=null or $_FILES["attachFile"]["name"]!="" ) {

                $config['upload_path'] = './public/img';
                $config['allowed_types'] = 'png|jpeg|jpg|gif';
                $config['max_size'] = '4096';
                $config['max_width'] = '3000'; /* max width of the image file */
                $config['max_height'] = '3000';
                $config['file_name'] ="background".rand(); 
                $config['overwrite']=true;   
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload("attachFile")){
                    $upload_data = $this->upload->data();  
                
                if (is_file("./".$this->input->post("old_image"))) {
                    unlink("./".$this->input->post("old_image"));
                }

                    $data["background_pattern"]="public/img/".$upload_data['file_name'];


                } else {
                    $msg_array=array(
                        "title" => "Error",
                        "emit"  => $this->upload->display_errors(),
                        "btn"   => true
                    );
                    $this->data['confirmation'] = message("warning", $msg_array);
                }

            }

            $msg_array = array(
                "title" => "Success",
                "emit"  => "Theme successfully Updated",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->update('theme_setting', $data,$where), $msg_array);
        }

        //----------------------------------------------------------------------------------------------
        //------------------------------------Theme Background change end here------------------------
        //----------------------------------------------------------------------------------------------

        //----------------------------------------------------------------------------------------------
        //------------------------------------Login Background change Start here------------------------
        //----------------------------------------------------------------------------------------------
        if ($this->input->post('submit_login_bg')) {
            $data=array();

            if ($_FILES["attachFile"]["name"]!=null or $_FILES["attachFile"]["name"]!="" ) {

                $config['upload_path'] = './public/img';
                $config['allowed_types'] = 'png|jpeg|jpg|gif';
                $config['max_size'] = '4096';
                $config['max_width'] = '3000'; /* max width of the image file */
                $config['max_height'] = '3000';
                $config['file_name'] ="background"; 
                $config['overwrite']=true;   
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload("attachFile")){
                    $upload_data = $this->upload->data();
                    
                    $data["login_background"]="public/img/".$upload_data['file_name'];


                } else {
                    $msg_array=array(
                        "title" => "Error",
                        "emit"  => $this->upload->display_errors(),
                        "btn"   => true
                    );
                    $this->data['confirmation'] = message("warning", $msg_array);
                }

            }

            $msg_array = array(
                "title" => "Success",
                "emit"  => "Theme successfully Saved",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->add('theme_setting', $data), $msg_array);
        }

        if ($this->input->post('update_login_bg')) {
            $where=array(
                'id'=>$this->input->post('theme_id')
            );
            $data=array();

            if ($_FILES["attachFile"]["name"]!=null or $_FILES["attachFile"]["name"]!="" ) {

                $config['upload_path'] = './private/images';
                $config['allowed_types'] = 'png|jpeg|jpg|gif';
                $config['max_size'] = '4096';
                $config['max_width'] = '3000'; /* max width of the image file */
                $config['max_height'] = '3000';
                $config['file_name'] ="background".rand(); 
                $config['overwrite']=true;   
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload("attachFile")){
                    $upload_data = $this->upload->data();  
                
                if (is_file("./".$this->input->post("old_image"))) {
                    unlink("./".$this->input->post("old_image"));
                }

                    $data["login_background"]="private/images/".$upload_data['file_name'];


                } else {
                    $msg_array=array(
                        "title" => "Error",
                        "emit"  => $this->upload->display_errors(),
                        "btn"   => true
                    );
                    $this->data['confirmation'] = message("warning", $msg_array);
                }

            }

            $msg_array = array(
                "title" => "Success",
                "emit"  => "Theme successfully Updated",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->update('theme_setting', $data,$where), $msg_array);
        }

        //----------------------------------------------------------------------------------------------
        //------------------------------------Login Background change end here------------------------
        //----------------------------------------------------------------------------------------------

        //----------------------------------------------------------------------------------------------
        //----------------------------------------Google Map change End here---------------------------
        //----------------------------------------------------------------------------------------------
        if ($this->input->post('submit_map')) {
            $data=array(
                'google_map'=>$this->input->post('gmap')
            );

            $msg_array = array(
                "title" => "Success",
                "emit"  => "Theme successfully Saved",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->add('theme_setting', $data), $msg_array);
        }

        if ($this->input->post('update_map')) {
            $where=array(
                'id'=>$this->input->post('theme_id')
            );
            $data=array(
                'google_map'=>$this->input->post('gmap')
            );

            $msg_array = array(
                "title" => "Success",
                "emit"  => "Theme successfully Updated",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->update('theme_setting', $data,$where), $msg_array);
        }

        //----------------------------------------------------------------------------------------------
        //----------------------------------------Google Map change End here---------------------------
        //----------------------------------------------------------------------------------------------

        $this->data['theme_data']=$this->action->read('theme_setting');

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/theme/nav', $this->data);
        $this->load->view('components/theme/themeColor', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function deleteProfile() {
        $confirm = $this->action->deleteData('users', array('id' => $this->input->get('id')));
        return $confirm;
    }

}
       