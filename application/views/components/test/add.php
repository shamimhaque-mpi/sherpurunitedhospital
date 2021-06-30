<?php   $themeSetting = $this->action->read("theme_setting");
        if(isset($themeSetting[0]->header)){$themeHeader = json_decode($themeSetting[0]->header,true);}
    	if(isset($themeSetting[0]->footer)){$themeFooter = json_decode($themeSetting[0]->footer,true);}
    	if(isset($themeSetting[0]->logo)){$logo = json_decode($themeSetting[0]->logo,true);} ?>
<style>
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
        .hide{
            display: block !important;
        }
    }
</style>

<div class="container-fluid">
    <div class="row" ng-controller="TestReportCtrl">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>All Test </h1>
                </div>

                <a 
                    href="#" 
                    class="pull-right none" 
                    style="margin-top: 0px; font-size: 14px;" 
                    onclick="window.print()">
                    <i class="fa fa-print"></i> 
                    Print
                </a>
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

                <div ng-cloak class="row none" style="margin-bottom:15px;">
                     <div class="col-md-4">
                         <input type="text" ng-model="search" placeholder="Search by Name..." class="form-control">
                    </div>
                    <div class="col-md-5">&nbsp;</div>
                    <div class="col-md-3">
                        <div>
                             <span style="margin-left: 55px;line-height: 2.4;font-weight: bold;">Par Page&nbsp;:&nbsp;</span>
                             <select ng-model="perPage" class="form-control" style="width:92px;float:right;">
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                             </select>
                         </div>
                    </div>
                </div>

                <table class="table table-bordered" ng-cloak>
                    <tr>
                        <th class="text-center">Sl</th>
                        <th>Date</th>
                        <th>Patient ID</th>
                        <th>Patient Name</th>                       
                        <th>Grand Total</th>
                        <th>Paid</th>
                        <th>Due</th>
                        <th>Status</th>
                        <th class="none">Action</th>
                    </tr>

                    <tr dir-paginate="test in alltestInfo|filter:search|itemsPerPage:perPage|orderBy:sortField:reverse">
                        <td style="width: 40px;">{{test.sl}}</td>
                        <td>{{test.date}}</td>
                        <td>{{test.patient_id}}</td>
                        <td>{{test.patient_name}}</td>                        
                        <td>{{test.grand_total}}</td>
                        <td style="color: green;"><b>{{test.paid}}</b></td>
                        <td style="color: red;"><b>{{test.due}}</b></td>
                        <td style="text-transform: uppercase;"><b>{{test.status}}</b></td>

                        <td class="none" style="width: 115px;">
                            <?php if(ck_action("test_menu","view")){ ?>                            
                            <a 
                                title="View" class="btn btn-primary" 
                                href="<?php echo site_url('test/viewTest?vno={{test.voucher_no}}');?>">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <?php } ?>

                            <?php if(ck_action("test_menu","edit")){ ?>                            
                            <a 
                                title="Edit" class="btn btn-warning" 
                                href="<?php echo site_url('test/editTest?vno={{test.voucher_no}}');?>">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <?php } ?>

                        </td>
                    </tr>
                </table>

                <dir-pagination-controls max-size="perPage" direction-links="true" boundary-links="true" class="none"></dir-pagination-controls>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>


