<style>
    .topOfTable span{width: 35%; display: inline-block;}
    .tdNoBorder tr td{border-top: 1px solid transparent !important;}
    .v1 tr td{padding:2px 8px !important;}
    .table{margin-bottom: 0 !important; max-height: 528px !important;}
    @media print{
        .tab1{max-width: 288px;}
        .tab2{max-width: 480px;}
        aside, nav, .none, .panel-heading, .panel-footer{display: none !important;}
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .hide{display: block !important;}
        .font9{font-size: 9px !important;}
        .font11{font-size: 11px !important;}
    }
    .wid-150{width: 150px;}
    table tr td, table tr th{vertical-align: middle !important;}
</style>

<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default ">
            <div class="panel-heading none">
                <div class="panal-header-title">
                    <h1 class="pull-left">Details</h1>               
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>
            
            <div class="panel-body">

            	<div class="col-xs-12 font11">
            	    <div class="">
            	        <table class="table topOfTable tdNoBorder tab2">
			    <tr>
			        <td><span><b>Custommer Name</b></span> :&nbsp; <?php echo filter($result[0]->name); ?></td>
			        <td><span><b>Voucher</b></span> :&nbsp; <?php echo $result[0]->voucher_number; ?></td>
			    </tr>
			    <tr>
			        <td><span><b>Mobile</b></span> :&nbsp; <?php echo $result[0]->mobile; ?></td>
			        <td><span><b>Date </b></span> :&nbsp; <?php echo $result[0]->date; ?></td>
			    </tr>
			</table>
			
			<table class="table table-bordered tab2">
	                    <tr>
	                        <th class="text-center">Product Name</th>
	                        <th class="text-center">Company</th>
	                        <!-- <th class="text-center">Product model</th> -->
	                        <th class="text-center">Price</th>
	                        <th class="text-center">Quantity</th>
	                        <th class="text-center">Amount</th>
	                    </tr>
	
	                    <?php foreach($result as $key => $row){ 
	                    	$productInfo = $this->action->read('products',array("code" => $row->code));
	                    	$name = $productInfo[0]->name;
	                    	$brand = $productInfo[0]->brand;
	                    ?>
	                    <tr>
	                        <!-- <td><?php echo $name; ?></td> -->
	                        <td><?php echo $row->model;?></td>
	                        <td><?php echo $brand;?></td>
	                        <td><?php echo $row->price; ?></td>
	                        <td><?php echo $row->quantity; ?></td>
	                        <td><?php echo $row->subtotal; ?></td>
	                    </tr>
	                    <?php } ?>
	                    <tr>
	                        <th rowspan="6" colspan="3">In Word : <span id="inword2"></span> TK Only. </th>
	                    </tr>
	                    <tr>
	                        <th class="text-right">Total</th>
	                        <td><?php echo $result[0]->total; ?></td> 
	                    </tr>
	                    
	                    <tr>
	                        <th class="text-right">Discount</th>
	                        <td><?php echo $result[0]->discount; ?></td> 
	                    </tr>
	                    
	                     <tr>
	                        <th class="text-right">Grand Total</th>
	                        <td><?php echo $result[0]->grand_total; ?></td> 
	                    </tr>
	
	
	                     <tr>
	                        <th class="text-right">Paid</th>
	                        <td><?php echo $result[0]->paid; ?></td> 
	                    </tr>
	
	                    <tr>
	                        <th class="text-right">Due</th>
	                        <td><?php echo $result[0]->due; ?></td> 
	                    </tr>                    
	                </table>
            	    </div>
            	</div>            	
            </div>          

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo site_url('private/js/inworden.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#inword").html(inWorden(<?php echo $result[0]->grand_total; ?>));
        $("#inword2").html(inWorden(<?php echo $result[0]->grand_total; ?>));
    });
</script>