<style type="text/css">
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer{
            display: none !important;
        }

        .panel{
            border: 1px solid transparent;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
        }

        .hide{
            display: block !important;
        }

        .block-hide{
            display: none;
        }

        .table-responsive{
        	display: block !important;
        	overflow: initial;
        }
    }
</style>

<div class="container-fluid block-hide">
    <div class="row">
        <?php 
        echo $this->session->flashdata('confirmation');

        $attribute = array(
            'name'  => '',
            'class' => 'form-horizontal',
            'id'    => ''
        );

        echo form_open('', $attribute);
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
                <div class="col-md-9">
                    <div class="form-group">
                        <label class="col-md-3 control-label">From Date</label>

                        <div class="input-group date col-md-7" id="datetimepicker1">
                            <input type="text" name="date[from]" placeholder="From" class="form-control" >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>   

                    <div class="form-group">
                        <label class="col-md-3 control-label">To Date</label>
                        <div class="input-group date col-md-7" id="datetimepicker2">
                            <input type="text" name="date[to]" placeholder="To" class="form-control" >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>  

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-7">
                            <div class="btn-group pull-right">
                                <input class="btn btn-primary" type="submit" name="show" value="Search">
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

<?php if($records != null){ ?>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>Income Report</h1>
                </div>

                <a 
                    href="#" 
                    class="pull-right none" 
                    style="margin-top: 0px; font-size: 14px;" 
                    onclick="window.print()">
                    <i class="fa fa-print"></i> 
                    Print
                </a>
            </div>

            <div class="panel-body">
                <!-- Print banner -->
                <img class="img-responsive hide print-banner" src="<?php echo site_url('private/images/banner.jpg'); ?>">
                
                <span class="hide print-time">
                    <?php echo $this->data['name'] . ' | ' . date('Y, F j H:i a'); ?>
                </span>
            
            	<div class="table-responsive">

                    <!-- pre><?php print_r($records); ?></pre -->

                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Details</th>
                            <th>Total</th>
                        </tr>

                        <?php 
                        $sl = 1;
                        $total = 0.00;
                        foreach($records as $row) {
                            foreach ($row as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><?php echo $value->date; ?></td>
                            <td><?php echo ucwords($value->details); ?></td>
                            <td><?php echo $value->amount;$total += $value->amount; ?></td>
                        </tr>
                        <?php $sl += 1;}} ?>

                        <tr>
                            <th colspan="3" class="text-right">Total</th>
                            <th><?php echo $total; ?></th>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<?php } ?>



