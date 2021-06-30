<?php   $themeSetting = $this->action->read("theme_setting");
        if(isset($themeSetting[0]->header)){$themeHeader = json_decode($themeSetting[0]->header,true);}
    	if(isset($themeSetting[0]->footer)){$themeFooter = json_decode($themeSetting[0]->footer,true);}
    	if(isset($themeSetting[0]->logo)){$logo = json_decode($themeSetting[0]->logo,true);} ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />

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
<div class="container-fluid block-hide">
    <div class="row">

    <?php echo $this->session->flashdata('confirmation'); ?>

    <!-- horizontal form -->
    <?php
    $attribute = array(
        'name' => '',
        'class' => 'form-horizontal',
        'id' => ''
    );
    echo form_open('', $attribute);
    ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Set Opening Balance</h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>

                <div class="col-md-9">                                

                    <div class="form-group">
                        <div class='col-md-9'>
                            <label for="" class="col-md-4 control-label">Opening Amount </label>
                            <div class="col-md-8">
                                <input type="number" step="any" name="opening_amount" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class='col-md-9'>
                            <label for="" class="col-md-4 control-label">Initial Amount </label>
                            <div class="col-md-8">
                                <input type="number" step="any" name="initial_invest" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class='col-md-9'>
                            <div class="col-md-offset-10 col-md-2">
                                <input class="btn btn-primary" type="submit" name="submit" value="Save">
                            </div>
                        </div>
                    </div>
                        
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>


<div class="container-fluid" >
    <div class="row" ng-controller="OpeningBalanceCtrl" ng-cloak>
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>Opening Balance</h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
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
                
                <h4 class="hide text-center">Opening Balance</h4>

            <table class="table table-bordered" ng-cloak>
                <tr>
                    <th width='45'>SL</th>
                    <th>Opening Amount</th>
                    <th>Initial Invest</th>
                </tr>
                <tr dir-paginate="row in record|filter:search|itemsPerPage:perPage|orderBy:sortField:reverse">
                    <td>{{ $index+1 }}</td>
                    <td>{{ row.opening_amount }}</td>
                    <td>{{ row.initial_invest }}</td>
                </tr>
            </table>
            
             <dir-pagination-controls max-size="perPage" direction-links="true" boundary-links="true" class="none"></dir-pagination-controls>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
