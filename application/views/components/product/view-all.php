<style>
    @media print{
        aside, .panel-heading, .panel-footer, nav, .none{display: none !important;}
        .panel{border: 1px solid transparent;left: 0px;position: absolute;top: 0px;width: 100%;}
        .hide{display: block !important;}
        table tr th,table tr td{font-size: 12px;}
    }
    .action-btn a{
        margin-right: 0;
        margin: 3px 0;
    }
</style>

<div class="container-fluid" ng-controller="showAllProductCtrl" ng-cloak>
    <div class="row">
        <?php  echo $this->session->flashdata('confirmation'); ?>


        <div class="panel panel-default" id="data">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">View All Product</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body" ng-cloak>
                <!-- Print banner -->
                <img class="img-responsive print-banner hide" src="<?php echo site_url('private/images/banner.jpg'); ?>">

                <h4 class="text-center hide" style="margin-top: 0px;">All product</h4>

                <div class="row none">
                    <div class="col-md-3" style="margin-bottom:15px;">
                        <input type="text" ng-model="search" placeholder="Search...." class="form-control">
                    </div>
                    <div class="col-md-offset-6 col-md-3">
                        <select ng-model="perPage" class="form-control pull-right"  style="width:100px;">
                            <option value="">All</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="300">300</option>
                            <option value="500">500</option>
                        </select>
                    </div>
                </div>

                <hr class="none" style="border-bottom:2px solid #00A8FF; margin-top: 0;" />
                <table class="table table-bordered table-hover">
                    <tr>
                        <th style="width: 45px;">SL</th>
                        <th style="width: 100px;">Company </th>
                        <th style="width: 120px;">Category </th>
                        <th style="width: 200px;">Name </th>
                        <!-- <th style="width: 100px;">Model</th> -->
                        <th style="width: 100px;">P. Price</th>
                        <th style="width: 100px;">Sale Price</th>
                        <th class="none">Remarks</th>
                        <!-- <th class="none">Specifition</th> -->
                        <th style="width: 120px;" class="none"> Action </th>
                    </tr>

                    <tr dir-paginate="row in products|filter:search|filter:searchItem|orderBy:sortField:reverse|itemsPerPage:perPage">
                        <input type="hidden" ng-value="row.showroom_id">
                        <td>{{ row.sl }}</td>
                        <td>{{ row.brand | textBeautify |removeDash }}</td>
                        <td>{{ row.category | textBeautify | removeDash }}</td>
                        <!-- <td>{{ row.name | textBeautify | removeDash}} </td> -->
                        <td>{{ row.model | textBeautify | removeDash }}</td>
                        <td>{{ row.purchase_price }}</td>
                        <td>{{ row.sale_price }}</td>
                        <td>{{ row.remarks }}</td>
                        <!-- <td>{{ row.specifition }}</td> -->
                        <td class="none" style="width: 115px;">
                            <a class="btn btn-warning" title="Edit" href="<?php echo site_url('product/product/edit/'.'{{row.id}}');?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure want to delete this Product?');" href="<?php echo site_url('product/product/delete/'.'{{row.id}}') ;?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                </table>
                <dir-pagination-controls max-size="perPage" direction-links="true" boundary-links="true" class="none"></dir-pagination-controls>
            </div>

            <div class="panel-footer"> </div>
        </div>
    </div>
</div>
