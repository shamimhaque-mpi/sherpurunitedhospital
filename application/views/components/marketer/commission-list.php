<style>
    .profile{width: 60px;}
    .profile img{width: 40px;}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <div class="pull-left">
                        <h1>Commission List</h1>
                    </div>

                    <a href="#" class="pull-right none" style="font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>
            
            <div class="panel-body none" style="padding-bottom: 0px;">
                
                <?php echo form_open(); ?>
                
                <div class="row">
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="reference_name"
                            class="form-control selectpicker"
                            data-show-subtext="true"
                            data-live-search="true"
                            >
                            <option value="" selected>-- Select RF/PC --</option>
                            <?php if (!empty($allMarketer)) {
                                    foreach ($allMarketer as $item) {
                                ?>
                                    <option value="<?php echo $item->id;?>"><?php echo filter($item->name);?></option>
                                <?php }} ?>
                        </select>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="input-group date" id="datetimepickerFrom">
                                <input type="text" name="date[from]" class="form-control" placeholder="Form">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="input-group date" id="datetimepickerTo">
                                <input type="text" name="date[to]" class="form-control" placeholder="To">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="submit" name="show" value="Search" class="btn btn-primary">
                        </div>
                    </div>
                </div>
                
                <?php echo form_close(); ?>
                
            </div>
            
            <hr style="margin: 5px;" class="none">

            <div class="panel-body">
                <?php  $this->load->view('print'); ?>
                
                <table class="table table-bordered">
                    <tr>
                        <th width="30">Sl</th>
                        <th>Date</th>
                        <th>Voucher</th>
                        <th>RF/PC Name</th>
                        <th width="130">Total Bill <small>(Tk)</small></th>
                        <th width="130">Commission <small>(Tk)</small></th>
                    </tr>
                    
                    <?php 
                    $totalCommission = $totalBill = 0;
                    if(!empty($results)){
                        $count = 0;
                        foreach($results as $key => $row){
                            
                            if($row->commission > 0 && $row->grand_total > 0){
                                
                                $commission = ($row->grand_total / 100) * $row->commission;
                                
                                $totalBill += $row->grand_total;
                                $totalCommission += $commission;
                                
                    ?>
                        <tr>
                            <td> <?php echo ++$count; ?> </td>
                            <td> <?php echo $row->date; ?> </td>
                            <td> <?php echo $row->voucher; ?> </td>
                            <td> <?php echo $row->name; ?> </td>
                            <td> <?php echo $row->grand_total; ?> </td>
                            <td> <?php echo $commission; ?> </td>
                            
                        </tr>
                    <?php } } } else { ?>
                        <tr>
                            <th colspan="6" style="text-align: center;">No records found....!</th>
                        </tr>
                    <?php } ?>
                    
                    <tr>
                        <th colspan="4" class="text-right"> Total </th>
                        <th> <?php echo $totalBill; ?> <small>(Tk)</small></th>
                        <th> <?php echo $totalCommission; ?> <small>(Tk)</small></th>
                    </tr>
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script>
    // linking between two date
    $('#datetimepickerFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $("#datetimepickerFrom").on("dp.change", function (e) {
        $('#datetimepickerTo').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepickerTo").on("dp.change", function (e) {
        $('#datetimepickerFrom').data("DateTimePicker").maxDate(e.date);
    });
</script>



