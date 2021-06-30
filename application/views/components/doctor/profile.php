<?php   $themeSetting = $this->action->read("theme_setting");
        if(isset($themeSetting[0]->header)){$themeHeader = json_decode($themeSetting[0]->header,true);}
    	if(isset($themeSetting[0]->footer)){$themeFooter = json_decode($themeSetting[0]->footer,true);}
    	if(isset($themeSetting[0]->logo)){$logo = json_decode($themeSetting[0]->logo,true);} ?>
    	
<style type="text/css">
    .profile-title{display: flex;}
    .profile-title img{
        width: 70px;
        height: 70px;
        margin-bottom:  10px;
    }

    @media print{
        aside, nav, .none, .panel-heading, .panel-footer{
            display: none !important;
        }

        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }

        .hide{display: block !important;}
        p, label{
            font-size: 18px;
        }
        .profile-title img.hide{
            position: absolute;
            right: -355px;
            top: -30px;
            width: 120px;
            height: 140px;
        }
    }  
</style>


<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Doctor's Profile</h1>
                </div>
            </div>

            <div class="panel-body">
                <!-- Print banner Start Here -->
                <div class="col-xs-12 hide" style="border: 1px solid #ddd; !important; margin-bottom: 15px;">
                    <div class="col-xs-3" style="padding: 0;">
                        <img class="img-responsive" style="width: 100%; margin-top: 6px;" src="<?php echo site_url($logo['logo']); ?>" alt="">
                    </div>
                    <div class="col-xs-9" style="padding: 0;">
                    	<h2 style="text-align:center;"><?php echo strtoupper($themeHeader['site_name']); ?></h2>
                    	<p style="text-align:center;"><?php echo $themeHeader['place_name'];?></p>
                    	<p style="text-align:center;"><?php echo $themeFooter['addr_moblile']; ?> || <?php echo $themeFooter['addr_email']; ?></p>
                    </div>
                </div>
                
                <span class="hide print-time"><?php echo $this->data['name'] . ' | ' . date('Y, F j H:i a'); ?></span>

                <div class="row">
                    <!-- left side -->
                    <aside class="col-md-3">
                        <div class="border-top">&nbsp;</div>
                        <figure class="profile-pic">
                            <img style="margin-bottom: 0;" src="<?php echo site_url($biography[0]->image); ?>" alt="Photo not found!" class="img-responsive">
                        </figure>
                        <br/>
                    </aside>


                    <div class="col-md-9">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs none" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a>
                            </li>
                        </ul>
                        <h3 class="text-center hide"><strong>Doctor Information</strong></h3>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="profile">
                                <!-- pre><?php print_r($biography); ?></pre -->

                                <div class="row profile-title no-padding">
                                    <div class="col-xs-6">
                                        <div class="profile-title">
                                            <img class="hide" src="<?php echo site_url('/public/profiles/superadmin.jpg'); ?>" alt="Photo not found....!">
                                            <h3 class="pull-left none" style="margin-bottom: 20px;"><i class="glyphicon glyphicon-user none" style="font-size: 30px;"></i> &nbsp; <?php echo $biography[0]->fullName; ?></h3>
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <a class="pull-right none" style="width: 60px;" href="<?php echo site_url('doctor/editDoctor?id=' . $biography[0]->id); ?>"><i class="fa fa-pencil"></i>&nbsp; Edit </a>
                                        <a class="pull-right none" href="#" onclick="window.print()" style="width: 60px; background: #46C35F; margin-right: 5px;"><i class="fa fa-print" aria-hidden="true"></i>&nbsp; Print </a>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-md-6 col-xs-12 no-padding hide">
                                        <label class="control-label col-xs-5">Name</label>
                                        <div class="col-xs-7">
                                            <p><?php echo $biography[0]->fullName; ?> </p>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-xs-12 no-padding">
                                        <label class="control-label col-xs-5">Designation</label>
                                        <div class="col-xs-7">
                                            <p><?php echo str_replace("_", " ", $biography[0]->designation); ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xs-12 no-padding">
                                        <label class="control-label col-xs-5">Degree</label>
                                        <div class="col-xs-7">
                                            <p><?php echo $biography[0]->degree; ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xs-12 no-padding">
                                        <label class="control-label col-xs-5">Specialised In</label>
                                        <div class="col-xs-7">
                                            <p><?php echo $biography[0]->specialised; ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xs-12 no-padding">
                                        <label class="control-label col-xs-5">Mobile</label>
                                        <div class="col-xs-7">
                                            <p><?php echo $biography[0]->mobile; ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xs-12 no-padding">
                                        <label class="control-label col-xs-5">Phone</label>
                                        <div class="col-xs-7">
                                            <p><?php echo $biography[0]->phone; ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xs-12 no-padding">
                                        <label class="control-label col-xs-5">Email</label>
                                        <div class="col-xs-7">
                                            <p><?php echo $biography[0]->email; ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xs-12 no-padding">
                                        <label class="control-label col-xs-5">Fee</label>
                                        <div class="col-xs-7">
                                            <p>৳ <?php echo $biography[0]->fee; ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xs-12 no-padding">
                                        <label class="control-label col-xs-5">Commission</label>
                                        <div class="col-xs-7">
                                            <p>% <?php echo $biography[0]->commission; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12 no-padding">
                                        <label class="control-label col-xs-5">Hospital Name</label>
                                        <div class="col-xs-7">
                                            <p><?php echo $biography[0]->hospital; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12 no-padding">
                                        <label class="control-label col-xs-5">Room No</label>
                                        <div class="col-xs-7">
                                            <p><?php echo $biography[0]->room_no; ?></p>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-xs-12 no-padding">
                                        <label class="control-label col-xs-5">Address</label>
                                        <div class="col-xs-7">
                                            <p><?php echo $biography[0]->address; ?></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>