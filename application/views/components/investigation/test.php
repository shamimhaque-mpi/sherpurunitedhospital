<?php   $themeSetting = $this->action->read("theme_setting");
        if(isset($themeSetting[0]->header)){$themeHeader = json_decode($themeSetting[0]->header,true);}
    	if(isset($themeSetting[0]->footer)){$themeFooter = json_decode($themeSetting[0]->footer,true);}
    	if(isset($themeSetting[0]->logo)){$logo = json_decode($themeSetting[0]->logo,true);} ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
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
                    <h1>Add Test</h1>
                </div>
            </div>

            <div class="panel-body none">
                <!-- horizontal form -->
                
                <?php
                $attr=array('class'=>'form-horizontal');
                echo form_open('',$attr);
                ?>

                <div class="form-group">
                    <label class="col-md-2 control-label">Group Name <span class="req">*</span></label>
                     <div class="col-md-5">
                        <select name="group_name" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required>
                            <option value="" selected disabled> Select Group</option>
                            <?php if($allGroups !=null){ foreach($allGroups as $group) {?>
                            <option value="<?php echo $group->group_name;?>" > <?php echo filter(str_replace("_"," ",$group->group_name)); ?></option>
                            <?php } }?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Test Name <span class="req">*</span></label>
                    
                     <div class="col-md-5">
                        <input type="text" name="test_name" class="form-control" required>
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
                    <h1 class="pull-left">All Test</h1>
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
                <h4 class="hide text-center"  style="margin-top: -10px;">All Test</h4>
                <span class="hide print-time"><?php echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span>


                <table class="table table-bordered">
                    <tr>
                        <th> SL </th>
                        <th> Group Name </th>
                        <th>Test Name </th>
                        <th class="none">Action </th>
                    </tr>
                    <?php foreach ($tests as $t_key => $test) { ?>
                    <tr>
                        
                        <td><?php echo $t_key+1; ?></td>
                        <td class="group_name"><?php echo filter(str_replace("_"," ",$test->group_name)); ?></td>
                        <td class="test_name"><?php echo filter($test->test_name); ?></td>
                        <td class="none text-center" style="width: 160px;">
                            <?php //if($privilege !='user'){ ?>
                            <a title="Edit" class="btn btn-warning" href="<?php echo site_url('investigation/addInvestigation/editTestName?id='.$test->id);?>" >Edit</a>
                            <a class="btn btn-danger" onclick="return confirm('This Data Will Delete Permanently..!');" href="?delete_token=<?php echo $test->id; ?>">Delete</a>
                            <?php //} ?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Test</h4>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
                <label>Group Name</label>
                <select name="group_name" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" required>
                    <option value="" selected disabled> --Select Group--</option>
                    <?php if($allGroups !=null){ foreach($allGroups as $group) {?>
                    <option value="<?php echo $group->group_name;?>" > <?php echo filter(str_replace("_"," ",$group->group_name)); ?></option>
                    <?php } }?>
                </select>
                <br><br>
                <label for="">Test Name</label>
                <input type="text" name="test_name" value="" id="edit_test" class="form-control">
                <input type="hidden" name="test_id" value="" id="test_id" class="form-control">
        </div>
        <div class="modal-footer">
              <input type="submit" class="btn btn-primary pull-left" name="change" value="Update">
            </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<script>
    function passData(index) {
        var testGroup = document.getElementsByClassName('group_name')[index].innerHTML;
        var testName = document.getElementsByClassName('test_name')[index].innerHTML;
        var testID = document.getElementsByClassName('test_id')[index].value;
        document.getElementById('edit_test').value= testName;
        document.getElementById('test_id').value= testID;
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
