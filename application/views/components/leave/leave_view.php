<style>
    .message{
        border: 1px solid #ddd;
        border-radius: 10px;
        display: none;
        background: #E99126;
        color: #fff;
        padding: 15px;
    }
     @media print{
        aside, nav, .none, .panel-heading, .panel-footer {
            display: none !important;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .panel .hide{
            display: block !important;
        }
        .title{
            font-size: 25px;        
        }
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Profile : Abdullah</h1>
                </div>
            </div>

            <div class="panel-body no-padding">

                <div class="col-md-12">
                    <!-- Print banner -->
                <img class="img-responsive hide print-banner" src="<?php echo site_url('private/images/banner.jpg'); ?>">
                <span class="hide print-time"><?php echo $this->data['name'] . ' | ' . date('Y, F j H:i a'); ?></span>
                </div>
            
                <div class="no-title">&nbsp;</div>

                <!-- left side -->
                <aside class="col-md-3">
                    <div class="border-top">&nbsp;</div>
                    <figure class="profile-pic">
                        <img style="margin-bottom: 0;" src="<?php echo site_url('public/img/pic-male.png'); ?>" alt="Photo not found!" class="img-responsive">
                    </figure>
                    <br/>
                </aside>


                <div class="col-md-9">
                    
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs none" role="tablist">
                        <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                    </ul>

                  <!-- Tab panes -->

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="profile">
                            <div class="col-xs-12 profile-title no-padding">
                                <div class="col-xs-6">
                                    <h3 class="pull-left" style="margin-bottom: 20px;"><i class="glyphicon glyphicon-user" style="font-size: 30px;"></i> &nbsp; Abdullah</h3>
                                </div>

                                <div class="col-xs-6">
                                        <a class="pull-right none" style="width: 60px;" href="<?php echo site_url('leave/leave/edit'); ?>">  <i class="fa fa-pencil"></i>&nbsp; Edit </a>
                                        <a class="pull-right none" href="#" onclick="window.print()" style="width: 60px; background: #46C35F; margin-right: 5px;"><i class="fa fa-print" aria-hidden="true"></i>&nbsp; Print </a>
                                    </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <label class="control-label col-xs-6">Employee ID</label>
                                    <div class="col-xs-6">
                                        <p>01</p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <label class="control-label col-xs-6">Employee Nme</label>
                                    <div class="col-xs-6">
                                        <p>Abdullah</p>
                                    </div>
                                </div>                                

                                <div class="col-sm-6 col-xs-12">
                                    <label class="control-label col-xs-6">Joining Date</label>
                                    <div class="col-xs-6">
                                        <p>2017-01-14</p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <label class="control-label col-xs-6">Mobile Number</label>
                                    <div class="col-xs-6">
                                        <p>01700000000</p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <label class="control-label col-xs-6">Permanent Address</label>
                                    <div class="col-xs-6">
                                        <p>Mymensingh</p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <label class="control-label col-xs-6">Salary</label>
                                    <div class="col-xs-6">
                                        <p>1000 TK</p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <label class="control-label col-xs-6">Gender</label>
                                    <div class="col-xs-6">
                                        <p>Male</p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <label class="control-label col-xs-6">Designation</label>
                                    <div class="col-xs-6">
                                        <p>WD</p>
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


