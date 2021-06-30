<script src="<?php echo site_url('private/js/ngscript/barcodeCtrl.js')?>"></script>
<?php
    //Converting array to object
/*    $meta = $this->retrieve->read("site_meta");
    $meta_info=array();
    foreach($meta as $meta_value){$meta_info[$meta_value->meta_key] = $meta_value->meta_value;}
    $meta_data = (object) $meta_info;
    $this->data["meta"] = $meta_data;
    
    //Converting array to object
    $footer_info = null;
    if(isset($meta->footer)){$footer_info = json_decode($meta->footer,true);}*/
?>
<style>
    @media print{
        aside{
            display: none !important;
        }
        nav{
            display: none;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .none{
            display: none;
        }
        .panel-heading{
            display: none;
        }

        .panel-footer{
            display: none;
        }
        .panel .hide{
            display: block !important;
        }
        .title{
            font-size: 25px;
        }
    }

    table tr.custom-row {}
    table tr.custom-row td {padding: 0;}
    table tr.custom-row td input{
    	width: 100%;
    	height: 34px;
    	border: none;
    	padding: 0 8px;
    }
    table tr.custom-submit-row td{
    	padding: 0;
    }
    .table-responsive {
        overflow-x: hidden;
    }
    .barcode-bar {
        overflow: auto;
    }
    .barcode-contain {
        max-width: 100%;
        float: left;
        margin-bottom: 15px;
        overflow: hidden;
        padding: 0 7px;
    }
    .main-barcode {
        position: relative;
        text-align: center;
        font-weight: normal;
        padding: 15px 0 5px 0;
    }
    .main-barcode .company {text-transform: uppercase; padding:3px 5px;}
    .barcode-text {overflow: auto; margin-top: 8px;}
    .barcode-text small {display: block; float: left;}
</style>

<div class="container-fluid" ng-controller="PrintBarcodeCtrl" ng-cloak>
    <div class="row">
        <?php  echo $this->session->flashdata('confirmation'); ?>

        <div class="panel panel-default none">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1>Print Barcode</h1>
                </div>
            </div>

            <div class="panel-body">
        	<!-- pre><?php //print_r($proInfo); ?></pre -->

            <?php   $attribute = array('name' => '','class' => 'form-horizontal');
                    echo form_open('', $attribute);?>

                <div class="table-responsive">
        		<table class="table table-bordered">
        			<tr>
        				<th>Voucher</th>
        				<th>Number of Barcode</th>
        				<!--<th>Sale Price</th>-->
        				<th>Action</th>
        			</tr>
        
        			<tr class="custom-row" ng-repeat="row in codes">
        				<td>
        				    <input type="text" list="allProductCodes" name="code[]" ng-model="row.code" ng-change="getSalePriceFn($index,row.code);"   required>
        				    <datalist id="allProductCodes">
        				        <?php  if($allProducts != NULL){ foreach($allProducts as $key=>$value) { ?>
                                 <option value="<?php echo $value->voucher; ?>"><?php echo filter($value->voucher); ?></option>
                                <?php } } ?>
                            </datalist>
        				</td>
        				<td>
        				    <input type="number" name="quantity[]" ng-model="row.quantity"  required>
        				    <input type="hidden" name="sale_price[]" ng-model="row.sale_price">
        				</td>
        				<td><a href="#" ng-click="removeRowFn($index)" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
        			</tr>
        
        			<tr><td colspan="4">&nbsp;</td></tr>
        
        			<tr class="custom-submit-row">
        				<td colspan="2" class="text-right"><input type="submit" name="generateForm" value="Show" class="btn btn-primary"></td>
        				<td><a href="#" class="btn btn-info" ng-click="addCodeFn()"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
        			</tr>
        		</table>
            </div>

                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

        
        <?php //print_r($products); //if($products != null){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Barcode</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">
            	<!--pre><?php //print_r($products); ?></pre-->

            	<?php foreach($products as $key => $product){ ?>
	        	<span class="none"><?php echo "Quantity : " . "<strong>". $product['quantity'] ."</stront>". " &nbsp;&nbsp;" ?></span>

                <div class="barcode-bar">
                    <?php
                    $style =1;
                    $code = $leftCode = null;
                    $count = 0;
                    for($i=0;$i<$product['row'];$i++){
                        for($j=0;$j<$product['column'];$j++){
                            if($count < $product['quantity']) { ?>
                            <?php 
                                if($style % 4 == 0){
                                $code = "margin-right: 3px;";
                                }else{
                                    $code = null;
                                }
                                $style++;
                            ?>
                            <div class="col-xs-3">
                               <div class="barcode-contain">
                                    <div class="main-barcode text-center">
                                        <img class="barcode img-responsive" src="<?php echo $product['img']; ?>">
                                    </div>
                                </div> 
                            </div>
                            
                            
                        
                        <!--<style>
                        .panel-default, .panel-body, .panel-footer {overflow:auto;clear:both;}
                                .barcode-bar .barcode-contain {
                                    max-width: 132px;
                                    margin-right: 25px;
                                    margin-bottom: 20px;
                                    margin-top: 10px;
                                    margin-left: 0;
                                    float: left;
                                }
                                .barcode-bar .main-barcode {
                                    /*border: 2px solid #ddd;*/
                                    padding: 3px;
                                    border-radius: 10px;
                                }
                            </style>-->
                  
                            <!--<div class="barcode-contain" style="<?php echo $code; ?>">
                                <div class="main-barcode">
                                    <img class="barcode img-responsive" src="<?php echo $product['img']; ?>" style="max-width: 100%; margin: 0 auto; height: 95%;" />
                                </div>
                            </div>-->
                            <?php /*
                                <span style="width: 100%; display: block; text-align: center; position: absolute; top: 5px; font-size: 15px;"><b><?php echo $footer_info['header_txt']; ?> &nbsp; &nbsp;</b></span>
                                 <div style="margin-top: 0; font-size: 11px;">
                                    <?php if($product['productInfo'] != null) { ?>
            		                    <?php if($product['productInfo'] != null) { ?>
            		                    <span style="display: block; text-align: center; font-size: 10px; position: relative;"><?php echo $product['productInfo']['product_name']; ?></span>
            		                    <?php } ?>
            		                    <?php if($product['sale_price'] > 0) { ?>
                                             <span style="display: block; text-align: center; font-size: 12px;"><b>TK-<?php echo $product['sale_price']; ?></b></span>
                                        <?php } ?>
                                    <?php } ?>
                                    </div>
                                    <span style="margin-bottom: 5px;"></span>
                                    <?php echo $count; ?>
                            */ ?>
                            
                        <?php } else { ?>
                        <!-- <td>&nbsp;<?php // echo $count; ?></td> -->
                        <?php } $count ++; }  ?>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php //} ?>
    </div>
</div>
