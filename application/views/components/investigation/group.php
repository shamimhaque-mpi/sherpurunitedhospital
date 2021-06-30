<?php   $themeSetting = $this->action->read("theme_setting");
        if(isset($themeSetting[0]->header)){$themeHeader = json_decode($themeSetting[0]->header,true);}
    	if(isset($themeSetting[0]->footer)){$themeFooter = json_decode($themeSetting[0]->footer,true);}
    	if(isset($themeSetting[0]->logo)){$logo = json_decode($themeSetting[0]->logo,true);} ?>
<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer {
            display: none !important;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .panel .hide{
            display: block !important;
        }
        .title{
            font-size: 25px;        
        }
    }
</style>

<div class="container-fluid">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header none">
                <div class="panal-header-title pull-left">
                    <h1>Add Group</h1>
                </div>
            </div>

            <div class="panel-body none">
                <!-- horizontal form -->
                
                <?php
                $attr=array('class'=>'form-horizontal');
                echo form_open('',$attr);
                ?>
                <div class="form-group">
                    <label class="col-md-2 control-label">Group Name</label>
                     <div class="col-md-5">
                        <input type="text" name="group_name" class="form-control">
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Save" name="submit" class="btn btn-primary">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

            <div class="panel-heading panal-header">
                <div class="panal-header-title">
                    <h1 class="pull-left">All Group</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print </a>
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
                <h4 class="hide text-center"  style="margin-top: -10px;">All Group</h4>
                <span class="hide print-time"><?php echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span>


                <table class="table table-bordered">
                    <tr>
                        <th>SL </th>
                        <th>Group Name </th>
                        <th class="none">Action </th>
                    </tr>

                    <?php foreach ($group_names as $g_key => $group_name) { ?>
                    <tr>
                        <td><?php echo $g_key+1; ?></td>
                        <td><?php echo filter($group_name->group_name); ?></td>
                        <td class="none text-center" style="width: 115px;">
                            <a class="btn btn-danger" onclick="return confirm('This Data Will Delete Permanently..!');" href="?delete_token=<?php echo $group_name->id; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>

        </div>
    </div>
</div>

