<?php   $themeSetting = $this->action->read("theme_setting");
        if(isset($themeSetting[0]->header)){$themeHeader = json_decode($themeSetting[0]->header,true);}
    	if(isset($themeSetting[0]->footer)){$themeFooter = json_decode($themeSetting[0]->footer,true);}
    	if(isset($themeSetting[0]->logo)){$logo = json_decode($themeSetting[0]->logo,true);} ?>
    	
<div class="container-fluid">
    <div class="row" ng-controller="AllTestReportCtrl">
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>All Test </h1>
                </div>

                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()">
                    <i class="fa fa-print"></i> 
                    Print
                </a>
            </div>

            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php  $this->load->view('print'); ?>

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
                    </tr>
                </table>

                <dir-pagination-controls max-size="perPage" direction-links="true" boundary-links="true" class="none"></dir-pagination-controls>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>


