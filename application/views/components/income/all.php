<?php   $themeSetting = $this->action->read("theme_setting");
        if(isset($themeSetting[0]->header)){$themeHeader = json_decode($themeSetting[0]->header,true);}
    	if(isset($themeSetting[0]->footer)){$themeFooter = json_decode($themeSetting[0]->footer,true);}
    	if(isset($themeSetting[0]->logo)){$logo = json_decode($themeSetting[0]->logo,true);} ?>
    	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />

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
    echo form_open_multipart('', $attribute);
    ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Search Income</h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>

                <!-- left side -->
                <div class="col-md-12"> 

                        <div class="form-group">
                            <div class="col-md-3">
                                <select name="search[income_field]" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" >
                                  <option value="">-- Select Field of Income --</option>
                                   <?php foreach ($income_fields as $key => $value) {?>
                                     <option value="<?php echo $value->code; ?>"><?php echo $value->income_field; ?></option>
                                   <?php } ?>                                 
                                 </select> 
                            </div>
                        
                            <div class="col-md-3">
                            <div class="input-group date" id="datetimepickerFrom">
                                <input type="text" name="date[from]" placeholder="From" class="form-control" >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            </div>
                        
                            <div class="col-md-3">
                            <div class="input-group date" id="datetimepickerTo">
                                <input type="text" name="date[to]" placeholder="To" class="form-control" >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            </div>
                        
                            
                            <div class="btn-group">
                                <input class="btn btn-primary" type="submit" name="show" value="Search">
                            </div>
                        </div>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>

<?php if($incomes != NULL) {?>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>All Income</h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php  $this->load->view('print'); ?>
                
                <h4 class="hide">All Income</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>Field of Income </th>
                        <th>Description </th>
                        <th>Income By </th>
                        <th>Amount </th>
                        <th class="block-hide" width="50">Action</th>
                    </tr>
                    <?php
                        $total=0;
                        foreach ($incomes as $key => $value) {
                            $getField = $this->action->read('income_field',array('code'=>$value->income_field));
                    ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $value->date; ?></td>
                        <td><?php echo filter($getField[0]->income_field); ?></td>
                        <td><?php echo $value->description; ?></td>
                        <td><?php echo $value->income_by; ?></td>
                        <td><?php echo $value->amount; ?></td>
                        <td class="none text-center " style="width: 110px;">
                            <?php //if(ck_action("income_menu","edit")){ ?>
                            <a title="edit" class="btn btn-warning" href="<?php echo site_url('income/income/edit/'.$value->id);?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <?php //} ?>                          
                           <?php //if(ck_action("income_menu","delete")){ ?>
                            <a title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this income?');" href="<?php echo site_url('income/income/delete_income/'.$value->id);?>" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            <?php //} ?>                        
                        </td>
                    </tr>
                    <?php $total+=$value->amount; } ?>
                    <tr>
                        <th colspan="5"><span class="pull-right">Total</span> </th>
                        <th colspan="2"><?php echo $total; ?> TK</th>
                    </tr>
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<?php } ?>


<script>
     $('#datetimepickerFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

