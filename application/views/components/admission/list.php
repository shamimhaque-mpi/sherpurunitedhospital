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
        .block-hide{
            display: none;
        }
    }
</style> 

<div class="container-fluid">
    <div class="row" ng-controller="admissionListCtrl">
    <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>All Admission</h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">
                <!-- Print banner -->
                <img class="img-responsive hide print-banner" src="<?php echo site_url('private/images/banner.jpg'); ?>">
                <span class="hide print-time"><?php echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span>

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
                        <th>Patient ID</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <tr dir-paginate="patient in allPatients|filter:search|itemsPerPage:perPage|orderBy:sortField:reverse">
                        <td style="width: 40px;">{{patient.sl}}</td>
                        <td>{{patient.date}}</td>
                        <td>{{patient.pid}}</td>
                        <td>{{patient.name}}</td>
                        <td>{{patient.contact}}</td>
                        <td>{{patient.status | textBeautify}}</td>
                        <td class="none" style="width: 160px;">
                            <a title="View" class="btn btn-primary" href="<?php echo site_url('patient/basicInfo/view/{{patient.pid}}'); ?>" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a title="Edit" class="btn btn-warning" href="<?php echo site_url('admission/newAdmission/edit?id={{patient.pid}}');?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to Delete this Patient?');" href="<?php echo site_url('admission/newAdmission/delete/{{patient.id}}');?>" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                </table>
                <dir-pagination-controls max-size="perPage" direction-links="true" boundary-links="true" class="none"></dir-pagination-controls>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>


