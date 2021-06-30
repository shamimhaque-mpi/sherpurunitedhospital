<?php   $themeSetting = $this->action->read("theme_setting");
        if(isset($themeSetting[0]->header)){$themeHeader = json_decode($themeSetting[0]->header,true);}
    	if(isset($themeSetting[0]->footer)){$themeFooter = json_decode($themeSetting[0]->footer,true);}
    	if(isset($themeSetting[0]->logo)){$logo = json_decode($themeSetting[0]->logo,true);} ?>

<style type="text/css">
    .profile{width: 60px;}
    .profile img{width: 40px;}
</style>

<div class="container-fluid" ng-controller="DoctorsListCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <div class="pull-left">
                        <h1>All Doctors Profiles</h1>
                    </div>                                

                    <a href="#" class="pull-right" style="font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">
                <?php echo $this->session->flashdata('confirmation'); ?>
                <?php  $this->load->view('print'); ?>
                
                <h4 class="text-left hide">All Doctors</h4>
            	<div ng-cloak class="row none" style="margin-bottom:15px;">
                    <div class="col-md-4">
                        <input type="text" list="doctors" ng-model="search" placeholder="Search by Name..." class="form-control">
                        <datalist id="doctors">
                        <?php foreach ($doctors as $key => $value) { ?>
                             <option value="<?php echo $value->fullName; ?>">   
                        <?php } ?>                                                
                        </datalist>
                    </div>

                    <div class="col-md-5">&nbsp;</div>

                    <div class="col-md-3">
                        <div>
                            <span style="margin-left: 55px;line-height: 2.4;font-weight: bold;">Par Page&nbsp;:&nbsp;</span>

                            <select ng-model="perPage" class="form-control" style="width:92px;float:right;">
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
                        <th>Designation</th>
                        <th>Degree</th>
                        <th>Specialised In</th>
                        <th>Mobile</th>
                        <th>Balance</th>
                        <th>Due</th>
                        <th class="none">Action</th>
                    </tr>

                    <tr dir-paginate="row in dataset|filter:search|itemsPerPage:perPage|orderBy:sortField:reverse">
                        <td>{{ row.sl }}</td>

                        <td class="profile">
                            <a class="none" href="<?php echo site_url(); ?>{{ row.photo }}" data-lightbox="image-{{ row.id }}" data-title="{{ row.name }}">
                        		<img ng-src="<?php echo site_url(); ?>{{ row.photo ? row.photo : '/public/img/demo_doctor.webp' }}" alt="Image not found!">
                    		</a>

                            <img class="hide" ng-src="<?php echo site_url(); ?>{{ row.photo }}" alt="Image not found!">
                        </td>

                        <td>{{ row.name }}</td>

                        <td>{{ row.designation | textBeautify }}</td>

                        <td>{{ row.degree }}</td>
                        
                        <td>{{ row.specialised }}</td>

                        <td>{{ row.mobile }}</td>
                        
                        <td>{{ (row.balance > 0 ? row.balance : 0) }}</td>
                        
                        <td>{{ row.balance < 0 ? Math.abs(row.balance) : 0 }}</td>

                        <td class="none" style="width: 160px;">
                            <?php //if($privilege !='user'){ ?>

                            <?php //if(ck_action("doctor_menu","view")){ ?>
                            <a title="View" class="btn btn-primary" href="<?php echo site_url('doctor/doctorDetails?id={{ row.id }}'); ?>" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <?php //} ?>

                            <?php //if(ck_action("doctor_menu","edit")){ ?>
                            <a title="Edit" class="btn btn-warning" href="<?php echo site_url('doctor/editDoctor?id={{ row.id }}'); ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <?php //} ?>

                            <?php //if(ck_action("doctor_menu","delete")){ ?>
                            <a 
                                title="Delete" 
                                class="btn btn-danger" 
                                onclick="return confirm('Do you want to delete this Informatio?');"
                                href="<?php echo site_url('doctor/allDoctors/trashDoctor?id={{ row.id }}'); ?>">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                            <?php //} ?>
                            <?php //} ?>
                        </td>
                    </tr>
                </table>
                <dir-pagination-controls max-size="perPage" direction-links="true" boundary-links="true" class="none"></dir-pagination-controls>
            </div>

            <div class="panel-footer">
                
                <p></p>
            </div>
        </div>
    </div>
</div>


