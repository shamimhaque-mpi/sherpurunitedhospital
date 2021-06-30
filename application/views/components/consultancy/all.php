<?php   $themeSetting = $this->action->read("theme_setting");
        if(isset($themeSetting[0]->header)){$themeHeader = json_decode($themeSetting[0]->header,true);}
    	if(isset($themeSetting[0]->footer)){$themeFooter = json_decode($themeSetting[0]->footer,true);}
    	if(isset($themeSetting[0]->logo)){$logo = json_decode($themeSetting[0]->logo,true);} ?>

<div class="container-fluid">
    <div class="row" ng-controller="consultancyListCtrl">
    <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>All Consultancy</h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">
                <?php  $this->load->view('print'); ?>
                
                <h4 class="hide">All Consultancy</h4>
                <div ng-cloak class="row none" style="margin-bottom:15px;">
                     <div class="col-md-4">
                         <input type="text" ng-model="search" placeholder="Search" class="form-control">
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
                        <th>Doctor Name</th>
                        <th>RF/PC</th>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Mobile</th>
                        <th>Amount</th>
                        <th>Paid</th>
                        <th>Due</th>
                        <th>Status</th>
                        <th class="none">Action</th>
                    </tr>
                    <tr dir-paginate="patient in allPatients|filter:search|itemsPerPage:perPage|orderBy:sortField:reverse">
                        <td style="width: 40px;">{{$index+1}}</td>
                        <td>{{patient.date}}</td>
                        <td>{{patient.dotcor_name}}</td>
                        <td>{{patient.refer_name}}</td>
                        <td>{{patient.pid}}</td>
                        <td>{{patient.name | textBeautify}}</td>
                        <td>{{patient.contact}}</td>
                        <td>{{patient.grand_total}}</td>
                        <td>{{patient.paid}}</td>
                        <td>{{patient.due}}</td>
                        <td>{{patient.status}}</td>
                        <td class="none" style="width: 160px;">
                            <?php //if(ck_action("consultancy_menu","view")){ ?>
                            <a title="View" class="btn btn-primary" href="<?php echo site_url('consultancy/newConsultancy/voucher/?pid={{patient.pid}}'); ?>" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <?php //} ?>                            
                            <?php //if(ck_action("consultancy_menu","edit")){ ?>
                            <a title="Edit" class="btn btn-warning" href="<?php echo site_url('consultancy/edit_consultancy?id={{patient.pid}}');?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <?php //} ?>                            
                            <?php //if(ck_action("consultancy_menu","delete")){ ?>
                            <a title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to Delete this Patient?');" href="<?php echo site_url('consultancy/delete_consultancy/?pid={{patient.pid}}');?>" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            <?php //} ?>                        

                        </td>
                    </tr>
                    
                </table>
                <dir-pagination-controls max-size="perPage" direction-links="true" boundary-links="true" class="none"></dir-pagination-controls>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>


