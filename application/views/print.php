    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    <?php
        $themeSetting = $this->action->read("theme_setting");
        if(isset($themeSetting[0]->header)){$themeHeader = json_decode($themeSetting[0]->header,true);}
        if(isset($themeSetting[0]->footer)){$themeFooter = json_decode($themeSetting[0]->footer,true);}
        if(isset($themeSetting[0]->logo)){$logo = json_decode($themeSetting[0]->logo,true);}
    ?>
    <div class="row">
        <div class="col-xs-12">
            <?php if(isset($themeHeader['is_banner']) && $themeHeader['is_banner'] == 'yes'){ ?>
            <div class="__print-border hide">
                <div class="row">
                    <?php $this->load->helper('url'); $module = $this->uri->segment(1); ?>
                    <div class="col-xs-12">
                        <div class="__logo">
                    	    <img src="<?php echo site_url($logo['faveicon']); ?>" alt="Photo Not Found!">
                        </div>
                        <div class="__info">
                    	    <h1 class="site_name"><?php echo $themeHeader['site_name']; ?></h1>
                    	    <h4><?php echo $themeHeader['place_name'];?> | <small>লাইসেন্স নং- ৪১৬২</small></h4>
                    	    <p id="_mobile_">Mobile: <?php echo $themeHeader['addr_moblile']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
            <div class="__print-border hide">
                <div class="row">
                    <div class="demo_banner">
                        
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <style>
        .hide > h3, .hide > h4 {margin: 2px 0 10px 0;}
        .__print-border {
            margin: 25px 0 15px;
            padding: 0 0 10px;
        }
        .__logo img {width: 100%;}
        .__info h2, .__info p {margin: 0;}
        .hide {display: none;}
        .__info {text-align: center;}
        .__info h4 {font-size: 21px;}
        .__info p {font-size: 17px;}
        
        @font-face {
            font-family: 'times';
            src: url(<?php echo site_url('private/fonts/times.ttf');?>);
        }
            
        @page {margin: 0;}
        @media print{
            body {font-family: 'times' !important;}
            .demo_banner {width: 100%; height: 120px;}
            aside, nav, .none, .panel-footer, .print_none, .panel-heading, .alert, .dataTables_length, .dataTables_filter, .pagination {
        		display: none !important;
        	}
        	.block-hide {display: none;}
            .panel {
        		border: 1px solid transparent !important;
        		left: 0px !important;
        		position: absolute !important;
        		top: 0px !important;
        		width: 100% !important;
        	}
            .hide {display: block !important;}
            .__logo {
                position: absolute;
                top: 20pxpx;
                left: 15px;
                max-width: 85px;
            }
            .__info {
                text-align: center;
                padding-left: 88px;
            }
            .site_name {
                text-transform: capitalize !important;
                color: #000 !important;
                font-size: 29px;
                font-weight: 400;
                margin-top: 0px;
                margin-bottom: 0px;
            }
            .site_namebn {
                font-size: 38px;
                color: #000 !important;
                font-weight: 700;
                margin-top: 0px;
                margin-bottom: 0px;
            }
            .test_table p {
                   padding: 3px 12px; 
                   margin: 7px 0 0 !important;
                   border: 1px solid #000;
                   box-shadow: none;
            }
            .test_table p,
            .report_lable_box,
            .report_lable_box label {border-color: #000;}
            .test_table h4 {
                font-weight: bold;
                font-size: 26px;
                width: 100%;
                margin-top: 20px;
                padding-bottom: 0;
            }
            .test_table h3 {
                margin: 0 auto 2px;
                font-weight: bold;
                font-size: 20px;
                padding-bottom: 0;
                padding-top: 0;
            }
            .report_lable_box label {padding: 2px 12px;}
            .test_table .table-bordered>tbody>tr>td, 
            .test_table .table-bordered>tbody>tr>th,
            .test_table .table-bordered>thead>tr>td, 
            .test_table .table-bordered>thead>tr>th {
                border-color: #000 !important;
                padding: 3px 12px !important;
            }
            .table-bordered>tbody>tr>td, 
            .table-bordered>tbody>tr>th, 
            .table-bordered>tfoot>tr>td, 
            .table-bordered>tfoot>tr>th, 
            .table-bordered>thead>tr>td, 
            .table-bordered>thead>tr>th {
                border: 1px solid #000 !important;
                padding: 6px 8px;
            }
        }
    </style>