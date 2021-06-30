<div class="container-fluid">
    <div class="row" ng-controller="allBillCtrl">
    <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>Test Report</h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php  $this->load->view('print'); ?>
                
                <h4 class="hide">Test Report</h4>
                <div ng-cloak class="row none" style="margin-bottom:15px;">
                     <div class="col-md-4">
                         <input type="text" ng-model="search" placeholder="Search" class="form-control">
                    </div>
                    <div class="col-md-5">&nbsp;</div>
                    <div class="col-md-3">
                        <div>
                             <span style="margin-left: 55px;line-height: 2.4;font-weight: bold;">Par Page&nbsp;:&nbsp;</span>
                             <select ng-model="perPage" class="form-control" style="width:92px;float:right;">
                                <option value="all">All</option>
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
                        <th class="text-center">SL</th>
                        <th>Date</th>
                        <th>Voucher No</th>
                        <th>Patient ID</th>
                        <th>Patient Name</th>                       
                        <th>Grand Total</th>
                        <th>Voucher Paid</th>
                        <th>Due Paid</th>
                        <th>Remission</th>
                        <th>Total Due</th>
                        <th class="none">Action</th>
                    </tr>
                    <tr dir-paginate="test in alltestInfo|filter:search|itemsPerPage:perPage|orderBy:sortField:reverse">
                        <td style="width: 40px;">{{test.sl}}</td>
                        <td>{{test.date}}</td>
                        <td>{{test.voucher}}</td>
                        <td>{{test.pid}}</td>
                        <td>{{test.name}}</td>                        
                        <td>{{test.grand_total}}</td>
                        <td style="color: green;"><b>{{test.paid}}</b></td>
                        <td style="color: green;"><b>{{test.due_paid}}</b></td>
                         <td style="color: green;"><b>{{test.due_remission}}</b></td>
                        <td style="color: red;"><b>{{test.grand_total - test.paid - test.due_paid - test.due_remission}}</b></td>
                        <td class="none" style="width: 60px;">
                            <?php if(ck_action("due_list","view")){ ?>
                            <a title="Edit" class="btn btn-primary" href="<?php echo site_url('due_list/due_list/payment?vno={{test.voucher}}');?>" ><i class="fa fa-dollar" aria-hidden="true"></i></a>
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