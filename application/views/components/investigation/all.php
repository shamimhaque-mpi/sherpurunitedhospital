<style>

</style>

<div class="container-fluid" ng-controller="InvestigationListCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>All Investigation </h1>
                </div>

                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">
                <?php echo $this->session->flashdata('confirmation'); ?>
                <!-- Print banner Start Here -->
                <?php $this->load->view('print'); ?>
                <!--<span class="hide print-time"><?php //echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span>-->

                <h4 class="text-center hide">All Investigation</h4>
            	<div ng-cloak class="row none" style="margin-bottom:15px;">
                    <div class="col-md-4">
                        <input type="text" ng-model="search" placeholder="Search by Name..." class="form-control">
                    </div>
                    <div class="col-md-5">&nbsp;</div>
                    <div class="col-md-3">
                        <div>
                            <span style="margin-left: 55px;line-height: 2.4;font-weight: bold;">Par Page&nbsp;:&nbsp;</span>
                            <select ng-model="perPage" class="form-control" style="width:92px;float:right;">
                                <option value="all">All</option>
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
                        <th class="text-center" style="cursor:pointer;" ng-click="sortField='sl';reverse = !reverse;">Sl</th>
                        <th>Group</th>
                        <th>Test Name</th>
                        <th>Test Fee (TK)</th>
                        <th>Cost (TK)</th>
                        <!--<th>Unit</th>-->
                        <!--<th>Reference Vaue</th>-->
                        <th>Room</th>
                        <th class="none">Action</th>
                    </tr>

                    <tr dir-paginate="row in dataset|filter:search|itemsPerPage:perPage|orderBy:sortField:reverse">
                        <td style="width: 40px;">{{ row.sl }}</td>
                        <td>{{ row.group | removeUnderScore | textBeautify}}</td>
                        <td>{{ row.testName | removeUnderScore}}</td>
                        <td>{{ row.fee }}</td>
                        <td>{{ row.cost }}</td>
                        <!--<td>{{ row.unit }}</td>-->
                        <!--<td>{{ row.reference_value }}</td>-->
                        <td>{{ row.room }}</td>
                        <td class="none" style="width: 110px;">
                            <?php //if($privilege !='user'){ ?>
                             <?php //if(ck_action("investigation_menu","edit")){ ?>
                            <a title="Edit" class="btn btn-warning" href="<?php echo site_url('investigation/editInvestigation?id='); ?>{{ row.id }}">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                             <?php //} ?>

                             <?php //if(ck_action("investigation_menu","delete")){ ?>
                            <a title="Delete" 
                                class="btn btn-danger" 
                                onclick="return confirm('Do you want to delete this Information?');"
                                href="<?php echo site_url('investigation/allInvestigation/deleteInvestigation?id='); ?>{{ row.id }}">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                             <?php //} ?> 
                             <?php //}?>
                        </td>
                    </tr>
                </table>

                <dir-pagination-controls max-size="perPage" direction-links="true" boundary-links="true" class="none"></dir-pagination-controls>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>


