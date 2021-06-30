<?php   $themeSetting = $this->action->read("theme_setting");
        if(isset($themeSetting[0]->header)){$themeHeader = json_decode($themeSetting[0]->header,true);}
    	if(isset($themeSetting[0]->footer)){$themeFooter = json_decode($themeSetting[0]->footer,true);}
    	if(isset($themeSetting[0]->logo)){$logo = json_decode($themeSetting[0]->logo,true);} ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<style>
     @media print {
        aside, nav, .none, .panel-heading, .panel-footer{display: none !important;}
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .hide{display: block !important;}
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <div class="pull-left"><h1>Doctor Commission</h1></div>

                    <a href="#" class="pull-right" style="font-size: 14px;" onclick="window.print()">
                        <i class="fa fa-print"></i> 
                        Print
                    </a>
                </div>
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
                        <th style="cursor:pointer;">Sl</th>
                        <th>Doctor Name</th>
                        <th>Patient Name</th>
                        <th>ID</th>
                        <th>Bill</th>
                        <th>Commission</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Jayanta Biswas</td>
                        <td>Rony Debnath</td>
                        <td>213546</td>
                        <td>৳ 50000</td>
                        <td>৳ 1000</td>
                    </tr>
                    
                    <tr>
                        <th colspan="4" class="text-right">Total</th>
                        <td>৳ 50000</td>
                        <td>৳ 1000</td>
                    </tr>
                </table>

                <dir-pagination-controls max-size="perPage" direction-links="true" boundary-links="true" class="none"></dir-pagination-controls>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>