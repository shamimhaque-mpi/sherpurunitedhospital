<style>
    h3{
        margin-top: 0; 
        font-size: 22px;
        font-size: 22px;
        background: #ddd;
        line-height: 35px;
        text-align: center;
    }
</style>
<div class="container-fluid">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation'); ?>

    <!-- horizontal form -->
    <?php   $attribute = array('name' => '','class' => 'form-horizontal','id' => '');
            echo form_open_multipart('', $attribute); ?>

        <div class="panel panel-default none">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Search Patient Report </h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>
                <!-- left side -->
                <div class="col-md-9"> 
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Patient ID <span class="req">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="search[pid]" class="form-control" placeholder="Patient ID" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-7">
                            <div class="btn-group pull-right">
                                <input class="btn btn-primary" type="submit" name="show" value="Search">
                                <input class="btn btn-danger" type="reset" value="Clear">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php echo form_close(); 
            $totalIncome = $totalCost = 0;
            if ($patient != null){ 
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Patient Report</h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php  $this->load->view('print'); ?>
                
                <!--<span class="hide print-time"><?php //echo $this->data['name'] . ' | ' . date('Y, F j H:i a'); ?></span>-->
            	
            	<div class="table-responsive">
                    <!-- <pre> <?php //print_r($patient); ?></pre> -->
            		<h3> <strong>Basic Info</strong> </h3>
					<table class="table table-bordered">
	                    <tr>
	                    	<td>Patient ID</td>
	                    	<td><?php echo $patient[0]->pid; ?></td>

	                    	<td>Name</td>
	                    	<td><?php echo $patient[0]->name; ?></td>
	                    </tr> 
	                    <tr>
	                    	<td>Gender</td>
	                    	<td><?php echo $patient[0]->gender;?></td>

	                    	<td>Age</td>
	                    	<td><?php echo $patient[0]->age; ?></td>
	                    </tr>
	                    <tr>
	                    	<td>Contact Number</td>
	                    	<td><?php echo $patient[0]->contact; ?></td>

	                    	<td>Adress</td>
	                    	<td><?php echo $patient[0]->address; ?></td>
	                    </tr>             
	                </table>
                    <?php if($income != null){ ?>
	                <hr class="none">
	                <h3 style="margin-top: 0; font-size: 22px;"><strong>Income Info</strong></h3>
	               	<table class="table table-bordered">
	                    <tr>
                            <th width="45">Sl</th>
	                    	<th>Date</th>
	                    	<th>Field </th>
	                    	<th>Total</th>
	                    </tr>
                        <?php 
                            foreach ($income as $key => $value) {  
                            $totalIncome += $value->grand_total;
                        ?>
	                    <tr>
                            <td style="text-align: center;"><?php echo $key+1; ?></td>
	                    	<td><?php echo $value->date; ?></td>
	                    	<td><?php echo filter($value->details); ?></td>
	                    	<td><?php echo $value->grand_total; ?></td>
	                    </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="3" class="text-right">
                                <strong>Total</strong>
                            </td>
                            <td>
                                <strong><?php echo $totalIncome; ?></strong>
                            </td>
                        </tr>      
	                </table>
                    <?php } if($costs != null){ ?>
	                <hr class="none">
	                <h3 style="margin-top: 0; font-size: 22px;"><strong>Cost Info</strong></h3>
	               	<table class="table table-bordered">
	                    <tr>
                            <th width="45" >sl</th>
	                    	<th>Date</th>
	                    	<th>Field </th>
	                    	<th>Total</th>
	                    </tr>
                        <?php 
                            foreach ($costs as $key => $value) { 
                            $totalCost += $value->amount;
                        ?>
	                    <tr>
                            <td style="text-align: center;"><?php echo $key+1; ?></td>
                            <td><?php echo $value->date; ?></td>
	                    	<td><?php echo filter($value->details); ?></td>
	                    	<td><?php echo $value->amount; ?></td>
	                    </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="3" class="text-right">
                                <strong>Total</strong>
                            </td>
                            <td>
                                <strong><?php echo $totalCost; ?></strong>
                            </td>
                        </tr>    
	                </table>
                    <?php } ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Total Balance</th>
                            <td><strong><?php echo $balance = $totalIncome - $totalCost; ?></strong></td>                            
                        </tr>                     
                    </table>
                      <?php
                        $totalCom = 0.0;
                        $where = array("pid"  => $patient[0]->pid); 
                        $info = $this->action->read("registrations", $where);

                        $cond = array("ref" => $info ? "registration:".$info[0]->id : '');
                        $comInfo = $this->action->read("commissions",$cond);
                     ?>
                    <?php if($comInfo != null){ ?>
                    <hr class="none">
                    <h3 style="margin-top: 0; font-size: 22px;"><strong>Commission Info</strong></h3>
                    <table class="table table-bordered">
                        <tr>
                            <th width="45" >Sl</th>
                            <th>Type</th>
                            <th>Amount</th>                            
                        </tr>
                        <?php 
                            foreach ($comInfo as $key => $value) { 
                            $totalCost += $value->amount;
                        ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $key+1; ?></td>
                            <td><?php echo filter($value->type); ?></td>
                            <td>
                                <?php 
                                   echo $commission = (($balance * $value->amount)/100).round(2);
                                   $totalCom +=$commission;
                                ?>
                            </td>                            
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2" class="text-right">
                                <strong>Total Given Commission</strong>
                            </td>
                            <td>
                                <strong><?php echo $totalCom; ?></strong>
                            </td>
                        </tr>    
                    </table>
                    <?php } ?>
                   <table class="table table-bordered">
                        <tr>
                            <th>Institution's Will Get</th>
                            <td><strong><?php echo ($balance - $totalCom); ?></strong></td>                            
                        </tr>                     
                    </table>
                    </div>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php } ?>
    </div>
</div>