<style>
    .profile{width: 60px;}
    .profile img{width: 60px;}

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

        .profile{width: 80px;}
        .profile img{width: 80px;}
    }
</style>

<div class="container-fluid" ng-controller="PCCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <div class="pull-left">
                        <h1>All Profiles</h1>
                    </div>

                    <a href="#" class="pull-right none" style="font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">
                <?php echo $this->session->flashdata('confirmation'); ?>

                <!-- Print banner -->
                <img class="img-responsive hide" style="width: 100%; margin-bottom: 8px;" src="<?php echo site_url('private/images/banner.jpg'); ?>">
               <span class="hide print-time"><?php echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span>
                
            	<div ng-cloak class="row none" style="margin-bottom:15px;">
                    <div class="col-md-4">
                        <input type="text" list="allpc" ng-model="search" placeholder="Search by Name..." class="form-control">
                        <datalist id="allpc">
                          <?php foreach ($pc as $key => $value) { ?>
                             <option value="<?php echo $value->fullName; ?>">   
                          <?php } ?>                                                
                        </datalist>
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
                        <th style="cursor:pointer;" ng-click="sortField='sl';reverse = !reverse;">Sl</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Commission</th>
                        <th>Address</th>
                        <th class="none">Action</th>
                    </tr>

                    <tr dir-paginate="row in dataset|filter:search|itemsPerPage:perPage|orderBy:sortField:reverse">
                        <td>{{ row.sl }}</td>

                        <td class="profile">
                            <a class="none" href="<?php echo site_url(); ?>{{ row.photo }}" data-lightbox="image-{{ row.id }}" data-title="{{ row.name }}">
                        		<img ng-src="<?php echo site_url(); ?>{{ row.photo }}" alt="Image not found!" width="30px">
                    		</a>

                            <img class="hide" ng-src="<?php echo site_url(); ?>{{ row.photo }}" alt="Image not found!">
                        </td>

                        <td>{{ row.name }}</td>

                        <td>{{ row.mobile }}</td>

                        <td>% {{ row.commission }}</td>

                        <td>{{ row.address }}</td>

                        <td class="none" style="width: 110px;">
                            <a title="Edit" class="btn btn-warning" href="<?php echo site_url('pc/editPc?id='); ?>{{ row.id }}" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                            <a 
                                title="Delete" 
                                class="btn btn-danger" 
                                onclick="return confirm('Do you want to delete this Informatio?');"
                                href="<?php echo site_url('pc/allPc/deletePc?id='); ?>{{ row.id }}">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                </table>
                
                <dir-pagination-controls max-size="perPage" direction-links="true" boundary-links="true" class="none"></dir-pagination-controls>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>


